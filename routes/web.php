<?php

use App\Http\Controllers\GithubDeploymentController;
use App\Http\Controllers\Home\Contestant\HomeContestantController;
use App\Http\Controllers\Home\Payment\HomePaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/', static function () {
//    return view('contestants.index');
//});

//Route::get('fashion-exhibition', static function () {
//    return view('fashion-exhibition');
//});
//
//Route::get('registration', static function () {
//    return view('registration');
//});
//
//Route::get('contact', static function () {
//    return view('contact');
//});
//
//Route::post('submit-contact', 'WebsiteController@contactForm');

// Contestants
Route::get('/', [HomeContestantController::class, 'index'])->name('contestant.index');
Route::get('/contestant/{slug}', [HomeContestantController::class, 'show'])->name('contestant.show');

// Paystack Payments
Route::get('/payments/contestant/{slug}/paystack', [HomePaymentController::class, 'payStackForm']);
Route::post('/pay', [HomePaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [HomePaymentController::class, 'handleGatewayCallback']);
Route::get('/payments/complete', static function () {
    return view('contestants.voting-complete');
})->name('payments.complete');

// Admin Account SPA
Route::get('/admin/{any}', static function () {
    return view('admin.index');
})->where('any', '.*');

//Github Deployment
Route::post('/github/deploy', [GithubDeploymentController::class, 'deploy']);

// Cache clearing Routes
//Clear route cache:
Route::get('/route-cache', static function () {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear route cache:
Route::get('/route-clear', static function () {
    $exitCode = Artisan::call('route:clear');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', static function () {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
//Clear config cache:
Route::get('/config-clear', static function () {
    $exitCode = Artisan::call('config:clear');
    return 'Config cache cleared';
});

// Clear application cache:
Route::get('/clear-cache', static function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', static function () {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
