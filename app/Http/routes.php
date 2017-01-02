<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function(){
	Route::get('/', function () {
	    return view('welcome');
	})->name('home');
	Route::post('/signup',[
		'uses' => 'UserController@postSignUp',
		'as' => 'signup'
	]);

	Route::post('/signin', [
		'uses' => 'UserController@postSignin',
		'as' => 'signin'
	]);

	Route::get('/dashboard',[
		'uses' => 'PostController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);

	Route::post('/createpost',[
		'uses' => 'PostController@postCreatePost',
		'as' =>  'post.create'
	]);

	Route::get('/post-delete', [
		'uses' => 'PostController@getDeletePost',
		'as' => 'post.delete'
		'middleware' => 'auth'
	]);
});
