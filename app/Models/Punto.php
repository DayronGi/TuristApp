<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Punto extends Model
{
    use HasFactory;

    protected $table = 'puntosvisita';

    protected $primaryKey = 'puntoid';

    protected $fillable = [
        'títuloactividad',
        'descripciónactividad',
        'estado',
        'departamentoid',
        'ciudadid',
        'fechacreación',
        'fechamodificación',
    ];

    public $timestamps = false;

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamentoid', 'departamentoid');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'ciudadid', 'ciudadid');
    }
}
