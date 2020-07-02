<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模型验证
// +----------------------------------------------------------------------
namespace app\formguide\validate;

use think\Validate;

class Models extends Validate
{
    //定义验证规则
    protected $rule = [
        'name|表单名称' => 'require|chsDash|max:30|unique:model',
        'tablename|表单键名' => 'require|lower|max:20|alpha|unique:model',
    ];

    // edit 验证场景定义
    public function sceneEdit()
    {
        return $this->only(['name']);
    }
}
