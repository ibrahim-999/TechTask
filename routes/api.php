<?php

use App\Http\Controllers\API\APIAuthController;
use App\Http\Controllers\API\UserAuthController;
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

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/show', [\App\Http\Controllers\AppointmentController::class, 'show']);
    Route::post('/book', [\App\Http\Controllers\AppointmentController::class, 'book']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
