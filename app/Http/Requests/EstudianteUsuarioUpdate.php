<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteUsuarioUpdate extends FormRequest
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
            'correo_usuario' => 'required|email',
            'password' => 'required|min:3',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'edad_estudiante' => 'required|integer|min:1|max:90',
            'rut_estudiante' => 'required|string|max:12|regex:/^\d{1,8}-[0-9kK]$/|max:10|min:9',
            'direccion_estudiante' => 'required|string|max:255',
            'carrera' => 'required|integer|exists:carreras,id',
            'fono_estudiante' => 'required|string|max:15',
        ];
    }

    public function messages(): array
    {
        return [
            'correo_usuario.required' => 'El correo es obligatorio.',
            'correo_usuario.email' => 'Debes ingresar un correo electrónico válido.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser una cadena de texto.',
            'apellido.max' => 'El apellido no puede tener más de 50 caracteres.',
            'imagen.image' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg.',
            'imagen.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg.',
            'imagen.max' => 'La imagen no puede tener más de 2048 kilobytes.',
            'edad_estudiante.required' => 'La edad es obligatoria.',
            'edad_estudiante.integer' => 'La edad debe ser un número entero.',
            'edad_estudiante.min' => 'La edad debe ser al menos 1.',
            'edad_estudiante.max' => 'La edad no puede ser mayor a 90.',
            'rut_estudiante.required' => 'El RUT es obligatorio.',
            'rut_estudiante.string' => 'El RUT debe ser una cadena de texto.',
            'rut_estudiante.regex' => 'El formato del RUT no es válido.',
            'rut_estudiante.max' => 'El RUT no puede tener más de 12 caracteres.',
            'rut_estudiante.min' => 'El RUT debe tener al menos 9 caracteres.',
            'direccion_estudiante.required' => 'La dirección es obligatoria.',
            'direccion_estudiante.string' => 'La dirección debe ser una cadena de texto.',
            'direccion_estudiante.max' => 'La dirección no puede tener más de 255 caracteres.',
            'carrera.required' => 'La carrera es obligatoria.',
            'carrera.integer' => 'La carrera debe ser un número entero.',
            'carrera.exists' => 'La carrera seleccionada no es válida.',
            'fono_estudiante.required' => 'El teléfono es obligatorio.',
            'fono_estudiante.string' => 'El teléfono debe ser una cadena de texto.',
            'fono_estudiante.max' => 'El teléfono no puede tener más de 15 caracteres.',
        ];
    }
}