<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use Dev\Infrastructure\Model\DoctorCategory;
use Dev\Infrastructure\Model\City;
use Dev\Domain\Service\CityService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
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
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $allCities = $this->cityService->index($request->all());
        return view('admin.cities.index', compact('allCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request): RedirectResponse
    {
        $this->cityService->store($request->all());
        session()->flash('success', trans('admin.add_city_message'));
        return redirect()->route('cities.index');
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
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(CityRequest $request, City $city): RedirectResponse
    {
        if ($this->cityService->update($request->validated(), $city)) {
            session()->flash('success', trans('admin.edit_category_service_success'));
            return redirect()->route('cities.index');
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
        if ($this->cityService->destroy($id)) {
            session()->flash('success', trans('admin.category_service_delete_message_successfully'));
            return redirect()->back();
        }
        session()->flash('error', trans('admin.something_wrong_happened'));
        return redirect()->back()->withInput();
    }
}
