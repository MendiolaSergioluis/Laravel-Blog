<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest('id')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', Rule:: unique('categories', 'name')]
        ], [
            'required' => 'Este campo es requerido y no puede quedar en blanco.',
            'unique' => 'Ya fue tomada, intente con otra distinta.',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        Category::create($attributes);

        return back()->with('exito', 'Tú categoría fue creada correctamente.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => ['required', Rule:: unique('categories', 'name')->ignore($category)]
        ], [
            'required' => 'Este campo es requerido y no puede quedar en blanco.',
            'unique' => 'Ya fue tomada, intente con otra distinta.',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        $category->update($attributes);

        return redirect('/admin/categories')->with('exito', 'Tú categoría fué editada correctamente.');
    }

    public function destroy(Category $category)
    {
        foreach ($category->posts as $post) {
            $post->delete();
        }


        $category->delete();

        return redirect('/admin/categories')->with('exito', 'Tú categoría fué eliminada correctamente.');
    }

}
