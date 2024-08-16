<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $primaryKey = 'compra_id';

    protected $fillable = [
        'cliente_id',
        'vendedor_id',
        'fecha_compra',
        'costo_total_plan',
        'costo_otros_conceptos',
        'total_compra',
    ];

    public $timestamps = false;

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id', 'vendedor_id');
    }

    public function detalle(): BelongsTo
    {
        return $this->belongsTo(DetalleCompra::class, 'compra_id', 'compra_id');
    }
}