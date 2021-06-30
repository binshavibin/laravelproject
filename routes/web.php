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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('todos', 'TodoController@index');
Route::get('todos/create', 'TodoController@create');
Route::post('todos/create', 'TodoController@store');
Route::get('todos/edit/{todo}', 'TodoController@edit');
Route::patch('todos/update/{todo}', 'TodoController@update')->name('todo.update');

Route::get('projects', 'ProjectController@index');
Route::get('projects/create', 'ProjectController@create');
Route::post('projects/create', 'ProjectController@store');
Route::get('projects/editproject/{project}', 'ProjectController@editproject');
Route::patch('projects/update/{project}', 'ProjectController@update')->name('projects.update');
Route::get('projects/delete/{project}', 'ProjectController@delete');

Route::get('projects/rapidView/{shortcode}/{projectid}', 'ProjectController@rapidView');



Route::get('sprints', 'SprintController@index');
Route::get('sprints/create', 'SprintController@create');
Route::post('sprints/create', 'SprintController@store');


Route::post('task/create', 'TaskController@create');
Route::get('task/change/{id}/{status}', 'TaskController@changeStatus');
Route::get('board/{shortcode}', 'BoardController@index');


Route::get('user/list', 'UserController@show');
Route::get('user/create', 'UserController@create');


Route::post('/upload', 'UserController@uploadImage');
Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');
