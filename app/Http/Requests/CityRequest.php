<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends AbstractFormRequest
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
                    'name.ar' => 'required',
                    'name.en' => 'required',
                    'description' => 'required|array',
                    'description.ar' => 'required',
                    'description.en' => 'required',
                ];
            case "PUT":
                return [
                    'name' => 'sometimes|array',
                    'name.ar' => 'sometimes',
                    'name.en' => 'sometimes',
                    'description' => 'sometimes|array',
                    'description.ar' => 'sometimes',
                    'description.en' => 'sometimes',
                ];
        }
    }
}
