<?php /*a:2:{s:61:"F:\www\YZNCMS\application\formguide\view\formguide\index.html";i:1589651136;s:54:"F:\www\YZNCMS\application\admin\view\index_layout.html";i:1589819694;}*/ ?>
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
    
    
<style type="text/css">
.childrenBody {
    background: #fff;
}
</style>
<div class="layui-form">
    <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm" href="<?php echo url('add'); ?>">添加表单</a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a href='<?php echo url("info/index"); ?>?formid={{ d.id }}' class="layui-btn layui-btn-xs layui-btn-primary">信息列表</a>
    <a href='<?php echo url("index/index"); ?>?id={{ d.id }}' target="_blank" class="layui-btn layui-btn-xs">前台浏览</a>
    <a href='<?php echo url("field/index"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs layui-btn-normal">字段管理</a>
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("delete"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>

    
<script>
layui.use(['table', 'laydate'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form,
        laydate = layui.laydate;
    laydate.render({
        elem: '#laydate',
        range: true,
    });
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { field: 'id', width: 60, title: 'ID' },
                { field: 'name', title: '表单名称(信息数)'},
                { field: 'tablename', width: 200, title: '表名' },
                { field: 'description', width: 200, title: '简介' },
                { field: 'create_time', width: 180, title: '创建时间' },
                { field: 'status', width: 80, align: "center", title: '状态', templet: '<div>{{#  if(d.status){ }} <button class="layui-btn layui-btn layui-btn-xs">启用</button> {{#  } else { }} <button class="layui-btn layui-btn-danger layui-btn layui-btn-xs">禁用</button> {{#  } }} </div>'},
                { fixed: 'right', width: 350, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>