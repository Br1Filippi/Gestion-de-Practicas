<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Supervisor;
use App\Models\Empresa;
use App\Http\Requests\SupervisorUsuarioRequest;
use App\Http\Requests\SupervisorUsuarioUpdate;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {
        $query = Supervisor::query();

        if(Gate::allows('empresa-gestion'))
        {
            $emailUsuario = auth()->user()->correo_usuario; 
            $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;

            $query->where('id_empresa',$empresaId);
        }

        if ($request->filled('termino')) 
        {
            $query->where('rut_supervisor', 'LIKE', '%' . $request->input('termino') . '%');
        }
    
        $supervisores = $query->get();
        $usuarios = Usuario::all();
        $empresas = Empresa::all();

        return view('supervisores.index', compact('supervisores','empresas','usuarios'));
    }

    public function create()
    {
        return view('supervisores.create');
    }

    public function store(SupervisorUsuarioRequest $request)
    {
        $password = Hash::make($request->password);
        $path = $request->hasFile('imagen') ? $request->file('imagen')->store('public/usuarios') : null;

        $usuario = Usuario::create([
            'correo_usuario' => $request->correo_usuario,
            'password' => $password, 
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'imagen' => $path,
        ]);

        //sacar id empresa 
        if (auth()->user()->roles()->first()->nombre == 'Empresa') {
            $emailUsuario = auth()->user()->correo_usuario; 
            $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;
        } else {
            $empresaId = $request->empresa;
        }

        //Darle rol supervisor al usuario
        $rolSupervisorId = 5; 
        $usuario->roles()->attach($rolSupervisorId);

        $supervisor = new Supervisor;
        $supervisor->rut_supervisor = $request->rut_supervisor;
        $supervisor->titulo_supervisor = $request->titulo_supervisor;
        $supervisor->fono_supervisor = $request->fono_supervisor;
        $supervisor->cargo_supervisor = $request->cargo_supervisor;
        $supervisor->id_usuario = $usuario->correo_usuario;
        $supervisor->id_empresa = $empresaId;

        $supervisor->save();
        if (auth()->user()->roles()->first()->nombre == 'Empresa') {
            return redirect()->route('supervisores.index');
        } else {
            return redirect()->route('usuarios.index');
        }
    }

    public function destroy(Supervisor $supervisor)
    {

        $usuarioId = $supervisor->id_usuario;
        $usuario = Usuario::where('correo_usuario',$usuarioId);
        $supervisor->delete();
        $usuario->delete();
        // $usuario->delete();
        
        return redirect()->route('supervisores.index');
    }

    public function edit(Supervisor $supervisor)
    {
        return view('supervisores.edit',compact('supervisor'));
    }

    public function update(Supervisor $supervisor,SupervisorUsuarioUpdate $request)
    {
        $usuario = Usuario::where('correo_usuario', $supervisor->id_usuario)->first();

        $usuarioData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ];

        // Si hay una nueva imagen, se almacena
        if ($request->hasFile('imagen')) {
            $usuarioData['imagen'] = $request->file('imagen')->store('public/usuarios');
        }

        // Actualizar el usuario
        $usuario->update($usuarioData);

        $supervisor->rut_supervisor = $request->rut_supervisor;
        $supervisor->titulo_supervisor = $request->titulo_supervisor;
        $supervisor->fono_supervisor = $request->fono_supervisor;
        $supervisor->cargo_supervisor = $request->cargo_supervisor;

        $supervisor->save();

        $usuarioLogeado = auth()->user();
        $rol = $usuarioLogeado->roles()->first()->nombre;

        if ($rol == 'Empresa') {
            return redirect()->route('supervisores.index');
        }
        if ($rol == 'Supervisor') {
            return redirect()->route('usuarios.perfil');
        }
    }
}
