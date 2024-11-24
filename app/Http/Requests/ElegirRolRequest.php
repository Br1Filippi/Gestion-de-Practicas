<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElegirRolRequest extends FormRequest
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
            'rol' => ['required', 'exists:roles,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'rol.required' => 'Debes Seleccionar un rol.',
            'rol.exists' => 'El rol seleccionado no es válido.',
        ];
    }
}
