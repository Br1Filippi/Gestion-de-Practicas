<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas';

    public $timestamps = false;

    //relations
    // Definir la relación con la carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
