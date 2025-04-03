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
            'names' => 'required',
            'last_name_p' => 'required',
            'last_name_m' => 'required',
            'number_employer' => 'required|unique',
            'location' => 'required',
            'area' => 'required',
            'email' => 'required|unique',
            'email_confirmation' => 'required|same:email',
            'sex' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
