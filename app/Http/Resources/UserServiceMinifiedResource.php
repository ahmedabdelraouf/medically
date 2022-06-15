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
 * @property mixed $title
 * @method userVehicle()
 */
class UserServiceMinifiedResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'min_service_price' => $this->min_service_value,
        ];
    }
}
