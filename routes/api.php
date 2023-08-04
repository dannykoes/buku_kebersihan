<?php

use App\Http\Controllers\API\ProfileApiController;
use App\Http\Controllers\API\TodoApiController;
use App\Http\Controllers\API\UserApiController;
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

Route::prefix('v1')->group(function () {
    Route::post('/login', [UserApiController::class, 'doLogin']);
    // Route::post('/register', [UserApiController::class, 'doRegister']);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Route::post('/login', [UserApiController::class, 'doLogin']);
    Route::get('/logout', [UserApiController::class, 'doLogout']);
    Route::get('/auth-check', [UserApiController::class, 'doAuthCheck']);
    Route::get('/gettodo', [TodoApiController::class, 'getTodo']);
    Route::post('/settodo', [TodoApiController::class, 'setTodo']);
    Route::post('/simpanprofile', [ProfileApiController::class, 'simpanprofile']);
    Route::get('/getDataprofile', [ProfileApiController::class, 'getDataprofile']);
});
