<?php /*a:2:{s:48:"/var/www/application/admin/view/config/edit.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">编辑配置</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">分组</label>
                <div class="layui-input-inline w300">
                    <select name="group" lay-verify="required">
                        <option value=""></option>
                        <?php if(is_array($groupArray) || $groupArray instanceof \think\Collection || $groupArray instanceof \think\Paginator): $i = 0; $__LIST__ = $groupArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($key); ?>" <?php if($info['group']==$key): ?>selected<?php endif; ?>><?php echo htmlentities($vo); ?>[<?php echo htmlentities($key); ?>]</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">配置类型</label>
                <div class="layui-input-inline w300">
                    <select name="type" lay-filter="type" lay-verify="required">
                        <option value=""></option>
                        <?php if(is_array($fieldType) || $fieldType instanceof \think\Collection || $fieldType instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['name']); ?>" data-ifoption="<?php echo htmlentities($vo['ifoption']); ?>" <?php if($info['type']==$vo['name']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['title']); ?>[<?php echo htmlentities($vo['name']); ?>]</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">配置标题</label>
                <div class="layui-input-inline w300">
                    <input type="text" name="title" lay-verify="required" value="<?php echo htmlentities($info['title']); ?>" autocomplete="off" placeholder="字段中文标题" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">一般由中文组成，仅用于显示</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">配置名称</label>
                <div class="layui-input-inline w300">
                    <input type="text" name="name" lay-verify="required" value="<?php echo htmlentities($info['name']); ?>" autocomplete="off" placeholder="字段英文名称" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">由英文字母开头和下划线组成，如 <code>web_site_title</code></div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">配置默认值</label>
                <div class="layui-input-inline w300">
                    <textarea name="value" placeholder="未指定值时默认插入字段的值" class="layui-textarea"><?php echo htmlentities($info['value']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux">配置类型为<code>数组</code>时请按如下格式填写：
                    <br>键值:键名
                    <br>键值:键名</div>
            </div>
            <div class="layui-form-item layui-form-text" id="options">
                <label class="layui-form-label">配置项</label>
                <div class="layui-input-inline w300">
                    <textarea name="options" placeholder="键值:键名
键值:键名
键值:键名
....." class="layui-textarea"><?php echo htmlentities($info['options']); ?></textarea>
                </div>
                <div class="layui-form-mid layui-word-aux">配置类型为<code>单选按钮,下拉框,复选框</code>时请按如下格式填写：
                    <br>键值:键名
                    <br>键值:键名</div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">配置备注</label>
                <div class="layui-input-inline w300">
                    <textarea name="remark" placeholder="填写配置说明" class="layui-textarea"><?php echo htmlentities($info['remark']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline w300">
                    <input type="number" name="listorder" autocomplete="off" placeholder="只能是正整数" class="layui-input" value="<?php echo htmlentities($info['listorder']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
                    <button class="layui-btn layui-btn-normal" type="button" onclick="javascript:history.back(-1);">返回</button>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
        </form>
    </div>
</div>

    
</body>

</html>