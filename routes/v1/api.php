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

        // //User registration
        // Route::post('/register', [AuthController::class, 'register']);

        //this use for display profile
        Route::get('/me', [AuthController::class, 'me']);
        Route::put('/user/{user}', [AuthController::class, 'update']);

        //Pest
        Route::get('/pest', [PestController::class, 'index']);

        //Vegetable
        Route::get('/vegetable', [VegetableController::class, 'index']);
        Route::get('/vegetable/{vegetable}', [VegetableController::class, 'show']);

        //Schedule
        Route::get('/schedules', [ScheduleController::class, 'index']);
        Route::post('/schedules', [ScheduleController::class, 'store']);
        Route::put('/schedule/{schedule}/update', [ScheduleController::class, 'update']);
        Route::get('/schedule/{schedule}', [ScheduleController::class, 'show']);

        //Product
        Route::get('/product', [ProductController::class, 'index']);
        Route::get('/product/{product}', [ProductController::class, 'show']);
        Route::post('/product', [ProductController::class, 'store']);
        Route::put('/product/{product}', [ProductController::class, 'update']);



    });


