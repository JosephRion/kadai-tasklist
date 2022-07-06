<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * このユーザが所有する投稿。（ 元ネタは、Micropostモデルとの関係を定義）
     */
    public function tasks() // リレーション
    {
        return $this->hasMany(Task::class);
        //Taskがモデルの名前
    }
    /**
     *このようにリレーションを定義しておくことで、 
     *Userクラスのインスタンス->microposts()->paginate() という指定だけで
     *「モデル名やリレーションの記述をもとに、
     *上記の1~2の手順を裏側で自動的に行い、必要なデータを取得」してくれます。
    **/
    
}
