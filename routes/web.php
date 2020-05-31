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

Route::get('/', function () {return view('home');})->name('home');

Route::get('/student', 'YmkStudentBranchesController@index')->name('home_student');
Route::get('/student/{branch}', 'YmkStudentGroupsController@index');
Route::get('/student/{branch}/{group}', 'YmkStudentScheduleController@index');
Route::get('/student/{branch}/{group}/{id_week}', 'YmkStudentScheduleController@week')->name('student_schedule_week');

Route::get('/teacher', 'YmkTeacherController@index')->name('home_teacher');
Route::get('/teacher/duty', function () {return view('development');});

Route::get('/teacher/schedule', 'YmkTeacherController@alphabet');
Route::get('/teacher/schedule/{short_name}', 'YmkTeacherScheduleController@index');
Route::get('/teacher/schedule/{short_name}/{id_week}', 'YmkTeacherScheduleController@week')->name('teacher_schedule_week');

Route::get('/ads', function () {return view('development');})->name('home_ads');

Route::get('/logout', 'Auth\LoginController@logout')->name('get_logout');



Route::group(['middleware' => 'auth'], function (){
    //reset password
    Route::get('/reset_password', 'ResetPasswordController@index')->name('reset_password');
    Route::post('/reset_password/update', 'ResetPasswordController@resetPassword')->name('password.update');
//    Journal
    Route::get('/teacher/journal', 'JournalController@index')->name('home_journal');
    Route::get('/teacher/journal/{short_name}/{id_week}', 'JournalController@week')->name('journal_schedule_week');
    Route::post('/teacher/journal/add_link', 'JournalController@add_link')->name('add_link_teacher');
    Route::get('/teacher/journal/answer', 'JournalController@journal_answer')->name('journal_answer');
    Route::get('/teacher/journal/check', 'JournalController@journal_check')->name('journal_check');
//    Admin
    Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/admin', 'AdminController@index')->name('admin_home');
        Route::post('/admin/edit_teacher', 'AdminController@edit_teacher_edit')->name('edit_teacher');
        Route::post('/admin/add_teacher', 'AdminController@edit_teacher_add')->name('add_teacher');

        Route::get('/admin/edit_group', 'AdminController@edit_group')->name('home_group');
        Route::post('/admin/edit_group/edit', 'AdminController@edit_group_edit')->name('edit_group');
        Route::post('/admin/edit_group/add', 'AdminController@edit_group_add')->name('add_group');

        Route::get('/admin/edit_ads', 'AdminController@edit_ads')->name('edit_ads');
    });

});

Auth::routes([
    'confirm' => false,
    'register' => false,
    'reset' => false,
]);

