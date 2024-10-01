<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
