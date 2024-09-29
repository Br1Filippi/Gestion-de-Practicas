<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('administrador.index');
    }

    public function estadisticas()
    {
        return view('administrador.estadisticas');
    }
}
