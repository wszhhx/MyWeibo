<!-- 把多余的代码从视图中抽离出来，单独在此存放通用代码。 -->
<!-- 3@yield('变量名','默认值') -->

<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Herhsel Weibo')  Hershel的全栈辅修</title>
  </head>
  <body>
    @yield('content') <!-- 表示该占位区将用于显示 content 区块的内容，而content区块内容将由继承自default视图的子视图定义（blade模板支持继承） -->
  </body>
</html>
