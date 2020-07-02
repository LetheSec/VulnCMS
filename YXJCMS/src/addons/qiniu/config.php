<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 插件配置
// +----------------------------------------------------------------------
return [

    'accessKey' => [ //配置在表单中的键名 ,这个会是config[title]
        'title' => '七牛的ak：', //表单的文字
        'type' => 'text', //表单的类型：text、textarea、checkbox、radio、select等
        'value' => '', //表单的默认值
        'tip' => '七牛的ak',
    ],
    'secrectKey' => [ //配置在表单中的键名 ,这个会是config[title]
        'title' => '七牛的sk：', //表单的文字
        'type' => 'text', //表单的类型：text、textarea、checkbox、radio、select等
        'value' => '', //表单的默认值
        'tip' => '七牛的sk',
    ],
    'bucket' => [ //配置在表单中的键名 ,这个会是config[title]
        'title' => '七牛的空间名称：', //表单的文字
        'type' => 'text', //表单的类型：text、textarea、checkbox、radio、select等
        'value' => '', //表单的默认值
        'tip' => '七牛的空间名称',
    ],
    'domain' => [ //配置在表单中的键名 ,这个会是config[title]
        'title' => '七牛的空间对应的域名：', //表单的文字
        'type' => 'text', //表单的类型：text、textarea、checkbox、radio、select等
        'value' => '', //表单的默认值
        'tip' => '七牛的空间对应的域名',
    ],
];
