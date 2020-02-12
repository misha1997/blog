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

// Коментарі

Route::post('comments',  'CommentsController@create');
