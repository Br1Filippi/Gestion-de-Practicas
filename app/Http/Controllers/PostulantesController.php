<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Supervisor;

class PostulantesController extends Controller
{
    public function index(Oferta $oferta, Request $request)
    {
        // Iniciar una consulta para Postulacion
        $query = Postulacion::where('id_oferta', $oferta->id); // Filtrar por id_oferta desde el inicio

        // Si el término de búsqueda está presente, aplicar filtro sobre la relación con Estudiante
        if ($request->filled('termino')) {
            $query->whereHas('estudiante', function($q) use ($request) {
                $q->where('rut_estudiante', 'LIKE', '%' . $request->input('termino') . '%');
            });
        }

        // Obtener las postulaciones filtradas
        $postulaciones = $query->get();

        return view('postulantes.index', compact('postulaciones'));
    }

    public function destroy(Postulacion $postulante)
    {   
        $postulante->delete();
        return redirect()->back();
    }

    public function aceptar(Postulacion $postulante)
    {
        $emailUsuario = auth()->user()->correo_usuario; 
        $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;

        $supervisores = Supervisor::where('id_empresa', $empresaId)->get();
        return view('postulantes.aceptar', compact('postulante','supervisores'));
    }

}
