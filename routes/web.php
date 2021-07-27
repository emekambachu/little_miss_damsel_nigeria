<?php

use App\Http\Controllers\GithubDeploymentController;
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

Route::get('/', static function () {
    return view('home');
});

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


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

// Dashboard Page
Route::get('admin/dashboard', 'AdminController@index')->name('admin-dashboard');

// Admin Application Controller
Route::resource('admin/applications', 'ApplicationController');

// Admin Contestant Controller
Route::resource('admin/contestants', 'Admin\AdminContestantController');
Route::get('admin/search-contestants', ['uses' => 'Admin\AdminContestantController@search']);
Route::get('admin/payments', 'Admin\AdminContestantController@payments');
Route::post('admin/payments/approve/{id}', ['uses' => 'Admin\AdminContestantController@approve']);
Route::get('admin/search-payments', 'Admin\AdminContestantController@searchPayments');

Route::get('admin/delete-contestants', 'Admin\AdminContestantController@deleteContestants');

// Fund User Form
Route::post('/admin/applications/approve/{id}', ['uses' => 'ApplicationController@approve']);

// Paid Applications
Route::get('applications/paid-applications', 'ApplicationController@paidApplications')->name('paid-applications');

// Pending Applications
Route::get('applications/pending-applications', 'ApplicationController@pendingApplications')->name('pending-applications');

Route::get('registration-complete', static function () {
    return view('registration-complete');
});

//Github Deployment
Route::post('github/deploy', [GithubDeploymentController::class, 'deploy']);
