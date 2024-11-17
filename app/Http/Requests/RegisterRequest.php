<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RegisterRule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'regex:/^[a-zA-Z\s]*$/'],
            'apellido' => ['required', 'min:3', 'regex:/^[a-zA-Z\s]*$/'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', new RegisterRule],
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'El nombre solo puede contener letras y espacios.',
            'apellido.regex' => 'El apellido solo puede contener letras y espacios.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introduce una dirección de correo electrónico válida.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'same' => 'Las contraseñas no coinciden.'
        ];
    }
}
