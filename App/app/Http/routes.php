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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');

Route::get('passwordreset/{id}/{token}', ['as' => 'reminders.edit', 'uses' => 'ReminderController@edit']);
Route::post('passwordreset/{id}/{token}', ['as' => 'reminders.update', 'uses' => 'ReminderController@update']);
Route::get('passwordreset', 'ReminderController@create');
Route::post('passwordreset', 'ReminderController@store');
