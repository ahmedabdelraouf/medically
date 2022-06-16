<?php

namespace App\Http\Controllers;


use Dev\Domain\Service\ContactUsService;
use Dev\Domain\Service\UserService;
use Dev\Domain\Service\DoctorQuestionService;

class HomeController extends Controller
{

    /**
     * @var UserService $userService
     */
    private $userService;

    /**
     * @var ContactUsService $contactUsService
     */
    private $contactUsService;

    public function __construct(
        UserService  $userService,
        ContactUsService $contactUsService,
        DoctorQuestionService  $userVehicleService,
    ) {
        // $this->middleware('auth');
        $this->userService = $userService;
        $this->contactUsService = $contactUsService;
        $this->userVehicleService = $userVehicleService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersStatistics = $this->userService->getStatistics();
        $contactUsStatistics = $this->contactUsService->getStatistics();
        $transactionStatistics = $this->transactionService->getStatistics();
        $statisticsInfo =[
            'usersStatistics' => $usersStatistics,
            'contactUsStatistics' => $contactUsStatistics,
            'transactionStatistics' => $transactionStatistics,
        ];
        return view('admin.index', $statisticsInfo);
    }

    public function home(){
        return view('landing_page');
    }
}
