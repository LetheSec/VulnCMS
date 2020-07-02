<?php /*a:1:{s:67:"/var/www/public/../public/templates/default/member/declaration.html";i:1589651409;}*/ ?>
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
            <blockquote class="layui-elem-quote">
                <h3>【免责声明】</h3>
                <br>
                <p>1、您在发布前应先阅读发布规范。</p>
                <p>2、本站不保证能收录您发布的每一篇资讯，分享前请先明确这一点。</p>
                <p>3、您发布的资讯可能不会被网站收录，这很可能只是单方面因为网站认为本资讯不适合本站的原因而非您的资讯有问题。</p>
                <p>4、如果您发布的资讯审核通过了，但被用户举报等问题，那么网站有权对已经通过审核的文章进行删除操作。</p>
                <p>5、对于多次发布不合格咨询的会员，本站将冻结一定时间的权限。</p>
                <br>
                <p>如果您不能接受以上条款，请不要发布资讯，以免因为发布的资讯没有被收录或是已经收录的资讯被删除，而发生不愉快的事。</p>
            </blockquote>
            <div class="continued">
                <a href="<?php echo url('publish','step=2'); ?>" class="layui-btn">同意并发布</a>
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