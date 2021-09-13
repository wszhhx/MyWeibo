<!-- 把多余的代码从视图中抽离出来，单独在此存放通用代码。 -->
<!-- 3@yield('变量名','默认值') -->

<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Herhsel Weibo')  Hershel的全栈辅修</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Herhsel Weibo App</a>
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item"><a class="nav-link" href="/help">帮助</a></li>
          <li class="nav-item"><a class="nav-link" href="#">登录</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
