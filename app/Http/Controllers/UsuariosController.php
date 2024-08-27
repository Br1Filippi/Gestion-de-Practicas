<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function login()
    {
        return view('usuarios.login');
    }

    public function autenticar(Request $request)
    {
        $credentiales = ['correo_usuario'=>$request->email,'contra'=>$request->password];

        if(Auth::attempt($credentiales))
        {
            $request->session()->regenerate();
            return redirect()->route('templates.master');
        }
        return back()->withErrors('Correo o Contraseña Incorrectas!')->onlyInput('email');
    }
}
