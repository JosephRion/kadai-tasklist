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
// L13C7.4まではこれ。 L15 C9.2 でもこれを使用することに。
Route::get('/', 'TasksController@index');
// L13C7.4まではこれだった。

//Lesson 15Chapter 6.2 Router で再度 変更。ユーザ登録のルーティング追加
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証 L15 C7.2 認証は、LoginControllerが担当します。以下の3つのルーティングを routes/web.php に追記してください。
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Lesson 15Chapter 9.2 Router
// ユーザーが登録するのタスク(task)ですので、「tasksの一覧」なので、
//resourceの第一引数は tasksであるべき。
//TasksControllerは,tasklist/app/Http/Controllers/TasksController.phpから取ってきた単語
Route::group(['middleware' => ['auth']], function () {
    

Route::resource('tasks', 'TasksController');
});

// 実はたった1行の記述で7つの基本ルーティングが用意できる省略形もあります。
// 結局この2行だけとのこと。。
//その7つのうちstoreとdestroyだけをつかう、という設定なので2つ分しか書いていないことになります
//Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);