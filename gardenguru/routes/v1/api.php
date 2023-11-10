<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\PestController;
use App\Http\Controllers\v1\ProductController;
use App\Http\Controllers\v1\ScheduleController;
use App\Http\Controllers\v1\VegetableController;
use App\Http\Resources\v1\VegetableResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {

        //this use for display profile
        Route::get('/me', [AuthController::class, 'me']);

        //Pest
        Route::get('/pest', [PestController::class, 'index']);

        //Vegetable
        Route::get('/vegetable', [VegetableController::class, 'index']);
        Route::get('/vegetable/{vegetable}', [VegetableController::class, 'show']);

        //Schedule
        Route::get('/schedule', [ScheduleController::class, 'index']);
        Route::post('/schedule', [ScheduleController::class, 'store']);
        Route::put('/schedule/{schedule}', [ScheduleController::class, 'update']);

        //Product
        Route::get('/product', [ProductController::class, 'index']);


        // Route::get('/firstaidstep', [FirstAidStepController::class, 'index']);
        // Route::get('/medicationreminder', [MedicationReminderController::class, 'index']);
        // // Route::get('/patient', [PatientController::class, 'index']);
        // Route::get('/emergencycontact', [EmergencyContactController::class, 'index']);
        // Route::get('/tracking', [TrackingController::class, 'index']);
        // // Route::get('/allergen', [AllergenController::class, 'index']);

    });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
