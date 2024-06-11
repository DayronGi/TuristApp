<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'clienteid';

    protected $fillable = [
        'correo',
        'teléfono1',
        'teléfono2'
    ];

    public $timestamps = false;
}