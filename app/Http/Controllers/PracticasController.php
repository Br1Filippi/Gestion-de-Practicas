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
use App\Models\Tipo;
use App\Models\JefeDeCarrera;
use App\Http\Requests\StorePracticaRequest;
use App\Http\Requests\UpdatePracticaRequest;

class PracticasController extends Controller
{

    public function destroy(Practica $practica)
    {
        $practica->delete();
        return redirect()->route('practicas.index2');
    }

    public function update(Practica $practica, UpdatePracticaRequest $request)
    {
        $estudiante = Estudiante::find($request->estudiante);
        $oferta = Oferta::find($request->oferta);
        $supervisor = Supervisor::find($request->supervisor);

        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_termino = $request->fecha_termino;
        $practica->id_carrera = $estudiante->carrera->id;
        $practica->id_estado = $request->estado;
        $practica->id_oferta = $oferta->id;
        $practica->id_estudiante = $estudiante->id;
        $practica->id_empresa = $request->empresa;
        $practica->id_supervisor = $supervisor->id;
        $practica->id_tipo = $oferta->tipo->id;
        $practica->save();
        return redirect()->route('practicas.index2');
    }

    public function edit(Practica $practica)
    {
        $supervisores = Supervisor::all();
        $empresas = Empresa::all();
        $estudiantes = Estudiante::all();
        $ofertas = Oferta::all();
        $estados = Estado::all();
        return view('practicas.edit', compact('supervisores','empresas', 'estudiantes', 'ofertas', 'estados', 'practica'));
    }

    public function store2(StorePracticaRequest $request)
    {
        $estudiante = Estudiante::find($request->estudiante);
        $oferta = Oferta::find($request->oferta);
        $supervisor = Supervisor::find($request->supervisor);

        $practica = new Practica();
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_termino = $request->fecha_termino;
        $practica->id_carrera = $estudiante->carrera->id;
        $practica->id_estado = 1;
        $practica->id_oferta = $oferta->id;
        $practica->id_estudiante = $estudiante->id;
        $practica->id_empresa = $request->empresa;
        $practica->id_supervisor = $supervisor->id;
        $practica->id_tipo = $oferta->tipo->id;
        $practica->save();
        return redirect()->route('practicas.index2');
    }

    public function getSupervisoresOfertas($empresaId)
    {
        $supervisores = Supervisor::where('id_empresa', $empresaId)->with('usuario')->get();
        $ofertas = Oferta::where('id_empresa', $empresaId)->with('empresa.usuario')->get();
        return response()->json(['supervisores' => $supervisores, 'ofertas' => $ofertas]);
    }

    public function create()
    {
        $supervisores = Supervisor::all();
        $empresas = Empresa::all();
        $estudiantes = Estudiante::all();
        $ofertas = Oferta::all();
        return view('practicas.create', compact('supervisores','empresas', 'estudiantes', 'ofertas'));
    }

