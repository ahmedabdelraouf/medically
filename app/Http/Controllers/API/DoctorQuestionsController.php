<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserVehicleRequest;
use App\Http\Resources\DoctorQuestionResource;
use App\Http\Resources\UserVehicle;
use Dev\Application\Utility\QuestionType;
use Dev\Domain\Service\DoctorQuestionService;
use Dev\Infrastructure\Model\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorQuestionsController extends BaseAPIController
{
    private $service, $destinationPath;

    /**
     * UserVehicle constructor.
     * @param DoctorQuestionService $service
     */
    public function __construct(DoctorQuestionService $service)
    {
        $this->service = $service;
        $this->destinationPath = 'public/uploads/usersVehicles';
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
            DoctorQuestionResource::collection($userVehicle), 'success', 200, 0, '');
    }

    public function types()
    {
        return $this->prepareApiResponse(false, null, trans('admin.data_created_successfully'),
            QuestionType::getTypes(), 'success', 200, 0, '');
    }

    /**
     * @param UserVehicleRequest $request
     * @return JsonResponse
     */
    public function store(UserVehicleRequest $request)
    {
        $data = $request->validated();
//        $data['user_id'] = $this->getAuthUserID($request);
        $data['user_id'] = 1;//this is just for testing.
        $userVehicle = $this->service->store($data);
        return $this->prepareApiResponse(false, null, trans('admin.data_created_successfully'),
            new DoctorQuestionResource($userVehicle), 'success', 200, 0, '');
    }

    /**
     * @param UserVehicleRequest $request
     * @return JsonResponse
     */
    public function update(UserVehicleRequest $request)
    {
        $dataArray = $request->validated();
        $userVehicle = $this->service->show($dataArray['user_vehicle_id']);
//        $response = Gate::inspect('userVehicleOwner', $userVehicle);
//        if(!$response->allowed()) {
//            return $this->prepareApiResponse(false, null, $response->message(),
//                [], 'unauthorized', 401, 0, '');
//        }
        $dataArray['user_id'] = $this->getAuthUserID($request);
        if ($request->hasFile('driving_license')) {
            unset($dataArray['driving_license']);
            $dataArray['driving_license'] = $this->uploadImage($request->file('driving_license'), $this->destinationPath . "/" . $dataArray['user_id']);
        }
        $uploadedImages = $dataArray['images'] ?? null;
        $userVehicle = $this->service->update($dataArray);
        if (!$userVehicle) {
            return $this->handelErrorResponse(null, Response::HTTP_BAD_REQUEST);
        }
        if (isset($uploadedImages) && count($uploadedImages) > 0) {
            foreach ($uploadedImages as $index => $uploadedImage) {
                $path = $this->uploadImage($uploadedImages[$index], $this->destinationPath . '/' . $userVehicle->id . '/images');
                $image = new Image();
                $image->path = $path;
                $userVehicle->images()->save($image);
            }
        }
        return $this->prepareApiResponse(false, null, trans('admin.data_updated_successfully'),
            new DoctorQuestionResource($userVehicle), 'success', 200, 0, '');
    }

}
