<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Usuario;
use App\Models\JefeDeCarrera;
use App\Http\Requests\JefeCrearRequest;
use Illuminate\Support\Facades\Hash;


class JefesController extends Controller
{
    public function index()
    {
        return view('jefes.index');
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('jefes.create',compact('carreras'));
    }

    public function store(JefeCrearRequest $request)
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

        $rolEmpresaId = 4; 
        $usuario->roles()->attach($rolEmpresaId);

        $jefe = new JefeDeCarrera();
        $jefe->id_usuario = $usuario->correo_usuario;
        $jefe->id_carrera = $request->carrera;

        $jefe->save();

        return redirect()->route('usuarios.index');
    }
}
