<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            //カラム追加
            //$table->string('status'); //title→statusへ変えないとエラーになった文字数を10にするコードを下に書く
            $table->string('status', 10); //文字長10文字のカラムを追加するコマンド
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
            //
            //カラム削除
            $table->dropColumn('status');//title→statusへ変えないとエラーになった
        });
    }
}
