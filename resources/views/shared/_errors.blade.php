<!--Blade 支持所有的循环语句和条件判断语句，如 1@if, 1@elseif, 1@else, 1@for, 1@foreach, 1@while 等等，应用在 Blade 中的表达式都需要以 @ 开头。-->
<!--  Laravel 会自动将这些错误消息绑定到视图上  -->
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>

@endif
