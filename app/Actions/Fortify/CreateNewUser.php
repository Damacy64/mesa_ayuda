<?php

namespace App\Actions\Fortify;

use App\Models\Area;
use App\Models\Location;
use App\Models\User;
use App\Models\UserFinal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'last_name_p' => ['required', 'string', 'max:50'],
            'last_name_m' => ['string', 'max:50'],
            'employer_number' => ['required', 'string', 'min:4', 'max:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'names' => $input['name'],
            'last_name_p' => $input['last_name_p'],
            'last_name_m' => $input['last_name_m'],
            'sex_id' => $input['sex'],
            'rol_id' => 'USUARIO',
            'employer_number' => $input['employer_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        UserFinal::create([
            'empleado_id' => $user->id,
            'area_id' => $input['area'],
            'ubicacion_id' => $input['location'],
        ]);

        return $user;
    }
}
