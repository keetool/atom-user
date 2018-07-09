<?php

Route::get("load-post", "PostApiController@loadPosts");    

Route::prefix("post")->group(function () {
    Route::get("/{postId}", "PostApiController@getPost");
    Route::get("/{postId}/load-comment", "CommentApiController@loadComments");
});