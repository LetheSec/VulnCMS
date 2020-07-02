<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模块安装脚本抽象类
// +----------------------------------------------------------------------

namespace sys;

abstract class InstallBase
{

    //错误信息
    protected $error = '';

    /**
     * 安装开始执行
     * @return boolean
     */
    public function run()
    {
        return true;
    }

    /**
     * 安装完回调
     * @return boolean
     */
    public function end()
    {
        return true;
    }

    /**
     * 获取错误
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

}
