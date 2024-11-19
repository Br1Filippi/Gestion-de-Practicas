<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('administrador.index');
    }

    public function estadisticas()
    {
        // Obtener el total de prácticas inscritas
        $totalPracticas = Practica::count();

        // Obtener el total de prácticas aprobadas
        $practicasAprobadas = Practica::where('id_estado', 2)->count();

        // Obtener el total de prácticas rechazadas
        $practicasRechazadas = Practica::where('id_estado', 3)->count();

        // Calcular los porcentajes
        $porcentajeAprobacion = $totalPracticas > 0 ? ($practicasAprobadas / $totalPracticas) * 100 : 0;
        $porcentajeRechazo = $totalPracticas > 0 ? ($practicasRechazadas / $totalPracticas) * 100 : 0;

        return view('administrador.estadisticas', compact('totalPracticas', 'porcentajeAprobacion', 'porcentajeRechazo'));
    }
}
