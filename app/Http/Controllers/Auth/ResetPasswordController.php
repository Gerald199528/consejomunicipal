<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends Controller
{
    public function reset()
    {
        return view('auth.passwords.reset');
    }

    public function resetPost(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('reset')->with('error', '“El correo electrónico proporcionado no se encuentra registrado en nuestra base de datos.”');
        }

        $token = Str::random(64);
        $resetUrl = url('/reset-password/' . $token); // Generar la URL de restablecimiento de contraseña

        Mail::send('auth.from.reset-password', ['resetUrl' => $resetUrl], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Restablecimiento de Contraseña');
        });

        return redirect()->route('reset')->with('success', '“Se ha enviado un enlace a tu dirección de correo electrónico para restablecer tu contraseña.”');
    }

    public function resetPassword($token)
    {
        return view('auth.passwords.reset', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        // Lógica para restablecer la contraseña
    }
}
