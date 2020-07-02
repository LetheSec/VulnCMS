<?php


namespace app\about\controller;


use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $file = @$_GET['file'];
        if (!isset($file) || $file == '') {
            $file = 'about.php';
        }
        //include "$file";
        //白名单
        $whitelist = array('about.php');
        if (in_array($file, $whitelist)) {
            include "$file";
        } else {
            return $this->error("Hacker!");
        }
        $info = [
            'email' => $email,
            'phone' => $phone,
            'addr' => $addr,
            'school' => $school,
            'img' => $img
        ];
        return $this->fetch('index', ['info' => $info]);
    }

    function check_inner_ip($url)
    {
        //只允许http和https协议
        $match_result = preg_match('/^(http|https)?:\/\/.*(\/)?.*$/', $url);
        if (!$match_result) {
            return $this->error('url fomat error');
        }
        try {
            $url_parse = parse_url($url);
        } catch (Exception $e) {
            return $this->error('url fomat error');
        }
        $hostname = $url_parse['host'];
        $ip = gethostbyname($hostname);
        $int_ip = ip2long($ip);
        //不允许host为内网ip地址
        return ip2long('127.0.0.0') >> 24 == $int_ip >> 24 || ip2long('10.0.0.0') >> 24 == $int_ip >> 24 || ip2long('172.16.0.0') >> 20 == $int_ip >> 20 || ip2long('192.168.0.0') >> 16 == $int_ip >> 16;
    }
    public function blog()
    {
        $url = @$_GET['url'];
        if (!isset($url) || $url == '') {
            $url = 'https://lethe.site';
        }
        if ($this->check_inner_ip($url)) {
            return $this->error($url . ' is inner ip');
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $co = curl_exec($ch);
            curl_close($ch);
            echo $co;
        }
    }
}
