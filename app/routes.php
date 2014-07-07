<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * Route login page
 */
Route::get('login', 'AccountController@showLogin');
Route::post('login', 'AccountController@login');

/**
 * Route register page
 */
Route::get('register', 'AccountController@showRegister');
Route::post('register', 'AccountController@register');

/**
 * Route home page
 */
Route::get('home', 'HomeController@home');

/**
 * Route profile page
 */
Route::get('u/{username}', 'ProfileController@displayProfilePage');

/**
 * Route tutorial pages
 */
Route::get('add-tutorial', 'TutorialController@add');
Route::post('add-tutorial', 'TutorialController@addTutorial');
Route::get('tutorial/{id}', 'TutorialController@index');

/**
 * Route setting page
 */
Route::get('settings', 'AccountController@showSettings');
Route::post('settings/name', 'AccountController@updateName');
Route::post('settings/email', 'AccountController@updateEmail');
Route::post('settings/password', 'AccountController@updatePassword');

/**
 * Route logout
 */
Route::get('logout', 'AccountController@logout');

View::composer('templates.loggedIn', 'UserComposer');