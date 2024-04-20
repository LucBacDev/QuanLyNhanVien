<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
class RoleRequest extends FormRequest
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
            'role' => 'required|unique:role,role,numeric',
            'description' => 'required|unique:role,description',
        ];
    }
    public function messages()
    {
        return [
            'role.required' => 'Role cannot be empty',
            'role.numeric' => 'Role must be number',
            'role.unique' => 'Role already exists',
            'description.required' => 'Description cannot be empty',
            'decription.unique' => 'Decription already exists',

        ];
    }
}
