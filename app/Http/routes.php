<?php


Route::get('/',[
	'uses'	=>	'HomeController@index',
	'as'	=>	'home']);
//--------------------------Authentication Layer----------------------------
/**
 * Sign in
 */
Route::get('/signin',[
	'uses'	=>	'Auth\AuthController@getSignin',
	'as'	=>	'auth.signin']);
Route::post('/signin',[
	'uses'	=>	'Auth\AuthController@postSignin']);

/**
 * Sign up
 */
Route::get('/signup',[
	'uses'	=>	'Auth\AuthController@getSignup',
	'as'	=>	'auth.signup']);
Route::post('/signup',[
	'uses'	=>	'Auth\AuthController@postSignup']);

/**
 * Sign out
 */
Route::get('/signout',[
	'uses'	=>	'Auth\AuthController@getSignout',
	'as'	=>	'auth.signout']);
//----------------------------Admin Layer---------------------------------------
Route::group(['middleware'	=>	'isAdmin'], function(){
	Route::get('/adminpanel',[
		'uses'	=>	'AdminController@getAdminPanel']);
});
