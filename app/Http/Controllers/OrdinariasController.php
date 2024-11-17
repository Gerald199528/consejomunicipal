<?php
namespace App\Http\Controllers;

use App\Models\Ordinarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrdinariasController extends Controller
{
    public function index()
    {
        $ordinarias = Ordinarias::all(); // Asegúrate de que esto esté bien
        return view('actas.ordinarias.index', compact('ordinarias')); // Pasa la variable a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'ordinaria' => 'required|file|mimes:pdf',
            'fecha_sesion' => 'required|date',
        ]);

        if ($request->hasFile('ordinaria')) {
            $file = $request->file('ordinaria');
            $fileName = $file->getClientOriginalName();

            // Verificar si el archivo ya existe en la base de datos
            if (Ordinarias::where('nombre', $fileName)->exists()) {
                return redirect()->back()->with('error', 'Estimado usuario, el documento ya existe en la base de datos.');
            }

            $path = $file->storeAs('public/ordinarias', $fileName);
            Ordinarias::create([
                'nombre' => $fileName,
                'ruta' => $path,
                'fecha_importacion' => now(),
                'fecha_sesion' => $request->fecha_sesion,
            ]);

            return redirect()->route('ordinarias.index')->with('success', 'Ordinaria importada con éxito.');
        }

        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/ordinarias/' . $fileName;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Ordinarias::where('nombre', $fileName)->delete();
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }

        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $ordinaria = Ordinarias::where('nombre', $fileName)->first();

        if ($ordinaria) {
            $filePath = storage_path('app/' . $ordinaria->ruta); // Ruta absoluta
            if (Storage::exists($ordinaria->ruta)) {
                return response()->download($filePath);
            }
        }

        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function view($fileName)
    {
        $ordinaria = Ordinarias::where('nombre', $fileName)->first();

        if ($ordinaria) {
            $filePath = storage_path('app/' . $ordinaria->ruta); // Ruta absoluta
            if (Storage::exists($ordinaria->ruta)) {
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
        $ordinaria = Ordinarias::where('nombre', $fileName)->first();

        if ($ordinaria) {
            $filePath = storage_path('app/' . $ordinaria->ruta); // Ruta absoluta
            if (Storage::exists($ordinaria->ruta)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo no se encontró en la base de datos.');
        }
    }
}