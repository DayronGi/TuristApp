<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarifa extends Model
{
    use HasFactory;

    protected $table = 'tarifas';

    protected $primaryKey = 'tarifa_id';

    protected $fillable = [
        'plan_id',
        'temporada',
        'costo',
        'fecha_inicio',
        'fecha_fin',
    ];

    public $timestamps = false;

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'plan_id');
    }
}
