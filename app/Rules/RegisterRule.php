<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RegisterRule implements Rule
{
    public function passes($attribute, $value)
    {
         //password
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.$\/\-*#=])[A-Za-z\d@.$\/\-*#=]{10,}$/';
        return preg_match($regex, $value);
    }

    public function message()
    {
        return 'Estimado usuario la contraseña no cumple con los requisitos requerido por favor intentalo nuevamente.';
    }

    public function validate($attribute, $value, $parameters, $validator)
    {
        //
        return $this->passes($attribute, $value);
    }
}
