<?php

namespace App\Http\Resources;

use Dev\Application\Utility\PaymentStatus;
use Dev\Infrastructure\Model\ServiceRequestContactProvider;
use Dev\Infrastructure\Model\Transaction;
use Dev\Infrastructure\Model\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed description
 * @property mixed image
 * @property mixed $payment_status
 * @property mixed $created_at
 * @property mixed $status
 * @property mixed $price
 * @property mixed $service
 * @property mixed $from_lat
 * @property mixed $from_lng
 * @property mixed $from_address
 * @property mixed $fromCity
 * @property mixed $to_lat
 * @property mixed $serviceProvider
 * @property mixed $to_lng
 * @property mixed $date
 * @property mixed $toCity
 * @property mixed $to_address
 * @property mixed $categoryService
 * @property mixed $time
 */
class ServiceRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'from_address' => $this->from_address,
            'from_city' => new CityResource($this->fromCity),
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'to_address' => $this->to_address,
            'to_city' => new CityResource($this->toCity),
            'date' => $this->date,
            'time' => $this->time,
            'service' => new DoctorCategoryResource($this->categoryService),
            'service_provider' => new UserMinifiedResource($this->serviceProvider),
            'contacted_user_services' => !isset($this->serviceProvider) ?
                ServiceRequestContactedUserServiceResource::collection($this->getContactedUserServices()):[],
            'user_service' => new UserServiceMinifiedResource($this->service),
            'user' => new UserMinifiedResource($this->user),
            'price' => $this->price,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'payment_message' => $this->getMessageOfPaymentStatus(),
            'created_at' => $this->created_at,
        ];
    }

    public function getMessageOfPaymentStatus(){
        switch ($this->payment_status){
            case 'payed':
                return trans('general.payed_successfully');
            case 'pending':
                return trans('general.payment_pending');
            case 'cancelled':
            case '':
                return trans('general.payment_failed');
        }
    }

    public function getContactedProviders()
    {
        $service_provider_ids = ServiceRequestContactProvider::where('service_request_id', $this->id)
            ->pluck('user_service_id');
        return    UserService::whereIn('id',$service_provider_ids)->get();
    }

    public function getContactedUserServices()
    {
        return ServiceRequestContactProvider::where('service_request_id', $this->id)->get();
    }

    public function checkPaymentStatus()
    {
        $transcations = Transaction::where('service_request_id',$this->id)->where('status',PaymentStatus::PAYED)->first();
        if (isset($transcations))
            return $transcations->status;
        return null;
    }

}
