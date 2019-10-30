<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin.authenticate']],function(){
    //管理インデックス
    Route::get('/','Admin\AdminController@index')
        ->name('index');

    //ユーザ管理
    Route::resource('user','Admin\AdminUserController',
        ['only' => ['index','show','destroy']]
    );
});
