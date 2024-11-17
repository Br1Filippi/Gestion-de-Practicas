<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'capacidad' => 'required|integer|in:0,1,2',
            'confianza' => 'required|integer|in:0,1,2',
            'aplicacion' => 'required|integer|in:0,1,2',
            'adaptabilidad' => 'required|integer|in:0,1,2',
            'iniciativa' => 'required|integer|in:0,1,2',
            'aptitud' => 'required|integer|in:0,1,2',
            'conocimiento' => 'required|integer|in:0,1,2',
            'asistencia' => 'required|integer|in:0,1,2',
        ];
    }
    public function messages(): array
    {
        return [
            'capacidad.required' => 'La capacidad es obligatoria.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.in' => 'La capacidad debe ser 0, 1 o 2.',
            'confianza.required' => 'La confianza es obligatoria.',
            'confianza.integer' => 'La confianza debe ser un número entero.',
            'confianza.in' => 'La confianza debe ser 0, 1 o 2.',
            'aplicacion.required' => 'La aplicación es obligatoria.',
            'aplicacion.integer' => 'La aplicación debe ser un número entero.',
            'aplicacion.in' => 'La aplicación debe ser 0, 1 o 2.',
            'adaptabilidad.required' => 'La adaptabilidad es obligatoria.',
            'adaptabilidad.integer' => 'La adaptabilidad debe ser un número entero.',
            'adaptabilidad.in' => 'La adaptabilidad debe ser 0, 1 o 2.',
            'iniciativa.required' => 'La iniciativa es obligatoria.',
            'iniciativa.integer' => 'La iniciativa debe ser un número entero.',
            'iniciativa.in' => 'La iniciativa debe ser 0, 1 o 2.',
            'aptitud.required' => 'La aptitud es obligatoria.',
            'aptitud.integer' => 'La aptitud debe ser un número entero.',
            'aptitud.in' => 'La aptitud debe ser 0, 1 o 2.',
            'conocimiento.required' => 'El conocimiento es obligatorio.',
            'conocimiento.integer' => 'El conocimiento debe ser un número entero.',
            'conocimiento.in' => 'El conocimiento debe ser 0, 1 o 2.',
            'asistencia.required' => 'La asistencia es obligatoria.',
            'asistencia.integer' => 'La asistencia debe ser un número entero.',
            'asistencia.in' => 'La asistencia debe ser 0, 1 o 2.',
        ];
    }
}
