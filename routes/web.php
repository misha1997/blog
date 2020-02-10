<?php


// Auth::routes();

Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
