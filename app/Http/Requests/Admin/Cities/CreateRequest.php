<?php

namespace App\Http\Requests\Admin\Cities;

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
        return [
            'name' => 'required|unique:cities,name',
            'parent_id' => 'nullable|exists:cities,id',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];
    }
}
