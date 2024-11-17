<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class ListausuarioController extends Controller
{
    // Método para mostrar el perfil
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('listausuario.index', compact('usuarios'));
    }

    // Método para almacenar un nuevo usuario
    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'nivel_de_acceso' => $request->nivel_de_acceso,
            'password' => bcrypt($request->password),
        ]);
        // Redirigir con un mensaje de éxito
        return redirect()->route('listausuario.index')->with('success', 'Usuario creado correctamente.');
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $usuario = User::findOrFail($id); // Buscar usuario por ID
        return view('listausuario.edit', compact('usuario'));
    }

    // Método para actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id); // Buscar usuario por ID
        $usuario->update($request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'nivel_de_acceso' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
        ]));
        return redirect()->route('listausuario.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id); // Buscar usuario por ID
        $usuario->delete(); // Eliminar usuario
        return redirect()->route('listausuario.index')->with('success', 'Usuario eliminado correctamente.');
    }
}