<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'user_name' => [
                'required',
                'unique:users,user_name',
            ],
            'password' => [
                'required',
                'min:8',
                'regex:/[0-9]/'
            ],
            'full_name' => [
                'required',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
            ],
            'phone' => [
                'required',
                'digits:10',
            ],
            'address' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'The username field is required.',
            'user_name.unique' => 'The username has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least :min characters long and contain at least one digit.',
            'password.regex' => 'Password must be at least :min characters long and contain at least one digit.',
            'full_name.required' => 'The full name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'Phone must be exactly :digits digits.',
            'address.required' => 'The address field is required.',
        ];
    }
}
