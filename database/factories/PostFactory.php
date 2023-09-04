<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::all()->random(),
            'category_id'   => Category::all()->random(),
            'title'         => $title = fake()->unique()->sentence(),
            'slug'          => Str::slug($title),
            'excerpt'       => fake()->paragraph(10),
            'body'          => fake()->paragraph(80)
        ];
    }
}
