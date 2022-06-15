<?php

namespace App\Http\Resources;

use Dev\Application\Utility\IdentityType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed car_brand_id
 * @property mixed city_id
 * @property mixed vehicle_number
 * @property mixed images
 * @property mixed identity_type
 * @property mixed identity_number
 * @property mixed car_registration_form
 * @property mixed driving_license
 * @property mixed service
 * @property mixed driving_license_validity
 * @method images()
 */
class DoctorQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
        ];
    }

    /**
     * @param $identity_type
     * @return string|null
     */
    public function getIdentityType($identity_type)
    {
        switch ($identity_type) {
            case IdentityType::NATIONALID:
                return app()->getLocale() == 'ar' ? IdentityType::NATIONALID_AR : IdentityType::NATIONALID_EN;
            case IdentityType::RESIDENCYNUMBER:
                return app()->getLocale() == 'ar' ? IdentityType::RESIDENCYNUMBER_AR : IdentityType::RESIDENCYNUMBER_EN;
        }
        return null;
    }
}
