<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planesturisticos';

    protected $primaryKey = 'planid';
    
    protected $fillable = [
        'título',
        'descripción',
        'duración',
        'incluyedesayuno',
        'incluyealmuerzo',
        'incluyecena',
        'estado',
        'fechacreación',
        'fechamodificación',
    ];

    public $timestamps = false;

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class, 'planid', 'planid');
    }
}
