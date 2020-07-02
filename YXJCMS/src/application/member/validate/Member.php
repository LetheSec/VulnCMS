<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模型验证
// +----------------------------------------------------------------------
namespace app\member\validate;

use think\Validate;

class Member extends Validate
{
    //定义验证规则
    protected $rule = [
        'username|用户名' => 'unique:member|require|alphaDash|length:3,20',
        'nickname|昵称' => 'unique:member|chsDash|length:3,20',
        'password|密码' => 'require|length:3,20|confirm',
        'email|邮箱' => 'unique:member|require|email',
        'groupid|会员组' => 'require|number',
    ];

    public function sceneEdit()
    {
        return $this->remove('password', 'require');
    }

    public function sceneRegister()
    {
        return $this->remove('groupid', 'require');
    }

}
