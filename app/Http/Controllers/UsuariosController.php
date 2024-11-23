<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CambiarContraRequest;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Estudiante;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Carrera;
use App\Models\Secretaria;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Usuario::query();


        if ($request->filled('termino')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->termino . '%')
                  ->orWhere('apellido', 'like', '%' . $request->termino . '%')
                  ->orWhere('correo_usuario', 'like', '%' . $request->termino . '%');
            });
        }

        if ($request->filled('rol')) {
            $query->whereHas('roles', function($q) use ($request) {
                $q->where('roles.id', $request->rol); // Especificar la tabla 'roles'
            });
        }

        $usuarios = $query->get();
        $roles = Rol::all();

        return view('usuarios.index', compact('usuarios', 'roles'));
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
        if ($rol == 'JefeDeCarrera')
        {
            $jefeDeCarrera = JefeDeCarrera::where('id_usuario',$usuarioId)->first();
            return view('usuarios.perfil',compact('usuario','jefeDeCarrera'));
        }
        if ($rol == 'Secretaria')
        {
            $secretaria = Secretaria::where('id_usuario',$usuarioId)->first();
            return view('usuarios.perfil',compact('usuario','secretaria'));
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

    public function cambiarContra(Usuario $usuario)
    {
        return view('usuarios.cambiarContra',compact('usuario'));
    }

    public function updateContra(CambiarContraRequest $request, Usuario $usuario)
    {
        if (!Hash::check($request->current_password, $usuario->password)) {
            return back()->withErrors('La contraseña antigua no es correcta.');
        }
        if ($request->new_password != $request->new_password_confirmation) {
            return back()->withErrors('Las contraseñas no coinciden.');
        }
        $usuario->password = Hash::make($request->new_password);

        $usuario->save();

        return redirect()->route('usuarios.perfil');
    }

    public function elegirRol(){
        $roles = Rol::all();
        return view('usuarios.elegirRol',compact('roles'));
    }

    public function create(Request $request)
    {
        $rol = $request->rol;
        if($rol == 1){
            return view('usuarios.crearEmpresaD');
        }
        if($rol == 2){
            $carreras = Carrera::all();
            return view('estudiante.create',compact('carreras'));
        }
        if($rol == 5){
            $empresas = Empresa::all();
            return view('supervisores.create',compact('empresas'));
        }
        return view('usuarios.crear',compact('rol'));
    }

    
}
