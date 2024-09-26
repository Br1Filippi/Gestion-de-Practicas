<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'correo_usuario';
    protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;


    //Relaciones
    public function roles()
    {
        return $this->belongsToMany(Rol::class,'rol_usuario', 'id_usuario' ,'id_rol');
    }

    //Authenticaciones
    public function esEmpresa(): bool
    {
        return $this->roles->contains('nombre', 'Empresa');
    }

    public function esEstudiante(): bool
    {
        return $this->roles->contains('nombre', 'Estudiante');
    }

    public function esSupervisor(): bool
    {
        return $this->roles->contains('nombre', 'Supervisor');
    }
    public function esJefe(): bool
    {
        return $this->roles->contains('nombre', 'Jefe de Carrera');
    }
}
