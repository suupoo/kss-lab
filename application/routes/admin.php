<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin' ,'middleware' => ['admin.authenticate']],function(){
    Route::get('/','Admin\AdminController@index')
        ->name('admin.index');
    Route::get('/user','Admin\AdminUserController@index')
        ->name('admin.user');
});