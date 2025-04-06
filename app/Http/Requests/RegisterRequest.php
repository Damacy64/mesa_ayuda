<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'last_name_p' => 'required|string|max:30',
            'last_name_m' => 'max:30',
            'employer_number' => 'required|unique:users,employer_number|string',
            'location' => 'required|exists:locations,piso',
            'area' => 'required|exists:areas,departamento',
            'email' => 'required|email|unique:users,email|confirmed|regex:/^[a-zA-Z]+\.([a-zA-Z]+)@afac\.gob\.mx$/',
            'email_confirmation' => 'required|same:email',
            'sex' => 'required|exists:genders,sexo',
            'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[#*!@$%]).+$/',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'names.required' => 'El nombre es obligatorio.',
            'last_name_p.required' => 'El apellido paterno es obligatorio.',
            'last_name_m.string' => 'el apellido materno debe ser menor de 30 caracteres',
            'sex.required' => 'El sexo es obligatorio.',
            'sex.exists' => 'Sexo no válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'Debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password.regex' => 'La contraseña debe tener al menos una letra mayúscula, una letra minúscula y un carácter especial (#, *, !, @, $, %).',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password_confirmation.required' => 'La confirmacion de la contraseña es obligatoria',
            'email.required' => 'El correo es obligatorio.',
            'email.unique' => 'Este correo ya está registrado.',
            'email.regex' => 'El correo debe tener el formato nombre.apellido@afac.gob.mx',
            'email.confirmed' => 'Los correos electrónicos no coinciden',
            'email_confirmation.required' => 'La confirmación del correo es obligatoria',
            'employer_number.required' => 'El numero de empleado es obligatorio',
            'employer_number.unique' => 'El número de empleado ya está en uso.',
            'area.required' => 'El área es obligatoria.',
            'location.required' => 'La ubicación es obligatoria.',
        ];
    }
}
