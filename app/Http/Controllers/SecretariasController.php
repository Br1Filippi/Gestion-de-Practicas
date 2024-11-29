<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Secretaria;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SecretariaCrearRequest;
use App\Http\Requests\SecretariaUpdateRequest;

class SecretariasController extends Controller
{
    public function index()
    {
        return view('secretarias.index');
    }

    public function edit(){
        return view('secretarias.edit');
    }

    public function update(Secretaria $secretaria,SecretariaUpdateRequest $request){
        $usuario = Usuario::where('correo_usuario', $secretaria->id_usuario)->first();

        $path = $request->hasFile('imagen') ? $request->file('imagen')->store('public/usuarios') : null;

        $usuarioData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'imagen' => $path,
        ];

        $usuario->update($usuarioData);

        $secretaria->id_usuario = $usuario->correo_usuario;

        $secretaria->save();

        return redirect()->route('usuarios.index');
    }

    public function create()
    {
        return view('secretarias.create');
    }

    public function store(SecretariaCrearRequest $request)
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

        $rolEmpresaId = 3; 
        $usuario->roles()->attach($rolEmpresaId);

        $secretaria = new Secretaria();
        $secretaria->id_usuario = $usuario->correo_usuario;

        $secretaria->save();

        return redirect()->route('usuarios.index');
    }
}
