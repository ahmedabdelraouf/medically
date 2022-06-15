<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterRequest;
use Dev\Infrastructure\Model\User;
use Dev\Domain\Service\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
//        $users = $this->userService->index($request->all());
        $users = User::whereHas('userServices')->get();
        return view('admin.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        try {
            $this->userService->register($request->all());
            session()->flash('success', trans('admin.admin-add-messaage'));
            return redirect()->route('admins.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("something wrong happened");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        $userServices = $admin->userServices;
        $serviceRequests = $admin->service_requests;
        $userVehicles = $admin->user_vehicles;
        $reviews=$admin->reviews;
        $sumReviews = $admin->reviews->sum('rate');
        $countReviews = $admin->reviews->count();
        $rate = null;
        if($countReviews > 0){
            $rate = round($sumReviews / $countReviews , 2);
        }
        return view('admin.admins.show', compact('admin' , 'userServices' , 'serviceRequests' ,'userVehicles','reviews' , 'rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->show($id);
        return view('admin.admins.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = $this->userService->show($id);
        $this->userService->updateProfile($user, $request->validated());
        session()->flash('success', trans('admin.admin-edit-messaage'));
        return redirect()->route('admins.index')->with("User information updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleteStatus = $this->userService->delete($id);
            if ($deleteStatus)
                session()->flash('success', trans('admin.admin-delete-messaage'));
            return redirect()->back()->with("User deleted successfully");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("something wrong happened");
        }
    }

    public function changeLang( $lang2)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->update(['lang' => $lang2]);
        return redirect()->back();
    }
}
