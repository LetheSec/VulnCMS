<?php /*a:2:{s:49:"/var/www/application/admin/view/config/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($groupArray) || $groupArray instanceof \think\Collection || $groupArray instanceof \think\Paginator): $i = 0; $__LIST__ = $groupArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($key==$group): ?>layui-this<?php endif; ?>"><a href="<?php echo url('index',['group'=>$key]); ?>"><?php echo htmlentities($vo); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="layui-tab-content">
                <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
            </div>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
    <a class="layui-btn layui-btn-sm" href="<?php echo url('add'); ?>">新增配置项</a>
  </div>
</script>
<script type="text/html" id="barTool">
    {{# if(d.type=='radio' || d.type=='select'){ }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="键：{:config('{{d.name}}')['key']} 值：{:config('{{d.name}}')['value']}">代码调用</a>
    {{# } else if(d.type=='checkbox' || d.type=='array' || d.type=='images' || d.type=='files'){ }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="{volist name=&quot;:config('{{d.name}}')&quot; id='vo'}  值：{$key}  描述：{$vo} <br> {/volist}">代码调用</a>
    {{# } else { }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="{:config('{{d.name}}')}">代码调用</a>
    {{# } }}
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("del"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="status" data-href="<?php echo url('setstate'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
</script>

    
<script>
layui.use(['table','clipboard'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form,
        clipboard =  layui.clipboard;
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("index",["group"=>$group]); ?>',
        cols: [
            [
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'name', title: '名称' },
                { field: 'title', title: '标题' },
                { field: 'ftitle', width: 150, title: '类型' },
                { field: 'update_time', width: 200, title: '更新时间', templet: function(d){ return layui.formatDateTime(d.update_time) }},
                { field: 'status', title: '状态', width: 100, templet: '#switchTpl', unresize: true },
                { fixed: 'right', width: 200, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });

    var clipboard = new clipboard('.copy');
    clipboard.on('success', function(e) {
        layer.msg("复制成功");
    });
    clipboard.on('error', function(e) {
        layer.msg("复制失败！请手动调用");
    });

    //监听单元格编辑
    table.on('edit(dataTable)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("admin/config/listorder"); ?>', {'id': data.id,'value':value }, function(data) {
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