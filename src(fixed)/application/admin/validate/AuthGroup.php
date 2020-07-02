<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
namespace app\admin\validate;

use \think\Validate;

/**
 * 用户组验证器
 */
class AuthGroup extends Validate
{
    //定义验证规则
    protected $rule = [
        'title' => 'require',

    ];

    //定义验证提示
    protected $message = [
        'title.require' => '用户组名称不得为空',

    ];

    //定义验证场景
    protected $scene = [

    ];
}
