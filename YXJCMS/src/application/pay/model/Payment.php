<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 支付模块模型
// +----------------------------------------------------------------------
namespace app\pay\model;

use \think\Model;

class Payment extends Model
{
    protected $name = 'pay_payment';

    public function getConfigAttr($value)
    {
        return unserialize($value);
    }

    //支付配置缓存
    public function pay_cache()
    {
        $data = $this->where('status', 1)->select();
        if ($data) {
            $data = $data->toArray();
        } else {
            return;
        }
        $Cache = array();
        foreach ($data as $v) {
            $Cache[$v['name']] = $v;
        }
        cache("Pay_Config", $Cache);
        return $data;
    }

}
