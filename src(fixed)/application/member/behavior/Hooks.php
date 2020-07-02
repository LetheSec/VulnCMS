<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 会员钩子
// +----------------------------------------------------------------------
namespace app\member\behavior;

use sys\Hooks as _Hooks;

class Hooks extends _Hooks
{

    public function contentDeleteEnd($params)
    {
        //参数是审核文章的数据
        if (!empty($params) && isset($params['sysadd']) && $params['sysadd'] == 0) {
            //删除对应的会员投稿记录信息
            db("member_content")->where(array("content_id" => $params['id'], "catid" => $params['catid']))->delete();
        }
    }

    public function contentEditEnd($params)
    {
        //参数是审核文章的数据
        if (!empty($params) && isset($params['sysadd']) && $params['sysadd'] == 0 && $params['status'] == 1) {
            //标识审核状态
            db("member_content")->where(array("content_id" => $params['id'], "catid" => $params['catid']))->setField('status', 1);
        }
    }

}
