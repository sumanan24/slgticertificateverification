<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('department', 'departmentcontroller@index');
Route::POST('departmentcreate', 'departmentcontroller@store');
Route::get('createdep', 'departmentcontroller@department');
Route::get('dept_delete{id}', 'departmentcontroller@destroy');
Route::get('dept_edit{id}', 'departmentcontroller@edit');
Route::POST('update/{id}','departmentcontroller@update');
Route::get('courses','coursecontroller@index');
Route::get('usercourse','usercoursecontroller@index');
Route::get('course','coursecontroller@course');
Route::get('course','coursecontroller@department');
Route::POST('coursecreate','coursecontroller@store');
Route::get('course_delete{id}', 'coursecontroller@destroy');
Route::get('course_edit{id}', 'coursecontroller@edit');
Route::POST('courseupdate/{id}','coursecontroller@update');
Route::get('student','studentcontroller@index');
Route::get('Getcourse/{id}', 'studentcontroller@Getcourse');
Route::get('Getcourse1/{id}', 'studentcontroller@Getcourse1');
Route::post('studentcreate','studentcontroller@store');
Route::post('excelcreate','studentcontroller@excelstore');
Route::post('viewresult', 'resultcontroller@index');
Route::get('user','usercontroller@index');
Route::get('usercreate','usercontroller@create');
Route::post('adduser','usercontroller@store');
Route::get('newstudent', 'studentcontroller@student');
Route::get('students{id}','studentcontroller@edit');
Route::POST('studentupdate/{id}','studentcontroller@update');
Route::get('studentdelete{id}', 'studentcontroller@destroy');
Route::get('reset','resetcontroller@index');
Route::get('user_delete{id}', 'usercontroller@destroy');
Route::POST('profileupdate/{id}','usercontroller@update');
