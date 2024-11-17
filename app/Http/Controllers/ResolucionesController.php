<?php
namespace App\Http\Controllers;

use App\Models\resoluciones; // Cambiar ordenanzas a resoluciones
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResolucionesController extends Controller // Cambiar OrdenanzasController a ResolucionesController
{
    public function index()
    {
        $resoluciones = resoluciones::all(); // Cambiar ordenanzas a resoluciones
        return view('instrumentoslegales.resoluciones.index', compact('resoluciones')); // Cambiar ordenanzas a resoluciones
    }

    public function store(Request $request)
    {
        $request->validate([
            'resolucion' => 'required|file|mimes:pdf|max:2048', // Cambiar ordenanza a resolucion
        ]);
        if ($request->hasFile('resolucion')) { // Cambiar ordenanza a resolucion
            $file = $request->file('resolucion');
            $fileName = $file->getClientOriginalName(); // Mantener el nombre original del archivo
            // Verificar si el archivo ya existe en la base de datos
            if (resoluciones::where('nombre', $fileName)->exists()) { // Cambiar ordenanzas a resoluciones
                return redirect()->back()->with('error', 'Estimado usuario el documento ya existe en la base de datos.');
            }
            $file->storeAs('public/resoluciones', $fileName); // Cambiar ordenanzas a resoluciones
            resoluciones::create([
                'nombre' => $fileName,
                'ruta' => 'resoluciones/' . $fileName, // Cambiar ordenanzas a resoluciones
                'fecha_importacion' => now(), // Guardar la fecha de importación
            ]);
            return redirect()->back()->with('success', 'Documento cargado exitosamente.');
        }
        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/resoluciones/' . $fileName; // Cambiar ordenanzas a resoluciones
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            resoluciones::where('nombre', $fileName)->delete(); // Cambiar ordenanzas a resoluciones
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $filePath = 'public/resoluciones/' . $fileName; // Cambiar ordenanzas a resoluciones
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }
}
