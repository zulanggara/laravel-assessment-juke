<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:employee',
            'phone_number' => 'required|unique:employee',
            'full_name' => 'required|string',
            'dob' => 'required',
            'pob' => 'required',
            'year_exp' => 'required',
            'gender' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'unique' => 'The :attribute has been taken.',
            'required' => 'The :attribute field is required.'
        ];
    }
}
