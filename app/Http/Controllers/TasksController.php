<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    // L15 C9.3 MicropostsControllerあっとindex から
    public function index()
    {
        
        //2022.07.06..1331
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }

        // Welcomeビューでそれらを表示 L15 C9.3での表現
        //return view('welcome', $data);
        return view('welcome', $data);
        //Lesson13時点のタスク一覧(トップページ)では 「???」のViewファイルを読み込んでいたはずなので、同じような内容を表示するのであれば、welcome.blade.phpの「ログインしている場合」の指定内に「???」のviewファイルを指定すればよさそうです。
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
         $task = new Task;

        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'task' => $task,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // L15 C9.4 postでtasks/にアクセスされた場合の「新規登録処理」 
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'status' => 'required|max:10',   // 追加255→10文字制限へ
            'content' => 'required|max:255',  //255文字制限。
        ]);
        
        // メッセージを作成
        $task = new Task; // 新規レコードを追加する
        $task->user_id = \Auth::id();   //Lesson 15Chapter 8.4
        //実行中のクラスの名前空間は App\Http\Controllers\ ですので、そこでAuthとだけ指定すると、 App\Http\Controllers\Auth を探しに行きます。
        //しかし、実際のAuthの名前空間は \ ですので、 \Auth::id() と指定が必要です。
        $task->status = $request->status;    
        $task->content = $request->content;
        $task->save();  //saveは登録対象のidがなければ 登録 、あれば更新を行うものです。

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id); //この定義はif文の前に定義文として置いておかないといけない。
        
        if (\Auth::id() === $task->user_id) {
        
        // メッセージ詳細ビューでそれを表示
        return view('tasks.show', [
            'task' => $task,
        ]);
        } //if文の終わり
        
        else {
            return redirect('/');
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        
         if (\Auth::id() === $task->user_id) {

        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'task' => $task,
        ]);
         } //if文の終わり
        
        else {
            return redirect('/');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // putまたはpatchtasks/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
        // バリデーション
        $request->validate([
            'status' => 'required|max:10',   // 追加.255→10へ
            'content' => 'required|max:255', //
        ]);
        
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        //ログインしている人の投稿のみ更新できるようにする
        if (\Auth::id() === $task->user_id) {
        $task->status = $request->status;    // 追加 titleからstatusへ
        $task->content = $request->content;
        $task->save();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // deleteでtasks/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //
        // idの値でメッセージを検索して取得
        //$task = Task::findOrFail($id);
        // メッセージを削除
        //$task->delete();
        
        //Lesson 15Chapter 9.5 destroy
        $task = \App\Task::findOrFail($id);
        
        //Lesson 15Chapter 9.5 destroy
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
