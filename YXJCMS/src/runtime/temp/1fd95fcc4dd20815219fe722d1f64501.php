<?php /*a:2:{s:49:"/var/www/application/cms/view/cms/singlepage.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    
    
<form class="layui-form" method="post">
    <div class="layui-form-item">
        <div class="layui-form-item">
            <label class="">标题&nbsp;<font color="red">*</font></label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[title]" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="">SEO关键词</label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[keywords]" placeholder="请输入SEO关键词" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['keywords']); ?>">
            </div>
            <div class="layui-form-mid layui-word-aux">多关键词之间用空格或者“,”隔开</div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">SEO摘要</label>
            <div class="layui-form-field-label">
                <textarea placeholder="请输入SEO摘要" class="layui-textarea" name="modelField[description]"><?php echo htmlentities($info['description']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">内容</label>
            <div class="layui-form-field-label">
                <script type="text/javascript" src="/static/libs/ueditor/ueditor.config.js"></script>
                <script type="text/javascript" src="/static/libs/ueditor/ueditor.all.min.js"></script>
                <script type="text/javascript">
                var modelFieldExtcontent = UE.getEditor('modelFieldcontent', {
                    initialFrameWidth: null,
                    initialFrameHeight: 250,
                    serverUrl: GV.ueditor_upload_url
                });
                </script>
                <script type="text/plain" id="modelFieldcontent" name="modelField[content]"><?php echo $info['content']; ?></script>
            </div>
        </div>
        <input type="hidden" name="modelField[catid]" value="<?php echo htmlentities($catid); ?>">
        <div>
            <button class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
        </div>
    </div>
</form>

    
</body>

</html>