<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 使用路由来定义 URL 和 URL 的请求方式，再将该 URL 分配到相对应的控制器动作中进行处理。
| 接下来要构建三个静态页面分别是主页、帮助页、关于页。因此我们需要为路由指定好三个不同的 URL

| GET 常用于页面读取
| POST 常用于数据提交
| PATCH 常用于数据更新  (浏览器不支持，但可以在提交表单中做手脚欺骗服务器)
| DELETE 常用于数据删除 (浏览器不支持，但可以在提交表单中做手脚欺骗服务器)
|
*/

//第一个参数指明URL
//第二个参数指明该URL的控制器动作[Class@Method格式]
//get表示这个路由将会响应GET请求，并将该请求映射到对应控制器上

//比方说，我们向 weibo.test/ 发出了一个请求，则该请求将会由 StaticPagesController 的 home 方法进行处理[home方法返回的是一个页面名称（string）]
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('/signup', 'UserController@create')->name('signup');
