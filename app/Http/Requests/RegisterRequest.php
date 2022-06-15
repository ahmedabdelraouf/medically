<?php

namespace App\Http\Requests;


use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\UserGender;

/**
 * @property mixed name
 * @property mixed phone
 * @property mixed verifyIdToken
 * @property mixed image
 * @property mixed password
 * @property mixed gender
 * @property mixed fcm_token
 * @property mixed email
 */
class RegisterRequest extends AbstractFormRequest
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
            'name' => 'required',
            'phone' => 'required|min:10|unique:users,phone',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required|confirmed',
            'birthdate' => 'nullable',
            'gender' => 'nullable|in:' . UserGender::explodedGender(),
            'fcm_token' => 'nullable',
            'device_id' => 'nullable',
            'device_type' => 'nullable', // android , ios
//            'api_token' => 'required',
            'verifyIdToken' => 'nullable',
//            'email' => 'nullable|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'phone.required' => trans('validation.required'),
            'phone.phone_number' => trans('validation.phone_number'),
            'phone.phone' => trans('validation.phone_number'),
            'password.required' => trans('validation.required'),
            'password.confirmed' => trans('validation.confirmed'),
        ];
    }
}
