<?php


namespace app\admin\controller;


use think\Controller;

class Ping extends Controller
{
    public function index()
    {
        if (request()->isPost()){
            $target = $this->request->post('target');
        }
        $target = trim($target);

//        命令执行过滤
//        $target = escapeshellcmd($target);
//        $target = escapeshellarg($target);

        if (isset($target) && $target != '') {
            if (stristr(php_uname('s'), 'Windows NT')) {
                $result = shell_exec('ping ' . $target);
            } else {
                $result = shell_exec('ping -c 3 ' . $target);
            }
        }
        $this->assign('result', $result);
        return $this->fetch();
    }
}