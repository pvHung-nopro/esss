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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::namespace('Api')->prefix('cart')->group(function() {
//   Route::post('checkout','CartController@checkout')->name('api.checkout');
// });

Route::namespace('Api')->middleware(['api'])->prefix('v1')->group(function ($router) {

    Route::post('verfication_code','AuthController@verfication_code');
    Route::post('register','AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('checkToken', 'AuthController@checkToken');
    Route::delete('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('admin','AdminController@index');


});


