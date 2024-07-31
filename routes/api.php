<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/test', function (Request $request) {
        return "test";
    });
    Route::resource('payments', PaymentController::class)->only(['store']);
});


Route::post('/get-token', [ApiTokenController::class, 'createToken']);
