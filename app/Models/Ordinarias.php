<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinarias extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ruta', 'fecha_importacion', 'fecha_sesion'];
}