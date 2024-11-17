<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especiales extends Model
{
    use HasFactory;

    protected $table = 'extraordinarias'; // Asegúrate de que esto apunte a la tabla correcta
    protected $fillable = ['nombre', 'ruta', 'fecha_importacion', 'fecha_sesion'];

}
