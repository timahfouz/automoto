<?php

namespace App\Http\Requests\Admin\Vendors;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:2',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
            // 'brands' => 'nullable|array',
            // 'services' => 'nullable|array',
            'phone' => 'nullable|min:11',
            'bio' => 'nullable',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'geo_url' => 'nullable|min:50',
            'whatsapp' => 'nullable|min:11',
            'service_type' => 'nullable|in:is_new_job,is_driver',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'bg_image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];
        
        if (request()->filled('brands') && is_array(request()->get('brands'))) {
            foreach(request()->get('brands') as $key => $value) {
                if ($value != -1) {
                    $rules["brands.$key"] = 'required|exists:brands,id';
                }
            }
        }
        if (request()->filled('services') && is_array(request()->get('services'))) {
            foreach(request()->get('services') as $key => $value) {
                $rules["services.$key"] = 'required|exists:services,id';
            }
        }
        
        return $rules;
    }
}
