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

Route::get('/', 'NoteController@index')->middleware('auth');
Route::post('/notes/{note}', 'NoteController@update')->name('notes.update')->middleware('auth');
Route::resource('notes', 'NoteController')->middleware('auth');
Route::get('/notes/delete/{note}', 'NoteController@delete')->name('notes.delete')->middleware('auth');
Route::get('/file/download/{id}', 'FileController@downloadFile')->name('file.download');
Route::post('/search', 'SearchController@search')->name('search')->middleware('auth');
Route::get('/make/public/{id}', 'NoteController@makePublic')->name('make.public')->middleware('auth');
Route::get('/make/private/{id}', 'NoteController@makePrivate')->name('make.private')->middleware('auth');
Route::get('/show/public/{id}', 'NoteController@showPublic')->name('show.public');
Route::get('/home', 'HomeController@index')->name('home');
