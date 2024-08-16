<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $primaryKey = 'vendedor_id';

    protected $fillable = [
        'nombre',
        'correo',
        'fecha_nacimiento',
        'telefono',
        'usuario',
        'contraseña'
    ];

    public $timestamps = false;
}