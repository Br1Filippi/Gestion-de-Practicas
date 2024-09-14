<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Tipo;
use App\Models\Carrera;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Empresa;

class OfertasController extends Controller
{
    public function index()
    { 
        $ofertas = Oferta::all();
        $tipos = Tipo::all(); 
        $carreras = Carrera::all(); 
        $regiones = Region::all();
        $comunas = Comuna::all();
        $empresas = Empresa::all();
        return view('ofertas.index',compact(['ofertas','tipos','carreras','regiones','comunas','empresas']));
    }




}
