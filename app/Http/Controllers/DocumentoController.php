<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;

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
            'documentos.*' => 'required|file|mimes:pdf,doc,docx,txt', // Ajusta los tipos de archivo según tus necesidades
        ]);

        foreach ($request->file('documentos') as $archivo) {
            $ruta = $archivo->store('documentos', 'public');
            Documento::create([
                'nombre' => $archivo->getClientOriginalName(),
                'ruta' => $ruta,
            ]);
        }

        return redirect()->route('documentos.index')->with('success', 'Documentos importados correctamente.');
    }
}
