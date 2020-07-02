<?php /*a:2:{s:44:"/var/www/application/cms/view/cms/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    
    
<div class="layui-row">
    <div class="layui-col-md2 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">栏目列表</div>
            <div class="layui-card-body">
                <iframe name="left" id="iframe_categorys" src="<?php echo url('cms/cms/public_categorys'); ?>" style="height: 100%; width: 100%;"  frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
    <div class="layui-col-md10 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">内容管理</div>
            <div class="layui-card-body">
                <iframe name="right" id="iframe_categorys_list" src="<?php echo url('cms/cms/panl'); ?>"   style="height: 100%; width:100%;border:none;" frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
</div>

    
<script type="text/javascript">
var B_frame_height = parent.layui.$(".iframe_box").height()-100;
console.log(parent.layui.$(".iframe_box").height());
$(window).on('resize', function () {
    setTimeout(function () {
    B_frame_height = parent.layui.$(".iframe_box").height()-100;
        frameheight();
    }, 100);
});
function frameheight(){
  $("#iframe_categorys").height(B_frame_height);
  $("#iframe_categorys_list").height(B_frame_height);
}
(function (){
  frameheight();
})();
</script>

</body>

</html>