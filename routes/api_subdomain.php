<?php

Route::prefix("auth")->group(function () {
    Route::post('signin', 'AuthController@signin');
    Route::post("token/refresh", 'AuthController@refreshToken');
    Route::post('facebook/token-signin', 'AuthController@facebookTokenSignin');
    Route::post('google/token-signin', 'AuthController@googleTokenSignin');

    Route::get('test', "AuthController@test");
});

Route::middleware("auth:api")->group(function () {
    Route::prefix("user")->group(function () {
        Route::get("/", "Api\UserApiController@user");
    });
    Route::prefix("log")->group(function () {
        Route::get("/", "Api\LogApiController@myLogs");
    });

    Route::prefix("post")->group(function () {
        Route::post("/", "Api\PostApiController@createPost");
        Route::put("/{postId}", "Api\PostApiController@updatePost");
        Route::get('/', "Api\PostApiController@getPosts");
        Route::delete("/{postId}", "Api\PostApiController@deletePost");
    });

    Route::prefix("dashboard")->group(function () {
        Route::get("/new-user", "Api\DashboardApiController@newUserCount");
    });
});

// Route::prefix("dashboard")->group(function () {
//     Route::get("/new-user", "Api\DashboardApiController@newUserCount");
// });

    