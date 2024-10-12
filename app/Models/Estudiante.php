<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    public $timestamps = false;

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'id_estudiante');
    }
}
