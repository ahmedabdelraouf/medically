<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorCategoryRequest;
use Dev\Infrastructure\Model\DoctorCategory;
use Dev\Domain\Service\DoctorCategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DoctorCategoryController extends Controller
{
    private $categoryService;

    private $destinationPath;
    /**
     * CategoryController constructor.
     * @param DoctorCategoryService $categoryService
     */
    public function __construct(DoctorCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->destinationPath = 'public/uploads/categories';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $allServices = $this->categoryService->index($request->all());
        return view('admin.category_services.index', compact('allServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.category_services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DoctorCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(DoctorCategoryRequest $request): RedirectResponse
    {
        $dataArray = $request->validated();
        if ($request->hasFile('image')) {
            unset($dataArray['image']);
            $dataArray['image'] = $this->uploadImage($request->file('image'),$this->destinationPath);
        }
        $this->categoryService->store($dataArray);
        session()->flash('success', trans('admin.add_category_service_success'));
        return redirect()->route('category-service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string
     */
    public function show(int $id): string
    {
        return 'show' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DoctorCategory $category_service
     * @return Application|Factory|View
     */
    public function edit(DoctorCategory $category_service)
    {
        return view('admin.category_services.edit', compact('category_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DoctorCategoryRequest $request
     * @param DoctorCategory $category_service
     * @return RedirectResponse
     */
    public function update(DoctorCategoryRequest $request, DoctorCategory $category_service): RedirectResponse
    {
        $dataArray = $request->validated();
        if ($request->hasFile('image')) {
            unset($dataArray['image']);
            $dataArray['image'] = $this->uploadImage($request->file('image'),$this->destinationPath);
        }
        if ($this->categoryService->update($dataArray, $category_service)) {
            session()->flash('success', trans('admin.edit_category_service_success'));
            return redirect()->route('category-service.index');
        }
        session()->flash('error', trans('admin.something_wrong_happened'));
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->categoryService->destroy($id)) {
            session()->flash('success', trans('admin.category_service_delete_message_successfully'));
            return redirect()->back();
        }
        session()->flash('error', trans('admin.something_wrong_happened'));
        return redirect()->back()->withInput();
    }
}
