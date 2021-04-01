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


Route::get('tests', function () {
    return view('welcome');
});




Route::get('test', function () {
    event(new App\Events\MyEvent('Someone'));
    return "Event has been sent!";
});
// Route::get('/{any}', function(){
//     return view('welcome');
// })->where('any', '.*');

// Route::get('web/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

Route::namespace('Frontend')->middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('/category/product/{slug}','CategoryController@show')->name('frontend.category.show');
    // cart
    Route::get('cart/{productId}','CartController@store')->name('frontend.cart.store');
    Route::get('/all/cart','CartController@all')->name('frontend.cart.all');
    Route::get('/deleted/cart/{productId}','CartController@destroy')->name('frontend.cart.destroy');
    Route::get('/deleted_all/cart','CartController@deleted_all')->name('frontend.cart.deleted_all');
    Route::post('/update/cart/{productId}','CartController@update')->name('frontend.cart.update');
    // order
    Route::get('/all/order','OrderController@order')->name('fontend.cart.order');
    Route::post('/order/cart/checkout','CartController@checkout')->name('checkout');
    Route::get('test/code','CartController@check');
    Route::get('test/codes','CartController@checks');
    //users
    Route::get('/user/login','AuthController@form')->name('login');
    Route::post('register/form/user','AuthController@register')->name('form.register.user');
    Route::post('login/form/user','AuthController@login')->name('login.form.user');
    Route::get('rand/form','AuthController@rand')->name('rand.form.user');
    Route::post('/user/login','AuthController@login')->name('login');
    Route::post('/user/register','AuthController@register')->name('register');
    Route::get('/user/logout','AuthController@logout')->name('logout');



});

//   Route::get('/test/gmail',function(){
//         return view('frontends.users.mail_register') ;
//   });











Route::get('/home', 'HomeController@index')->name('home');
