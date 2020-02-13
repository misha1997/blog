<?php

use Illuminate\Http\Request;

// Категорії

Route::get('categories',  'CategoriesController@get');
Route::post('categories',  'CategoriesController@create');
Route::post('categories/{id}',  'CategoriesController@edit');
Route::delete('categories/{id}',  'CategoriesController@delete');

// Статті

Route::get('articles',  'ArticleController@get');
Route::get('article/{id}',  'ArticleController@getId');
Route::post('article',  'ArticleController@create');
Route::post('article/{id}',  'ArticleController@edit');
Route::delete('article/{id}',  'ArticleController@delete');
Route::get('category/{name}',  'CategoriesController@getCategoryArticle');
Route::get('tag/{name}',  'ArticleController@getTagArticle');

// Коментарі

Route::post('comments',  'CommentsController@create');

// Теги

Route::get('tags',  'TagController@get');
Route::post('tags',  'TagController@create');
Route::delete('tags/{id}',  'TagController@delete');

// Соціальні мережі

Route::get('socials',  'SocialController@get');
Route::post('social',  'SocialController@create');
Route::post('social/{id}',  'SocialController@edit');
Route::delete('social/{id}',  'SocialController@delete');
