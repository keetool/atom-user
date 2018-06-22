<?php

Route::prefix("auth")->group(function () {
    Route::post('signin', 'AuthController@signin');
    Route::post("token/refresh", 'AuthController@refreshToken');
    Route::get('facebook/token-signin', 'AuthController@asd');
    Route::get('/asd', 'AuthController@asd');
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

