<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password_old' => ['required','min:6'],
            'password' => ['required','min:6'],
            'confirmpassword' => ['required', 'same:password'],
        ];
    }
    public function messages()
    {
        return [
            'password_old.required' => 'Password cannot be empty',
            'password.required' => 'Password cannot be empty',
            'confirmpassword.required' => 'Password cannot be empty',
            'confirmpassword.same' => 'The new password must match the entered password',
        ];
    }
}
