<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;
use App\Models\Informe;
use App\Models\Postulacion;
use App\Models\Solicitud;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Secretaria;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Estado;
use App\Models\Evaluacion;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;



class EvaluacionesController extends Controller
{
    public function informeStore(Practica $practica,Request $request)
    {
        $informe = new Informe();
        $informe -> actividades = $request -> actividades;
        $informe -> debilidades = $request -> debilidades;
        $informe -> fortalezas = $request -> fortalezas;
        $informe -> consideraciones = $request -> consideraciones;
        $informe -> sugerencias = $request -> sugerencias;

        $informe -> save();
        $practica -> id_informe = $informe -> id;
        $practica -> save();

        return redirect()->route('practicas.practicantes');
    }

    

    public function evaluarInforme(Practica $practica,Request $request)
    {
        $evaluacion = new Evaluacion();
        $evaluacion -> capacidad = $request -> capacidad;
        $evaluacion -> confianza = $request -> confianza;
        $evaluacion -> aplicacion = $request -> aplicacion;
        $evaluacion -> adaptabilidad = $request -> adaptabilidad;
        $evaluacion -> iniciativa = $request -> iniciativa;
        $evaluacion -> aptitud = $request -> aptitud;
        $evaluacion -> conocimiento = $request -> conocimiento;
        $evaluacion -> asistencia = $request -> asistencia;

        $evaluacion ->save();
        $practica -> id_evaluacion = $evaluacion -> id;
        $practica -> save();

        return redirect()->route('practicas.practicantes');
    }



    public function informe(Practica $practica)
    {
        if($practica->id_informe != null){
            return back()->withErrors(['errors' => 'El Informe ya ha sido creado']);
        }
        return view('evaluaciones.informe', compact('practica'));
    }



    public function desempeño(Practica $practica)
    {
        if($practica->id_evaluacion != null){
            return back()->withErrors(['errors' => 'La evaluacion ya ha sido creada']);
        }
        return view('evaluaciones.desempeño', compact('practica'));
    }
}
