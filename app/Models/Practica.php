<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $table = 'practicas';

    public $timestamps = false; 

    public function informe()
    {
        return $this->belongsTo(Informe::class, 'id_informe');
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'id_supervisor');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }
    
}
