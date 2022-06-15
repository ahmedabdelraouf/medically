<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class ServiceRequestRequest extends AbstractFormRequest
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
        $actionName = $this->route()->getActionMethod();
        switch ($this->method()) {
            case "POST":
                if ($actionName == 'delete') {
                    return [
                        'id' => 'required|integer|exists:service_requests,id,deleted_at,NULL',
                    ];
                }
                if ($actionName == 'cancel') {
                    return [
                        'id' => 'required|integer|exists:service_requests,id,deleted_at,NULL',
                        'cancellation_reason' => 'required|string'
                    ];
                }
                if ($actionName == 'confirm') {
                    return [
                        'service_request_id' => 'required|integer|exists:service_requests,id,deleted_at,NULL',
                        'service_id' => 'required|integer|exists:user_services,id,deleted_at,NULL',
                    ];
                }
                if ($actionName == 'finish') {
                    return [
                        'id' => 'required|integer|exists:service_requests,id,deleted_at,NULL',
                    ];
                }
                return [
                    'service_category_id' => 'required|integer|exists:category_services,id',
                    'from_lat' => 'required|numeric',
                    'from_lng' => 'required|numeric',
                    'from_address' => 'required|string',
                    'from_city_id' => 'required|integer',
                    'to_lat' => 'required|numeric',
                    'to_lng' => 'required|numeric',
                    'to_address' => 'required|string',
                    'to_city_id' => 'required|integer|exists:cities,id',
                    'date' => 'required|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
                    'time' => 'date_format:H:i:s',
                    'price' => 'sometimes|numeric'
                ];
            case "PUT":
                if ($actionName == 'updatePrice') {
                    return [
                        'price' => 'required|numeric',
                    ];
                }
                if ($actionName == 'updateServiceProvider') {

                    return [
                        'service_id' => 'required|integer|exists:user_services,id',
                    ];
                }
                return [
//                    'status' => ['sometimes', Rule::in(ServiceRequestStatus::getStatusArr())]
                ];
            case "GET":
                if ($actionName == 'indexServiceProviders') {
                    return [
                        'city_id' => 'sometimes|integer'
                    ];
                }
                return [
                    'status' => 'sometimes|string',
                    'service_provider_id' => 'sometimes|integer',
                    'user_id' => 'sometimes|integer',
                    'limit' => 'nullable|integer',
                ];
        }
        return [];
    }

}
