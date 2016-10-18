<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('new_issue','IssuesController@create');
Route::post('new_issue','IssuesController@store');


//User Authentication Routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//User Registration Routes
Route::get('auth/register', 'Auth\AuthController@getReigster');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Displaying user's uploaded issues
Route::get('my_issues', 'IssuesController@userIssues');
Route::get('issues/{issue_id}', 'IssuesController@show');