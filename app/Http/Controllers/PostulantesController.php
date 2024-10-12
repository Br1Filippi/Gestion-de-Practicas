<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;

class PostulantesController extends Controller
{
    public function index()
    {
        $postulantes = Postulacion::all();
        return view('postulantes.index',compact('postulantes'));
    }

}
