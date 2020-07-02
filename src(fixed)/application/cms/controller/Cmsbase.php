<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 前台控制模块
// +----------------------------------------------------------------------
namespace app\cms\controller;

use app\common\controller\Homebase;

class Cmsbase extends Homebase
{
    //CMS模型相关配置
    protected $cmsConfig = [];
    //初始化
    protected function initialize()
    {
        parent::initialize();
        $this->cmsConfig = cache("Cms_Config");
        $this->assign("cms_config", $this->cmsConfig);
        if (!$this->cmsConfig['web_site_status']) {
            $this->error("站点已经关闭，请稍后访问~");
        }
    }
}
