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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function autenticar(Request $request)
    {
        $credentials = ['correo_usuario'=>$request->email,'password'=>$request->password];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $usuario = Auth::user();
            $rol = $usuario->roles()->first()->nombre; 
    

            if ($rol == 'Empresa'){
                return redirect()->route('ofertas.index');
            }
            if ($rol == 'Estudiante'){
                return redirect()->route('ofertas.index');
            }
                
        }
        return back()->withErrors('Correo o Contraseña Incorrectas!')->onlyInput('email');
    }

    public function perfil()
    {
        return view('usuarios.perfil');
    }
}
