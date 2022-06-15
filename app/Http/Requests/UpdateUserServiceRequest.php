<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserServiceRequest extends AbstractFormRequest
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
            'title' => 'string|sometimes',
            'description' => 'sometimes|string',
            'city_id' => 'sometimes|integer|exists:cities,id',
            'category_service_id' => 'sometimes|integer|exists:category_services,id',
            'min_service_value' => 'sometimes|numeric',
            'user_service_id' => 'sometimes|integer|exists:user_services,id',
        ];
    }
}
