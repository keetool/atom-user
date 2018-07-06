<?php

use Illuminate\Support\Facades\Request;

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

// Route::get('/login', "HomeController@index")->name('login');

$webRoutes = function () {
    Route::get('/', "HomeController@index");
    Route::get("/blogs", "HomeController@blogs");
    Route::get("/free-trial", "HomeController@register");
    Route::get("/check-merchant", "HomeController@checkMerchant");
    Route::get('/signin', "SocialController@index")->name('login');
    Route::get('/dummy', 'HomeController@dummy');
    Route::get('/dummy2', 'HomeController@dummy2');
    Route::get('/access-dashboard', 'HomeController@accessDashboard');
};

$manageRoutes = function () {
    Route::get("/{path?}", "ManageController@index")->where('path', ".*");
};

$socialRoutes = function () {
    Route::get("/{path?}", "SocialController@index")->where('path', ".*");
};

Route::domain(config("app.domain"))
    ->group(
        $webRoutes
    );

Route::domain("{client}." . config("app.domain"))
    ->prefix("manage")
    ->middleware(['getSubDomain'])->group(
        $manageRoutes
    );

Route::domain("{client}." . config("app.domain"))
    ->middleware(['getSubDomain'])->group(
        $socialRoutes
    );



