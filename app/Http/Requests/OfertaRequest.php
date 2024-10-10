<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Oferta;

class OfertaRequest extends FormRequest
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
            'titulo' => 'required|string|max:50',
            'cupos' => 'required|integer|min:1|max:20',
            'descripcion' => 'required|string',
            'region' => 'required|exists:regiones,id',
            'comuna' => 'required|exists:comunas,id',
            'carrera' => 'required|exists:carreras,id',
            'tipo' => 'required|exists:tipos,id',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede exceder los 50 caracteres.',
            'cupos.required' => 'El número de cupos es obligatorio.',
            'cupos.integer' => 'El número de cupos debe ser un número entero.',
            'cupos.min' => 'El número de cupos debe ser al menos 1.',
            'cupos.max' => 'El número de cupos no puede ser más de 20.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'region.required' => 'La región es obligatoria.',
            'region.exists' => 'La región seleccionada no es válida.',
            'comuna.required' => 'La comuna es obligatoria.',
            'comuna.exists' => 'La comuna seleccionada no es válida.',
            'carrera.required' => 'La carrera es obligatoria.',
            'carrera.exists' => 'La carrera seleccionada no es válida.',
            'tipo.required' => 'El tipo de oferta es obligatorio.',
            'tipo.exists' => 'El tipo de oferta seleccionado no es válido.',
        ];
    }
}
