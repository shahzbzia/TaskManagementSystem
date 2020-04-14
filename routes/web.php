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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {

	Route::get('/todos/{id}/complete', 'ToDosController@markCompleted')->name('todos.markCompleted');

	Route::get('/todos/complete', 'ToDosController@showCompleted')->name('todos.showCompleted');

	Route::get('/todos/{id}/complete/reset', 'ToDosController@markNotCompleted')->name('todos.markNotCompleted');

	Route::get('/todos/trashed', 'ToDosController@showTrashed')->name('todos.showTrashed');

	Route::put('/todos/{id}/restore', 'ToDosController@restore')->name('todos.restore');

	Route::get('/todos/home', 'ToDosController@showHomeTodos')->name('todos.showHomeTodos');

	Route::get('/todos/work/school', 'ToDosController@showWorkTodos')->name('todos.showWorkTodos');

	Route::get('/todos/personal', 'ToDosController@showPersonalTodos')->name('todos.showPersonalTodos');

	Route::get('/todos/today', 'ToDosController@showTodayTodos')->name('todos.showTodayTodos');

	Route::get('/user/edit/profile', 'UserController@showUserEditForm')->name('user.showUserEditForm');
	
	//Route::get('/user/profile', 'UserController@showProfile')->name('user.showProfile');

	Route::resource('todos', 'ToDosController');

	Route::resource('user', 'UserController');

});
