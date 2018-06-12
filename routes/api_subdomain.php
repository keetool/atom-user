<?php

Route::prefix("auth")->group(function () {
    Route::post('signin', 'AuthController@signin');
    Route::post("token/refresh", 'AuthController@refreshToken');
});

Route::prefix("user")->middleware("auth:api")->group(function() {
    Route::get("/", "Api\UserApiController@user");
});
