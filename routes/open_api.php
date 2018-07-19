<?php

Route::get("load-post", "PostApiController@loadPosts");    

Route::prefix("post")->group(function () {
    Route::get("/{postId}", "PostApiController@getPost");
    Route::get("/{postId}/load-comment", "CommentApiController@loadComments");
    Route::get("/list/{type}", "PostApiController@postList");
});

Route::prefix("user")->group(function() {
    Route::get("/list/{type}", "UserApiController@userList");
});

Route::prefix("test")->group(function() {
    Route::get("/send-mail", "PostApiController@test");
});