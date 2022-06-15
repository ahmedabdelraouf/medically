<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed description
 * @property mixed image
 * @property mixed $offered_price
 * @property mixed $userService
 */
class ServiceRequestContactedUserServiceResource extends JsonResource
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
            'offered_price' => $this->offered_price,
            'user_service' => new UserServiceResource($this->userService),
        ];
    }
}
