<?php

namespace App\Http\Resources;

use Carbon\Carbon;

/**
 * Class UserResource
 * @property mixed phone_verified_at
 * @property mixed image
 * @package App\Http\Resources
 */
class UserMinifiedResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "phone" => $this->phone,
            "image" => getImageUrl($this->image),
        ];
    }
}
