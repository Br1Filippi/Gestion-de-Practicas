<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticasController extends Controller
{
    public function practicantes()
    {
        return view('practicas.practicantes');
    }
}
