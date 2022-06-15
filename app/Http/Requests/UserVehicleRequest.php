<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class UserVehicleRequest extends AbstractFormRequest
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
            'description' => 'required',
            'type' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     * @return array
     */
    public function messages()
    {
        return [
            'car_brand_id.required' => trans('validation.required', ['attribute' => 'car_brand']),
            'city_id.required' => trans('validation.required', ['attribute' => 'city']),
            'vehicle_number.required' => trans('validation.required', ['attribute' => 'vehicle_number']),
            'images.required' => trans('validation.required', ['attribute' => 'images']),
        ];
    }
}
