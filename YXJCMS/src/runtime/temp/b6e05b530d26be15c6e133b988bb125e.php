<?php /*a:2:{s:51:"/var/www/application/admin/view/adminlog/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">管理日志</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
        <script type="text/html" id="toolbarDemo">
            <div class="layui-btn-container">
            <button class="layui-btn layui-btn-sm layui-btn-danger ajax-get" data-href="<?php echo url('deletelog'); ?>">删除一个月前日志</button>
          </div>
        </script>
    </div>
</div>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("admin/adminlog/index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: 'ID', sort: true },
                { field: 'uid', width: 80, title: '用户ID' },
                { field: 'info', title: '提示' },
                { field: 'get', title: '操作URL' },
                { field: 'create_time', width: 180, title: '时间' },
                { field: 'ip', width: 120, title: 'IP' },
                { field: 'status', width: 80, title: '状态',align: "center", templet: '<div>{{#  if(d.status){ }} <button class="layui-btn layui-btn layui-btn-xs">成功</button> {{#  } else { }} <button class="layui-btn layui-btn-danger layui-btn layui-btn-xs">失败</button> {{#  } }} </div>' },
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>