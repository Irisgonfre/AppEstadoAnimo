<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $fillable = [
        'hora_inicio',
        'hora_final',
        'descripcion',
        'id_usuario',
        'id_estado',
    ];
}
