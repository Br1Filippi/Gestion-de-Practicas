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

    protected $fillable = [
        'nombre' , 'correo_usuario' , 'contra'
    ];

    //Relaciones
    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }
}
