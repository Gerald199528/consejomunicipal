<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function importar(Request $request)
    {
        $request->validate([
            'documentos.*' => 'required|file|mimes:pdf,doc,docx,txt',
        ]);

        foreach ($request->file('documentos') as $archivo) {
            $ruta = $archivo->store('documentos', 'public');
            Documento::create([
                'nombre' => $archivo->getClientOriginalName(),
                'ruta' => $ruta,
            ]);
        }

        return redirect()->route('expedientes.index')->with('success', 'Documentos importados correctamente.');
    }
    public function create()
{
    $documentosImportados = Documento::all(); // Asegúrate de que este modelo sea correcto
    $usuarios = User::all();
    return view('expedientes.create', compact('usuarios', 'documentosImportados'));
}
}
