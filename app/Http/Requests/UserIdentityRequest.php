<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\IdentityType;

class UserIdentityRequest extends AbstractFormRequest
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
            'identity_type' => 'required|in:' . implode(',', IdentityType::identityTypesArr()),
            'identity_number' => 'required',
            'identity_image' => 'required|image',
        ];
    }
}
