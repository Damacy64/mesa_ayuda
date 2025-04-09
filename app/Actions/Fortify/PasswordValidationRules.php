<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        $password = new Password(8);
        $password->max(15)->mixedCase()->symbols()->numbers();
        return ['required', 'string', $password, 'confirmed'];
    }
}
