<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            session()->flash('error', 'Email o contraseña incorrecta, por favor verifique los datos e intente nuevamente.');
            return redirect()->route('login');
        }
        return redirect()->route('home');
    }
}
