<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | sitemap管理
// +----------------------------------------------------------------------
namespace app\sitemap\controller;

use app\common\controller\Adminbase;
use app\sitemap\lib\Sitemap as Sitemap_Class;
use think\Db;

class Index extends Adminbase
{
    protected $filename = 'sitemap.xml';
    protected $data = [];
    protected $directory;

    protected function initialize()
    {
        parent::initialize();
        $this->directory = (defined('IF_PUBLIC') ? ROOT_PATH . 'public/' : ROOT_PATH);
    }

    public function index()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $Sitemap = new Sitemap_Class();
            $rootUrl = $this->request->domain();
            $data['num'] = intval($data['num']);
            $type = isset($data['type']) ? intval($data['type']) : 1;

            $item = $this->_sitemap_item($rootUrl, intval($data['index']['priority']), $data['index']['changefreq'], time());
            $this->_add_data($item);

            //栏目
            $List = Db::name('Category')->where('status', 1)->order('id desc')->field('id,url')->select();
            if (!empty($List)) {
                foreach ($List as $vo) {
                    $item = $this->_sitemap_item($rootUrl . url('cms/index/lists', ['catid' => $vo['id']]), intval($data['category']['priority']), $data['category']['changefreq'], time());
                    $this->_add_data($item);
                }
            }

            //单页
            $List = Db::name('Page')->order('updatetime desc')->field('catid,updatetime')->select();
            if (!empty($List)) {
                foreach ($List as $vo) {
                    $item = $this->_sitemap_item($rootUrl . url('cms/index/lists', ['catid' => $vo['catid']]), intval($data['content']['priority']), $data['content']['changefreq'], $v['updatetime']);
                    $this->_add_data($item);
                }
            }

            //列表
            $modelList = cache('Model');
            if (!empty($modelList)) {
                $num = 1;
                $volist = [];
                foreach ($modelList as $vo) {
                    if ($vo['module'] == "cms") {
                        $volist = Db::name($vo['tablename'])->where('status', 1)->order('updatetime desc')->field('id,catid,updatetime')->select();
                        if (!empty($volist)) {
                            foreach ($volist as $v) {
                                $item = $this->_sitemap_item($rootUrl . url('cms/index/shows', ['catid' => $v['catid'], 'id' => $v['id']]), intval($data['content']['priority']), $data['content']['changefreq'], $v['updatetime']);
                                $this->_add_data($item);
                                $num++;
                                if ($num >= $data['num']) {
                                    break;
                                }
                            }
                        }
                    }
                }
            }
            if (!$type) {
                try {
                    foreach ($this->data as $val) {
                        $Sitemap->AddItem($val['loc'], $val['priority'], $val['changefreq'], $val['lastmod']);
                    }
                    $Sitemap->SaveToFile($this->directory . $this->filename);
                } catch (\Exception $ex) {
                    $this->error($ex->getMessage());
                }
            } else {
                $str = $this->_txt_format();
                $this->filename = 'sitemap.txt';
                @file_put_contents($this->directory . $this->filename, $str);
            }
            $this->success($this->filename . "文件已生成到运行根目录");

        } else {

            if (is_file($this->directory . 'sitemap.xml')) {
                $make_xml_time = date('Y-m-d H:i:s', filectime($this->directory . 'sitemap.xml'));
                $this->assign('make_xml_time', $make_xml_time);
            }
            if (is_file($this->directory . 'sitemap.txt')) {
                $make_txt_time = date('Y-m-d H:i:s', filectime($this->directory . 'sitemap.txt'));
                $this->assign('make_txt_time', $make_txt_time);
            }
            return $this->fetch();
        }
    }

    /**
     * 添加数据
     */
    private function _add_data($new_item)
    {
        $this->data[] = $new_item;
    }

    /**
     * 生成txt格式
     */
    private function _txt_format()
    {
        $str = '';
        foreach ($this->data as $val) {
            $str .= $val['loc'] . PHP_EOL;
        }
        return $str;
    }

    /**
     * 创建地图格式
     */
    private function _sitemap_item($loc, $priority = '', $changefreq = '', $lastmod = '')
    {
        $data = array();
        $data['loc'] = $loc;
        $data['priority'] = $priority;
        $data['changefreq'] = $changefreq;
        $data['lastmod'] = $lastmod;
        return $data;
    }

}
