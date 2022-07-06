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

//L15C5.2でこっちに戻した
Route::get('/', function () {
    return view('welcome');
});



//Lesson 15Chapter 6.2 Router で再度 変更。ユーザ登録のルーティング追加
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証 L15 C7.2 認証は、LoginControllerが担当します。以下の3つのルーティングを routes/web.php に追記してください。
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Lesson 15Chapter 8.2
//Router
//認証付きのルーティング
//routes/web.phpに下記を追記
//Route::group() でルートのグループを作り、 auth ミドルウェアを指定することで、このグループ内のルートへアクセスする際に、認証を必要とするようにできます。
//Route::group(['middleware' => ['auth']], function () {
//    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
//});
//そもそもTasklistではユーザー一覧やユーザー詳細は不要なので、Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);この記述は必要ないです。

//Lesson 15Chapter 9.2 Router
Route::group(['middleware' => ['auth']], function () {
    // ユーザーが登録するのタスク(task)ですので、「tasksの一覧」なので、
    //resourceの第一引数は tasksであるべき。
    //TasksControllerは,tasklist/app/Http/Controllers/TasksController.phpから取ってきた単語
    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
});

// デフォルトのコメント部分は省略
// L13C7.4まではこれ
Route::get('/', 'TasksController@index');
// L13C7.4まではこれだった。
Route::resource('tasks', 'TasksController');
// 実はたった1行の記述で7つの基本ルーティングが用意できる省略形もあります。
// 結局この2行だけとのこと。。



/*ここから以下はすべてコメントアウト*/
/*Route::resource を使用すると7つのルーティングが自動生成されますので、マニュアルで7つのルーティングを指定してはいけない。
//両方指定すると記述が重複してしまいます。よって、コメントアウト。2022.07.06..1245
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


