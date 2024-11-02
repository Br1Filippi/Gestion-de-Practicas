<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Http\Requests\EstudianteUsuarioUpdate;



class EstudiantesController extends Controller
{
    public function index()
    {
        return view('estudiante.index');
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiante.edit', compact('estudiante'));
    }

    public function update(Estudiante $estudiante, EstudianteUsuarioUpdate $request)
    {
        $usuario = Usuario::where('correo_usuario', $estudiante->id_usuario)->first();

        $usuarioData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ];

        // Si hay una nueva imagen, se almacena
        if ($request->hasFile('imagen')) {
            $usuarioData['imagen'] = $request->file('imagen')->store('public/usuarios');
        }

        $usuario->update($usuarioData);

        
        $estudiante -> edad_estudiante = $request->edad_estudiante;
        $estudiante -> rut_estudiante = $request->rut_estudiante;
        $estudiante -> direccion_estudiante = $request->direccion_estudiante;
        $estudiante -> fono_estudiante = $request->fono_estudiante;
        $estudiante -> id_carrera = $request->carrera;
        $estudiante -> desc_estudiante = $request->desc_estudiante;
        
        $estudiante->save();
        
        return redirect()->route('usuarios.perfil');
    }
}
