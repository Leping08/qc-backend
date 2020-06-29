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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** @see MeasurementsController::index() */
Route::get('/measurements', 'Api\MeasurementsController@show');

/** @see MeasurementsController::index() */
Route::get('/instruments', 'Api\InstrumentsController@show');