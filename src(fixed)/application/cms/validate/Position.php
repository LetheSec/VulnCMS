<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 推荐位验证
// +----------------------------------------------------------------------
namespace app\cms\validate;

use think\Validate;

class Position extends Validate
{

    //定义验证规则
    protected $rule = [
        'name' => 'require|chsAlphaNum',
        'modelid' => 'number',
        'catid' => 'number',
    ];
    //定义验证提示
    protected $message = [
        'name.require' => '推荐位名称不得为空',
        'name.chsAlphaNum' => '推荐位名称只能是汉字、字母和数字',
        'modelid.number' => '所属模型格式错误',
        'catid.number' => '所属栏目格式错误',
    ];
}
