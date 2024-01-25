<?php

namespace App\Http\Requests\API;

use App\Http\Requests\ShapeRequest;

class CreateUserRequest extends ShapeRequest
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
            'name'  => 'nullable|min:2',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            // 'city_id' => 'nullable|exists:places,id',
            // 'area_id' => 'nullable|exists:places,id',
            'image' => 'nullable|image',
        ];
    }
}
