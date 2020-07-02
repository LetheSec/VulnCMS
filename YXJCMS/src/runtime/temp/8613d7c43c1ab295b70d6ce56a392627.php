<?php /*a:2:{s:49:"/var/www/application/cms/view/category/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">栏目管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <blockquote class="layui-elem-quote">添加、修改和删除栏目全部完成后，请点击【更新栏目缓存】！</blockquote>
            <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm" href="<?php echo url('add'); ?>">新增栏目</a>
      <a class="layui-btn layui-btn-sm" href="<?php echo url('singlepage'); ?>">新增单页</a>
      <a class="layui-btn layui-btn-sm layui-btn-normal" href="<?php echo url('count_items'); ?>">栏目数据校正</a>
      <a class="layui-btn layui-btn-sm layui-btn-danger confirm layui-batch-all" data-href='<?php echo url("delete"); ?>'>批量删除</a>
      <a class="layui-btn layui-btn-sm layui-btn-danger ajax-get" data-href="<?php echo url('public_cache'); ?>">更新栏目缓存<span class="layui-badge-dot layui-bg-orange"></span></a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a href="{{d.add_url}}" class="layui-btn layui-btn-xs layui-btn-normal">添加子栏目</a>
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("delete"); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" data-href="<?php echo url('setstate'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
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
                { field: 'id', width: 70, title: 'ID' },
                { field: 'catname', title: '栏目名称' },
                { field: 'items', width:80, title: '数据量' },
                { field: 'catdir', width: 120, title: '唯一标识' },
                { field: 'type',width: 100, title: '栏目类型',templet: '<div>{{#  if(d.type==1){ }} 单页 {{#  } else if(d.type==2){  }} 列表 {{#  }  else { }} 未知 {{#  } }}</div>' },
                { field: 'modelname',width: 120, title: '所属模型' },
                { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'status',  width: 100,align:"center", title: '状态',  templet: '#statusTpl', unresize: true },
                { fixed: 'right', width: 200, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });

    //监听单元格编辑
    table.on('edit(dataTable)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("cms/category/listorder"); ?>', { 'id': data.id,'value':value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                layer.msg(data.msg);
            }

        })
    });

});
</script>

</body>

</html>