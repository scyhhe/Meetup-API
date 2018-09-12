<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('meetups' , 'MeetupController', ['except' => [
    'update', 'destroy'
]]);
/* User related routes */
Route::get('users', 'UserController@index');
Route::get('user/{user}', 'UserController@show');
Route::post('user/{user}/meetups/{id}/attend', 'UserController@attend');
Route::post('user/{user}/meetups/{id}/unattend', 'UserController@unattend');


