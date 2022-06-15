<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends AbstractFormRequest
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
                    'name' => 'required|array',
                    'name.ar' => 'required|string',
                    'name.en' => 'required|string',
                ];
            case "PUT":
                return [
                    'name' => 'sometimes|array',
                    'name.ar' => 'sometimes',
                    'name.en' => 'sometimes',
                ];
        }
    }
}
