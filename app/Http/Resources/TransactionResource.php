<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id" => $this->id,
            "service_provider_id" => $this->service_provider_id,
            "amount" => $this->amount,
            "message" => $this->getMessageOfStatus(),
            "service_request_id" => $this->service_request_id,
            "type" => $this->type,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "payload" => isset($this->payload)&&$this->payload!=null&&$this->payload!=""?json_decode($this->payload):new \stdClass(),
        ];
    }

    public function getMessageOfStatus(){
        switch ($this->status){
            case 'payed':
                return trans('general.payed_successfully');
            case 'pending':
                return trans('general.payment_pending');
            case 'cancelled':
            case '':
                return trans('general.payment_failed');
        }
    }
}
