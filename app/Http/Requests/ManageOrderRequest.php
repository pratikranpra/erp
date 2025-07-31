<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageOrderRequest extends FormRequest
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
			'customer_id' => 'required',
			'employee_id' => 'required',
			'sku' => 'string',
			'remark' => 'string',
			'product_type' => 'required',
			'shipping_address_id' => 'required',
			'shopping_mode' => 'required',
			'transporter' => 'string',
			'charge' => 'required',
			'order_date' => 'required',
			'delivery_date' => 'required',
			//'status' => 'required',
        ];
    }
}
