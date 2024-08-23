<?php

namespace App\Rules;

use App\Models\Cargo;
use App\Models\Cargos;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaCargo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cargo = Cargo::query()->where('id', '=', $value)->first();

        if(! $cargo) {
            $fail('O cargo não existe.');
        }
    }
}
