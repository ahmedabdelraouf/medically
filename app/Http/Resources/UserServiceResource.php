<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed description
 * @property mixed image
 * @property mixed min_service_value
 * @property mixed serviceCategory
 * @method userVehicle()
 */
class UserServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserMinifiedResource($this->user),
            'city' => new CityResource($this->city),
            'title' => $this->title,
            'description' => $this->description,
            'service_category' => new DoctorCategoryResource($this->serviceCategory),
            'min_service_value' => $this->min_service_value,
            'requests_count' => $this->serviceRequests()->count(),
            'price_with_commision' => (int)$this->min_service_value + ((int)$this->min_service_value *( (int) $this->getPriceWithCommision()/100)),
            'vehicle' => new UserVehicleResource($this->userVehicle),
            'is_enabled' => ($this->is_enabled == 1) ? 1 : 0,

        ];
    }

    public function getPriceWithCommision(){
        return \Setting::get('commission');
    }

}
