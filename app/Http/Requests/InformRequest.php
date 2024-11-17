<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformRequest extends FormRequest
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
            'actividades' => ['required'],
            'debilidades' => ['required'],
            'fortalezas' => ['required'],
            'consideraciones' => ['required'],
            'sugerencias' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'actividades.required' => 'El campo actividades es obligatorio.',
            'debilidades.required' => 'El campo debilidades es obligatorio.',
            'fortalezas.required' => 'El campo fortalezas es obligatorio.',
            'consideraciones.required' => 'El campo consideraciones es obligatorio.',
            'sugerencias.required' => 'El campo sugerencias es obligatorio.',
        ];
    }
    
}
