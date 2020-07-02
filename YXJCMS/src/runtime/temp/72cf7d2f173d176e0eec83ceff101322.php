<?php /*a:2:{s:48:"/var/www/application/cms/view/setting/index.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">CMS配置</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="">站点开关</label>
                <div class="layui-form-field-label">
                    <input type="checkbox" name="setting[web_site_status]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1 == $setting['web_site_status']): ?>checked='' <?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux">站点关闭后前台将不能访问</div>
            </div>
            <div class="layui-form-item">
                <label class="">回收站</label>
                <div class="layui-form-field-label">
                    <input type="checkbox" name="setting[web_site_recycle]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1 == $setting['web_site_recycle']): ?>checked='' <?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux">开启后，误删的文章可以恢复,反之不可还原</div>
            </div>
            <div class="layui-form-item">
                <label class="">百度熊掌号+百度站长推送</label>
                <div class="layui-form-field-label">
                    <input type="checkbox" name="setting[web_site_baidupush]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1 == $setting['web_site_baidupush']): ?>checked='' <?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux">如果开启百度熊掌+百度站长推送，将在文章发布时自动进行推送(需要安装推送插件)</div>
            </div>
            <div class="layui-form-item">
                <label class="">站点名称</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_name]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_name']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点标题</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_title]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_title']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点关键词</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_keyword]" placeholder="请输入站点关键词"  class="layui-input" value="<?php echo htmlentities($setting['site_keyword']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点描述</label>
                <div class="layui-form-field-label">
                    <textarea name="setting[site_description]" placeholder="请输入站点描述" class="layui-textarea"><?php echo htmlentities($setting['site_description']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">缓存时间</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_cache_time]" placeholder="请输入缓存时间"  class="layui-input" value="<?php echo htmlentities($setting['site_cache_time']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">单页和详情页有效</div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
            </div>
        </form>
    </div>
</div>

    
</body>

</html>