<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;


class StorePracticaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after_or_equal:fecha_inicio',
            'estudiante' => 'required|exists:estudiantes,id',
            'empresa' => 'required|exists:empresas,id',
            'supervisor' => 'required|exists:supervisores,id',
            'oferta' => 'required|exists:ofertas,id',
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_termino.required' => 'La fecha de término es obligatoria.',
            'fecha_termino.after_or_equal' => 'La fecha de término debe ser igual o posterior a la fecha de inicio.',
            'estudiante.required' => 'El estudiante es obligatorio.',
            'empresa.required' => 'La empresa es obligatoria.',
            'supervisor.required' => 'El supervisor es obligatorio.',
            'oferta.required' => 'La oferta es obligatoria.',
            'tipo.required' => 'El tipo es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $this->validateSupervisorCompany($validator);
        });
    }

    protected function validateSupervisorCompany($validator)
    {
        $supervisorId = $this->input('supervisor');
        $ofertaId = $this->input('oferta');

        $supervisor = \App\Models\Supervisor::find($supervisorId);
        $oferta = \App\Models\Oferta::find($ofertaId);

        if ($supervisor && $oferta && $supervisor->id_empresa !== $oferta->id_empresa) {
            $validator->errors()->add('supervisor', 'El supervisor debe pertenecer a la misma empresa que la oferta.');
        }
    }
}
