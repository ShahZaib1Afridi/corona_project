<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category', 'CategoriesController');

    Route::resource('/post', 'PostsController');

// route create for posts
    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as'   => 'post.trashed'
    ]);

    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as'   => 'post.kill'
    ]);
    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'post.restore'
    ]);

// route create for posts

});
