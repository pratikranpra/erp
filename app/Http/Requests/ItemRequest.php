<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
			'sku' => 'required|string',
			'name' => 'required|string',
			'description' => 'required|string',
			'category_id' => 'string',
			'subcategory_id' => 'string',
			'unit' => 'required',
			'weight' => 'required|string',
			'gst' => 'required|string',
			'rate' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'sub_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
			'discount' => 'required',
			'child_qty' => 'required',
			'product_type' => 'string',
        ];
    }
}
