<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\Http\Resources\DoctorCategoryResource;
use Dev\Domain\Service\DoctorCategoryService;
use Dev\Infrastructure\Model\DoctorCategory;
use Illuminate\Http\Request;

class DoctorCategoryController extends BaseAPIController
{

    private $categoryService;

    /**
     * CategoryController constructor.
     * @param DoctorCategoryService $categoryService
     */
    public function __construct(DoctorCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $allServices = $this->categoryService->index($request->all());
        return $this->prepareApiResponse(false, null, trans('admin.data_retrieved_successfully'),
            DoctorCategoryResource::collection(DoctorCategory::all()), 'success', 200, 0, '');
    }
}
