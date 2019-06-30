<?php
//ルーティング
Route::resource('forum',        'ForumController');
Route::resource('forum.comment','CommentController',
    ['only' => ['index', 'store', 'destroy']]
);
Route::resource('forum.file','FileController',
    ['only' => ['show', 'destroy']]
);