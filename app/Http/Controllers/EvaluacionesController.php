<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionesController extends Controller
{
    public function informe()
    {
        return view('evaluaciones.informe');
    }

    public function desempeño()
    {
        return view('evaluaciones.desempeño');
    }
}
