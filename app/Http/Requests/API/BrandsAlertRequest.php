<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class BrandsAlertRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'brands' => 'required|array',
        ];

        if (request()->filled('brands') && is_array(request()->get('brands'))) {
            if (!in_array(null, request()->get('brands'))) {
                foreach(request()->get('brands') as $key => $value) {
                    $rules["brands.$key"] = 'required|exists:brands,id';
                }
            }
        }

        return $rules;
    }
}