    public function index2(Request $request)
    {
        $query = Practica::query();
        $tipos = Tipo::all();
        $carreras = Carrera::all();
        $estados = Estado::all();

        // Filtros
        if ($request->filled('termino')) {
            $query->whereHas('estudiante.usuario', function ($q) use ($termino) {
                $q->where('nombre', 'like', '%' . $termino . '%')
                  ->orWhere('apellido', 'like', '%' . $termino . '%');
            })->orWhereHas('estudiante', function ($q) use ($termino) {
                $q->where('rut_estudiante', 'like', '%' . $termino . '%');
            });
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

        $practicas = $query->get();

        return view('practicas.index2', compact('practicas', 'tipos', 'carreras', 'estados'));
    }

    public function practicantes()
    {

        $emailUsuario = auth()->user()->correo_usuario; 

        if (request()->has('termino')) {
            $termino = request()->input('termino');
            $query = Practica::query();

            if (Gate::allows('supervisor-gestion')) {
            $supervisor = Supervisor::where('id_usuario', $emailUsuario)->first();
            $query->where('id_supervisor', $supervisor->id)->where('pass', null);
            } elseif (Gate::allows('jefe-gestion')) {
            $jefe = JefeDeCarrera::where('id_usuario', $emailUsuario)->first();
            $carreraJefe = Carrera::where('id', $jefe->id_carrera)->first();
            $query->where('pass', 0)->where('id_estado', 1)->where('id_carrera', $carreraJefe->id);
            } elseif (Gate::allows('estudiante-gestion')) {
            $estudiante = Estudiante::where('id_usuario', $emailUsuario)->first();
            $query->where('id_estudiante', $estudiante->id);
            } elseif (Gate::allows('secretaria-gestion')) {
            $query->where('pass', 1)->where('id_estado', 1);
            }

            $practicantes = $query->whereHas('estudiante.usuario', function ($query) use ($termino) {
            $query->where('nombre', 'like', '%' . $termino . '%')
                  ->orWhere('apellido', 'like', '%' . $termino . '%')
                  ->orWhere('rut_estudiante', 'like', '%' . $termino . '%');
            })->get();

            return view('practicas.practicantes', compact('practicantes'));
        }

        if (Gate::allows('supervisor-gestion')) {
            $supervisor = Supervisor::where('id_usuario', $emailUsuario)->first();
            $practicantes = Practica::where('id_supervisor', $supervisor->id)->where('pass', null)->get();
        } elseif (Gate::allows('jefe-gestion')) {
            $jefe = JefeDeCarrera::where('id_usuario', $emailUsuario)->first();
            $carreraJefe = Carrera::where('id', $jefe->id_carrera)->first();
            $practicas = Practica::where('pass', 0)->where('id_estado', 1)->where('id_carrera', $carreraJefe->id)->get();
        } elseif (Gate::allows('estudiante-gestion')) {
            $estudiante = Estudiante::where('id_usuario', $emailUsuario)->first();
            $practicas = Practica::where('id_estudiante', $estudiante->id)->get();
        } elseif (Gate::allows('secretaria-gestion')) {
            $practicas = Practica::where('pass', 1)->where('id_estado', 1)->get();
        }

        return view('practicas.practicantes');
    
    }

    public function passar(Practica $practica)
    {   

        if(gate::allows('jefe-gestion')){
            $practica->pass = 1;
            $practica->save();
            return redirect()->route('practicas.index');
        }
        if(Gate::allows('secretaria-gestion')){
            $practica->id_estado = 2;
            $practica->save();
            return redirect()->route('practicas.index');
        }

        if(Gate::allows('supervisor-gestion')){
            if($practica->id_informe == null || $practica->id_evaluacion == null){
                return back()->withErrors(['errors' => 'No se puede enviar la practica si no se ha evaluado']);
            }
            $practica->pass = 0;
            $practica->fecha_informes = now();
            
            $practica->save();
            return redirect()->route('practicas.practicantes');
        }
    }

    public function index()
    {
        $emailUsuario = auth()->user()->correo_usuario; 
        $tipos = Tipo::all();
        $carreras = Carrera::all();

        $query = Practica::query();
        if (request()->filled('termino')) {
            $termino = request()->input('termino');
            $query->whereHas('estudiante.usuario', function ($q) use ($termino) {
            $q->where('nombre', 'like', '%' . $termino . '%')
              ->orWhere('apellido', 'like', '%' . $termino . '%');
            })->orWhereHas('estudiante', function ($q) use ($termino) {
            $q->where('rut_estudiante', 'like', '%' . $termino . '%');
            })->where('id_estado', 1);
        }
        if (request()->filled('tipo')) {
            $query->where('id_tipo', request()->input('tipo'));
        }
        if (request()->filled('carrera')) {
            $query->where('id_carrera', request()->input('carrera'));
        }

        if (Gate::allows('jefe-gestion')){
            $jefe = JefeDeCarrera::where('id_usuario', $emailUsuario)->first();
            $carreraJefe = Carrera::where('id', $jefe->id_carrera)->first();
            $practicas = $query->where('pass', 0)->where('id_estado', 1)->where('id_carrera', $carreraJefe->id)->get();
            return view('practicas.index', compact('practicas', 'tipos', 'carreras'));
        }
        if (Gate::allows('estudiante-gestion')){
            $estudiante = Estudiante::where('id_usuario', $emailUsuario)->first();
            $practicas = $query->where('id_estudiante', $estudiante->id)->get();
            return view('practicas.index', compact('practicas', 'tipos', 'carreras'));
        }
        if (Gate::allows('secretaria-gestion')){
            $practicas = $query->where('pass', 1)->where('id_estado', 1)->get();
            return view('practicas.index', compact('practicas', 'tipos', 'carreras'));
        }

        return view('practicas.index', compact('tipos', 'carreras'));
    }

    public function detalles(Practica $practica)
    {
        return view('practicas.detalles',compact('practica'));
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

    public function rechazar(Practica $practica)
    {
        $practica->id_estado = 3;
        $practica->save();
        return redirect()->route('practicas.index');
    }
}
