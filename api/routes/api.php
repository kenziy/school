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
Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');


Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@user');
    Route::post('user', 'PassportController@create');
    Route::get('user/all', 'PassportController@all');
    // teacher
    Route::get('user/teacher', 'PassportController@teacher');

    // School_year
    Route::get('schoolyear', 'SchoolYearController@get');
    Route::post('schoolyear', 'SchoolYearController@create');
    Route::get('schoolyear/{id}', 'SchoolYearController@getById');
    // Room
    Route::get('room', 'RoomController@get');
    Route::post('room', 'RoomController@create');

    //subjects
    Route::get('subject', 'SubjectController@get');
    Route::post('subject', 'SubjectController@create');

    // teacher
    Route::post('teacher', 'TeacherController@get');
});