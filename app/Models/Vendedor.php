<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $primaryKey = 'vendedorid';

    protected $fillable = [
        'nombre',
        'correo',
        'fechanacimiento',
        'teléfono',
        'usuario',
        'contraseña'
    ];

    public $timestamps = false;
}