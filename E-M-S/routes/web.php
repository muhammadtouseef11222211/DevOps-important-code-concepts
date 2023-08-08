<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/index', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});
Route::view('/about','about')->name('about');
Route::view('/index','index')->name('index');
Route::view('/contact','contact')->name('contact');
Route::view('/portfolio','portfolio')->name('portfolio');
Route::view('/service','service')->name('service');
Route::view('/signup','signup')->name('signup');
Route::view('/login','login')->name('login');

