<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 数据库插件
// +----------------------------------------------------------------------
namespace addons\database;

use app\addons\util\Addon;

/**
 * 返回顶部插件
 */
class Database extends Addon
{
    //插件信息
    public $info = [
        'name' => 'database',
        'title' => '数据库备份',
        'description' => '简单的数据库备份',
        'status' => 1,
        'author' => '御宅男',
        'version' => '1.0.0',
        'has_adminlist' => 1,
    ];

    //后台菜单
    public $admin_list = array(
        array(
            //方法名称
            "action" => "index",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 1,
            //名称
            "title" => "数据库备份",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "restore",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "备份还原",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "del",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "删除备份",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "repair",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "修复表",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "optimize",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "优化表",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "import",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "还原表",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "export",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "备份数据库",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
        array(
            //方法名称
            "action" => "download",
            //附加参数 例如：a=12&id=777
            "data" => "",
            //状态，1是显示，0是不显示
            "status" => 0,
            //名称
            "title" => "备份数据库下载",
            //备注
            "tip" => "",
            //排序
            "listorder" => 0,
        ),
    );

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

}
