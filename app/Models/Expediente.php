<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    // Definir la tabla si es diferente al plural del nombre del modelo
    protected $table = 'expedientes';

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'cedula',
        'telefono',
        'numero_cuenta',
        'fecha_ingreso',
        'user_id',
        'imagen',
        'archivo', // Asegúrate de que este campo exista en la base de datos y almacene la ruta del archivo
        'estado',
    ];

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function create()
{
    $documentosImportados = Documento::all(); // Asegúrate de que este modelo sea correcto
    $usuarios = User::all();
    return view('expedientes.create', compact('usuarios', 'documentosImportados'));
}
}