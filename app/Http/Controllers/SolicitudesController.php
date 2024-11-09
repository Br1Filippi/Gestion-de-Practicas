<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;
use App\Models\Solicitud;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Supervisor;
use App\Http\Requests\SolicitudesRequest;

class SolicitudesController extends Controller
{
    public function index()
    {
        return view('solicitudes.index');
    }

    public function detalles()
    {
        return view('solicitudes.detalles');
    }

    public function store(Postulacion $postulante,SolicitudesRequest $request)
    {
        $solicitud = new Solicitud();
        $solicitud->fecha_inicio = $request->fecha_inicio;
        $solicitud->fecha_termino = $request->fecha_termino;
        $solicitud->id_estado = 1;
        $solicitud->id_supervisor = $request->supervisor;
        $solicitud->id_oferta = $postulante->id_oferta;
        $solicitud->id_empresa = $postulante->oferta->id_empresa;
        $solicitud->id_estudiante = $postulante->id_estudiante;

        $solicitud->save();

        $oferta = Oferta::find($postulante->id_oferta);
        $postulante->delete();
        return redirect()->route('postulantes.index',compact('oferta')); 
    }
}
