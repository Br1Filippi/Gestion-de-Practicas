<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Tipo;
use App\Models\Carrera;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;



class OfertasController extends Controller
{
    public function index(Request $request)
    { 
        
        $query = Oferta::query();

        if (Gate::allows('empresa-gestion')) {
            $emailUsuario = auth()->user()->correo_usuario; 
            $empresaId = Empresa::where('id_usuario', $emailUsuario)->first()->id;
    
            // Filtrar ofertas solo de la empresa logueada
            $query->where('id_empresa', $empresaId);
        }
        
        // Filtrar por término de búsqueda
        if ($request->filled('termino')) 
        {
            $query->where('titulo', 'LIKE', '%' . $request->input('termino') . '%');
        }

        // Filtrar por tipo
        if ($request->filled('tipo')) 
        {
            $query->where('id_tipo', $request->input('tipo'));
        }

        // Filtrar por carrera
        if ($request->filled('carrera')) 
        {
            $query->where('id_carrera', $request->input('carrera'));
        }

        // Filtrar por región
        if ($request->filled('region')) 
        {
            $query->where('id_region', $request->input('region'));
        }

        // Filtrar por comuna
        if ($request->filled('comuna')) 
        {
            $query->where('id_comuna', $request->input('comuna'));
        }

        $ofertas = $query->get();

        return view('ofertas.index', 
        [
            'ofertas' => $ofertas,
            'tipos' => Tipo::all(),
            'carreras' => Carrera::all(),
            'regiones' => Region::all(),
            'comunas' => Comuna::all(),
        ]);
    }

    public function getComunas($regionId)
    {
        $comunas = Comuna::where('id_region', $regionId)->get();
        return response()->json(['comunas' => $comunas]);
    }

}
