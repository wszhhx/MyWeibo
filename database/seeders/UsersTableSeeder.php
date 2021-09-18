<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory()定义在User的Model类顶部
        //count（50）标识指定要创建的Model实例数量
        //create来将生成假用户列表数据插入到数据库中
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'Hershel';
        $user->email = 'wszhhx@163.com';
        $user->password = bcrypt("yasyzhhx");
        $user->is_admin = true;
        $user->save();
    }
}
