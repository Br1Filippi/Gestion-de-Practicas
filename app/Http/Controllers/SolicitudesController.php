<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Postulacion;
use App\Models\Solicitud;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Secretaria;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Estado;
use App\Models\Tipo;
use Carbon\Carbon;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;
use App\Http\Requests\SolicitudesRequest;

class SolicitudesController extends Controller
{
    public function index(Request $request)
    {
        $emailUsuario = auth()->user()->correo_usuario;
        $tipos = Tipo::all();
        $carreras = Carrera::all();

        if (Gate::allows('estudiante-gestion')) {
            $estudiante = Estudiante::where('id_usuario', $emailUsuario)->first();
            $solicitudes = Solicitud::where('id_estudiante', $estudiante->id)->get();
            return view('solicitudes.index', compact('solicitudes', 'tipos', 'carreras'));
        }

        $query = Solicitud::query();

        if ($request->filled('termino')) {
            $termino = $request->input('termino');
            $query->whereHas('estudiante.usuario', function ($q) use ($termino) {
                $q->where('nombre', 'like', '%' . $termino . '%')
                  ->orWhere('apellido', 'like', '%' . $termino . '%');
            })->orWhereHas('estudiante', function ($q) use ($termino) {
                $q->where('rut_estudiante', 'like', '%' . $termino . '%');
            })->where('id_estado', 1);
        }
        if ($request->filled('tipo')) {
            $query->where('id_tipo', $request->input('tipo'));
        }
        if ($request->filled('carrera')) {
            $query->where('id_carrera', $request->input('carrera'));
        }

        if (Gate::allows('jefe-gestion')) {
            $jefe = JefeDeCarrera::where('id_usuario', $emailUsuario)->first();
            $carreraJefe = Carrera::where('id', $jefe->id_carrera)->first();
            $solicitudes = $query->where('pass', 0)
             ->where('id_estado', 1)
             ->where('id_carrera', $carreraJefe->id)
             ->get();
            return view('solicitudes.index', compact('solicitudes', 'tipos', 'carreras'));
        }

        if (Gate::allows('secretaria-gestion')) {
            $solicitudes = $query->where('pass', 1)
                 ->where('id_estado', 1)
                 ->get();
            return view('solicitudes.index', compact('solicitudes','tipos','carreras'));
        }

        return view('solicitudes.index', compact('solicitudes','tipos','carreras'));
    }

    public function detalles(Solicitud $solicitud)
    {
        
        return view('solicitudes.detalles',compact('solicitud'));
    }

    public function passar(Solicitud $solicitud)
    {
        $solicitud->pass = true;
        $solicitud->save();
        return redirect()->route('solicitudes.index');
    }

    public function rechazar(Solicitud $solicitud)
    {
        $solicitud->id_estado = 3;
        $solicitud->save();
        return redirect()->route('solicitudes.index');
    }


    public function store(Postulacion $postulante,SolicitudesRequest $request)
    {
        $solicitud = new Solicitud();
        $solicitud->fecha_inicio = $request->fecha_inicio;
        $solicitud->fecha_termino = $request->fecha_termino;
        $solicitud->id_estado = 1;
        $solicitud->id_supervisor = $request->supervisor;
        $solicitud->id_carrera = $postulante->oferta->id_carrera;
        $solicitud->id_oferta = $postulante->id_oferta;
        $solicitud->id_empresa = $postulante->oferta->id_empresa;
        $solicitud->id_estudiante = $postulante->id_estudiante;
        $solicitud->id_tipo = $postulante->oferta->id_tipo;

        $solicitud->save();

        $oferta = Oferta::find($postulante->id_oferta);
        $postulante->delete();
        return redirect()->route('postulantes.index',compact('oferta')); 
    }
}
