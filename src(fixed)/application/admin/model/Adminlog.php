<?php

namespace app\admin\model;

use app\admin\service\User;
use think\Model;

class Adminlog extends Model
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 记录日志
     * @param type $message 说明
     * @param  integer $status  状态
     */
    public function record($message, $status = 0)
    {
        $data = array(
            'uid' => (int) User::instance()->isLogin(),
            'status' => $status,
            'info' => "提示语:{$message}",
            'get' => request()->url(),
            'ip' => request()->ip(),
        );
        return $this->save($data) !== false ? true : false;
    }

    /**
     * 删除一个月前的日志
     * @return boolean
     */
    public function deleteAMonthago()
    {
        $status = $this->where('create_time', '<= time', time() - (86400 * 30))->delete();
        return $status !== false ? true : false;
    }

}
