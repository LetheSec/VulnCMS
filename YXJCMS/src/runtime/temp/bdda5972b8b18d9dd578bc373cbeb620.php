<?php /*a:2:{s:48:"/var/www/application/member/view/group/edit.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">编辑会员组</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label>会员组名称</label>
                <div class="w300">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="会员组名称" class="layui-input" value="<?php echo htmlentities($data['name']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label>积分小于</label>
                <div class="w300">
                    <input type="text" name="point" lay-verify="required" autocomplete="off" placeholder="积分小于" class="layui-input" value="<?php echo htmlentities($data['point']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label>星星数</label>
                <div class="w300">
                    <input type="text" name="starnum" lay-verify="required" autocomplete="off" placeholder="星星数" class="layui-input" value="<?php echo htmlentities($data['starnum']); ?>">
                </div>
            </div>

            <div class="layui-form-item">
                <label>用户权限</label>
                <div>
                    <input type="checkbox" name="allowpost" title="允许投稿" lay-skin="primary" value="1" <?php if($data['allowpost'] == '1'): ?>checked<?php endif; ?>>
                    <input type="checkbox" name="allowpostverify" title="投稿不需审核" lay-skin="primary" value="1" <?php if($data['allowpostverify'] == '1'): ?>checked<?php endif; ?>>
                    <input type="checkbox" name="allowupgrade" title="允许自助升级" lay-skin="primary" value="1" <?php if($data['allowupgrade'] == '1'): ?>checked<?php endif; ?>>
                    <input type="checkbox" name="allowsendmessage" title="允许发短消息" lay-skin="primary" value="1" <?php if($data['allowsendmessage'] == '1'): ?>checked<?php endif; ?>>
                    <input type="checkbox" name="allowattachment" title="允许上传附件" lay-skin="primary" value="1" <?php if($data['allowattachment'] == '1'): ?>checked<?php endif; ?>>
                    <input type="checkbox" name="allowsearch" title="搜索权限" lay-skin="primary" value="1" <?php if($data['allowsearch'] == '1'): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label>升级价格</label>
                <div>
                    <div class="layui-form-mid">包日</div>
                    <div class="layui-input-inline" style="width:80px;">
                        <input type="text" class="layui-input" name="price_d" placeholder="包日" value="<?php echo htmlentities($data['price_d']); ?>">
                    </div>
                    <div class="layui-form-mid">包月</div>
                    <div class="layui-input-inline" style="width:80px;">
                        <input type="text" class="layui-input" name="price_m" placeholder="包月" value="<?php echo htmlentities($data['price_m']); ?>">
                    </div>
                    <div class="layui-form-mid">包年</div>
                    <div class="layui-input-inline" style="width:80px;">
                        <input type="text" class="layui-input" name="price_y" placeholder="包年" value="<?php echo htmlentities($data['price_y']); ?>">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label>最大短消息数</label>
                <div class="w300">
                    <input type="text" name="allowmessage" lay-verify="required" autocomplete="off" placeholder="最大短消息数" class="layui-input" value="<?php echo htmlentities($data['allowmessage']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label>日最大投稿数</label>
                <div class="w300">
                    <input type="text" name="allowpostnum" lay-verify="required" autocomplete="off" placeholder="日最大投稿数" class="layui-input" value="<?php echo htmlentities($data['allowpostnum']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">0为不限制</div>
            </div>
            <div class="layui-form-item web_seo">
                <label>用户组简介</label>
                <div class="w300">
                    <textarea name="description" placeholder="栏目简介" class="layui-textarea"><?php echo htmlentities($data['description']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label>用户组图标</label>
                <div class="layui-form-field-label">
                    <div class="js-upload-image">
                        <?php echo \util\Form::images('icon','',$data['icon']) ?>
                    </div>
                </div>
            </div>
            <input name="id" type="hidden" value="<?php echo htmlentities($data['id']); ?>"/>
            <div class="layui-form-item">
                <div>
                    <button class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
                    <button class="layui-btn layui-btn-normal" type="button" onclick="javascript:history.back(-1);">返回</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
<script type="text/javascript" src="/static/libs/viewer/viewer.min.js"></script>
<link rel="stylesheet" href="/static/libs/viewer/viewer.min.css">
<script type="text/javascript">
$('.uploader-list').each(function () {
    $(this).viewer();
});
</script>

</body>

</html>