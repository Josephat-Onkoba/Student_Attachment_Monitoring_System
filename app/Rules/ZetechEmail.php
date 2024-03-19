<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class ZetechEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the email ends with "@zetech.ac.ke"
        if (!Str::endsWith($value, '@zetech.ac.ke')) {
            // Provide an error message if it doesn't
            $fail('The :attribute must be a Zetech email address ending with "@zetech.ac.ke".');
        }
    }
}
