<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';

    public $timestamps = false;


    //Relaciones
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'if_oferta');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
}
