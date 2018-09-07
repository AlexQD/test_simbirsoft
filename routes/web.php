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

Route::get('/', 'FileController@index')->name('home');
Route::post('/addfile','FileController@store');
Route::get('/uploaded/{hash_user}/{hash_file}','FileController@download');

Route::get('/admin',['uses'=>'FileController@admin', 'as'=>'admin','middleware'=>['web','auth']]);
Route::get('/admin/edit/{id}',['uses'=>'FileController@edit', 'as'=>'adminEdit','middleware'=>['web','auth']]);
Route::get('/admin/delete/{id}',['uses'=>'FileController@destroy', 'as'=>'adminDelete','middleware'=>['web','auth']]);
Route::post('admin/update/',['uses'=>'FileController@update', 'as'=>'adminUpdate','middleware'=>['web','auth']]);


Auth::routes();

