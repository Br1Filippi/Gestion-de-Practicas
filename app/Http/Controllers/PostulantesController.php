<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Carrera;

class PostulantesController extends Controller
{
    public function index(Oferta $oferta)
    {
        $ofertaId = $oferta->id;
        $postulaciones = Postulacion::where('id_oferta',$ofertaId)->get();

        $estudiante = Estudiante::all();
        $carrera = Carrera::all();

        return view('postulantes.index',compact('postulaciones','estudiante','carrera'));  
    }

}
