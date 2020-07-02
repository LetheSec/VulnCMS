<?php

namespace app\admin\controller;

use think\Controller;

class Serialize extends Controller
{
    public function index()
    {
        if (request()->isPost()) {
            $payload = $this->request->post('payload');
        }
        unserialize($payload);
        $code = file_get_contents(__FILE__);
        $this->assign('code', $code);
        return $this->fetch();
    }
}

class start_gg
{
    public $mod1;
    public $mod2;

    public function __destruct()
    {
        $this->mod1->test1();
    }
}

class Call
{
    public $mod1;
    public $mod2;

    public function test1()
    {
        $this->mod1->test2();
    }
}

class funct
{
    public $mod1;
    public $mod2;

    public function __call($test2, $arr)
    {
        $s1 = $this->mod1;
        $s1();
    }
}

class func
{
    public $mod1;
    public $mod2;

    public function __invoke()
    {
        $this->mod2 = "字符串拼接" . $this->mod1;
    }
}

class string1
{
    public $str1;
    public $str2;

    public function __toString()
    {
        $this->str1->get_flag();
        return "1";
    }
}

class GetFlag
{
    public $cmd;

    public function get_flag()
    {
        $blacklist = ['phpinfo', 'dl', 'exec', 'system', 'passthru', 'popen', 'pclose, proc_open', 'proc_nice', 'leak',
            'proc_terminate', 'proc_get_status', 'proc_close', 'apache_child_terminate', 'escapeshellcmd', 'shell_exec',
            'crack_check', 'crack_closedict', 'crack_getlastmessage', 'crack_opendict', 'psockopen', 'symlink',
            'ini_restore', 'posix_getpwuid', 'pfsockopen', 'file_get_contents', 'file_put_contents', 'readfile'];
        if (!in_array($this->cmd, $blacklist)) {
            eval($this->cmd);
        }
    }
}
?>