<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'employee_id' => [
                'required',
                'string'
            ],
            'firstname' => [
                'required',
                'string'
            ],
            'lastname' => [
                'required',
                'string'
            ],
            'address' => [
                'required',
                'string'
            ],
            'birthdate' => [
                'required',
                'date'
            ],
            'contact' => [
                'required',
                'string'
            ],
            'gender' => [
                'required',
                'string'
            ],
            'position_id' => [
                'required',
                'integer'
            ],
            'schedule_id' => [
                'required',
                'integer'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
        ];
    }
}
