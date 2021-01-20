<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\JwtAuthController;
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

Route::group(['middleware' => 'api'], function () {
    Route::post('login', [ApiController::class, 'login']);
    Route::post('register', [ApiController::class, 'register']);
    Route::get('user-info', [ApiController::class, 'getUser']);
    Route::get('logout', [ApiController::class, 'logout']);
    Route::resource('vehicle', '\App\Http\Controllers\VehicleController', ['only' => ['store', 'index', 'show', 'update', 'destroy']]);
});
