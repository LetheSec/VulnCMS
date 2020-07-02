<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | CMS设置
// +----------------------------------------------------------------------
namespace app\cms\controller;

use app\admin\model\Module as Module_Model;
use app\common\controller\Adminbase;

class Setting extends Adminbase
{
    //cms设置
    public function index()
    {
        if ($this->request->isPost()) {
            $setting = $this->request->param('setting/a');
            $setting['web_site_status'] = isset($setting['web_site_status']) ? intval($setting['web_site_status']) : 0;
            $data['setting'] = serialize($setting);
            if (Module_Model::update($data, ['module' => 'cms'])) {
                cache('Cms_Config', null);
                $this->success("更新成功！");
            } else {
                $this->success("更新失败！");
            }
        } else {
            $setting = Module_Model::where(['module' => 'cms'])->value("setting");
            $this->assign("setting", unserialize($setting));
            return $this->fetch();
        }
    }

}
