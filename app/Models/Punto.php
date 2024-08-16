<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Punto extends Model
{
    use HasFactory;

    protected $table = 'puntos_visita';

    protected $primaryKey = 'punto_id';

    protected $fillable = [
        'titulo_actividad',
        'descripcion_actividad',
        'estado',
        'departamento_id',
        'ciudad_id',
        'fecha_creacion',
        'fecha_modificacion',
    ];

    public $timestamps = false;

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'departamento_id');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'ciudad_id');
    }
}
