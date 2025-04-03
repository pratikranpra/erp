<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
			'email' => 'required|string',
			'user_pin' => 'required|string',
			'department' => 'required|string',
			'sub_department' => 'string',
			'contact' => 'required',
			'aadhar_no' => 'required|string',
			'attachment' => 'nullable',
			'aadhar_name' => 'required|string',
        ];
    }
}
