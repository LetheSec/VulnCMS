<?php


namespace app\joinus\controller;


use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $file = request()->file('file');
        if ($file) {
            $info = $file->move('../uploads/docx');
            if ($info) {
                $target_file = ROOT_PATH . 'uploads/docx/' . $info->getSaveName();
                try {
                    $result = file_get_contents("zip://" . $target_file . "#docProps/core.xml");
                    $xml = new \SimpleXMLElement($result, LIBXML_NOENT);
                    $xml->registerXPathNamespace("dc", "http://purl.org/dc/elements/1.1/");
                    foreach ($xml->xpath('//dc:title') as $title) {
                        $title_info = "Title '" . $title . "' has been added.";
                    }
                } catch (\Exception $e) {
                    unlink($target_file);
                    $this->error("上传文件不是一个docx文件");

                }
            } else {
                return $this->error("文件上传失败");
            }
        }
        return $this->fetch('index', ['title' => $title_info]);
    }
}
