<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    // Indica el nombre de la tabla asociada
    protected $table = 'productos';

    // Permite la asignación masiva en estos campos
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'imagen',
    ];
}
