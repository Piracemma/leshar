<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaSenha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $padrao = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#\/])[A-Za-z\d@$!%*?&#\/]{8,20}$/';
        if (! preg_match($padrao, $value) && strlen($value) >= 8) {
            $fail('A senha deve conter ao menos uma letra maiuscula, um numero e um caracter especial');
        }
    }
}
