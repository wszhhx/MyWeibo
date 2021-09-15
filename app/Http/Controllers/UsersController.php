<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //存在性验证：required
    //唯一性验证：unique:目标数据表名
    //长度验证：min:n   max:n
    //邮箱验证：email
    //密码匹配验证：confirmed
    public function store(Request $request)
    {
        //验证用户输入的数据
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        //使用User的Model创建对应数据表的条目
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //存入一条缓存数据，并让其只在下一次的请求有效
        //之后可以使用session()->get('success')通过键获取对应的会话数据
        session()->flash('success', '欢迎， 您将在这里开启一段新的旅程~');  //param1:会话键   param2:会话值

        return redirect()->route('users.show',[$user->id]);
    }
}
