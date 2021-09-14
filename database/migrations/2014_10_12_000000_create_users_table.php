<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| 最终该迁移文件生成的用户表字段信息如下
|--------------------------------------------------------------------------
|
|   字段名称                    字段类型                特性
|   id                          integer
|   name                        string
|   email                       string                 key
|   email_verified_at           datetime               可为空
|   password                    string
|   remember_token              string
|   created_at                  datetime
|   updated_at                  datetime
|
|--------------------------------------------------------------------------
*/







class CreateUsersTable extends Migration
{
    /**
     * 运行迁移时，up被调用
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) { //创建users表,$table为Blueprint实例的闭包
            $table->id();   //id()是bigIncrements()的封装，此方法创建了一个bigintunsigned类型的自增长id
            $table->string('name');     //创建VARCHAR类型的name字段
            $table->string('email')->unique();    //unique()指定该字段的值为唯一值
            $table->timestamp('email_verified_at')->nullable();     //nullable表示该字段可为空
            $table->string('password');
            $table->rememberToken();    //创建一个remember_token字段用于保存“记住我”的相关信息
            $table->timestamps();       //创建了一个created_at和updated_at字段，分别用于保存用户的创建时间和更新时间
        });
    }

    /**
     * 回滚迁移时，down被调用
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');  //删除users表
    }
}
