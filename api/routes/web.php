<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('login', function () {
	return view('login', ['active' => 'login']);
});

Route::prefix('admin')->group(function() {
	Route::get('dashboard', function() {
		return view('admin.dashboard', ['active' => 'dashboard']);
	});

	Route::get('subjects', function() {
		return view('admin.subject', ['active' => 'subjects']);
	});

	Route::get('levels', function() {
		return view('admin.level', ['active' => 'levels']);
	});

	Route::get('rooms', function() {
		return view('admin.room', ['active' => 'rooms']);
	});

	Route::get('users', function() {
		return view('admin.user', ['active' => 'users']);
	});

	Route::get('schoolyear/{id}', function($id) {
		return view('admin.schoolYear', ['active' => 'dashboard', 'sy_id' => $id]);
	});

	Route::get('schoolyear/{id}/settings', function($id) {
		return view('admin.setting', ['active' => 'settings', 'sy_id' => $id]);
	});

	Route::get('schoolyear/{id}/enrolled', function($id) {
		return view('admin.enrolled', ['active' => 'enrolled', 'sy_id' => $id]);
	});

	Route::get('schoolyear/{id}/queue', function($id) {
		return view('admin.queue', ['active' => 'queue', 'sy_id' => $id]);
	});

	Route::get('schoolyear/{id}/queue/{student_id}', function($id, $student_id) {
		return view('admin.StudentProfile', ['active' => 'queue', 'sy_id' => $id, 'student_id' => $student_id]);
	});
});

Route::prefix('teacher')->group(function(){
	Route::get('dashboard', function(){
		return view('teacher.dashboard', ['active' => 'dashboard']);
	});
});

Route::prefix('parent')->group(function() {
	Route::get('dashboard', function(){
		return view('parent.dashboard', ['active' => 'dashboard']);
	});

	Route::get('enrollment', function(){
		return view('parent.enrollment', ['active' => 'enrollment']);
	});
});

Route::get('enrollment/{token}', function($token) {
	return view('enrollment', ['token' => $token]);
});

Route::get('register', function() {
	return view('parent.register');
});