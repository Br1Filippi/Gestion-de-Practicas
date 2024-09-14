<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;
use Illuminate\Database\Eloquent\Relation\HasOne;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    public $timestamps = false;


    //Relaciones
    
    // Relación usuario
    public function usuarios():HasOne
    {
        return $this->hasOne(Usuario::class);
    }

    // Relación supervisores
    public function supervisores():HasMany
    {
        return $this->hasMany(Supervisor::class);
    }

    // Relación ofertas
    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class);
    }
}
