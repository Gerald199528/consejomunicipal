<?php

namespace App\Http\Controllers;

use App\Models\Extraordinarias; // Cambiado a Extraordinarias
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtraordinariasController extends Controller // Cambiado a ExtraordinariasController
{
    public function index()
    {
        $extraordinarias = Extraordinarias::all(); // Cambiado a extraordinarias
        return view('actas.extraordinarias.index', compact('extraordinarias')); // Cambiado a extraordinarias
    }

    public function store(Request $request)
    {
        $request->validate([
            'extraordinaria' => 'required|file|mimes:pdf', // Cambiado a extraordinaria
            'fecha_sesion' => 'required|date',
        ]);

        if ($request->hasFile('extraordinaria')) { // Cambiado a extraordinaria
            $file = $request->file('extraordinaria'); // Cambiado a extraordinaria
            $fileName = $file->getClientOriginalName();

            // Verificar si el archivo ya existe en la base de datos
            if (Extraordinarias::where('nombre', $fileName)->exists()) { // Cambiado a Extraordinarias
                return redirect()->back()->with('error', 'Estimado usuario, el documento ya existe en la base de datos.');
            }

            $path = $file->storeAs('public/extraordinarias', $fileName); // Cambiado a extraordinarias
            Extraordinarias::create([
                'nombre' => $fileName,
                'ruta' => $path,
                'fecha_importacion' => now(),
                'fecha_sesion' => $request->fecha_sesion,
            ]);

            return redirect()->route('extraordinarias.index')->with('success', 'Extraordinaria importada con éxito.'); // Cambiado a extraordinarias
        }

        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/extraordinarias/' . $fileName; // Cambiado a extraordinarias

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Extraordinarias::where('nombre', $fileName)->delete(); // Cambiado a Extraordinarias
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }

        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $extraordinaria = Extraordinarias::where('nombre', $fileName)->first(); // Cambiado a Extraordinarias

        if ($extraordinaria) {
            $filePath = storage_path('app/' . $extraordinaria->ruta); // Ruta absoluta
            if (Storage::exists($extraordinaria->ruta)) {
                return response()->download($filePath);
            }
        }

        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function view($fileName)
    {
        $extraordinaria = Extraordinarias::where('nombre', $fileName)->first(); // Cambiado a Extraordinarias

        if ($extraordinaria) {
            $filePath = storage_path('app/' . $extraordinaria->ruta); // Ruta absoluta
            if (Storage::exists($extraordinaria->ruta)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo no se encontró en la base de datos.');
        }
    }

    public function print($fileName)
    {
        $extraordinaria = Extraordinarias::where('nombre', $fileName)->first(); // Cambiado a Extraordinarias

        if ($extraordinaria) {
            $filePath = storage_path('app/' . $extraordinaria->ruta); // Ruta absoluta
            if (Storage::exists($extraordinaria->ruta)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo no se encontró en la base de datos.');
        }
    }
}