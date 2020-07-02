<?php /*a:2:{s:45:"/var/www/application/cms/view/tags/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">Tags管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm layui-btn-danger confirm layui-batch-all" data-href='<?php echo url("delete"); ?>'>批量删除</a>
      <a class="layui-btn layui-btn-sm layui-btn-warm" href='<?php echo url("create"); ?>'>数据重建</a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("delete"); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="status" {{ d.status==1 ? 'checked' : '' }}>
</script>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'tag', title: 'Tags名称' },
                { field: 'usetimes', width: 100, title: '信息总数' },
                { field: 'hits', width: 100, title: '点击量' },
                { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'create_time', width: 180, title: '创建时间' },
                { field: 'update_time', width: 180, title: '更新时间' },
                { fixed: 'right', width: 150, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });
    //监听单元格编辑
    table.on('edit(dataTable)', function(obj) {
        var value = obj.value,
            data = obj.data;
        $.post('<?php echo url("cms/tags/listorder"); ?>', { 'id': data.id, 'value': value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            } else {
                layer.msg(data.msg);
            }

        })
    });
});
</script>

</body>

</html>