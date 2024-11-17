<?php
namespace App\Http\Controllers;

use App\Models\Acuerdos; // Cambiado a Acuerdos
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcuerdosController extends Controller
{
    public function index()
    {
        $acuerdos = Acuerdos::all(); // Cambiado a Acuerdos
        return view('instrumentoslegales.acuerdos.index', compact('acuerdos')); // Cambiado a acuerdos
    }

    public function store(Request $request)
    {
        $request->validate([
            'acuerdo' => 'required|file|mimes:pdf|max:2048', // Cambiado a acuerdo
        ]);
        if ($request->hasFile('acuerdo')) { // Cambiado a acuerdo
            $file = $request->file('acuerdo');
            $fileName = $file->getClientOriginalName(); // Mantener el nombre original del archivo
            // Verificar si el archivo ya existe en la base de datos
            if (Acuerdos::where('nombre', $fileName)->exists()) { // Cambiado a Acuerdos
                return redirect()->back()->with('error', 'Estimado usuario el documento ya existe en la base de datos.');
            }
            $file->storeAs('public/acuerdos', $fileName); // Cambiado a acuerdos
            Acuerdos::create([
                'nombre' => $fileName,
                'ruta' => 'acuerdos/' . $fileName, // Cambiado a acuerdos
                'fecha_importacion' => now(), // Guardar la fecha de importación
            ]);
            return redirect()->back()->with('success', 'Documento cargado exitosamente.');
        }
        return redirect()->back()->with('error', 'Error al cargar el documento.');
    }

    public function destroy($fileName)
    {
        $filePath = 'public/acuerdos/' . $fileName; // Cambiado a acuerdos
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            Acuerdos::where('nombre', $fileName)->delete(); // Cambiado a Acuerdos
            return redirect()->back()->with('success', 'Documento eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }

    public function download($fileName)
    {
        $filePath = 'public/acuerdos/' . $fileName; // Cambiado a acuerdos
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }
        return redirect()->back()->with('error', 'El documento no existe.');
    }
}