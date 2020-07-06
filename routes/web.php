<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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


/** @see CustomAuthController::login() */
Route::post('/login', 'Auth\CustomAuthController@login');

/** @see CustomAuthController::logout() */
Route::get('/logout', 'Auth\CustomAuthController@logout');

/** @see \App\Http\Controllers\ImportController::index */
//Route::get('/import', 'ImportController@index');
