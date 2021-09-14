<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;      //模型工厂相关功能引用
use Illuminate\Foundation\Auth\User as Authenticatable;     //授权相关功能引用
use Illuminate\Notifications\Notifiable;                    //消息通知相关功能引用
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [     //过滤掉用户提交的其他字段，只有包含在该属性中的字段才能够被正常更新
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [       //对用户密码或其它敏感信息在用户实例通过数组或 JSON 显示时进行隐藏
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
