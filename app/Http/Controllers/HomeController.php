<?php

namespace App\Http\Controllers;


use Dev\Domain\Service\ContactUsService;
use Dev\Domain\Service\ServiceRequestService;
use Dev\Domain\Service\TransactionService;
use Dev\Domain\Service\UserService;
use Dev\Domain\Service\DoctorQuestionService;

class HomeController extends Controller
{
    /**
     * @var ServiceRequestService $serviceRequestService
     */
    private $serviceRequestService;

    /**
     * @var UserService $userService
     */
    private $userService;

    /**
     * @var ContactUsService $contactUsService
     */
    private $contactUsService;

    /**
     * @var DoctorQuestionService $userVehicleService
     */
    private $userVehicleService;

    /**
     * @var TransactionService $transactionService
     */
    private $transactionService;

    /**
     * Create a new controller instance.
     *
     * HomeController constructor.
     * @param ServiceRequestService $serviceRequestService
     * @param UserService $userService
     * @param ContactUsService $contactUsService
     * @param DoctorQuestionService $userVehicleService
     * @param TransactionService $transactionService
     */
    public function __construct(
        ServiceRequestService $serviceRequestService,
        UserService  $userService,
        ContactUsService $contactUsService,
        DoctorQuestionService  $userVehicleService,
        TransactionService $transactionService
    ) {
        // $this->middleware('auth');
        $this->serviceRequestService = $serviceRequestService;
        $this->userService = $userService;
        $this->contactUsService = $contactUsService;
        $this->userVehicleService = $userVehicleService;
        $this->transactionService = $transactionService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersStatistics = $this->userService->getStatistics();
        $userVehicleServiceStatistics = $this->userVehicleService->getStatistics();
        $contactUsStatistics = $this->contactUsService->getStatistics();
        $serviceRequestsStatistics = $this->serviceRequestService->getStatistics();
        $transactionStatistics = $this->transactionService->getStatistics();
        $statisticsInfo =[
            'usersStatistics' => $usersStatistics,
            'serviceRequestsStatistics' => $serviceRequestsStatistics,
            'contactUsStatistics' => $contactUsStatistics,
            'userVehicleServiceStatistics' => $userVehicleServiceStatistics,
            'transactionStatistics' => $transactionStatistics,
        ];
        return view('admin.index', $statisticsInfo);
    }

    public function home(){
        return view('landing_page');
    }
}
