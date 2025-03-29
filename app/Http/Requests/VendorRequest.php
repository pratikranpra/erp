<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
			'name' => 'required|string',
			'registered_address' => 'required|string',
			'billing_address' => 'required|string',
			'owner_name' => 'required|string',
			'owner_phone' => 'required|string',
			'accountant_name' => 'string',
			'delivery_phone' => 'string',
			'owner_email' => 'required|string',
			'payment_terms' => 'required|string',
			'gst_no' => 'string',
			'gst_date' => 'string',
			'discount' => 'required',
        ];
    }
}
