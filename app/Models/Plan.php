<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes_turisticos';

    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'titulo',
        'descripcion',
        'duracion',
        'incluye_desayuno',
        'incluye_almuerzo',
        'incluye_cena',
        'estado',
        'fecha_creacion',
        'fecha_modificacion',
    ];

    public $timestamps = false;

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class, 'plan_id', 'plan_id');
    }
}
