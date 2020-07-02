<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 前台控制模块
// +----------------------------------------------------------------------
namespace app\common\controller;

use app\common\controller\Base;
use think\facade\Config;

class Homebase extends Base
{
    //初始化
    protected function initialize()
    {
        //移除HTML标签
        $this->request->filter('trim,strip_tags,htmlspecialchars');
        parent::initialize();
    }

    protected function fetch($template = '', $vars = [], $config = [], $renderContent = false)
    {
        $Theme = empty(Config::get('theme')) ? 'default' : Config::get('theme');
        $this->view->config('view_path', TEMPLATE_PATH . $Theme . DIRECTORY_SEPARATOR . $this->request->module() . DIRECTORY_SEPARATOR);
        return $this->view->fetch($template, $vars, $config, $renderContent);
    }
}
