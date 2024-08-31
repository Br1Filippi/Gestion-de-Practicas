<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    public $timestamps = false;

    //relations
    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }
}
