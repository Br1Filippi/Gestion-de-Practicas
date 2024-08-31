<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;

class OfertasController extends Controller
{
    public function index()
    { 
        $ofertas = Oferta::all();
        return view('ofertas.index',compact('ofertas'));
    }
}
