<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;

class PaymentRequest extends AbstractFormRequest
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
                return [
                    'service_request_id' => 'required|integer|exists:service_requests,id',
                    'payment_method' => 'required|string|in:' . implode(',', PaymentMethod::getPaymentMethods())
                ];
                break;
            case 'GET':
                if ($actionName == 'index') {
                    return [
                        'check_out_id' => 'required|string',
                        'payment_method' => 'required|string|in:' . implode(',', PaymentMethod::getPaymentMethods()),
                        'service_request' => 'string|required',
                        'amount' => 'string|required'
                    ];
                }
        }
        return [];
    }

    protected function prepareForValidation(): void
    {
        $actionName = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'GET':
                if ($actionName == 'index') {
                    $this->merge([
                        'payment_method' => isset($this->payment_method) ? $this->payment_method : '',
//                        'payment_method' => isset($this->payment_method) ? Crypt::decryptString($this->payment_method) : '',
                    ]);
                }
        }
    }
}
