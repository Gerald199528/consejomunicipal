<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use PDF;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with('user')->get();
        $usuarios = User::all();
        return view('expedientes.index', compact('expedientes', 'usuarios'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('expedientes.create', compact('usuarios'));
    }

   public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'cedula' => 'required|string|max:20',
        'telefono' => 'required|string|max:15',
        'numero_cuenta' => 'required|string|max:20',
        'fecha_ingreso' => 'required|date',
        'user_id' => 'required|exists:users,id',
        'imagen' => 'nullable|image|max:2048',
        'expediente' => 'required|file|mimes:pdf|max:2048',
    ]);

    // Crear un nuevo expediente
    $expediente = new Expediente();
    $expediente->cedula = 'V-' . $request->cedula;
    $expediente->telefono = '+58-' . $request->telefono;
    $expediente->numero_cuenta = $request->numero_cuenta;
    $expediente->fecha_ingreso = $request->fecha_ingreso;
    $expediente->user_id = $request->user_id;

    // Guardar la imagen si se proporciona
    if ($request->hasFile('imagen')) {
        $expediente->imagen = $request->file('imagen')->store('imagenes', 'public');
    }

    // Guardar el archivo PDF utilizando el nombre original
    if ($request->hasFile('expediente')) {
        $originalName = $request->file('expediente')->getClientOriginalName();
        $path = 'public/expedientes/' . $originalName;

        // Verificar si el archivo ya existe y modificar el nombre si es necesario
        $counter = 1;
        while (Storage::exists($path)) {
            $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newName = $nameWithoutExtension . '_' . $counter . '.' . $extension;
            $path = 'public/expedientes/' . $newName;
            $counter++;
        }

        // Guardar el archivo con el nombre original
        $expediente->archivo = Storage::putFileAs('public/expedientes', $request->file('expediente'), basename($path));
    }

    // Guardar el expediente
    $expediente->save();

    return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
}
    public function show($id)
    {
        $expediente = Expediente::with('user')->find($id);
        if ($expediente) {
            $nombreUsuario = $expediente->user->name;
            $apellidoUsuario = $expediente->user->apellido;
            $correoUsuario = $expediente->user->email;
            $telefonoUsuario = $expediente->user->telefono;
            $imagenExpediente = $expediente->imagen ? asset('storage/' . $expediente->imagen) : '';

            return view('expedientes.show', compact('expediente', 'nombreUsuario', 'apellidoUsuario', 'correoUsuario', 'telefonoUsuario', 'imagenExpediente'));
        } else {
            return redirect()->route('expedientes.index')->with('error', 'Expediente no encontrado.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'numero_cuenta' => 'required|string|max:20',
            'fecha_ingreso' => 'required|date',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->cedula = $request->cedula;
        $expediente->telefono = $request->telefono;
        $expediente->numero_cuenta = $request->numero_cuenta;
        $expediente->fecha_ingreso = $request->fecha_ingreso;
        $expediente->save();

        return redirect()->route('expedientes.show', $id)->with('success', 'Datos actualizados correctamente.');
    }

    public function destroy($id)
    {
        $expediente = Expediente::find($id);
        if (!$expediente) {
            return redirect()->route('expedientes.index')->with('error', 'Expediente no encontrado.');
        }

        $expediente->delete();

        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado con éxito.');
    }

    public function generatePDF($id)
    {
        $expediente = Expediente::with('user')->findOrFail($id);
        return view('expedientes.pdf', compact('expediente'));
    }

    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.edit', compact('expediente'));
    }

    public function download($id)
    {
        $expediente = Expediente::findOrFail($id);
        $pdf = PDF::loadView('expedientes.pdf', compact('expediente'));
        return $pdf->download('expediente_' . $expediente->id . '.pdf');
    }
}
