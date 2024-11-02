<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarContraRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string',
            'new_password' => 'required|min:3',
            'new_password_confirmation' => 'required|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'La contraseña actual es obligatoria.',
            'new_password.required' => 'La nueva contraseña es obligatoria.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
            'new_password_confirmation.required' => 'La nueva contraseña es obligatoria.',
            'new_password_confirmation.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
        ];
    }
}