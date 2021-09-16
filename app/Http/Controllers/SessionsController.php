<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            //登录成功操作
            session()->flash('success', '欢迎回来！');
            //Laravel 提供的 Auth::user() 方法来获取 当前登录用户 的信息，并将数据传送给路由。
            return redirect()->route('users.show',[Auth::user()]);
        }
        else
        {
            //登录失败操作
            session()->flash('danger', '邮箱和密码对不上啊老铁');
            return redirect()->back()->withInput();
        }

    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出登录！');
        return redirect()->route('login');
    }
}
