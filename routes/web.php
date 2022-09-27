<?php

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

// guest routes

Route::middleware(["guest"])->group(function () {
    Route::post('post-registration', "App\Http\Controllers\RegistrationController@postRegistration")->name('register.post');
    Route::get('/login', "App\Http\Controllers\SessionsController@create")->name('login');
    Route::post('/login/post', "App\Http\Controllers\SessionsController@store")->name('login.post');
    Route::get('registration', "App\Http\Controllers\RegistrationController@registration")->name('register');
});

// auth routes
Route::middleware(["auth"])->group(function () {
    Route::get('logout', "App\Http\Controllers\SessionsController@destroy")->name('logout');
    Route::get('/', "App\Http\Controllers\TodoController@index");
    Route::post('store-data', "App\Http\Controllers\TodoController@store");
    Route::get('create', "App\Http\Controllers\TodoController@create");
    Route::get('details/{todo}', "App\Http\Controllers\TodoController@details");
    Route::get('edit/{todo}', "App\Http\Controllers\TodoController@edit");
    Route::post('update/{todo}', "App\Http\Controllers\TodoController@update");
    Route::get('delete/{todo}', "App\Http\Controllers\TodoController@delete");
});
