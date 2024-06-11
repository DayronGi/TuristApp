<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detallecompra';

    protected $primaryKey = 'detalleid';

    protected $fillable = [
        'compraid',
        'planid',
        'fechainicioviaje',
        'fechafinviaje',
        'valortotalplan',
        'valordesayunoadicional',
        'valoralmuerzoadicional',
        'valorcenaadicional',
        'cantidadpersonas',
    ];

    public $timestamps = false;
}
