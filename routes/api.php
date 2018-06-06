<?php

use Illuminate\Http\Request;

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

 // oauth 2 api implementation
Route::post('login', 'AuthController@login');

Route::prefix("auth")->group(function () {
    Route::post('check/merchant', 'AuthController@checkMerchant');
    Route::post('signup/user', 'AuthController@signup');
    Route::post('signup/merchant', 'AuthController@merchantSignup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

<<<<<<< HEAD


Route::middleware("api")->group(function () {
    Route::get("/merchant", function () {
        return "test";
    });
});
=======
Route::get('language', "Api\LanguageApiController@language");

>>>>>>> 64467faacb27c10139b0f15ba390768823d5181a

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return "abc";
});

