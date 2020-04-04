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
Route::resource('posts', 'PostController');

Route::get('/', 'TodoController@index')->name('allTodos');
Route::get('daysTodo', 'TodoController@showDays')->name('daysTodos');

Route::get('todo/create', 'TodoController@create')->name('newtodo');

Route::get('todo/editpage/{todo}', 'TodoController@showEdit')->name('showEditTodo');
Route::post('todo/saveEdit', 'TodoController@edit')->name('editTodo');

Route::get('todo/complete/{todo}', 'TodoController@complete')->name('completeTodo');

Route::get('todo/delete/{todo}', 'TodoController@destroy')->name('todo-delete');

Route::get('date/{todo}', 'TodoController@day')->name('day');
Route::get('todo/{todo}', 'TodoController@show')->name('todo');


Route::post('newtodo/store', 'TodoController@store')->name('storeTodo');

Route::get('users', 'UsersController@index');
