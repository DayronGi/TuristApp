<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'planid', 'planid');
    }
}
