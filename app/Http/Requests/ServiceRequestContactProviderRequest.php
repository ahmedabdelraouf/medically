<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\ServiceRequestStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequestContactProviderRequest extends AbstractFormRequest
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
                    'service_request_id' => 'required|integer|exists:service_requests,id',
                    'user_service_id' => 'required|integer|exists:user_services,id',
                ];
            case "PUT":
                return [

                ];
            case "GET":
                return [
                    'status' => 'sometimes|string'
                ];
        }
        return [];
    }
}
