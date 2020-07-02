<?php /*a:2:{s:53:"/var/www/application/member/view/setting/setting.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">会员配置</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label>允许新会员注册</label>
                <div class="layui-form-field-label">
                    <input type="radio" name="setting[allowregister]" value="1" title="是" <?php if(1 == $setting['allowregister']): ?>checked<?php endif; ?>>
                    <input type="radio" name="setting[allowregister]" value="0" title="否" <?php if(0 == $setting['allowregister']): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label>新会员注册需要管理员审核</label>
                <div class="layui-form-field-label">
                    <input type="radio" name="setting[registerverify]" value="1" title="是" <?php if(1 == $setting['registerverify']): ?>checked<?php endif; ?>>
                    <input type="radio" name="setting[registerverify]" value="0" title="否" <?php if(0 == $setting['registerverify']): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label>是否开启登陆验证码</label>
                <div class="layui-form-field-label">
                    <input type="radio" name="setting[openverification]" value="1" title="是" <?php if(1 == $setting['openverification']): ?>checked<?php endif; ?>>
                    <input type="radio" name="setting[openverification]" value="0" title="否" <?php if(0 == $setting['openverification']): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label>1元人民币购买积分数量</label>
                <div class="layui-form-field-label">
                     <input type="number" name="setting[rmb_point_rate]" required="" lay-verify="required" placeholder="1元人民币购买积分数量" autocomplete="off" class="layui-input" value="<?php echo htmlentities($setting['rmb_point_rate']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label>新会员默认积分</label>
                <div class="layui-form-field-label">
                     <input type="number" name="setting[defualtpoint]" required="" lay-verify="required" placeholder="新会员默认积分" autocomplete="off" class="layui-input" value="<?php echo htmlentities($setting['defualtpoint']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label>新会员默认资金</label>
                <div class="layui-form-field-label">
                     <input type="number" name="setting[defualtamount]" required="" lay-verify="required" placeholder="新会员默认资金" autocomplete="off" class="layui-input" value="<?php echo htmlentities($setting['defualtamount']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
            </div>
        </form>
    </div>
</div>

    
</body>

</html>