<?php /*a:4:{s:61:"/var/www/public/../public/templates/default/member/index.html";i:1589651409;s:62:"/var/www/public/../public/templates/default/member/header.html";i:1589651409;s:61:"/var/www/public/../public/templates/default/member/layui.html";i:1589651409;s:62:"/var/www/public/../public/templates/default/member/footer.html";i:1589820565;}*/ ?>
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
<div class="fly-msg" style="margin-bottom: 20px;"> Hi，<?php echo htmlentities($userinfo['username']); ?>，你已是我们的正式会员。 </div>
<div class="layui-row layui-col-space20">
    <div class="layui-col-md12">
        <div class="fly-home fly-panel">
            <img src="<?php echo htmlentities($userinfo['avatar']); ?>" alt="<?php echo htmlentities($userinfo['username']); ?>">
            <?php if($userinfo['vip']): ?>
            <i class="iconfont icon-vip1" title="VIP会员"></i>
            <?php endif; ?>
            <h1> <?php echo htmlentities($userinfo['username']); ?>(<?php echo htmlentities($userinfo['email']); ?>)</h1>
            <p class="fly-home-info">
                <i class="iconfont icon-time"></i><span><?php echo htmlentities($userinfo['reg_time']); ?> 加入</span>
            </p>
            <p class="fly-home-sign">（这个人懒得留下签名）</p>
        </div>
    </div>
    <div class="layui-row layui-col-space20 layui-card-box">
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    账户余额
                </div>
                <div class="layui-card-body">
                    <p class="amount"><?php echo htmlentities($userinfo['amount']); ?></p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    积分点数
                </div>
                <div class="layui-card-body">
                    <p class="point"><?php echo htmlentities($userinfo['point']); ?></p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    用户组
                </div>
                <div class="layui-card-body">
                    <p class="groupname"><?php echo htmlentities($userinfo['groupname']); ?></p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    上传登录时间
                </div>
                <div class="layui-card-body">
                    <p class="time"><?php echo htmlentities(time_format($userinfo['last_login_time'])); ?></p>
                </div>
            </div>
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