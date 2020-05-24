<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// 一時的にログアウト用のルーティングを設定する
Route::get('logout-manual', function () {
   request()->session()->invalidate();
});

Route::get('/{any}', 'AppController@index')->where('any', '.*');
