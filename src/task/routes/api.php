<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rate', [\App\Http\Controllers\Api\RateController::class, 'rate'])->name('rate.rate');
Route::post('/subscribe', [\App\Http\Controllers\Api\SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
Route::post('/sendEmails', [\App\Http\Controllers\Api\SubscriptionController::class, 'sendEmails'])->name('subscription.sendEmails');
