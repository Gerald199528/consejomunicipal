<?php
namespace App\Http\Controllers;

use App\Models\Gasetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GasetasController extends Controller
{
    public function index()
    {
        $gasetas = Gasetas::all();
        return view('instrumentoslegales.gasetas.index', compact('gasetas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gaseta' => 'required|file|mimes:pdf|max:2048', // Solo permite archivos PDF
        ]);

        if ($request->hasFile('gaseta')) {
            $file = $request->file('gaseta');
            $fileName = $file->getClientOriginalName(); // Mantener el nombre original del archivo

            // Verificar si el archivo ya existe en la base de datos
            if (Gasetas::where('nombre', $fileName)->exists()) {
                return redirect()->back()->with('error', 'Estimado usuario el documento ya existe en la base de datos.');
            }

            $file->storeAs('public/gasetas', $fileName);

            Gasetas::create([
                'nombre' => $fileName,
                'ruta' => 'gasetas/' . $fileName,
                'fecha_importacion' => now(), // Guardar la fecha de importación
            ]);

            return redirect()->back()->with('success', 'Documento cargado exitosamente.');
        }

        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/gasetas/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Gasetas::where('nombre', $fileName)->delete();
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $filePath = 'public/gasetas/' . $fileName;
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }
}
