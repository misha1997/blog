<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');
});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
