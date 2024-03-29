<?php

namespace App\Http\Requests\Admin\Services;

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
            'city_id' => 'nullable|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
            // 'brand_id' => 'nullable|exists:brands,id',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];
    }
}
