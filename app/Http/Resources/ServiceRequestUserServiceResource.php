<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed description
 * @property mixed image
 */
class ServiceRequestUserServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $contacted = $this->contacted($request->serviceRequest->id)->first();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'service_category' => new DoctorCategoryResource($this->serviceCategory),
            'min_service_value' => $this->min_service_value,
            'contacted' => $contacted ? true : false,
            'user' => new UserMinifiedResource($this->user),
            'city' => new CityResource($this->city),
        ];
    }
}
