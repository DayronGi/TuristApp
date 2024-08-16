<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPunto extends Model
{
    use HasFactory;

    protected $table = 'planes_puntos_visita';

    protected $primaryKey = 'punto_id';

    protected $fillable = [
        'plan_id',
        'punto_id',
    ];

    public $timestamps = false;
}
