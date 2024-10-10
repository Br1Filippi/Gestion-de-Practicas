<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Supervisor;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index()
    {
        $query = Supervisor::query();

        if(Gate::allows('empresa-gestion'))
        {
            $emailUsuario = auth()->user()->correo_usuario; 
            $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;

            $query->where('id_empresa',$empresaId);
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

    public function store(Request $request)
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
}
