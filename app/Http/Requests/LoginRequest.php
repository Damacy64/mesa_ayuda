<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email|regex:/^[a-zA-Z]+\.([a-zA-Z]+)@afac\.gob\.mx$/',
            'password' => 'required|min:8|max:15|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[#*!@$%]).+$/',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El correo es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ];
    }
}
