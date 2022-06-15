<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class ContactUsRequest extends AbstractFormRequest
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
        switch ($this->getMethod()) {
            case 'POST':
            case 'PUT':
                return [
                    'phone' => 'required',
                    'message' => 'required',
                    'name' => 'required',
                ];
        }
        return [];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => trans('validation.required'),
            'phone.required' => trans('validation.required'),
            'message.required' => trans('validation.required'),
        ];
    }
}
