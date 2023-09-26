<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'max:255', 'min:7']
        ];
    }

    public function messages(): array
    {
        return [
            'required'  => 'Este campo es requerido y no puede quedar en blanco.',
            'max'       => 'Este campo no puede tener mas de :max caracteres.',
            'email'     => 'El correo electrónico debe tener un formato valido.',
            'min'       => 'El campo debe tener al menos :min caracteres.'
        ];
    }
}
