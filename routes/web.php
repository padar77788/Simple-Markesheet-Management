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

Route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){
  Route::get('/', 'HomeController@index')->name('admin.home');
  Route::get('/department','DepartmentController@index')->name('department');
  Route::get('/create_department','DepartmentController@create')->name('add_department');
  Route::post('/store_department','DepartmentController@store')->name('store_department');
  Route::get('edit_department/{id}/{slug}','DepartmentController@edit')->name('edit_department');
  Route::post('/update_department/{id}/{slug}','DepartmentController@update')->name('update_department');
  Route::delete('/delete_department/{id}','DepartmentController@destroy')->name('delete_department');
  //semester route

  Route::get('/semester','SemesterController@index')->name('semester');
  Route::get('/create_semester','SemesterController@create')->name('add_semester');
  Route::post('/store_semester','SemesterController@store')->name('store_semester');
  Route::get('edit_semester/{id}/{slug}','SemesterController@edit')->name('edit_semester');
  Route::post('/update_semester/{id}/{slug}','SemesterController@update')->name('update_semester');
  Route::get('/delete_semester/{id}','SemesterController@destroy')->name('delete_semester');
  //subject route
  Route::get('/shift','ShiftController@index')->name('shift');
  Route::get('/create_shift','ShiftController@create')->name('add_shift');
  Route::post('/store_shift','ShiftController@store')->name('store_shift');
  Route::get('edit_shift/{id}/{slug}','ShiftController@edit')->name('edit_shift');
  Route::post('/update_shift/{id}/{slug}','ShiftController@update')->name('update_shift');
  Route::get('/delete_shift/{id}','ShiftController@destroy')->name('delete_shift');
  //subject route
  Route::get('/subject','SubjectController@index')->name('subject');
  Route::get('/create_subject','SubjectController@create')->name('add_subject');
  Route::post('/store_subject','SubjectController@store')->name('store_subject');
  Route::get('edit_subject/{id}/{slug}','SubjectController@edit')->name('edit_subject');
  Route::post('/update_subject/{id}/{slug}','SubjectController@update')->name('update_subject');
  Route::get('/delete_subject/{id}','SubjectController@destroy')->name('delete_subject');

  //result route

  Route::get('/student','StudentController@index')->name('student');
  Route::get('/create_student','StudentController@create')->name('add_student');
  Route::post('/store_student','StudentController@store')->name('store_student');
  Route::get('edit_student/{id}','StudentController@edit')->name('edit_student');
  Route::post('/update_student/{id}','StudentController@update')->name('update_student');
  Route::get('/delete_student/{id}','StudentController@destroy')->name('delete_student');


  //result route

  Route::get('/result','ResultController@index')->name('result');
  Route::get('/create_result','ResultController@create')->name('add_result');
  Route::post('/store_result','ResultController@store')->name('store_result');
  Route::get('edit_result/{id}/','ResultController@edit')->name('edit_result');
  Route::post('/update_result/{id}','ResultController@update')->name('update_result');
  Route::get('/delete_result/{id}','ResultController@destroy')->name('delete_result');
  Route::get('result/view/{id}/{semester}','ResultController@viewResult')->name('viewResult');
  Route::get('result/print/{id}/{semester}','ResultController@printResult')->name('printResult');

  Route::get('result/subject','ResultController@resultSubject')->name('resultSubject');
  Route::get('result/edit_per_subject_result/{id}','ResultController@edit_per_subject_result')->name('edit_per_subject_result');

  Route::get('result/individual_marksheet','ResultController@individual_marksheet')->name('individual_marksheet');
  Route::post('result/view_individual_marksheet','ResultController@view_individual_marksheet')->name('view_individual_marksheet');
  Route::get('setting/create','SettingController@create')->name('setting.create');
  Route::post('setting/store','SettingController@store')->name('setting.store');

});


Auth::routes();

