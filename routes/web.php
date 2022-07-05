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
/*2022.06.27から
Route::get('/', function () {
    return view('welcome');
});
下で2行で書き換えている。
*/
/*
// CRUD
// メッセージの個別詳細ページ表示
Route::get('tasks/{id}', 'TasksController@show');
// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
Route::post('tasks', 'TasksController@store');
// メッセージの更新処理（編集画面を表示するためのものではありません）
Route::put('tasks/{id}', 'TasksController@update');
// メッセージを削除
Route::delete('tasks/{id}', 'TasksController@destroy');

// index: showの補助ページ
Route::get('tasks', 'TasksController@index')->name('tasks.index');

// create: 新規作成用のフォームページ
Route::get('tasks/create', 'TasksController@create')->name('tasks.index');

// edit: 更新用のフォームページ
Route::get('tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');
*/



// デフォルトのコメント部分は省略
// L14まではこれ
Route::get('/', 'TasksController@index');
// L14まではこれだった。
Route::resource('tasks', 'TasksController');
// 実はたった1行の記述で7つの基本ルーティングが用意できる省略形もあります。
// 結局この2行だけとのこと。。