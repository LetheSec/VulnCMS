<?php /*a:2:{s:47:"/var/www/application/admin/view/menu/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">菜单管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="treeTable" lay-filter="treeTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
<div class="layui-btn-container">
    <a class="layui-btn layui-btn-sm" href="<?php echo url('add'); ?>">新增后台菜单</a>
    <a class="layui-btn layui-btn-sm layui-btn-normal" id="openAll">展开或折叠全部</a>
</div>
</script>
<script type="text/html" id="barTool">
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("add"); ?>?parentid={{ d.id }}' class="layui-btn layui-btn-xs layui-btn-normal">添加</a>
    <a href='<?php echo url("delete"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="status" data-href="<?php echo url('setstate'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
</script>

    
<script>
var treeGrid = null;
layui.use(['table', 'treeGrid'], function() {
    var $ = layui.$,
        treeGrid = layui.treeGrid,
        tableId = 'treeTable',
        ptable = null;
    ptable = treeGrid.render({
        id: tableId,
        elem: '#' + tableId,
        toolbar: '#toolbarDemo',
        idField: 'id',
        url: "<?php echo url('index'); ?>",
        cellMinWidth: 100,
        treeId: 'id', //树形id字段名称
        treeUpId: 'parentid', //树形父id字段名称
        treeShowName: 'title', //以树形式显示的字段
        height: 'full-140',
        isFilter: false,
        iconOpen: false, //是否显示图标【默认显示】
        isOpenDefault: false, //节点默认是展开还是折叠【默认展开】
        onDblClickRow: false, //去除双击事件
        cols: [
            [
                { field: 'listorder', align: 'center', width: 60, title: '排序', edit: 'text' },
                { field: 'id', align: 'center', width: 60, title: 'ID' },
                { field: 'title', title: '菜单名称', },
                { width: 80,title: '图标',align: 'center',templet:"<div><i class='iconfont {{d.icon}}'></i></div>" },
                { width: 200,title: '模块/控制器/方法',templet:"<div>{{d.app}}/{{d.controller}}/{{d.action}}</div>"},
                { field: 'status', align: 'center', width: 120, title: '状态', templet: '#switchTpl', unresize: true },
                { fixed: 'right', align: 'center', width: 200, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: false
    })

    //监听单元格编辑
    treeGrid.on('edit(treeTable)', function(obj) {
        var value = obj.value,
            data = obj.data;
        $.post('<?php echo url("listorder"); ?>', { 'id': data.id, 'value': value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            } else {
                layer.msg(data.msg);
            }

        })
    });

    $('#openAll').click(function(e) {
        var treedata = treeGrid.getDataTreeList(tableId);
        treeGrid.treeOpenAll(tableId, !treedata[0][treeGrid.config.cols.isOpen]);
    })

});
</script>

</body>

</html>