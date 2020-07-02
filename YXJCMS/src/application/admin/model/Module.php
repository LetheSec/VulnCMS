<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模块模型
// +----------------------------------------------------------------------
namespace app\admin\model;

use think\Model;

/**
 * 模块模型
 */
class Module extends Model
{
    //自动完成
    protected $auto = ['iscore' => 0, 'status' => 1];
    protected $insert = ['installtime', 'updatetime'];
    protected function setInstalltimeAttr($value)
    {
        return time();
    }
    protected function setUpdatetimeAttr($value)
    {
        return time();
    }

    /**
     * 更新缓存
     * @return type
     */
    public function module_cache()
    {
        $data = $this->column(true, 'module');
        if (empty($data)) {
            return false;
        }
        $module = array();
        foreach ($data as &$v) {
            to_time($v, 'installtime');
            $module[$v['module']] = $v;
        }
        unset($v);
        cache('Module', $module);
        return $module;
    }

}
