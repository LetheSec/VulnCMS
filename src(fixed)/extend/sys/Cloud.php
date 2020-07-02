<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 云平台
// +----------------------------------------------------------------------

namespace sys;

class Cloud
{
    //错误信息
    private $error = '出现未知错误 Cloud ！';
    //需要发送的数据
    private $data = array();
    //接口
    private $act = null;
    private $token = null;

    //服务器地址
    const serverHot = 'http://www.yzncms.com/apis/index.php';

    /**
     * 获取错误信息
     * @return type
     */
    public function getError()
    {
        return $this->error;
    }

}
