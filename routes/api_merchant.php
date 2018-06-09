<?php

Route::prefix("auth")->group(function () {
    Route::post('signin', 'AuthController@signin');
});
