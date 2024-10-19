<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaUsuarioRequest extends FormRequest
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
            'correo_usuario' => 'required|email|unique:usuarios,correo_usuario',
            'password' => 'required|min:3',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'rut_empresa' => 'required|string|max:12|unique:empresas,rut_empresa|regex:/^\d{1,8}-[0-9kK]$/|max:10|min:9',
            'url_web' => 'required|url',
            'email_contacto' => 'required|email',
            'direccion_empresa' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'correo_usuario.required' => 'El correo es obligatorio.',
            'correo_usuario.email' => 'Debes ingresar un correo electrónico válido.',
            'correo_usuario.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 3 caracteres.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser una cadena de texto.',
            'apellido.max' => 'El apellido no puede tener más de 50 caracteres.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg.',
            'imagen.max' => 'La imagen no puede superar los 2MB.',
            'rut_empresa.required' => 'El RUT es obligatorio.',
            'rut_empresa.string' => 'El RUT debe ser una cadena de texto.',
            'rut_empresa.max' => 'El RUT no puede tener más de 10 caracteres.',
            'rut_empresa.unique' => 'Este RUT ya está registrado.',
            'rut_empresa.regex' => 'El formato del RUT es inválido. Ej: 12345678-9',
            'url_web.required' => 'La URL del sitio web es obligatoria.',
            'url_web.url' => 'Debes ingresar una URL válida.',
            'email_contacto.required' => 'El correo de contacto es obligatorio.',
            'email_contacto.email' => 'Debes ingresar un correo electrónico de contacto válido.',
            'direccion_empresa.required' => 'La dirección es obligatoria.',
            'direccion_empresa.string' => 'La dirección debe ser una cadena de texto.',
            'direccion_empresa.max' => 'La dirección no puede tener más de 255 caracteres.',
            'razon_social.required' => 'La razón social es obligatoria.',
            'razon_social.string' => 'La razón social debe ser una cadena de texto.',
            'razon_social.max' => 'La razón social no puede tener más de 255 caracteres.',
        ];
    }
}
