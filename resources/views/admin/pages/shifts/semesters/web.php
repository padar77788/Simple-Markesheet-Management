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
Auth::routes();

Route::group(['namespace'=>'Admin'],function(){
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/department','DepartmentController@index')->name('department');
            Route::get('/create_department','DepartmentController@create')->name('add_department');
            Route::post('/store_department','DepartmentController@store')->name('store_department');
            Route::get('edit_department/{id}/{slug}','DepartmentController@edit')->name('edit_department');
            Route::post('/update_department/{id}/{slug}','DepartmentController@update')->name('update_department');
            Route::get('/delete_department/{id}','DepartmentController@destroy')->name('delete_department');
  //semester route

  Route::get('/semester','DepartmentController@index')->name('semester');
  Route::get('/create_semester','DepartmentController@create')->name('add_semester');
  Route::post('/store_semester','DepartmentController@store')->name('store_semester');
  Route::get('edit_semester/{id}/{slug}','DepartmentController@edit')->name('edit_semester');
  Route::post('/update_semester/{id}/{slug}','DepartmentController@update')->name('update_semester');
  Route::get('/delete_semester/{id}','DepartmentController@destroy')->name('delete_semester');
});
