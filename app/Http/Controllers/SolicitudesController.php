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
use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;

class SolicitudesController extends Controller
{

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index2');
    }

    public function update(Solicitud $solicitud, UpdateSolicitudRequest $request)
    {
        $oferta = Oferta::find($request->oferta);
        $estudiante = Estudiante::find($request->estudiante);

        $solicitud->fecha_inicio = $request->fecha_inicio;
        $solicitud->fecha_termino = $request->fecha_termino;
        $solicitud->id_estado = $request->estado;
        $solicitud->id_supervisor = $request->supervisor;
        $solicitud->id_carrera = $estudiante->carrera->id;
        $solicitud->id_oferta = $oferta->id;
        $solicitud->id_empresa = $oferta->id_empresa;
        $solicitud->id_estudiante = $estudiante->id;
        $solicitud->id_tipo = $oferta->id_tipo;

        $solicitud->save();

        return redirect()->route('solicitudes.index2');
    }

    public function edit(Solicitud $solicitud)
    {
        $tipos = Tipo::all();
        $carreras = Carrera::all();
        $empresas = Empresa::all();
        $estudiantes = Estudiante::all();
        $supervisores = Supervisor::all();
        $estados = Estado::all();
        $ofertas = Oferta::all();
        return view('solicitudes.edit', compact('solicitud', 'tipos', 'carreras', 'empresas', 'estudiantes', 'supervisores', 'ofertas','estados'));
    }

    public function store2(StoreSolicitudRequest $request)
    {
        $oferta = Oferta::find($request->oferta);
        $estudiante = Estudiante::find($request->estudiante);

        $solicitud = new Solicitud();
        $solicitud->fecha_inicio = $request->fecha_inicio;
        $solicitud->fecha_termino = $request->fecha_termino;
        $solicitud->id_estado = 1; // Estado inicial
        $solicitud->id_supervisor = $request->supervisor;
        $solicitud->id_carrera = $estudiante->carrera->id;
        $solicitud->id_oferta = $oferta->id;
        $solicitud->id_empresa = $oferta->id_empresa;
        $solicitud->id_estudiante = $estudiante->id;
        $solicitud->id_tipo = $oferta->id_tipo;

        $solicitud->save();

        return redirect()->route('solicitudes.index2');
    }

    public function create()
    {
        $tipos = Tipo::all();
        $carreras = Carrera::all();
        $empresas = Empresa::all();
        $estudiantes = Estudiante::all();
        $supervisores = Supervisor::all();
        $ofertas = Oferta::all();
        return view('solicitudes.create', compact('tipos', 'carreras', 'empresas', 'estudiantes', 'supervisores', 'ofertas'));
    }

    public function index2(Request $request)
    {
        $query = Solicitud::query();
        $tipos = Tipo::all();
        $carreras = Carrera::all();
        $estado = Estado::all();

        // Filtros
        if ($request->filled('termino')) {
            $query->where('titulo', 'like', '%' . $request->input('termino') . '%');
        }

        if ($request->filled('tipo')) {
            $query->where('id_tipo', $request->input('tipo'));
        }

        if ($request->filled('carrera')) {
            $query->where('id_carrera', $request->input('carrera'));
        }

        if ($request->filled('estado')) {
            $query->where('id_estado', $request->input('estado'));
        }

        $solicitudes = $query->get();
        

        return view('solicitudes.index2', compact('solicitudes', 'tipos', 'carreras', 'estado'));
    }


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
}