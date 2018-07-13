<?php

Route::middleware("auth:api")->group(function () {
    Route::prefix("dashboard")->group(function () {
        Route::get("/{type}", "DashboardApiController@dashBoard");
    });
    Route::prefix("post")->group(function () {
        Route::get("/all", "PostApiController@getPosts");
    });
});
