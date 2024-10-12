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
use App\Models\Postulacion;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\OfertaRequest;


class OfertasController extends Controller
{   
    public function postular(Request $request)
    {
        $ofertaId = $request->oferta_id;
        $emailUsuario = auth()->user()->correo_usuario; 
        $estudianteId = Estudiante::where('id_usuario', $emailUsuario)->first()->id;
        
        $yaExiste = Postulacion::where('id_estudiante', $estudianteId)
            ->where('id_oferta', $ofertaId)
            ->count();

        if (!$yaExiste == 0) {
            return redirect()->route('ofertas.index')->with('error','Ya postulaste para esta oferta.');
        }

        // Crear la postulación
        $postulacion = new Postulacion();
        $postulacion->id_oferta = $ofertaId;
        $postulacion->id_estudiante = $estudianteId;
        $postulacion->save();

        return redirect()->route('ofertas.index')->with('success', 'Postulación realizada con éxito.');
    }

    public function index(Request $request)
    { 
        
        $query = Oferta::query();


        if (Gate::allows('empresa-gestion')) 
        {
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

        // Filtro de la fecha 
        if ($request->filled('rango_fecha'))
        {
            switch ($request->rango_fecha) {
                case '1_semanas':
                    $query->where('fecha_publicacion', '>=', Carbon::now()->subWeek());
                    break;
                case '2_semanas':
                    $query->where('fecha_publicacion', '>=', Carbon::now()->subWeeks(2));
                    break;
                case '1_mes':
                    $query->where('fecha_publicacion', '>=', Carbon::now()->subMonth());
                    break;
                case '2_meses':
                    $query->where('fecha_publicacion', '>=', Carbon::now()->subMonths(2));
                    break;
                case '3_meses':
                    $query->where('fecha_publicacion', '>=', Carbon::now()->subMonths(3));
                    break;
                case 'mas_3_meses': 
                    $query->where('fecha_publicacion', '<', Carbon::now()->subMonths(3));
                    break;
            }
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

    public function destroy(Oferta $oferta)
    {
        
        $oferta->delete();
        return redirect()->route('ofertas.index');
    }

    public function create()
    {
        $emailUsuario = auth()->user()->correo_usuario; 
        $empresa = Empresa::where('id_usuario', $emailUsuario)->first();
        

        $regiones = Region::all();
        $carreras = Carrera::all();
        $tipos = Tipo::all();

        return view('ofertas.create', compact('empresa','regiones','carreras','tipos'));
    }
    
    public function store(OfertaRequest $request)
    {
        $oferta = new Oferta();

        $oferta -> titulo = $request->titulo;
        $oferta -> cupos = $request->cupos;
        $oferta -> fecha_publicacion = now();
        $oferta -> descripcion = $request -> descripcion;

        $oferta -> id_region = $request->region;
        $oferta -> id_comuna = $request->comuna;
        $oferta -> id_carrera = $request->carrera;
        $oferta -> id_tipo = $request->tipo;

        $emailUsuario = auth()->user()->correo_usuario; 
        $empresa = Empresa::where('id_usuario', $emailUsuario)->first();

        $oferta ->id_empresa = $empresa -> id;


        $oferta->save();

        return redirect()->route('ofertas.index');
    }

    public function edit(Oferta $oferta)
    {
        $emailUsuario = auth()->user()->correo_usuario; 
        $empresa = Empresa::where('id_usuario', $emailUsuario)->first();

        $regiones = Region::all();
        $carreras = Carrera::all();
        $tipos = Tipo::all();

        return view('ofertas.edit', compact('oferta','empresa','regiones','carreras','tipos'));
    }

    public function update(Request $request, OfertaRequest $oferta)
    {

        $oferta -> titulo = $request->titulo;
        $oferta -> cupos = $request->cupos;
        $oferta -> fecha_publicacion = now();
        $oferta -> descripcion = $request -> descripcion;

        $oferta -> id_region = $request->region;
        $oferta -> id_comuna = $request->comuna;
        $oferta -> id_carrera = $request->carrera;
        $oferta -> id_tipo = $request->tipo;
        
        $oferta->save();

        return redirect()->route('ofertas.index');
    }

    public function postulantes()
    {
        return view('ofertas.postulantes');
    }

}
