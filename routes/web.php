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

Route::get('about', static function () {
    return view('about');
});

Route::get('registration', static function () {
    return view('registration');
});

Route::get('contact', static function () {
    return view('contact');
});

Auth::routes();

