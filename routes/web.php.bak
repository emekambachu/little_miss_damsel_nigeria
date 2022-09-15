<?php

use App\Http\Controllers\GithubDeploymentController;
use App\Http\Controllers\Home\Contestant\HomeContestantController;
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

Route::get('fashion-exhibition', static function () {
    return view('fashion-exhibition');
});

Route::get('registration', static function () {
    return view('registration');
});

Route::get('contact', static function () {
    return view('contact');
});

Route::post('submit-contact', 'WebsiteController@contactForm');


Route::get('/', [HomeContestantController::class, 'index'])->name('home.index');

// Contestant Controllers
Route::resource('vote-contestants', 'ContestantController');
Route::get('contestant/{slug}',
    ['as'=>'view-contestant', 'uses'=>'ContestantController@view']);

Route::get('contestants/search', ['uses' => 'ContestantController@search']);

// Bank Payments
Route::post('contestant/bank-payment/{id}', ['uses' => 'ContestantController@bankForm']);

// Paystack Payments
Route::post('contestant/paystack/{id}', ['uses' => 'ContestantController@paystackForm']);
Route::get('contestant/paystack-payment/{slug}', ['uses' => 'ContestantController@paystackPayment']);
Route::get('contestants/voting-complete', 'ContestantController@votingComplete');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

// Admin Account SPA
Route::get('/admin/{any}', static function () {
    return view('admin.index');
})->where('any', '.*');

//Github Deployment
Route::post('/github/deploy', [GithubDeploymentController::class, 'deploy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
