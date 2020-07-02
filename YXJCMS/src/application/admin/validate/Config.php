<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 登录验证
// +----------------------------------------------------------------------
namespace app\admin\validate;

use think\Validate;

class Config extends Validate
{
    //定义验证规则
    protected $rule = [
        'group|配置分组' => 'require',
        'type|配置类型' => 'require|alpha',
        'title|配置标题' => 'require|chsAlphaNum',
        'name|配置名称' => 'require|regex:^[a-zA-Z]\w{0,39}$|unique:config',
        'listorder|排序' => 'number',
    ];
}
