<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // L15 C9.1 2022.07.06..1412TKT ここから
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // L15 C9.1 2022.07.06..1412TKT ここまで
}
