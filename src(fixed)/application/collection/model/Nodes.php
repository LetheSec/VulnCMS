<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
namespace app\collection\model;

use \think\Model;

class Nodes extends Model
{
    protected $name = 'collection_node';
    public function getLastdateAttr($value)
    {
        return date("Y-m-d h:i:s", $value);
    }
    //创建
    public function addNode($data)
    {
        if (empty($data)) {
            throw new \Exception('数据不得为空！');
        }
        $_data = $data['data'];
        $customize_config = isset($data['customize_config']) ? $data['customize_config'] : '';
        $_data['urlpage'] = isset($data['urlpage' . $_data['sourcetype']]) ? $data['urlpage' . $_data['sourcetype']] : '';
        $_data['customize_config'] = array();
        if (is_array($customize_config)) {
            foreach ($customize_config['name'] as $k => $v) {
                if (empty($v) || empty($customize_config['name'][$k])) {
                    continue;
                }
                $_data['customize_config'][] = [
                    'title' => $customize_config['title'][$k],
                    'name' => $v,
                    'selector' => $customize_config['selector'][$k],
                    'attr' => $customize_config['attr'][$k],
                    'value' => $customize_config['value'][$k],
                    'filter' => $customize_config['filter'][$k],
                ];

            }
        }
        $_data['customize_config'] = serialize($_data['customize_config']);
        self::allowField(true)->save($_data);
    }

    //编辑
    public function editNode($data)
    {
        if (empty($data)) {
            throw new \Exception('数据不得为空！');
        }
        $_data = $data['data'];
        $nodeid = $_data['id'];
        $info = self::where(array('id' => $nodeid))->find();
        if ($info) {
            $customize_config = isset($data['customize_config']) ? $data['customize_config'] : '';
            $_data['urlpage'] = isset($data['urlpage' . $_data['sourcetype']]) ? $data['urlpage' . $_data['sourcetype']] : '';
            $_data['customize_config'] = array();
            if (is_array($customize_config)) {
                foreach ($customize_config['name'] as $k => $v) {
                    if (empty($v) || empty($customize_config['name'][$k])) {
                        continue;
                    }
                    $_data['customize_config'][] = [
                        'title' => $customize_config['title'][$k],
                        'name' => $v,
                        'selector' => $customize_config['selector'][$k],
                        'attr' => $customize_config['attr'][$k],
                        'value' => $customize_config['value'][$k],
                        'filter' => $customize_config['filter'][$k],
                    ];

                }
            }
            $_data['customize_config'] = serialize($_data['customize_config']);
            self::allowField(true)->save($_data, ['id' => $nodeid]);
            return true;
        }
        throw new \Exception('采集任务不存在！');
    }

}
