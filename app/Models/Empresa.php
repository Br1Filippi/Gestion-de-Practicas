<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    public $timestamps = false;

    public function usuarios():HasMany
    {
        return $this->hasMany(Usuario::class);
    }

    public function supervisores():HasMany
    {
        return $this->hasMany(Supervisor::class);
    }
}
