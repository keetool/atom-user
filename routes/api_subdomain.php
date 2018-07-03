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
        // vote = 'up' or 'down'
        Route::post("/{postId}/vote/{vote}", "Api\PostApiController@vote");

        // Api comment
        Route::prefix("/{postId}/comment")->group(function () {
            Route::get("/", "Api\CommentApiController@getComments");
            Route::post("/", "Api\CommentApiController@createComment");
            Route::put("/{commentId}", "Api\CommentApiController@updateComment");
            Route::delete("/{commentId}", "Api\CommentApiController@deleteComment");
        });

        Route::get("/{postId}/load-comment", "Api\CommentApiController@loadComments");
    });

    Route::prefix("comment")->group(function () {
        Route::post("/{commentId}/vote/{vote}", "Api\CommentApiController@vote");
    });

    Route::prefix("dashboard")->group(function () {
        Route::get("/", "Api\DashboardApiController@newUserCount");
    });

    Route::prefix("image")->group(function () {
        Route::post("/", "Api\ImageApiController@createImage");
    });

});

// Route::prefix("comment")->group(function() {
//     Route::post("/{commentId}/vote/{vote}", "Api\CommentApiController@vote");
//     Route::get("/{commentId}/load-more", "Api\CommentApiController@loadComments");
// });
// Route::prefix("post")->group(function() {
//     Route::get("/{postId}/load-comment", "Api\CommentApiController@loadComments");
// });
    