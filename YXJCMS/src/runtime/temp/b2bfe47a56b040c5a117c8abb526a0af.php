<?php /*a:1:{s:65:"/var/www/public/../public/templates/default/member/published.html";i:1589651409;}*/ ?>
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
        <li class="layui-this">我的稿件</li>
    </ul>
    <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
        	<table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="barTool">
    {{# if(d.status!=1){ }}
    <a href='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("del"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
    {{#  } else{ }}
    <a class="layui-btn layui-btn-xs layui-btn-danger layui-btn-disabled">不可操作</a>
    {{#  } }}
</script>
<script type="text/html" id="status">
    {{#  if(d.status==-1){ }}
<button class="layui-btn layui-btn-danger layui-btn layui-btn-xs">已退稿</button>
    {{#  } else if(d.status==0){ }}
<button class="layui-btn layui-btn-danger layui-btn layui-btn-xs">待审核</button>
    {{#  } else if(d.status==1){ }}
<button class="layui-btn layui-btn layui-btn-xs">已通过</button>
    {{#  } }}
</script>
<script>
layui.config({
    version: "3.0.0",
    base: '/static/modules/member/mods/'
}).extend({
    fly: 'index'
}).use('fly');
</script>
<script>
layui.use(['table'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("published"); ?>',
        cols: [
            [
                { field: 'id', width: 60, title: 'ID' },
                { field: 'title', title: '标题'},
                { field: 'catname',width: 120, title: '所属栏目'},
                { field: 'create_time', width: 180, title: '发布时间' },
                { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'status', width: 80, title: '状态',align: "center", templet: '#status' },
                { fixed: 'right', width: 120, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });

});
</script>
    </div>
</div>

</body>

</html>