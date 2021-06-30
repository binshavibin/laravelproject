<?php
Route::get('/', function()
{
    return 'Hello World';
});
Route::get('user/list', 'UserController@show');
Route::get('/user/list',[
   'middleware' => 'First',
   'uses' => 'UserController@showPath'
]);

Route::get('user/edit',function() {
   return view('user/edituser');
});
Route::post('/user/edit',array('uses'=>'UserController@postRegister'));
Route::get('todo/create',function() {
   return view('user/create');
});