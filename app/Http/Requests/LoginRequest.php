<?php

namespace App\Http\Requests;


use App\Http\Requests\Abstracts\AbstractFormRequest;

/**
 * @property mixed $phone
 * @property mixed $password
 * @property mixed $last_login_as
 * @property mixed $fcm_token
 */
class LoginRequest extends AbstractFormRequest
{
    /**
     * @var mixed
     */

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
//            'email' => 'required_without:phone|email',
            'phone' => 'required',
            'password' => 'required',
            'fcm_token' => 'nullable',
            'device_id' => 'nullable',
            'device_type' => 'nullable', // android , ios
        ];
    }

}
