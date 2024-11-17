<?php

namespace App\Http\Controllers;

use App\Models\Solemne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SolemneController extends Controller
{
    public function index()
    {
        $solemnes = Solemne::all(); // Asegúrate de que esto esté bien
        return view('actas.solemne.index', compact('solemnes')); // Pasa la variable a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'solemne' => 'required|file|mimes:pdf',
            'fecha_sesion' => 'required|date',
        ]);

        if ($request->hasFile('solemne')) {
            $file = $request->file('solemne');
            $fileName = $file->getClientOriginalName();

            // Verificar si el archivo ya existe en la base de datos
            if (Solemne::where('nombre', $fileName)->exists()) {
                return redirect()->back()->with('error', 'Estimado usuario, el documento ya existe en la base de datos.');
            }

            $path = $file->storeAs('public/solemnes', $fileName);

            Solemne::create([
                'nombre' => $fileName,
                'ruta' => $path,
                'fecha_importacion' => now(),
                'fecha_sesion' => $request->fecha_sesion,
            ]);

            return redirect()->route('solemnes.index')->with('success', 'Solemne importada con éxito.');
        }

        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/solemnes/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Solemne::where('nombre', $fileName)->delete();
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $solemne = Solemne::where('nombre', $fileName)->first();
        if ($solemne) {
            $filePath = storage_path('app/' . $solemne->ruta); // Ruta absoluta
            if (Storage::exists($solemne->ruta)) {
                return response()->download($filePath);
            }
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function view($fileName)
    {
        $solemne = Solemne::where('nombre', $fileName)->first();
        if ($solemne) {
            $filePath = storage_path('app/' . $solemne->ruta); // Ruta absoluta
            if (Storage::exists($solemne->ruta)) {
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
        $solemne = Solemne::where('nombre', $fileName)->first();
        if ($solemne) {
            $filePath = storage_path('app/' . $solemne->ruta); // Ruta absoluta
            if (Storage::exists($solemne->ruta)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo no se encontró en la base de datos.');
        }
    }
}
