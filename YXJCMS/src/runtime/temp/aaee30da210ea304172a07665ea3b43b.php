<?php /*a:2:{s:54:"F:\www\YZNCMS\application\admin\view\module\index.html";i:1589651136;s:54:"F:\www\YZNCMS\application\admin\view\index_layout.html";i:1589819694;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>YXJCMS后台管理系统</title>
    <meta name="author" content="YXJCMS">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/common/font/iconfont.css">
    <script src="/static/libs/layui/layui.js"></script>
    <script src="/static/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    //全局变量
    var GV = {
        'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/upload/upload", ["dir" => "images", "module" => request()->module()]); ?>',
        'file_upload_url': '<?php echo !empty($file_upload_url) ? htmlentities($file_upload_url) :  url("attachment/upload/upload", ["dir" => "files", "module" => request()->module()]); ?>',
        'WebUploader_swf': '/static/libs/webuploader/Uploader.swf',
        'ueditor_upload_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/upload/upload", ["dir" => "images","from"=>"ueditor", "module" => request()->module()]); ?>',
        'ueditor_grabimg_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/Attachments/geturlfile"); ?>',
    };
    </script>
</head>

<body class="childrenBody">
    
    <script type="text/javascript">
    //console.log(layui.cache);
    layui.config({
        version: '1557143998899',
        base: '/static/libs/layui_exts/'
    }).extend({
        treeGrid: 'treeGrid/treeGrid',
        clipboard: 'clipboard/clipboard',
        notice: 'notice/notice',
        iconPicker: 'iconPicker/iconPicker',
        ztree: 'ztree/ztree',
        tagsinput: 'tagsinput/tagsinput',
        common: '{/}/static/admin/js/common'
    }).use('common');
    </script>
    
    
<div class="layui-card">
    <div class="layui-card-header">模块管理</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
    </div>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <a class="layui-btn layui-btn-sm" id="local-install">本地安装</a>
        </div>
    </script>
    <script type="text/html" id="titleTpl">
    {{#  if(d.installtime == "" || d.installtime == null || d.installtime == undefined){ }}
        <a class="layui-btn layui-btn-xs" href="<?php echo url('install'); ?>?module={{ d.module }}">安装</a>
    {{#  } else { }}
        {{#  if(d.iscore == 0){ }}
        <a class="layui-btn layui-btn-xs layui-btn-danger" href="<?php echo url('uninstall'); ?>?module={{ d.module }}">卸载</a>
        {{#  } }}
    {{#  } }}
    </script>
</div>

    
<script>
layui.use(['table', 'upload'], function() {
    var table = layui.table,
        $ = layui.$,
        upload = layui.upload;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { field: 'name', width: 150, title: '名称' },
                { field: 'version', width: 150, title: '版本' },
                { field: 'author', width: 150, title: '作者' },
                { field: 'introduce', title: '简介' },
                { field: 'installtime', width: 200, title: '安装时间', templet: '<div>{{#  if(d.installtime){ }} {{d.installtime}} {{#  } else { }} / {{#  } }}</div>' },
                { fixed: 'right', width: 150, title: '操作', templet: '#titleTpl' }
            ]
        ]
    });

    //执行实例
    var uploadInst = upload.render({
        elem: '#local-install',
        url: '<?php echo url("admin/module/local"); ?>',
        accept: 'file',
        exts: 'zip',
        done: function(res) {
            //上传完毕回调
            layer.alert(res.msg, {}, function() {
                if (res.code != 0) {
                    location.reload();
                }
            });
        },
        error: function() {
            //请求异常回调
        }
    });
});
</script>

</body>

</html>