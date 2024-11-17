<?php

namespace App\Http\Controllers;

use App\Models\Documento; // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrumentoslegalesController extends Controller
{
    public function index()
    {
        $documentos = Documento::all(); // Obtiene todos los documentos de la base de datos
        return view('instrumentoslegales.index', compact('documentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|file|mimes:pdf|max:2048', // Solo permite archivos PDF
        ]);

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/documentos', $fileName); // Guarda el archivo en la carpeta 'storage/app/public/documentos'

            // Guardar información en la tabla documentos
            Documento::create([
                'nombre' => $fileName,
                'ruta' => 'documentos/' . $fileName,
            ]);
        }

        return redirect()->back()->with('success', 'Documento cargado exitosamente.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/documentos/' . $fileName;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Documento::where('nombre', $fileName)->delete(); // Eliminar el registro de la base de datos
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }

        return redirect()->back()->with('error', 'El documento no existe.');
    }
}