<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes_turisticos';

    protected $fillable = [
        'titulo',
        'descripcion'
        ];

    public $timestamps = false;
}
