<?php /*a:2:{s:63:"/var/www/public/../public/templates/default/member/publish.html";i:1589651409;s:65:"/var/www/public/../public/templates/default/member/inputItem.html";i:1589651409;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>用户中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/modules/member/css/global.css">
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
        'profile_upload_url': '<?php echo !empty($profile_upload_url) ? htmlentities($profile_upload_url) :  url("member/index/profile"); ?>'
    };
    </script>
</head>

<body class="body">
    <div class="fly-header layui-bg-black">
        <div class="layui-container">
            <a class="fly-logo" href="<?php echo url('index'); ?>">
		      <img src="/static/modules/member/img/logo.png" alt="layui">
		    </a>
            <ul class="layui-nav fly-nav layui-hide-xs">
                <li class="layui-nav-item layui-this">
                    <a href="<?php echo url('/'); ?>"><i class="iconfont icon-homepage"></i>首页</a>
                </li>
            </ul>
            <ul class="layui-nav fly-nav-user">
                <!-- 登入后的状态 -->
                <li class="layui-nav-item">
                    <a class="fly-nav-avatar" href="javascript:;">
			          <cite class="layui-hide-xs"><?php echo htmlentities($userinfo['username']); ?></cite>
                      <?php if($userinfo['vip']): ?>
                      <i class="iconfont icon-vip1 layui-hide-xs" title="VIP会员"></i>
                      <?php endif; ?>
			          <i class="layui-badge fly-badge-vip layui-hide-xs"><?php echo htmlentities($userinfo['groupname']); ?></i>
			          <img src="<?php echo htmlentities($userinfo['avatar']); ?>">
			        </a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('member/index/index'); ?>"><i class="layui-icon">&#xe612;</i>用户中心</a></dd>
                        <dd><a href="<?php echo url('member/index/profile'); ?>"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                        <hr style="margin: 5px 0;">
                        <dd><a href="<?php echo url('member/index/logout'); ?>" style="text-align: center;">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-container fly-marginTop fly-user-main">
        <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
            <li class="layui-nav-item <?php if(app('request')->action() == 'index'): ?>layui-this<?php endif; ?>">
                <a href="<?php echo url('member/index/index'); ?>"><i class="iconfont icon-people"></i>&nbsp;用户中心</a>
            </li>
            <li class="layui-nav-item <?php if(app('request')->action() == 'profile'): ?>layui-this<?php endif; ?>">
                <a href="<?php echo url('member/index/profile'); ?>"><i class="iconfont icon-setup"></i>&nbsp;基本设置</a>
            </li>
            <li class="layui-nav-item <?php if(app('request')->action() == 'upgrade'): ?>layui-this<?php endif; ?>">
                <a href="<?php echo url('member/index/upgrade'); ?>"><i class="iconfont icon-vip"></i>&nbsp;自助升级</a>
            </li>
            <?php echo hook('userSidenavAfter'); ?>
        </ul>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="fly-panel fly-panel-user" pad20 style="padding-top:20px;">
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">在线投稿</li>
    </ul>
    <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
            <form class="layui-form" method="post">
                <div class="layui-form-item">
                    <label class="">栏目分类</label>
                    <div class="layui-form-field-label">
                        <select lay-filter="filter">
                            <option value="<?php echo url('publish','step=2'); ?>">请选择发布栏目</option>
                            <?php echo $categoryselect; ?>
                        </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">请先选择栏目(阴影的表示没有权限)，选择栏目后页面会刷新。</div>
                </div>
                <?php if(isset($fieldList)): if(is_array($fieldList) || $fieldList instanceof \think\Collection || $fieldList instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['isadd']) && $vo['isadd']): switch($vo['type']): case "hidden": if($vo['value']): ?><input type="hidden" class="form-control" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  value="<?php echo htmlentities($vo['value']); ?>"><?php endif; break; case "text": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "number": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <input type="number" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "switch": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" lay-skin="switch" lay-text="ON|OFF" value="<?php echo htmlentities($vo['value']); ?>" <?php if(1==$vo[ 'value' ]): ?>checked='' <?php endif; ?>> </div> <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "array": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <textarea name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "checkbox": ?>
<div class="layui-form-item" pane="">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v); ?>" value="<?php echo htmlentities($key); ?>" <?php if(in_array($key,$vo[ 'value' ])): ?>checked<?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "radio": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="radio" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($v); ?>" <?php if($key==$vo [ 'value' ]): ?>checked='' <?php endif; ?>> <?php endforeach; endif; else: echo "" ;endif; ?> </div> <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "select": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <select name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]">
            <option value=""></option>
            <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($key); ?>" <?php if($key==$vo[ 'value' ]): ?>selected="" <?php endif; ?>><?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "color": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="layui-input-inline" style="width: 120px;">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($vo['value']); ?>" placeholder="请选择颜色" class="layui-input test-form-input-<?php echo htmlentities($vo['name']); ?>">
        </div>
        <div class="layui-inline" style="left: -11px;">
            <div class="layui-color-box-<?php echo htmlentities($vo['name']); ?>"></div>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<script type="text/javascript">
layui.use('colorpicker', function(){
    var colorpicker = layui.colorpicker;
    colorpicker.render({
        elem: '.layui-color-box-<?php echo htmlentities($vo['name']); ?>',
        color:'<?php echo htmlentities($vo['value']); ?>',
        done: function(color){
            $('.test-form-input-<?php echo htmlentities($vo['name']); ?>').val(color);
        }
    });
});
</script>
<?php break; case "datetime": ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
        <div class="layui-form-field-label">
            <input type="text" class="layui-input test-item" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" value="<?php echo htmlentities($vo['value']); ?>">
        </div>
        <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    </div>
</div>
<script type="text/javascript">
layui.use(['laydate'], function() {
    var laydate = layui.laydate;
    lay('.test-item').each(function() {
        laydate.render({
            elem: this,
            trigger: 'click',
            type: 'datetime'
        });
    });

});
</script>
<?php break; case "textarea": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <textarea placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "image": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-image">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                <div class="file-item thumbnail">
                    <img data-original="<?php echo htmlentities((get_file_path($vo['value']) ?: '/static/admin/img/none.png')); ?>" src="<?php echo htmlentities((get_file_path($vo['value']) ?: '/static/admin/img/none.png')); ?>" width="100" style="max-height: 100px;">
                    <i class="iconfont icon-delete_fill remove-picture" data-id="<?php echo htmlentities($vo['value']); ?>"></i>
                </div>
                <?php endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="false" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传单张图片</div>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "images": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-images">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): if(is_array(explode(',',$vo['value'])) || explode(',',$vo['value']) instanceof \think\Collection || explode(',',$vo['value']) instanceof \think\Paginator): $i = 0; $__LIST__ = explode(',',$vo['value']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <div class="file-item thumbnail">
                    <img data-original="<?php echo htmlentities(get_file_path($v)); ?>" src="<?php echo htmlentities((get_file_path($v) ?: '/static/admin/img/none.png')); ?>" width="100" style="max-height: 100px;">
                    <i class="iconfont icon-delete_fill remove-picture" data-id="<?php echo htmlentities($v); ?>"></i>
                    <i class="iconfont icon-yidong move-picture"></i>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <?php endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="true" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传多张图片</div>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "file": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-file">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="150">
                    <col>
                  </colgroup>
                  <thead>
                    <tr>
                      <th>文件名称</th>
                      <th>提示</th>
                      <th>进度</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody class="file-box">
                    <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                    <tr class="file-item">
                      <td><?php echo htmlentities(get_file_name($vo['value'])); ?></td>
                      <td>/</td>
                      <td>/</td>
                      <td><a href="<?php echo htmlentities(get_file_path($vo['value'])); ?>" class="layui-btn download-file layui-btn layui-btn-xs">下载</a> <a href="javascript:void(0);" class="layui-btn remove-file layui-btn layui-btn-xs layui-btn-danger">删除</a></td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="false" data-size="<?php echo config('upload_file_size'); ?>" data-ext="<?php echo config('upload_file_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传单个文件</div>
        </div>
    </div>
</div>
<?php break; case "files": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-file">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="150">
                    <col>
                  </colgroup>
                  <thead>
                    <tr>
                      <th>文件名称</th>
                      <th>提示</th>
                      <th>进度</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody class="file-box">
                    <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): if(is_array(explode(',',$vo['value'])) || explode(',',$vo['value']) instanceof \think\Collection || explode(',',$vo['value']) instanceof \think\Paginator): $i = 0; $__LIST__ = explode(',',$vo['value']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <tr class="file-item">
                      <td><?php echo htmlentities(get_file_name($v)); ?></td>
                      <td>/</td>
                      <td>/</td>
                      <td><a href="<?php echo htmlentities(get_file_path($v)); ?>" class="layui-btn download-file layui-btn layui-btn-xs">下载</a> <a href="javascript:void(0);" class="layui-btn remove-file layui-btn layui-btn-xs layui-btn-danger" data-id="<?php echo htmlentities($v); ?>">删除</a></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="true" data-size="<?php echo config('upload_file_size'); ?>" data-ext="<?php echo config('upload_file_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传多个文件</div>
        </div>
    </div>
</div>
<?php break; case "Ueditor": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <script type="text/plain" class="js-ueditor" id="<?php echo htmlentities($vo['name']); ?>" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo $vo['value']; ?></script>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    <div style="margin-top: 5px;">
        <a class="layui-btn layui-btn-sm" id="<?php echo htmlentities($vo['name']); ?>grabimg">图片本地化</a>
    </div>
</div>
<?php break; ?>
<?php endswitch; ?>

<?php endif; ?>

<?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript" src="/static/libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/libs/ueditor/ueditor.all.min.js"></script>

<script type="text/javascript" src="/static/libs/webuploader/webuploader.min.js"></script>
<link rel="stylesheet" href="/static/libs/webuploader/webuploader.css">

<script type="text/javascript" src="/static/admin/js/form.js"></script>

<script type="text/javascript" src="/static/libs/Sortable.js"></script>
<script type="text/javascript" src="/static/libs/viewer/viewer.min.js"></script>
<link rel="stylesheet" href="/static/libs/viewer/viewer.min.css">

<script type="text/javascript">
$('.uploader-list').each(function () {
    $(this).viewer();
});
</script>
<?php endif; if(isset($fieldList) && count($fieldList)): ?>
                <input type="hidden" name="modelField[catid]" value="<?php echo htmlentities($catid); ?>">
                <div class="layui-form-item">
                    <div>
                        <button class="layui-btn ajax-post" lay-submit lay-filter="*" target-form="form-horizontal">立即提交</button>
                    </div>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<script>
layui.config({
    version: "3.0.0",
    base: '/static/modules/member/mods/'
}).extend({
    fly: 'index'
}).use('fly');
</script>
<script>
layui.use('form', function() {
    var form = layui.form;
    form.on('select(filter)', function(data) {
        location.href = data.value
    });
});
</script>
    </div>
</div>

</body>

</html>