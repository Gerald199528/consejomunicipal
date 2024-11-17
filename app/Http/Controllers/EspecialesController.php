<?php

namespace App\Http\Controllers;

use App\Models\Especiales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EspecialesController extends Controller
{
    public function index()
    {
        $especiales = Especiales::all(); // Asegúrate de que esto esté bien
        return view('actas.especiales.index', compact('especiales')); // Pasa la variable a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'especiales' => 'required|file|mimes:pdf',
            'fecha_sesion' => 'required|date',
        ]);

        if ($request->hasFile('especiales')) {
            $file = $request->file('especiales');
            $fileName = $file->getClientOriginalName();

            // Verificar si el archivo ya existe en la base de datos
            if (Especiales::where('nombre', $fileName)->exists()) {
                return redirect()->back()->with('error', 'Estimado usuario, el documento ya existe en la base de datos.');
            }

            $path = $file->storeAs('public/especiales', $fileName);

            Especiales::create([
                'nombre' => $fileName,
                'ruta' => $path,
                'fecha_importacion' => now(),
                'fecha_sesion' => $request->fecha_sesion,
            ]);

            return redirect()->route('especiales.index')->with('success', 'Especiales importada con éxito.');
        }

        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/especiales/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Especiales::where('nombre', $fileName)->delete();
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $especiales = Especiales::where('nombre', $fileName)->first();
        if ($especiales) {
            $filePath = storage_path('app/' . $especiales->ruta); // Ruta absoluta
            if (Storage::exists($especiales->ruta)) {
                return response()->download($filePath);
            }
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function view($fileName)
    {
        $especiales = Especiales::where('nombre', $fileName)->first();
        if ($especiales) {
            $filePath = storage_path('app/' . $especiales->ruta); // Ruta absoluta
            if (Storage::exists($especiales->ruta)) {
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
        $especiales = Especiales::where('nombre', $fileName)->first();
        if ($especiales) {
            $filePath = storage_path('app/' . $especiales->ruta); // Ruta absoluta
            if (Storage::exists($especiales->ruta)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo no se encontró en la base de datos.');
        }
    }
}
