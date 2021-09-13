@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <h1>Hello Hershel</h1>
    <p class="lead">你现在所看到的是微博类网站示例主页</p>
    <p>全栈，将从这里开始。。。</p>
    <p><a class="btn btn-lg btn-success" href="#" role="button">现在注册</a></p>
  </div>
@stop

<!-- 当 1@section 传递了第二个参数时，便不需要再通过 2@stop 标识来告诉 Laravel 填充区块会在具体哪个位置结束。 -->

