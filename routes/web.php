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

Route::get('/', 'TodoController@index')->name('allTodos');
Route::get('daysTodo', 'TodoController@showDays')->name('daysTodos');
Route::get('date/{todo}', 'TodoController@day')->name('day');
Route::get('todo/{todo}', 'TodoController@show')->name('todo');

Route::get('users', 'UsersController@index');
