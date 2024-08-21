<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function login()
    {
        return view('usuarios.login');
    }
}
