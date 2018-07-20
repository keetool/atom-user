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
        Route::get("/", "ClientApi\UserApiController@user");
        Route::put("/", "ClientApi\UserApiController@editInfo");
        Route::get("/{userId}/profile", "ClientApi\UserApiController@profile");
        Route::get("/{userId}/post", "ClientApi\UserApiController@userPost");
        Route::prefix("/notification")->group(function () {
            Route::prefix("merchant")->group(function () {
                Route::get("/", "ClientApi\NotificationApiController@getNotificationByMerchant");
                Route::get("/after", "ClientApi\NotificationApiController@getNotificationsMerchantAfter");
            });
            Route::get("/after/{notificationId?}", "ClientApi\NotificationApiController@getNotificationsAfter");
            Route::put("/{notificationId}/click", "ClientApi\NotificationApiController@clickNotification");
            Route::put("/{notificationId}/seen", "ClientApi\NotificationApiController@seenNotification");
            Route::get("/", "ClientApi\NotificationApiController@getNotifications");
        });

        Route::get("/list/{type}", "ClientApi\UserApiController@userList");

        Route::prefix("/bookmark")->group(function () {
            Route::post("/post/{postId}", "Api\BookmarkApiController@createBookmark");
            Route::delete("/post/{postId}", "Api\BookmarkApiController@deleteBookmark");
            Route::get("/", "Api\BookmarkApiController@getAllBookmarks");
            Route::get("/after/{bookmarkId?}", "Api\BookmarkApiController@getAllBookmarks");
            Route::get("/by-sub-domain", "Api\BookmarkApiController@getBookmarksBySubDomain");
            Route::get("/by-sub-domain/after/{bookmarkId?}", "Api\BookmarkApiController@getBookmarksBySubDomainAfter");
        });

        Route::put("join-merchant", "ClientApi\ClientApiController@joinMerchant");

    });

    Route::prefix("log")->group(function () {
        Route::get("/", "ClientApi\LogApiController@myLogs");
    });

    Route::prefix("post")->group(function () {
        Route::post("/", "ClientApi\PostApiController@createPost");
        Route::put("/{postId}", "ClientApi\PostApiController@updatePost");
        Route::get('/', "ClientApi\PostApiController@getPosts");
        Route::get("/{postId}", "ClientApi\PostApiController@getPost");
        Route::put("/{postId}/hide", "ClientApi\PostApiController@hidePost");
        Route::delete("/{postId}", "ClientApi\PostApiController@deletePost");
        // vote = 'up' or 'down'
        Route::post("/{postId}/vote/{vote}", "ClientApi\PostApiController@vote");

        // Api comment
        Route::prefix("/{postId}/comment")->group(function () {
            Route::get("/", "ClientApi\CommentApiController@getComments");
            Route::post("/", "ClientApi\CommentApiController@createComment");
            Route::put("/{commentId}", "ClientApi\CommentApiController@updateComment");
            Route::delete("/{commentId}", "ClientApi\CommentApiController@deleteComment");
        });

        Route::get("/{postId}/load-comment", "ClientApi\CommentApiController@loadComments");

        Route::get("/list/{type}", "ClientApi\PostApiController@postList");

    });

    Route::prefix("comment")->group(function () {
        Route::post("/{commentId}/vote/{vote}", "ClientApi\CommentApiController@vote");
        Route::put("/{commentId}/hide", "ClientApi\CommentApiController@hideComment");
    });

    Route::prefix("image")->group(function () {
        Route::post("/", "ClientApi\ImageApiController@createImage");
    });

    Route::get("load-post", "ClientApi\PostApiController@loadPosts");
    Route::get("search", "ClientApi\ClientApiController@search");

});

// Route::prefix("comment")->group(function () {
//     Route::post("/{commentId}/vote/{vote}", "ClientApi\CommentApiController@vote");
// });