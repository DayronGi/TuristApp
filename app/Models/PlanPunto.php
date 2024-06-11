<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPunto extends Model
{
    use HasFactory;

    protected $table = 'planespuntosvisita';

    protected $primaryKey = 'puntoid';
    
    protected $fillable = [
        'planid',
        'puntoid',
    ];

    public $timestamps = false;
}
