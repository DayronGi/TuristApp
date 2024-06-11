<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarifa extends Model
{
    use HasFactory;

    protected $table = 'tarifas';

    protected $primaryKey = 'tarifaid';

    protected $fillable = [
        'planid',
        'temporada',
        'costo',
        'fechainicio',
        'fechafin',
    ];

    public $timestamps = false;

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'planid', 'planid');
    }
}
