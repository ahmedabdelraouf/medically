<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class UserServiceRequest extends AbstractFormRequest
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
        switch ($this->method()) {
            case "POST":
                return [
                    'title' => 'string|required',
                    'description' => 'required|string',
                    'city_id' => 'required|integer|exists:cities,id',
                    'category_service_id' => 'required|integer|exists:category_services,id',
                    'min_service_value' => 'required|numeric',
                    'car_brand_id' => 'required|exists:car_brands,id',
                    'vehicle_number' => 'required',
                    'images' => 'required|array',
//                    'identity_type' => 'required|in:' . implode(',', IdentityType::identityTypesArr()),
//                    'identity_number' => 'required|min:12',
                    'driving_license' => 'required|image',
                    'driving_license_validity' => 'required',
//                    'car_registration_form' => 'required',
                ];
            case "PUT":
                return [
                    'title' => 'string|required',
                    'description' => 'required|string',
                    'city_id' => 'required|integer|exists:cities,id',
                    'category_service_id' => 'required|integer|exists:category_services,id',
                    'min_service_value' => 'required|numeric',
                ];
            case "GET":
                return [
                    'city_id' => 'sometimes|integer'
                ];
        }
        return [];
    }
}
