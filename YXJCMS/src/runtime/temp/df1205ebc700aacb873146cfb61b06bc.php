<?php /*a:2:{s:49:"/var/www/application/member/view/group/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">会员组列表</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <a class="layui-btn layui-btn-sm" href="<?php echo url('add'); ?>">添加会员组</a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    {{#  if(d.issystem!=1){ }}
    <a href='<?php echo url("delete"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
    {{#  } }}
</script>
<script type="text/html" id="issystem">
    {{#  if(d.issystem==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowattachment">
    {{#  if(d.allowattachment==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowpost">
    {{#  if(d.allowpost==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowpostverify">
    {{#  if(d.allowpostverify==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowsearch">
    {{#  if(d.allowsearch==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowupgrade">
    {{#  if(d.allowupgrade==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowsendmessage">
    {{#  if(d.allowsendmessage==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-danger icon-delete_fill"></i>
    {{#  } }}
</script>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: 'ID' },
                { field: 'listorder', width: 100, title: '排序',edit:'text' },
                { field: 'name', title: '会员组名' },
                { field: 'issystem', width: 100,  title: '系统组',align:"center",templet: '#issystem' },
                { field: '_count', width: 100,align:"center", title: '会员数' },
                { field: 'starnum',width: 100,align:"center",  title: '星星数' },
                { field: 'point',width: 100,align:"center",  title: '积分小于' },
                { field: 'allowattachment', width: 120,align:"center", title: '允许上传附件',templet: '#allowattachment' },
                { field: 'allowpost', width: 120, title: '投稿权限',align:"center",templet: '#allowpost' },
                { field: 'allowpostverify', width: 120, title: '投稿不需审核',align:"center",templet: '#allowpostverify' },
                { field: 'allowsearch', width: 120, title: '搜索权限',align:"center",templet: '#allowsearch' },
                { field: 'allowupgrade', width: 120, title: '自助升级',align:"center",templet: '#allowupgrade' },
                { field: 'allowsendmessage', width: 120, title: '发短消息',align:"center",templet: '#allowsendmessage'  },
                { fixed: 'right', width: 120, title: '操作', templet: '#barTool' }
            ]
        ]
    });
});
</script>

</body>

</html>