<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | editormd插件
// +----------------------------------------------------------------------
namespace addons\editormd;

use app\addons\util\Addon;

class Editormd extends Addon
{
    //插件信息
    public $info = [
        'name' => 'editormd',
        'title' => 'editormd编辑器',
        'description' => 'editormd编辑器',
        'status' => 1,
        'author' => '御宅男',
        'version' => '1.0.0',
    ];

    //安装
    public function install()
    {
        return true;
    }

    //卸载
    public function uninstall()
    {
        return true;
    }

    /**
     * 编辑器挂载的文章内容钩子
     * @param array('name'=>'表单name','value'=>'表单对应的值')
     */
    public function markdown($data)
    {
        $this->assign('vo', $data);
        return $this->fetch('editormd');
    }
}
