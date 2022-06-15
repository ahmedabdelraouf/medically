<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CarBrandController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\DoctorQuestionsController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ServiceRequestContactProviderController;
use App\Http\Controllers\API\ServiceRequestController;
use App\Http\Controllers\API\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('storecity', [CityController::class, 'store']);

Route::group(['middleware' => 'setlocale'], function () {

    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/forgetPassword', [AuthController::class, 'forgetPassword']);
    Route::post('/delete-user', [AuthController::class, 'deleteUser']);//Todo should be removed on production


    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'auth', 'middleware' => 'ApiTokenCheckMiddleware'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user-types', [AuthController::class, 'userTypes']);
        Route::post('/add-assistant', [AuthController::class, 'register']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile'])->middleware('ApiTokenCheckMiddleware');
        Route::post('/edit-user-profile', [AuthController::class, 'editUserProfile']);
        Route::post('/update-identity2', [AuthController::class, 'updateUserIdentity']);
        Route::post('/update-identity', [AuthController::class, 'updateIdentity']);
        Route::post('/update-fcmtoken', [AuthController::class, 'updateFcmToken']);
    });
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'getAllSettings']);
        Route::get('/get-commission', [SettingsController::class, 'getCommission']);
        Route::get('/about-us', [SettingsController::class, 'getAboutUs']);
    });

    Route::group(['prefix' => 'doctor-questions'], function () {
//        Route::apiResource('DoctorQuestions', DoctorQuestionsController::class);
        Route::get('/', [DoctorQuestionsController::class, 'index']);
        Route::get('/types', [DoctorQuestionsController::class, 'types']);
        Route::post('/store', [DoctorQuestionsController::class, 'store']);
    });

    Route::group(['prefix' => 'patients'], function () {
//        Route::apiResource('DoctorQuestions', DoctorQuestionsController::class);
        Route::get('/', [PatientController::class, 'index']);
        Route::get('/types', [PatientController::class, 'types']);
        Route::post('/store', [PatientController::class, 'store']);
    });

    Route::post('contact-us', [ContactUsController::class, 'store']);
    Route::get('get-terms-and-conditions', [SettingsController::class, 'getTermsAndConditions']);
    Route::get('privacy', [SettingsController::class, 'getPrivacyPolicy']);

});
