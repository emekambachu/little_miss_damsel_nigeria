<?php

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

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

// Dashboard Page
Route::get('admin/dashboard', 'AdminController@index')->name('admin-dashboard');

// LMDN Admin Dashboard Page
Route::get('lmdn-admin/dashboard', 'AdminController@LMDNdashboard')->name('lmdn-admin-dashboard');


// Manage Applications
// Application Resource Controller
Route::resource('admin/applications', 'ApplicationController');

// Fund User Form
Route::post('/admin/applications/approve/{id}', ['uses' => 'ApplicationController@approve']);

// Paid Applications
Route::get('applications/paid-applications', 'ApplicationController@paidApplications')->name('paid-applications');

// Pending Applications
Route::get('applications/pending-applications', 'ApplicationController@pendingApplications')->name('pending-applications');

Route::get('registration-complete', static function () {
    return view('registration-complete');
});

