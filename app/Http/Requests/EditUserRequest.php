<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\UserGender;

class EditUserRequest extends AbstractFormRequest
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
            'name' => 'sometimes',
            'birthdate' => 'sometimes',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'sometimes|nullable|in:' . UserGender::explodedGender(),
            'lang' => 'sometimes|nullable|in:ar,en',
            'password' => 'sometimes|nullable|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'phone.required' => trans('validation.required'),
            'phone.phone_number' => trans('validation.phone_number'),
            'phone.phone' => trans('validation.phone_number'),
        ];
    }
}
