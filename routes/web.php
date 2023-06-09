<?php

Route::get('/', function () {
    return view('welcome');
});

// authentication
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	// Dashboard
	Route::get('/home', 'HomeController@index')->name('home');


	// Posts

    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
    Route::post('/posts', 'PostsController@store')->name('posts.store');
    Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
    Route::post('/posts/{post}', 'PostsController@update')->name('posts.update');
    Route::get('/posts/{post}/destroy', 'PostsController@destroy')->name('posts.destroy');


	// Comments
	Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
    // store comment
	Route::post('/{post}', 'CommentsController@store')->name('store');
	});

	// Replies
	Route::group(['prefix' => '/replies', 'as' => 'replies.'], function() {
        // store reply
		Route::post('/{comment}', 'RepliesController@store')->name('store');
	});
});
