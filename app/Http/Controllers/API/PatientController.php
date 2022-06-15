<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserVehicleRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\UserVehicle;
use Dev\Application\Utility\VisitType;
use Dev\Domain\Service\PatientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientController extends BaseAPIController
{
    private $service, $destinationPath;

    /**
     * UserVehicle constructor.
     * @param PatientService $service
     */
    public function __construct(PatientService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $data['user_id'] = 1;//this is just for testing.
        $userVehicle = $this->service->index($data);
        return $this->prepareApiResponse(false, null, trans('admin.data_retrieved_successfully'),
            PatientResource::collection($userVehicle), 'success', 200, 0, '');
    }

    public function types()
    {
        return $this->prepareApiResponse(false, null, trans('admin.data_created_successfully'),
            VisitType::getTypes(), 'success', 200, 0, '');
    }

    /**
     * @param UserVehicleRequest $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        $data['user_id'] = $this->getAuthUserID($request);
        $data['user_id'] = 1;//this is just for testing.
        $userVehicle = $this->service->store($data);
        return $this->prepareApiResponse(false, null, trans('admin.data_created_successfully'),
            new PatientResource($userVehicle), 'success', 200, 0, '');
    }

    /**
     * @param UserVehicleRequest $request
     * @return JsonResponse
     */
    public function update(UserVehicleRequest $request)
    {
        return $this->prepareApiResponse(false, null, trans('admin.data_updated_successfully'),
            new PatientResource(null), 'success', 200, 0, '');
    }

}
