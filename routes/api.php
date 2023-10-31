<?php

use App\Http\Controllers\Api\ApiAuthenticateController;
use App\Http\Controllers\Api\ApiRoomController;
use App\Http\Controllers\Api\ApiStudentController;
use App\Http\Controllers\Api\ApiSubjectController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('students', ApiStudentController::class);
Route::resource('subjects', ApiSubjectController::class);
Route::resource('rooms', ApiRoomController::class);
Route::resource('authenticate', ApiAuthenticateController::class); 