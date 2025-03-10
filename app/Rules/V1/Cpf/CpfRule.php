<?php

namespace App\Rules\V1\Cpf;

use App\Utils\CpfUtil;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! CpfUtil::validate($value)) {
            $fail("The $attribute is invalid.");
        }
    }
}
