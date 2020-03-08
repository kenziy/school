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


Route::group(['middleware' => ['auth:api']], function () {
    Route::get('user', 'PassportController@user');
    Route::post('user', 'PassportController@create');
    Route::get('user/all', 'PassportController@all');
    // teacher
    Route::get('user/teacher', 'PassportController@teacher');

    // School_year
    Route::get('schoolyear', 'SchoolYearController@get');
    Route::post('schoolyear', 'SchoolYearController@create');
    Route::get('schoolyear/{id}', 'SchoolYearController@getById');
    Route::get('schoolyear/{id}/queue', 'SchoolYearController@queue');
    // Room
    Route::get('room', 'RoomController@get');
    Route::post('room', 'RoomController@create');

    // level
    Route::post('level', 'LevelController@create');

    //subjects
    Route::get('subject', 'SubjectController@get');
    Route::post('subject', 'SubjectController@create');

    // teacher
    Route::post('teacher', 'TeacherController@create');

    // Teacher dashboard
    Route::prefix('teacher')->group(function(){
        Route::get('dashboard', 'TeacherController@dashboard');
    });

    Route::prefix('parent')->group(function(){
        Route::get('student', 'StudentController@get');
        Route::post('student', 'StudentController@create');
        Route::post('enroll', 'StudentController@enroll');
    });
});

Route::get('enrollment/open', 'SchoolYearController@open');

Route::get('level', 'LevelController@get');
Route::get('enrollment/{token}', 'EnrollmentController@getByToken');
Route::post('enroll', 'EnrollmentController@enroll');
