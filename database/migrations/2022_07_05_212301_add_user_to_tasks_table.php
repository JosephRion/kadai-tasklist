<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //up()メソッドで、tasksテーブルに、1. user_idカラムを追加し、2. 外部キー制約をつける必要があります。
            
            //L13 を見ながら課題用に, 1.ユーザカラムを追加
            //$table->string('user_id'); //string は文字列型のキーワードだからuser_idに対して用いるのは不適
            //MySQLではvarcharで作成されるのですが、この型に外部キー制約を設定するところで、文字列型に外部キー制約を設定しようとしてエラーとなっている状況です。
            //2の外部キー制約がないと、stringでvarcharでuser_idカラムが作成されてしまうところでした。
            $table->unsignedBigInteger('user_id');
            
            //2. 外部キー制約をつける。L15C9参照
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            
            //まず、1. 外部キー制約をつけた分を解除する。（順番大事）
            $table->dropForeign('tasks_user_id_foreign');
            
            //L13 を見ながら課題用に, 2. ユーザカラムを追加分を削除する時のコマンド。
            $table->dropColumn('user_id');
        });
    }
}
