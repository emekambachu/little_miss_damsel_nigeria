<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\Contestant\AdminContestantController;
use App\Http\Controllers\Admin\Payment\AdminPaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\Contestant\HomeContestantController;
use App\Http\Controllers\Home\Payment\HomePaymentController;
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

// Contestants
Route::get('/home/contestants', [HomeContestantController::class, 'contestants']);
Route::get('/home/contestants/{slug}/show', [HomeContestantController::class, 'showContestant']);
Route::post('/home/contestants/search', [HomeContestantController::class, 'search']);

// Payments
Route::post('/home/contestants/{slug}/payment/bank', [HomePaymentController::class, 'payWithBank']);
Route::post('/home/contestants/{slug}/payment/online', [HomePaymentController::class, 'payOnline']);
Route::get('/payment/callback', [HomePaymentController::class, 'handleGatewayCallback']);

// Sanctum middleware group
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/authenticated', static function () {
        return true;
    });

    // Realtor Account
    Route::get('/admin/authenticate', static function (Request $request) {
        return $request->user('web');
    });

    // Admin Dashboard
    Route::get('/admin/stats', [AdminAccountController::class, 'stats']);

    // Contestants
    Route::get('/admin/contestants', [AdminContestantController::class, 'index']);
    Route::post('/admin/contestants/store', [AdminContestantController::class, 'store']);
    Route::post('/admin/contestants/search', [AdminContestantController::class, 'search']);
    Route::get('/admin/contestants/{id}/populate', [AdminContestantController::class, 'populate']);
    Route::put('/admin/contestants/{id}/update', [AdminContestantController::class, 'update']);
    Route::delete('/admin/contestants/{id}/delete', [AdminContestantController::class, 'destroy']);

    // Votes
    Route::post('/admin/contestants/{id}/votes/store', [AdminContestantController::class, 'storeVotes']);
    Route::delete('/admin/contestants/{id}/votes/delete', [AdminContestantController::class, 'storeVotes']);

    // Payments
    Route::get('/admin/payments', [AdminPaymentController::class, 'index']);
    Route::post('/admin/payments/search', [AdminPaymentController::class, 'search']);

    Route::get('/admin/logout', [LoginController::class, 'logout']);
});
