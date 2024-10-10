<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Supervisor;
use App\Models\Empresa;
use App\Http\Requests\SupervisorUsuarioRequest;
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
        $path = $request->file('imagen')->store('public/usuarios');

        $usuario = Usuario::create([
            'correo_usuario' => $request->correo_usuario,
            'password' => $password, 
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'imagen' => $path,
        ]);

        //sacar id empresa 
        $emailUsuario = auth()->user()->correo_usuario; 
        $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;

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

        return redirect()->route('supervisores.index');
    }

    public function destroy(Supervisor $supervisor)
    {

        $usuarioId = $supervisor->id_usuario;
        $usuario = Usuario::where('correo_usuario',$usuarioId);
        $supervisor->delete();

        // $usuario->delete();
        
        return redirect()->route('supervisores.index');
    }

    public function edit(Supervisor $supervisor)
    {
        return view('supervisores.edit',compact('supervisor'));
    }

    public function update(Supervisor $supervisor,SupervisorUsuarioRequest $request)
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

        return redirect()->route('supervisores.index');
    }
}
