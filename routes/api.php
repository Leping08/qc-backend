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

/** @see RegisterController::register() */
Route::post('/register', 'Auth\RegisterController@register');

/** @see MeasurementsController::index() */
Route::get('/measurements', 'Api\MeasurementsController@index');
/** @see MeasurementsController::show() */
Route::get('/measurements/{measurement}', 'Api\MeasurementsController@show');


/** @see InstrumentsController::index() */
Route::get('/instruments', 'Api\InstrumentsController@index');
/** @see InstrumentsController::show() */
Route::get('/instruments/{instrument}', 'Api\InstrumentsController@show');


/** @see ReagentsController::index() */
Route::get('/reagents', 'Api\ReagentsController@index');
/** @see ReagentsController::show() */
Route::get('/reagents/{reagent}', 'Api\ReagentsController@show');


/** @see LotNumberController::index() */
Route::get('/lot-numbers', 'Api\LotNumberController@index');
/** @see LotNumberController::show() */
Route::get('/lot-numbers/{lotNumber}', 'Api\LotNumberController@show');
