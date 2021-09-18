<?php
/*
|--------------------------------------------------------------------------
| UserPolicy.php
|--------------------------------------------------------------------------
|
| 自动授权注册
| 约定：默认假设Model模型文件直接放在app目录下，若放在其他地方，则需要自定义规则：修改app/Providers/AuthServiceProvider.php中的boot()方法
|
*/
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //用于用户更新时的权限验证。
    //param1: 当前登录的用户实例
    //param2：要进行授权的用户实例
    //我们并不需要检查 $currentUser 是不是 NULL。未登录用户，框架会自动为其 所有权限 返回 false；
    //调用时，默认情况下，我们 不需要 传递当前登录用户至该方法内，因为框架会自动加载当前登录用户
    public function update(User $currentUser, User $user){
        return $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser, User $user){
        return $currentUser->is_admin && $currentUser->id != $user->id;
    }
}
