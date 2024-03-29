<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class SendCodeRequest extends AbstractFormRequest
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
            'phone' => 'required_without:email|exists:users,phone|regex:/(01)[0-9]{9}/'
        ];
    }
}
