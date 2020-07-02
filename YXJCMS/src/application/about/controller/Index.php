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
        include "$file";
        $info = [
            'email' => $email,
            'phone' => $phone,
            'addr' => $addr,
            'school' => $school,
            'img' => $img
        ];
        return $this->fetch('index', ['info' => $info]);
    }

    public function blog()
    {
        $url = @$_GET['url'];
        if (!isset($url) || $url == '') {
            $url = 'https://lethe.site';
        }
        if ($url) {
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
