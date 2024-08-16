<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_compra';

    protected $primaryKey = 'detalle_id';

    protected $fillable = [
        'compra_id',
        'plan_id',
        'fecha_inicio_viaje',
        'fecha_fin_viaje',
        'valor_total_plan',
        'valor_desayuno_adicional',
        'valor_almuerzo_adicional',
        'valor_cena_adicional',
        'cantidad_personas',
    ];

    public $timestamps = false;

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'plan_id');
    }
}
