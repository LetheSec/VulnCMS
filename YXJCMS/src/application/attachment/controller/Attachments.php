<?php

namespace app\attachment\controller;

use app\admin\service\User;
use app\attachment\model\Attachment as Attachment_Model;
use app\common\controller\Adminbase;
use think\Db;

class Attachments extends Adminbase
{
    private $uploadUrl = '';

    protected function initialize()
    {
        parent::initialize();
        $this->Attachment_Model = new Attachment_Model;
        $this->uploadUrl = config('public_url') . 'uploads/';
    }

    //附件列表页
    public function index()
    {
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            $map = $this->buildparams();
            $_list = Attachment_Model::where($map)->page($page, $limit)->order('id', 'desc')->select();
            $total = Attachment_Model::where($map)->order('id', 'desc')->count();
            $result = array("code" => 0, "count" => $total, "data" => $_list);
            return json($result);
        }
        return $this->fetch();
    }

    //附件删除
    public function delete()
    {
        $ids = $this->request->param('ids/a', null);
        if (empty($ids)) {
            $this->error('请选择需要删除的附件！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        foreach ($ids as $id) {
            try {
                $this->Attachment_Model->deleteFile($id);
            } catch (\Exception $ex) {
                $this->error($ex->getMessage());
            }
        }
        $this->success('文件删除成功~');
    }

    /**
     * html代码远程图片本地化
     * @param string $content html代码
     * @param string $type 文件类型
     */
    public function getUrlFile()
    {
        $content = $this->request->post('content');
        $type = $this->request->post('type');
        $urls = [];
        preg_match_all("/(src|SRC)=[\"|'| ]{0,}((http|https):\/\/(.*)\.(gif|jpg|jpeg|bmp|png|tiff))/isU", $content, $urls);
        $urls = array_unique($urls[2]);

        $file_info = [
            'uid' => User::instance()->isLogin(),
            'module' => 'admin',
            'thumb' => '',
        ];
        foreach ($urls as $vo) {
            $vo = trim(urldecode($vo));
            $host = parse_url($vo, PHP_URL_HOST);
            if ($host != $_SERVER['HTTP_HOST']) {
                //当前域名下的文件不下载
                $fileExt = strrchr($vo, '.');
                if (!in_array($fileExt, ['.jpg', '.gif', '.png', '.bmp', '.jpeg', '.tiff'])) {
                    exit($content);
                }
                $filename = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'temp' . DS . md5($vo) . $fileExt;
                if (http_down($vo, $filename) !== false) {
                    $file_info['md5'] = hash_file('md5', $filename);
                    if ($file_exists = Attachment_Model::get(['md5' => $file_info['md5']])) {
                        unlink($filename);
                        $localpath = $file_exists['path'];
                    } else {
                        $file_info['sha1'] = hash_file('sha1', $filename);
                        $file_info['size'] = filesize($filename);
                        $file_info['mime'] = mime_content_type($filename);

                        $fpath = $type . DS . date('Ymd');
                        $savePath = ROOT_PATH . 'public' . DS . 'uploads' . DS . $fpath;
                        if (!is_dir($savePath)) {
                            mkdir($savePath, 0755, true);
                        }
                        $fname = DS . md5(microtime(true)) . $fileExt;
                        $file_info['name'] = $vo;
                        $file_info['path'] = $this->uploadUrl . str_replace(DS, '/', $fpath . $fname);
                        $file_info['ext'] = ltrim($fileExt, ".");

                        if (rename($filename, $savePath . $fname)) {
                            Attachment_Model::create($file_info);
                            $localpath = $file_info['path'];
                        }
                    }
                    $content = str_replace($vo, $localpath, $content);
                }
            }
        }
        exit($content);
    }

}
