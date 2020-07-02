<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
namespace app\member\controller;

use app\admin\model\Module as Module_Model;
use app\common\controller\Adminbase;
use think\Db;

class Setting extends Adminbase
{

    public function setting()
    {
        if ($this->request->isPost()) {
            $setting = $this->request->post('setting/a');
            $data['setting'] = serialize($setting);
            if (Module_Model::update($data, ['module' => 'member'])) {
                cache("Member_Config", null);
                $this->success("更新成功！");
            } else {
                $this->success("更新失败！");
            }

        } else {
            $setting = Module_Model::where(['module' => 'member'])->value("setting");
            $this->assign("setting", unserialize($setting));
            return $this->fetch();
        }

    }

}
