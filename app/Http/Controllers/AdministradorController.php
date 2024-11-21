<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;
use App\Models\Estudiante;
use App\Models\Empresa;
use App\Models\Solicitud;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('administrador.index');
    }
    
    public function estadisticas()
    {
        $totalPracticas = Practica::count();
        $totalSolicitudes = Solicitud::count();
        $totalEstudiantes = Estudiante::count();
        $totalEmpresas = Empresa::count();
        $porcentajeAprobacionSolicitudes = Solicitud::where('id_estado', 2)->count() / $totalSolicitudes * 100;
        $porcentajeRechazoSolicitudes = Solicitud::where('id_estado', 3)->count() / $totalSolicitudes * 100;
        $porcentajeAprobacionPracticas = Practica::where('id_estado', 2)->count() / $totalPracticas * 100;
        $porcentajeRechazoPracticas = Practica::where('id_estado', 3)->count() / $totalPracticas * 100;
        $practicasPorCarrera = Carrera::withCount('practicas')->get();
        $topEmpresas = Empresa::withCount('practicas')->orderBy('practicas_count', 'desc')->take(5)->get();
        $promedioDuracionPracticas = Practica::whereNotNull('fecha_termino')->avg(DB::raw('DATEDIFF(fecha_termino, fecha_inicio)'));

        return view('administrador.estadisticas', compact(
            'totalPracticas', 
            'totalSolicitudes',
            'totalEstudiantes', 
            'totalEmpresas', 
            'porcentajeAprobacionSolicitudes', 
            'porcentajeRechazoSolicitudes', 
            'porcentajeAprobacionPracticas', 
            'porcentajeRechazoPracticas', 
            'practicasPorCarrera', 
            'topEmpresas', 
            'promedioDuracionPracticas'
        ));
    }
}
