<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 安装脚本
// +----------------------------------------------------------------------
namespace app\member\install;

use think\Db;
use \sys\InstallBase;

class install extends InstallBase
{
    /**
     * 安装完回调
     * @return boolean
     */
    public function end()
    {
        //填充默认配置
        $Setting = include APP_PATH . 'member/install/setting.php';
        if (!empty($Setting) && is_array($Setting)) {
            Db::name("Module")->where('module', 'member')->setField('setting', serialize($Setting));
        }
        //显示cms的投稿菜单
        if (isModuleInstall('cms')) {
            Db::name('menu')->where(['app' => 'cms', 'controller' => 'publish', 'action' => 'index'])->setField('status', 1);
        }
        return true;
    }

}
