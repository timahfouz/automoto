<?php

namespace App\Http\Requests\Admin\Vendors;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'city_id' => 'required|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'service_id' => 'nullable|exists:services,id',
            'phone' => 'nullable|min:11',
            'bio' => 'nullable',
            'geo_url' => 'nullable|min:50',
            'whatsapp' => 'nullable|min:11',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'bg_image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];
    }
}
