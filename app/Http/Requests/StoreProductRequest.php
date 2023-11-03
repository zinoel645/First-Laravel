<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => [
                'required',
                'unique:products,name'
            ],
            'color' => 'required',
            'price' => [
                'required',
                'min:1',
                'integer',
            ],
            'brand' => 'required',
            'inventory' => [
                'required',
                'min:0',
                'integer',
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array(1, $value) && !in_array(2, $value)) {
                        $fail('Must select Wall tile or Floor tile.');
                    }
                }
            ],
            

        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
