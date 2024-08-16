<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'cliente_id';

    protected $fillable = [
        'correo',
        'telefono_1',
        'telefono_2'
    ];

    public $timestamps = false;
}