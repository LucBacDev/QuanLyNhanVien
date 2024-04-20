<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name' => ['required'],
            'gender' => ['required'],
            'phone_number' => ['required','numeric'],
            'birthdate' => ['required'],
            'address' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => 'Full name cannot be empty',
            'gender.required' => 'Gender cannot be empty',
            'phone_number.required' => 'Phone number cannot be empty',
            'phone_number.numeric' => 'Phone number must be number',
            'birthdate.required' => 'Birthdate cannot be empty',
            'address.required' => 'Address cannot be empty',
        ];
    }
}
