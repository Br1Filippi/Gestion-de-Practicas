<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaUsuarioRequest;
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

        //Darle rol supervisor al usuario
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
        return view('usuarios.crearEmpresa');
    }

    public function index()
    {
        return view('empresas.index');
    }
}
