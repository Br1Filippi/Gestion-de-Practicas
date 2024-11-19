<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Usuario extends Model
{
    use HasFactory;

    protected $table = 'rol_usuario';

    public $timestamps = false;

    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'correo_usuario');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id');
    }
    
}
