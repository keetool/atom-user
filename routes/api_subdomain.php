<?php

Route::prefix("auth")->group(function () {
    Route::post('signin', 'AuthController@signin');
    Route::post("token/refresh", 'AuthController@refreshToken');
    Route::post('facebook/token-signin', 'AuthController@facebookTokenSignin');

});

Route::middleware("auth:api")->group(function () {
    Route::prefix("user")->group(function() {
        Route::get("/", "Api\UserApiController@user");
    });
    Route::prefix("log")->group(function() {
        Route::get("/", "Api\LogApiController@myLogs");
    });

    Route::prefix("post")->group(function () {
        Route::post("/", "Api\PostApiController@createPost");
    });


});

