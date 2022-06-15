<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $lng
 * @property mixed $lat
 * @property mixed $description
 * @property mixed $name
 */
class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'review' => $this->review,
            'user' => $this->user->name,
            'created_at' => $this->created_at,
        ];
    }
}
