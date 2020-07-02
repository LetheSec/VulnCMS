<?php

return array(
    //模块名称[必填]
    'name' => '敏感词过滤模块',
    //模块简介[选填]
    'introduce' => '网站内容过滤屏蔽，避免违反互联网相关政策',
    //模块作者[选填]
    'author' => 'yzncms',
    //作者地址[选填]
    'authorsite' => 'http://www.yzncms.com',
    //作者邮箱[选填]
    'authoremail' => '530765310@qq.com',
    //版本号，请不要带除数字外的其他字符[必填]
    'version' => '1.0.0',
    //适配最低yzncms版本[必填]
    'adaptation' => '1.0.0',
    //签名[必填]
    'sign' => 'af8bd198b25e2845c94cebe7cd7e80e0',
    //依赖模块
    'need_module' => [],
    //依赖插件
    'need_plugin' => [],
    //行为注册
    'tags' => [
        'BadwordReplace' => [
            'type' => 1,
            'description' => '内容数据提交结束标签位',
        ],
    ],
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => [],
    // 数据表，不要加表前缀[有数据库表时必填]
    'tables' => [],
);
