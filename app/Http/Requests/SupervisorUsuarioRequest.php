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
            'rut_supervisor' => 'required|string|regex:/^\d{1,8}-[0-9kK]$/|max:10|min:9|unique:supervisores,rut_supervisor',
            'titulo_supervisor' => 'required|string|max:50',
            'fono_supervisor' => 'required|string|max:15',
            'cargo_supervisor' => 'required|string|max:50',
            'correo_usuario' => 'required|email|unique:usuarios,correo_usuario',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'imagen' => 'nullable|image|max:2048', 
            'password' => 'required|string|min:3', 
            'empresa' => 'required|exists:empresas,id',
        ];
    }

    public function messages()
    {
        return [
            'rut_supervisor.required' => 'El RUT del supervisor es obligatorio.',
            'rut_supervisor.max' => 'El RUT no puede exceder los 10 caracteres.',
            'rut_supervisor.min' => 'El RUT debe tener al menos 9 caracteres.',
            'rut_supervisor.unique' => 'Este RUT ya está registrado.',
            'rut_supervisor.regex' => 'El formato del RUT es inválido. Ej: 12345678-9',
            'titulo_supervisor.required' => 'El título del supervisor es obligatorio.',
            'titulo_supervisor.max' => 'El título no puede exceder los 50 caracteres.',
            'fono_supervisor.required' => 'El número de teléfono es obligatorio.',
            'fono_supervisor.max' => 'El número de teléfono no puede exceder los 15 caracteres.',
            'cargo_supervisor.required' => 'El cargo del supervisor es obligatorio.',
            'cargo_supervisor.max' => 'El cargo no puede exceder los 50 caracteres.',
            'correo_usuario.required' => 'El correo del usuario es obligatorio.',
            'correo_usuario.email' => 'El correo debe ser una dirección de correo válida.',
            'correo_usuario.unique' => 'Este correo ya está registrado.',
            'correo_usuario.exists' => 'El correo seleccionado no está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser una cadena de texto.',
            'apellido.max' => 'El apellido no puede tener más de 50 caracteres.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.max' => 'La imagen no puede superar los 2MB.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 3 caracteres.',
        ];
    }
}