<?php

namespace App\Http\Requests\Admin\Users;

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
            'name' => 'required|min:5',
            'phone' => 'nullable|unique:users,phone',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ];
    }
}