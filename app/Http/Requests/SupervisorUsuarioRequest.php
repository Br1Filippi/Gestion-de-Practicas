<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupervisorUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rut_supervisor' => 'required|string|regex:/^\d{1,8}-[0-9kK]$/|max:10|min:9',
            'titulo_supervisor' => 'required|string|max:50',
            'fono_supervisor' => 'required|string|max:15',
            'cargo_supervisor' => 'required|string|max:50',
            'correo_usuario' => 'required|email|',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'imagen' => 'nullable|image|max:2048', 
            'password' => 'required|string|min:3', 
        ];
    }

    public function messages()
    {
        return [
            'rut_supervisor.required' => 'El RUT del supervisor es obligatorio.',
            'rut_supervisor.max' => 'El RUT no puede exceder los 10 caracteres.',
            'rut_supervisor.min' => 'El RUT debe tener al menos 9 caracteres.',
            'rut_supervisor.regex' => 'El formato del RUT es inválido. Ej: 12345678-9',
            'titulo_supervisor.required' => 'El título del supervisor es obligatorio.',
            'titulo_supervisor.max' => 'El título no puede exceder los 50 caracteres.',
            'fono_supervisor.required' => 'El número de teléfono es obligatorio.',
            'fono_supervisor.max' => 'El número de teléfono no puede exceder los 15 caracteres.',
            'cargo_supervisor.required' => 'El cargo del supervisor es obligatorio.',
            'cargo_supervisor.max' => 'El cargo no puede exceder los 50 caracteres.',
            'correo_usuario.required' => 'El correo del usuario es obligatorio.',
            'correo_usuario.email' => 'El correo debe ser una dirección de correo válida.',
            'correo_usuario.exists' => 'El correo seleccionado no está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.max' => 'El apellido no puede exceder los 50 caracteres.',
            'imagen.image' => 'La imagen debe ser un archivo de tipo imagen.',
            'imagen.max' => 'La imagen no puede ser mayor de 2MB.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 3 caracteres.',
        ];
    }
}
