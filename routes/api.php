<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\CompanyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('user')->group(function () {
  
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/sign-in', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::post('/recover-password', [NewPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [NewPasswordController::class, 'reset']);



    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/companies', [CompanyController::class, 'getCompanies']);
        Route::post('/companies', [CompanyController::class, 'addCompanies']);
});
});

  




