<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaUsuarioRequest;
use App\Http\Requests\EmpresaUsuarioUpdate;
use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;


class EmpresasController extends Controller
{
    public function crearEmpresa()
    {
        return view('usuarios.crearEmpresa');
    }

    public function storeEmpresa(EmpresaUsuarioRequest $request)
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

        //Darle rol de empresa
        $rolEmpresaId = 1; 
        $usuario->roles()->attach($rolEmpresaId);

        $empresa = new Empresa;
        $empresa->rut_empresa = $request->rut_empresa;
        $empresa->url_web = $request->url_web;
        $empresa->email_contacto = $request->email_contacto;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->razon_social = $request->razon_social;
        $empresa->id_usuario = $usuario->correo_usuario;

        $empresa->save();
        return view('home.index');
    }

    public function index()
    {
        return view('empresas.index');
    }

   public function edit(Empresa $empresa)
    {

        return view('empresas.edit', compact('empresa'));
    }

    public function update(EmpresaUsuarioUpdate $request, Empresa $empresa)
    {
        $usuario = Usuario::where('correo_usuario', $empresa->id_usuario)->first();

        $usuarioData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ];

        // Si hay una nueva imagen, se almacena
        if ($request->hasFile('imagen')) {
            $usuarioData['imagen'] = $request->file('imagen')->store('public/usuarios');
        }

        $usuario->update($usuarioData);

        $empresa->rut_empresa = $request->rut_empresa;
        $empresa->url_web = $request->url_web;
        $empresa->email_contacto = $request->email_contacto;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->razon_social = $request->razon_social;
        
        $empresa->save();
        
        return redirect()->route('usuarios.perfil');
    }
}
