<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterRequest;
use Dev\Infrastructure\Model\User;
use Dev\Infrastructure\Model\UserService as UserServiceModel;
use Dev\Domain\Service\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService,$destinationPath;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->destinationPath = 'public/uploads/users';
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
        $users = User::whereDoesntHave('userServices')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        try {
            $dataArray = $request->validated();
            if ($request->hasFile('image')) {
                unset($dataArray['image']);
                $dataArray['image'] = $this->uploadImage($request->file('image'),$this->destinationPath);
            }
        $this->userService->register($request->validated());
        session()->flash('success', trans('admin.user-add-messaage'));
        return redirect()->route('users.index');
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
    public function show(User $user)
    {
        $serviceRequests = $user->service_requests;
        // $userServices = $user->userServices;
        // $userVehicles = $user->user_vehicles;
        // dd($serviceRequests->toArray() , $userVehicles->toArray());
        $reviews=$user->reviews;
        $sumReviews = $user->reviews->sum('rate');
        $countReviews = $user->reviews->count();
        $rate = null;
        if($countReviews > 0){
            $rate = round($sumReviews / $countReviews , 2);
        }
        return view('admin.users.show', compact('user' ,  'serviceRequests' , 'reviews' , 'rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
        //
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
        $dataArray = $request->validated();
        if ($request->hasFile('image')) {
            unset($dataArray['image']);
            $dataArray['image'] = $this->uploadImage($request->file('image'),$this->destinationPath);
        }
//        dd($dataArray);
        $user = $this->userService->show($id);
        $this->userService->updateProfile($user, $dataArray);
        session()->flash('success', trans('admin.user-edit-messaage'));
        return redirect()->route('users.index');
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
            if ($deleteStatus) {
                session()->flash('success', trans('admin.user-delete-messaage'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("something wrong happened");
        }
    }

    public function profile()
    {
        return view('admin.users.profile');
    }

    public function updateProfile(EditUserRequest $request, User $user)
    {
        $data = $request->all();
        unset($data['password_confirmation']);

        if (request('image') != null) {
            if (file_exists($user->image)) {
                unlink($user->image);
            }
            $data['image'] = request('image')->store('uploads/users');
        } else {
            $data['image'] = $user->image;
        }

        if (request('password') != null) {
            $data['password'] = bcrypt(request('password'));
        } else {
            unset($data['password']);
        }
        $user->update($data);
        session()->flash('success', trans('admin.profile-edit-message'));
        return redirect()->back();
    }

    /**
     * @param $lang1
     * @param $lang2
     * @return RedirectResponse
     */
    public function changeLang($lang)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->update(['lang' => $lang]);
        return redirect()->back();
    }

    public function showUserService($id){
        $data = UserServiceModel::with('userVehicle')->with('serviceRequests')->where('id' ,$id)->first();
        if($data == null){
            return abort('404');
        }
        // dd($data->userVehicle->toArray());
        return view('admin.users.show_user_service', compact('data'));
    }
}
