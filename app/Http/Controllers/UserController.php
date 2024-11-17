<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           'motivo' => 'required|string|max:255',
        'fecha_egreso' => 'required|date',
        ]);
    
        $user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');
        $user->motivo = $request->input('motivo'); // Asegúrate de asignar el valor
        $user->fecha_egreso = $request->input('fecha_egreso'); // Si lo tienes
        $user->save();
    
        return redirect()->route('usuarios.index');
    }

    public function toggleStatus($id)
    {
        // Encontrar el usuario por ID
        $user = User::findOrFail($id);
        
        // Alternar el estado del usuario
        $user->status = !$user->status;
        $user->save();
        
        return redirect()->back()->with('success', 'Estado del usuario actualizado.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
            'motivo' => 'nullable|string',
            'fecha_egreso' => 'nullable|date', // Validar que sea una fecha válida
        ]);
    
        $usuario = User::findOrFail($id);
        $usuario->status = $request->status;
        $usuario->motivo = $request->motivo; // Asegúrate de tener este campo en tu modelo
        $usuario->fecha_egreso = $request->fecha_egreso; // Asegúrate de tener este campo en tu modelo
        $usuario->save();
    
        return redirect()->route('users.index')->with('success', 'Estado del usuario actualizado correctamente.');
    }

public function index()
{
    // Obtener todos los usuarios
    $users = User::all();
    
    // Pasar la lista de usuarios a la vista
    return view('users.index', compact('users'));
}


}
