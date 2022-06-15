<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class UserResource
 * @property mixed id
 * @property mixed name
 * @property mixed birthdate
 * @property mixed phone
 * @property mixed gender
 * @property mixed phone_verified_at
 * @property mixed image
 * @property mixed $lang
 * @property mixed $type
 * @property mixed $api_token
 * @property mixed $identity_type
 * @property mixed $identity_number
 * @property mixed $identity_image
 * @property mixed $notification_status
 * @property mixed $created_at
 * @property mixed $updated_at
 * @package App\Http\Resources
 * @method userServices()
 */
class UserResource extends AbstractJsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "phone" => $this->phone,
            "gender" => $this->gender,
            "email" => $this->email,
            "phone_verified_at" => $this->phone_verified_at,
//            "image" => getImageUrl($this->image),
            "lang" => $this->lang,
            "birthdate" => $this->birthdate,
            "doctor_id" => $this->doctor_id,
            "doctor_category_id" => $this->doctor_category_id,
            "type" => $this->type,
            "api_token" => $this->api_token,
            "created_at" => Carbon::parse($this->created_at)->format('Y-m-d h:m:i'),
        ];
    }
}
