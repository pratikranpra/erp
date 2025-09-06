<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GstMasterRequest extends FormRequest
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
			'category_id'           => 'required',
            'gst_range_min'         => 'required|integer|min:0|lte:gst_range_max',
            'gst_range_max'         => 'required|integer|min:0|gte:gst_range_min',
            'gst_price_range_min'   => 'required|integer|min:0|lte:gst_price_range_max',
            'gst_price_range_max'   => 'required|integer|min:0|gte:gst_price_range_min',
            'gst_no'                => 'required|string',
        ];
    }
}
