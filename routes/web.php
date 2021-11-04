<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Auth::routes();
Route::get('/all-students', 'StudentController@index')->name('all_students');
Route::get('/take-attendance', 'AttendanceController@index')->name('take_attendance');
Route::post('/give-attendance', 'AttendanceController@createAttendance')->name('give_attendance');
// Route::get('/home', 'HomeController@index')->name('home');
