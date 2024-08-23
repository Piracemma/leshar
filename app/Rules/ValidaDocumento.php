<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaDocumento implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $valido = false;

        $numero = preg_replace('/\D/', '', $value);
        
        if (strlen($numero) == 11) {
            if (preg_match('/^(\d)\1*$/', $numero)) {
                $valido = false;
            }
            
            $soma = 0;
            for ($i = 0; $i < 9; $i++) {
                $soma += intval($numero[$i]) * (10 - $i);
            }
            
            $digito1 = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
            
            $soma = 0;
            for ($i = 0; $i < 10; $i++) {
                $soma += intval($numero[$i]) * (11 - $i);
            }
            
            $digito2 = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
            
            if ($numero[9] == $digito1 && $numero[10] == $digito2) {
                $valido = true;
            }
        } elseif (strlen($numero) == 14) {
            if (preg_match('/^(\d)\1*$/', $numero)) {
                $valido = false;
            }
            
            $soma = 0;
            $multiplicador = 5;
            for ($i = 0; $i < 12; $i++) {
                $soma += intval($numero[$i]) * $multiplicador;
                $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
            }
            
            $digito1 = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);
            
            $soma = 0;
            $multiplicador = 6;
            for ($i = 0; $i < 13; $i++) {
                $soma += intval($numero[$i]) * $multiplicador;
                $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
            }
            
            $digito2 = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);
            
            if ($numero[12] == $digito1 && $numero[13] == $digito2) {
                $valido = true;
            }
        } else {

            $valido = false;

        }

        if(!$valido) {

            $fail('Documento invalido, verifique os dados passados');

        }
    }
}
