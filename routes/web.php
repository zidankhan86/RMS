<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\frontend\BloodRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AuthController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */


//auth
Route::get('/registration', [RegisterController::class, 'registration'])->name('register.page');
Route::post('/registration/Store', [RegistrationController::class, 'registrationStore'])->name('register.store');


// Route::get('/bood/request-form',[BloodRequestController::class,'index'])->name('blood.request');
// Route::post('/bood/request-store',[BloodRequestController::class,'store'])->name('blood.store');

//Blood Group and Home
Route::get('/', function () {

    return view('frontend.index');
});



Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::get('forbidden', function () {
        return view('error.forbidden');
    })->name('forbidden');

    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/change-password/{id}', [App\Http\Controllers\Auth\UpdatePasswordController::class, 'updatePassword'])->name('change-password');
        // Route::group(['middleware' => ['auth', 'check_user:1'], 'prefix' => 'admin', 'as' => 'admin.'], function ()
        Route::group(['middleware' => ['auth', 'check_user:1'], 'as' => 'admin.'], function () {
            Route::resource('manage-donor', \App\Http\Controllers\admin\DonorController::class);
            Route::resource('manage-patient', \App\Http\Controllers\admin\PatientController::class);
            Route::post('donorstatus/update/{slug}', [StatusController::class, 'donorStatus'])->name('donorStatus.update');
            Route::post('patientstatus/update/{slug}', [StatusController::class, 'patientStatus'])->name('patientStatus.update');
            Route::resource('manage-inv', \App\Http\Controllers\admin\InventoryController::class);
            Route::resource('manage-request', \App\Http\Controllers\admin\BloodRequestController::class);
            Route::get('unit-data/{slug}', [\App\Http\Controllers\admin\BloodRequestController::class, 'showUnits'])->name('showUnits');

            Route::post('create/request/{slug}', function (Request $request, $slug) {
                // Your logic goes here
                $bloodGroup = Patient::where('slug', $slug)->value('blood_group');

                $bloodRequest = new BloodRequest;
                $bloodRequest->patient_slug = $slug;
                $bloodRequest->blood_group = $bloodGroup;
                $bloodRequest->requested_unit = $request->requested_unit;
                $bloodRequest->needed_date = $request->needed_date;
                $bloodRequest->slug = Str::slug(Str::random(10));
                $bloodRequest->save();
                return back()->with('success', 'Request successful Created');

            })->name('create.request');
        });


        Route::group(['middleware' => ['auth', 'check_user:2'], 'prefix' => 'donor', 'as' => 'donor.'], function () {
        });

        Route::group(['middleware' => ['auth', 'check_user:3'], 'prefix' => 'patient', 'as' => 'patient.'], function () {

            Route::resource('blood-request', App\Http\Controllers\BloodRequestController::class);
        });
    });
});
