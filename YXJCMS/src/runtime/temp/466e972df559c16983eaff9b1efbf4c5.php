<?php /*a:4:{s:63:"/var/www/public/../public/templates/default/member/profile.html";i:1589651409;s:62:"/var/www/public/../public/templates/default/member/header.html";i:1589651409;s:61:"/var/www/public/../public/templates/default/member/layui.html";i:1589651409;s:62:"/var/www/public/../public/templates/default/member/footer.html";i:1589820565;}*/ ?>
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
<div class="layui-tab layui-tab-brief" lay-filter="user">
    <ul class="layui-tab-title" id="LAY_mine">
        <li class="layui-this" lay-id="info">我的资料</li>
        <li lay-id="avatar">头像</li>
        <li lay-id="pass">密码</li>
    </ul>
    <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-form layui-form-pane layui-tab-item layui-show">
            <form class="layui-form" action="<?php echo url('member/index/profile'); ?>" method="post">
                <div class="layui-form-item"> <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required="" lay-verify="required" autocomplete="off" value="<?php echo htmlentities($userinfo['username']); ?>" class="layui-input" disabled style="cursor: not-allowed !important;">
                    </div>
                </div>
                <div class="layui-form-item"> <label class="layui-form-label">昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="nickname" required="" lay-verify="required" autocomplete="off" value="<?php echo htmlentities($userinfo['nickname']); ?>" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item"> <label class="layui-form-label">手机</label>
                    <div class="layui-input-inline"> <input type="text" name="mobile" required="" lay-verify="phone" autocomplete="off" value="<?php echo htmlentities($userinfo['mobile']); ?>" class="layui-input" disabled style="cursor: not-allowed !important;"></div>
					<?php if($userinfo['ischeck_mobile'] == '1'): ?>
                    <button class="layui-btn layui-iframe" type="button" href="<?php echo url('changemobile'); ?>" lay-data="{width:'440px',height:'250px',title:'修改手机'}">修改</button>
					<?php else: ?>
                    <button class="layui-btn layui-iframe layui-btn-danger" type="button" href="<?php echo url('actmobile'); ?>" lay-data="{width:'440px',height:'250px',title:'激活手机'}">激活</button>
					<?php endif; ?>
                </div>
                <div class="layui-form-item"> <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline"> <input type="text" name="email" required="" lay-verify="email" autocomplete="off" value="<?php echo htmlentities($userinfo['email']); ?>" class="layui-input" disabled style="cursor: not-allowed !important;"> </div>
                    <?php if($userinfo['ischeck_email'] == '1'): ?>
                    <button class="layui-btn layui-iframe" type="button" href="<?php echo url('changeemail'); ?>" lay-data="{width:'440px',height:'250px',title:'修改邮箱'}">修改</button>
					<?php else: ?>
                    <button class="layui-btn layui-iframe layui-btn-danger" type="button" href="<?php echo url('actemail'); ?>" lay-data="{width:'440px',height:'250px',title:'激活邮箱'}">激活</button>
					<?php endif; ?>
                </div>
                <?php echo hook("userConfig"); ?>
                <div class="layui-form-item"> <button class="layui-btn" key="set-mine" lay-filter="formSubmit" lay-submit="">确认修改</button> </div>
            </form>
        </div>
        <div class="layui-form layui-form-pane layui-tab-item">
            <div class="layui-form-item">
                <div class="avatar-add">
                    <p>建议尺寸168*168，支持jpg、png、gif，最大不能超过50KB</p> <button type="button" class="layui-btn upload-img"> <i class="layui-icon"></i>上传头像 </button><input class="layui-upload-file" type="file" accept="undefined" name="file">
                    <img src="<?php echo htmlentities($userinfo['avatar']); ?>"> <span class="loading"></span>
                </div>
            </div>
        </div>
        <div class="layui-form-pane layui-tab-item">
            <form class="layui-form" action="<?php echo url('member/index/changepwd'); ?>" method="post">
                <div class="layui-form-item"> <label class="layui-form-label">旧密码</label>
                    <div class="layui-input-inline"> <input type="password" name="oldpassword" required="" lay-verify="required" autocomplete="off" class="layui-input"> </div>
                </div>
                <div class="layui-form-item"> <label class="layui-form-label">新密码</label>
                    <div class="layui-input-inline"> <input type="password" name="newpassword" required="" lay-verify="required" autocomplete="off" class="layui-input"> </div>
                </div>
                <div class="layui-form-item"> <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-inline"> <input type="password" name="renewpassword" required="" lay-verify="required" autocomplete="off" class="layui-input"> </div>
                </div>
                <div class="layui-form-item"> <button class="layui-btn" key="set-mine" lay-filter="formSubmit" lay-submit="">确认修改</button> </div>
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
    </div>
</div>

</body>

</html>