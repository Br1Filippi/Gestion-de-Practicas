<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreSolicitudRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after_or_equal:fecha_inicio',
            'supervisor' => 'required|exists:supervisores,id',
            'estudiante' => 'required|exists:estudiantes,id',
            'oferta' => 'required|exists:ofertas,id',
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_termino.required' => 'La fecha de término es obligatoria.',
            'fecha_termino.after_or_equal' => 'La fecha de término debe ser igual o posterior a la fecha de inicio.',
            'supervisor.required' => 'El supervisor es obligatorio.',
            'carrera.required' => 'La carrera es obligatoria.',
            'oferta.required' => 'La oferta es obligatoria.',
            'oferta.exists' => 'La oferta no existe.',
            'empresa.required' => 'La empresa es obligatoria.',
            'estudiante.required' => 'El estudiante es obligatorio.',
            'tipo.required' => 'El tipo es obligatorio.',
            'supervisor.same_company' => 'El supervisor debe pertenecer a la misma empresa que la oferta.',
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