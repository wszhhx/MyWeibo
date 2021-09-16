<!-- 把多余的代码从视图中抽离出来，单独在此存放通用代码。 -->
<!-- 3@yield('变量名','默认值') -->

<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Herhsel Weibo')  Hershel的全栈辅修</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    @include('layouts._header')  <!--2@include 是 Blade 提供的视图引用方法，可通过传参一个具体的文件路径名称来引用视图。 -->

    <div class="container">
      @include('shared._messages')
      @yield('content')
      @include('layouts._footer')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
