<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarBrandController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DoctorCategoryController;
use App\Http\Controllers\PhoneAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('phone-auth', [PhoneAuthController::class, 'index']);
Route::get('/firebase-auth', [\App\Http\Controllers\FirebaseAuthController::class, 'index']);



Route::get('/', [HomeController::class, 'home'])->name('land.page');
Route::get('privacy-policy', [SettingController::class, 'privacy'])->name('settings.privacy');
Route::get('/terms', [SettingController::class, 'terms'])->name('settings.terms');
Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact.store');

Route::group(['middleware' => 'setlocale'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Auth::routes();
    Route::resource('admins', AdminController::class);
    Route::resource('contact_us', ContactUsController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('users', UserController::class);
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('user/profile/update/{user}', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('users/changelang/{lang}', [UserController::class, 'changeLang'])->name('users.changelang');
    Route::get('user_services/{user_service}/show', [UserController::class , 'showUserService'])->name('user_services.show');
    //setting
    Route::get('/settings', [SettingController::class, 'showSettings'])->name('show.settings');
    Route::post('/settings', [SettingController::class, 'updateSettings'])->name('update.settings');
    Route::get('/settings/terms', [SettingController::class, 'terms'])->name('settings.terms2');

    Route::resource('cities', CityController::class);
    Route::resource('countries', CountryController::class);
});

