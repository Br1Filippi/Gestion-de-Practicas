<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    public $timestamps = false;

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Oferta::class, 'id_oferta');
    }

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class, 'id_supervisor');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }

    public function practicas()
    {
        return $this->hasMany(Practica::class, 'id_solicitud');
    }
}
