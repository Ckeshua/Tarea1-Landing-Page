<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nombre_Arch',
        'seguridad',
        'tipode'
    ];
}