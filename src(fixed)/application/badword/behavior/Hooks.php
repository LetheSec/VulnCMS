<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 过滤词钩子
// +----------------------------------------------------------------------
namespace app\badword\behavior;

use think\Db;

class Hooks
{

    //或者run方法
    public function BadwordReplace($content)
    {
        $res = Db::name('Badword')->column('badword,replaceword');
        return str_replace(array_keys($res), array_values($res), $content);
    }

}
