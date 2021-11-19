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

//投稿一覧を表示
Route::get('/','App\Http\Controllers\UpostController@showList')
->name('Uposts');

//投稿画面を表示
Route::get('/user_post/create','App\Http\Controllers\UpostController@showCrete')
->name('create');

//サイト投稿
Route::post('/user_post/store','App\Http\Controllers\UpostController@exeStore')
->name('store');


//詳細画面を表示
Route::get('/user_post/{id}','App\Http\Controllers\UpostController@showDetail')
->name('show');

//編集画面を表示
Route::get('/user_post/edit/{id}','App\Http\Controllers\UpostController@showEdit')
->name('edit');

//サイト編集
Route::post('/user_post/update','App\Http\Controllers\UpostController@exeUpdate')
->name('update');
