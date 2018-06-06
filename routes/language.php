<?php

/**
 * Begin routes edit languages
 */
Route::prefix("language")->group(function() {
    Route::get('list', 'LanguageController@listLanguages');
    Route::get('add', 'LanguageController@getAddLanguage');
    Route::post('/', 'LanguageController@postAddLanguage');
    Route::get("/{id}", 'LanguageController@getLanguageDetail');

    Route::get('/{id}/edit','LanguageController@getEditLanguage');
    Route::get("/{lang_id}/keyword","LanguageController@getKeywordAdd");
    Route::get("/{lang_id}/keyword/add","LanguageController@getKeywordAdd");
    Route::get("/{lang_id}/keyword/{keyword_id}","LanguageController@getKeywordEdit");
    Route::post("/{lang_id}/keyword","LanguageController@postKeyword");

    Route::get("/keyword/add", "LanguageController@getKeywordAddOnly");
    Route::get("/keyword/{id}/edit", "LanguageController@getKeywordEditOnly");
    Route::post("/keyword", "LanguageController@postAddKeyword");
});
