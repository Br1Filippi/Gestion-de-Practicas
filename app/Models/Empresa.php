<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    public $timestamps = false;


    //Relaciones
    
    // Relación usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'correo_usuario');
    }

    // Relación supervisores
    public function supervisores():HasMany
    {
        return $this->hasMany(Supervisor::class, 'id_empresa');
    }

    // Relación ofertas
    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class, 'id_empresa');
    }
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'id_empresa');
    }

    public function practicas()
    {
        return $this->hasMany(Practica::class, 'id_empresa');
    }
}
