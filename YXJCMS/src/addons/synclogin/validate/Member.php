<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模型验证
// +----------------------------------------------------------------------
namespace addons\synclogin\validate;

use think\Validate;

class Member extends Validate
{
    //定义验证规则
    protected $rule = [
        'username|用户名' => 'unique:member|require|alphaDash|length:3,20',
        'nickname|昵称' => 'unique:member|chsDash|length:3,20',
        'password|密码' => 'require|length:3,20',
        'email|邮箱' => 'unique:member|require|email',
    ];

}
