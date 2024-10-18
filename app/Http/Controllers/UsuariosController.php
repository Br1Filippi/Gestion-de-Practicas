<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Estudiante;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    
    public function index()
    {
        return view('usuarios.index');
    }

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

            if ($rol == 'Supervisor'){
                return redirect()->route('practicas.practicantes');
            }

            if ($rol == 'Secretaria'){
                return redirect()->route('solicitudes.index');
            }

            if ($rol == 'Jefe de Carrera'){
                return redirect()->route('solicitudes.index');
            }

            if ($rol == 'Administrador'){
                return redirect()->route('administrador.index');
            }
            
                
        }
        return back()->withErrors('Correo o Contraseña Incorrectas!')->onlyInput('email');
    }

    public function perfil()
    {
        $usuario = Auth::user();
        $usuarioId = $usuario->correo_usuario;
        $rol = $usuario->roles()->first()->nombre; 

        if ($rol == 'Estudiante')
        {
            $estudiante = Estudiante::where('id_usuario',$usuarioId)->first();
            return view('usuarios.perfil',compact('usuario','estudiante'));
        }
        if ($rol == 'Empresa')
        {
            $empresa = Empresa::where('id_usuario',$usuarioId)->first();
            return view('usuarios.perfil',compact('usuario','empresa'));
        }
        if ($rol == 'Supervisor')
        {
            $supervisor = Supervisor::where('id_usuario',$usuarioId)->first();
            return view('usuarios.perfil',compact('usuario','supervisor'));
        }
        return back();
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->correo_usuario = $request->correo_usuario;
        $usuario->password = $request->Hask::make($request->contra_usuario);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->imagen - $request->file('imagen')->store('public/usuarios');

        $usuario->save();
    }
}
