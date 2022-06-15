<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsAPIRequest;
use App\Http\Traits\ResponseTraits;
use Dev\Domain\Service\ContactUsService;
use http\Exception;
use Illuminate\Http\JsonResponse;

class ContactUsController extends BaseAPIController
{
    public $service;

    public function __construct(ContactUsService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ContactUsAPIRequest $contactUsRequest
     * @return JsonResponse
     */
    public function store(ContactUsAPIRequest $contactUsRequest): JsonResponse
    {
        try {
            $result = $this->service->store($contactUsRequest->validated());
            $server_status = $result['status'] == 200 ? 200 : 400;
            return response()->json($result, $server_status);
        } catch (Exception $e) {
            return $this->prepare_response_json($this->prepare_response(true, ['error' => $e->getMessage()],
                trans('admin.something_wrong_happened'), null,
                JsonResponse::HTTP_BAD_REQUEST, JsonResponse::HTTP_BAD_REQUEST));
        }
    }
}
