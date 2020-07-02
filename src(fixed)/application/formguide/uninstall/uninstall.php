<?php

namespace app\formguide\uninstall;

use think\Db;
use \sys\UninstallBase;

class Uninstall extends UninstallBase
{

    //卸载
    public function run()
    {
        if (request()->param('clear') == 1) {
            // 删除模型中建的表
            $table_list = Db::name('model')->where(['module' => 'formguide'])->field('tablename,id')->select();
            if ($table_list) {
                foreach ($table_list as $val) {
                    $tablename = config('database.prefix') . $val['tablename'];
                    Db::execute("DROP TABLE IF EXISTS `{$tablename}`;");

                    Db::name('model_field')->where(['modelid' => $val['id']])->delete();
                }
            }
            //删除模型中的表
            Db::name('model')->where(['module' => 'formguide'])->delete();
        }
        return true;
    }

}
