<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use Dev\Domain\Service\CityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends BaseAPIController
{

    private $cityService;

    /**
     * CategoryController constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $allServices = $this->cityService->index($request->all());
        return $this->prepareApiResponse(false, null, trans('admin.data_retrieved_successfully'),
            CityResource::collection($allServices), 'success', 200, 0, '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request)
    {
        return $this->cityService->store($request->all());
    }
}
