<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Postulacion;
use App\Models\Practica;
use App\Models\Solicitud;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Secretaria;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Estado;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;

class PracticasController extends Controller
{
    public function practicantes()
    {
        $emailUsuario = auth()->user()->correo_usuario; 
        if(Gate::allows('supervisor-gestion')){
            $supervisor = Supervisor::where('id_usuario', $emailUsuario)->first();
            $practicantes = Practica::where('id_supervisor',$supervisor->id)->where('pass',null)->get();
            return view('practicas.practicantes',compact('practicantes'));
        }
        if (Gate::allows('jefe-gestion')){
            $jefe = JefeDeCarrera::where('id_usuario', $emailUsuario)->first();
            $carreraJefe = Carrera::where('id', $jefe->id_carrera)->first();
            $practicas = Practica::where('pass',0)->where('id_estado',1)->where('id_carrera',$carreraJefe->id)->get();
            return view('practicas.index',compact('practicas'));
        }
        if(Gate::allows('estudiante-gestion')){
            $estudiante = Estudiante::where('id_usuario', $emailUsuario)->first();
            $practicas = Practica::where('id_estudiante',$estudiante->id)->get();
            return view('practicas.index',compact('practicas'));
        }
        if (Gate::allows('secretaria-gestion')){
            $practicas = Practica::where('pass',1)->where('id_estado',1)->get();
            return view('practicas.index',compact('practicas'));
        }
        return view('practicas.practicantes');
    }

    public function passar(Practica $practica)
    {
        if($practica->id_informe == null || $practica->id_evaluacion == null){
            return back()->withErrors(['errors' => 'No se puede enviar la practica si no se ha evaluado']);
        }
        $practica->pass = 1;
        $practica->save();
        return redirect()->route('practicas.practicantes');
    }

    public function index()
    {
        return view('practicas.index');
    }

    public function detalles()
    {
        return view('practicas.detalles');
    }

    public function store(Solicitud $solicitud)
    {

        $practica = new Practica();
        $practica->fecha_inicio = $solicitud->fecha_inicio;
        $practica->fecha_termino = $solicitud->fecha_termino;
        $practica->id_carrera = $solicitud->id_carrera;
        $practica->id_estado = 1;
        $practica->id_oferta = $solicitud->id_oferta;
        $practica->id_estudiante = $solicitud->id_estudiante;
        $practica->id_empresa = $solicitud->id_empresa;
        $practica->id_supervisor = $solicitud->id_supervisor;
        $practica->id_tipo = $solicitud->id_tipo;

        $solicitud->id_estado = 2;
        $practica->save();
        $solicitud->save();

        return redirect()->route('solicitudes.index');
    }
}
