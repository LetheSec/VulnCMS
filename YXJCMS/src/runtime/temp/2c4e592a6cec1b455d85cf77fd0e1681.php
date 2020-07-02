<?php /*a:2:{s:59:"/var/www/application/attachment/view/attachments/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">附件管理</div>
    <div class="layui-card-body">
        <blockquote class="layui-elem-quote quoteBox">
            <form class="layui-form search-from" method="get">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="laydate" placeholder="搜索时间范围">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" class="layui-input searchVal" placeholder="请输入附件名称">
                    </div>
                    <a class="layui-btn search_btn" data-type="reload">搜索</a>
                </div>
            </form>
        </blockquote>
        <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
        <script type="text/html" id="toolbarDemo">
            <div class="layui-btn-container">
            <button class="layui-btn layui-btn-sm confirm layui-batch-all" data-href='<?php echo url("delete"); ?>'>批量删除</button>
          </div>
        </script>
        <script type="text/html" id="barTool">
            <a href='<?php echo url("delete"); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
        </script>
    </div>
</div>

    
<script>
layui.use(['table', 'laydate'], function() {
    var table = layui.table,
        $ = layui.$,
        laydate = layui.laydate;
    laydate.render({
        elem: '#laydate',
        range: true,
    });
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("attachment/attachments/index"); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'id', width: 80, title: 'ID', sort: true },
                { field: 'aid', width: 80, title: '用户ID' },
                { field: 'name', title: '名称' },
                { field: 'path', width: 450,align:"center",title: '物理路径',templet:'<div><a class="layui-btn layui-btn layui-btn-xs" href="{{d.path}}" target="_blank">{{d.path}}</a></div>'},
                { field: 'size',width: 100, title: '大小', sort: true },
                { field: 'ext',width: 100, title: '类型'},
                { field: 'mime',width: 120, title: 'Mime类型'},
                { field: 'driver',width: 100, title: '存储引擎'},
                { field: 'create_time', width: 180, title: '上传时间' },
                { fixed: 'right', width: 70, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });

    $(".search_btn").on("click", function() {
        table.reload("dataTable", {
            page: {
                curr: 1 //重新从第 1 页开始
            },
            where: {
                search_field: 'name',
                keyword: $(".searchVal").val(),
                filter_time: 'create_time',
                filter_time_range: $("#laydate").val()
            }
        })
    });
});
</script>

</body>

</html>