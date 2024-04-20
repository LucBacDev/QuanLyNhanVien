<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;
class PersonRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:person'],
            'password' => ['required','min:6'],
            'confirmpassword' => ['required', 'same:password'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email cannot be empty',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password cannot be empty',
            'confirmpassword.required' => 'Password cannot be empty',
        ];
    }
}
