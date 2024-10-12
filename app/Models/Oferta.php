<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ofertas';

    public $timestamps = false;


    //Relations

   //Relacion con Carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

   //Relacion con Region
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region');
    }

    //Relacion con Tipos
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }

    //Relacion con Comuna   
    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'id_comuna');
    }

   //Relacion con Empresa
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    //Relacion con Postulacion
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}
