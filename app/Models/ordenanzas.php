<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenanzas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ruta','fecha_importacion']; // Permitir la asignación masiva
}
