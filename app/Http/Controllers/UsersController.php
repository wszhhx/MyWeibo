<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //除了show/create/store，其余所有动作都必须登录用户才能访问
    public function __construct()
    {
        //第一个为中间件名称，第二个为要进行过滤的动作
        $this->middleware('auth',[
            //except索引的列表中包含不需要过滤的动作（方法名）
            //only索引的列表包含只要这些动作要过滤
            'except' => ['show', 'create', 'store', 'index']
        ]);

        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }


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
        //仅能限制未登录用户的操作
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

        //让通过认证的用户进入登录状态，提升体验（其实就是创建会话）
        Auth::login($user);
        //存入一条缓存数据，并让其只在下一次的请求有效
        //之后可以使用session()->get('success')通过键获取对应的会话数据
        session()->flash('success', '欢迎， 您将在这里开启一段新的旅程~');  //param1:会话键   param2:会话值

        return redirect()->route('users.show',[$user->id]);
    }

    public function edit(User $user)
    {
        //第一个参数为对应授权类里的验证方法名，$user对应update授权方法的第二个参数
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success', '个人资料更新成功');

        return redirect()->route('users.show', $user->id);
    }

    public function index()
    {
        //指定每页生成的数据数量为6条
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户');
        return back();
    }
}
