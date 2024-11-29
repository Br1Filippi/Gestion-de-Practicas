<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CambiarContraRequest;
use App\Models\Usuario;
use App\Models\Oferta;
use App\Models\Solicitud;
use App\Models\Practica;
use App\Models\Empresa;
use App\Models\Estudiante;
use App\Models\Supervisor;
use App\Models\JefeDeCarrera;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Carrera;
use App\Models\Secretaria;
use App\Http\Requests\ElegirRolRequest;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function destroy(Usuario $usuario)
    {
        $rol = $usuario->roles()->first()->id;

        if ($rol == 1) {
            $empresa = Empresa::where('id_usuario', $usuario->correo_usuario)->first();
            if ($empresa) {
                $cantOf = $empresa->ofertas()->count();
                $cantSup = $empresa->supervisores()->count();
                if ($cantOf > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar una empresa con Ofertas activas']);
                }elseif($cantSup > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar una empresa con Supervisores activos']);
                }else{
                    $empresa->delete();
                }
            }
        }
        if ($rol == 2) {
            $estudiante = Estudiante::where('id_usuario', $usuario->correo_usuario)->first();
            if ($estudiante) {
                $cantSol = Solicitud::where('id_estudiante', $estudiante->id)->where('id_estado', 1)->count();
                $cantPrac = Practica::where('id_estudiante', $estudiante->id)->where('id_estado', 1)->count();
                $cantPost = $estudiante->postulaciones()->count();
                if ($cantSol > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un estudiante con Solicitudes activas']);
                }elseif($cantPrac > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un estudiante con Practicas activas']);
                }elseif($cantPost > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un estudiante con Postulaciones activas']);
                }else{
                $estudiante->delete();
                }
            }
        }
        if ($rol == 3) {
            $secretaria = Secretaria::where('id_usuario', $usuario->correo_usuario)->first();
            if ($secretaria) {
                $cantSol = Solicitud::where('id_estado', 1)->where('pass',1)->count();
                $cantPrac = Practica::where('id_estado', 1)->where('pass',1)->count();
                if ($cantSol > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar una secretaria con Solicitudes activas']);
                }elseif($cantPrac > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar una secretaria con Practicas activas']);
                }else{
                    $secretaria->delete();
                }
            }
        }
        if ($rol == 4) {
            $jefe = JefeDeCarrera::where('id_usuario', $usuario->correo_usuario)->first();
            if ($jefe) {
                $cantSol = Solicitud::where('id_carrera',$jefe->id_carrera)->where('id_estado', 1)->where('pass',0)->count();
                $cantPrac = Practica::where('id_carrera',$jefe->id_carrera)->where('id_estado', 1)->where('pass',0)->count();
                if ($cantSol > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un Jefe de Carrera con Solicitudes activas']);
                }elseif($cantPrac > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un Jefe de Carrera con Practicas activas']);
                }else{
                    $jefe->delete();
                }
            }
        }
        if ($rol == 5) {
            $supervisor = Supervisor::where('id_usuario', $usuario->correo_usuario)->first();
            if ($supervisor) {
                $cantSup = Practica::where('id_supervisor', $supervisor->id)->where('pass',null)->where('id_estado', 1)->count();
                if ($cantSup > 0){
                    return back()->withErrors(['errors' => 'No puedes eliminar un Supervisor con Practicas activas']);
                }else{  
                    $supervisor->delete();
                }
            }
        }
        if ($rol == 6) {
            return back()->withErrors(['errors' => 'No puedes eliminar usuarios con este rol']);
        }

        // Delete the roles associated with the user
        $usuario->roles()->detach();
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
    public function edit(Usuario $usuario)
    {
        $rol = $usuario->roles()->first()->id;

        if ($rol == 1) {
            $empresa = Empresa::where('id_usuario',$usuario->correo_usuario)->first();
            return view('empresas.edit', compact('usuario','empresa'));
        }
        if ($rol == 2) {
            $carreras = Carrera::all();
            $estudiante = Estudiante::where('id_usuario',$usuario->correo_usuario)->first();
            return view('estudiante.edit', compact('usuario', 'carreras','estudiante'));
        }
        if ($rol == 3) {
            $secretaria = Secretaria::where('id_usuario',$usuario->correo_usuario)->first();
            return view('secretarias.edit', compact('usuario','secretaria'));
        }
        if ($rol == 4) {
            $carreras = Carrera::all();
            $jefe = JefeDeCarrera::where('id_usuario',$usuario->correo_usuario)->first();
            return view('jefes.edit', compact('usuario', 'carreras','jefe'));
        }
        if ($rol == 5) {
            $empresas = Empresa::all();
            $supervisor = Supervisor::where('id_usuario',$usuario->correo_usuario)->first();
            return view('supervisores.edit', compact('usuario', 'empresas','supervisor'));
        }
        if ($rol == 6) {
            return back()->withErrors(['rol' => 'No puedes editar usuarios con este rol']);
        }
        return view('usuarios.edit', compact('usuario'));
    }

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

    public function create(ElegirRolRequest $request)
    {
        $rol = $request->rol;
            
        if($rol == 1){
            return view('usuarios.crearEmpresaD');
        }
        if($rol == 2){
            $carreras = Carrera::all();
            return view('estudiante.create',compact('carreras'));
        }
        if($rol == 3){
            return view('secretarias.create');
        }
        if($rol == 4){
            $carreras = Carrera::all();
            return view('jefes.create',compact('carreras'));
        }
        if($rol == 5){
            $empresas = Empresa::all();
            return view('supervisores.create',compact('empresas'));
        }
        if($rol == 6){
            return back()->withErrors(['rol' => 'No puedes Crear Usuarios con este rol']);
        }
        return view('usuarios.crear',compact('rol'));
    }

    
}
