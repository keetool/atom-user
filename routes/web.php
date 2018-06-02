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

Route::get('/', "HomeController@index");
Route::get("/free-trial", "HomeController@register");

Route::group(['prefix' => 'api/v1', 'middleware' => []], function(){
    Route::get('ooppsoie', 'HomeController@test01');
});

$manageRoutes = function () {
    Route::get("/{path?}", "ManageController@index")->where('path', ".*");
};
Route::domain("{client}." . config("app.domain"))
    ->prefix("manage")
    ->middleware(['getSubDomain'])->group(
        $manageRoutes
    );
