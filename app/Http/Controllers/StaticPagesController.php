<?php
/*
|--------------------------------------------------------------------------
| StaticPagesController
|--------------------------------------------------------------------------
|
| 负责整个网站静态页面的处理
|
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //
    public function home()
    {
        //view方法用于返回对应视图及其绑定数据结合而成的html数据
        //因为是静态界面，所以第二个参数省略
        //第一个参数为视图(view)的路径名称、第二个参数为与视图绑定的数据(model)（可选）
        return view('static_pages/home');
    }

    public function help()
    {
        //渲染在resources/views文件夹下的static_pages/home.blade.php文件
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
