<?php /*a:4:{s:48:"/var/www/application/about/view/index/index.html";i:1589784007;s:43:"/var/www/application/about/view/header.html";i:1589781006;s:42:"/var/www/application/about/view/sider.html";i:1589786390;s:43:"/var/www/application/about/view/footer.html";i:1589782641;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])): ?><?php echo htmlentities($SEO['title']); ?><?php endif; ?><?php echo htmlentities($SEO['site_title']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($SEO['keyword']); ?>" />
    <meta name="description" content="<?php echo htmlentities($SEO['description']); ?>" />
    <link rel="stylesheet" href="/static/modules/cms/css/base.css">
    <link rel="stylesheet" href="/static/modules/cms/css/style.css">
    <script src="/static/modules/cms/js/jquery.min.js"></script>
    <script src="/static/modules/cms/js/jquery.SuperSlide.2.1.3.js"></script>
</head>

<body>
<!--S 头部-->
<div class="header">
    <div class="w1200">
        <div class="logo fl">
            <img src="/static/modules/cms/images/logo.png" alt="" />
        </div>
        <div class="topright fr">
            <!--S 搜索栏-->
            <div class="topbtn fr">
                <div class="search-box fr">
                    <span class="butn hov"><i></i></span>
                    <div class="share-sub" style="width: 0px;">
                        <form name="formsearch" action="<?php echo url('cms/index/search'); ?>">
                            <input class="fl tex" type="text" name="keyword" value="请输入关键字" onfocus="if(this.value==defaultValue)this.value=''" onblur="if(this.value=='')this.value=defaultValue">
                            <input type="submit" value="" class="fl sub-btn ico">
                        </form>
                    </div>
                </div>
            </div>
            <!--E 搜索栏-->
            <!--S 导航-->
            <div class="nav fl">
                <ul class="navlist">
                    <li <?php if(!isset($catid)): ?>class="hover"<?php endif; ?>><a href="<?php echo url('cms/index/index'); ?>" title="首页">首页</a></li>
                    <?php $cache = 3600;$cacheID = to_guid_string(array('module'=>'cms','action'=>'category','catid'=>'0','cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(array('module'=>'cms','action'=>'category','catid'=>'0','cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li <?php if(isset($catid) && in_array($catid,explode(',',$vo['arrchildid']))): ?>class='hover'<?php endif; ?>>
                    <a href="<?php echo htmlentities($vo['url']); ?>" title="<?php echo htmlentities($vo['catname']); ?>"><?php echo htmlentities($vo['catname']); ?></a>
                    <!--判断是否有子栏目-->
                    <?php if($vo['child'] == '1'): ?>
                    <div class="subnav">
                        <?php $cache = 3600;$cacheID = to_guid_string(array('module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(array('module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; foreach($data as $key=>$vo): ?>
                        <a href="<?php echo htmlentities($vo['url']); ?>" title="<?php echo htmlentities($vo['catname']); ?>"><?php echo htmlentities($vo['catname']); ?></a>
                        <?php endforeach; ?>
                        
                    </div>
                    <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
            </div>
            <!--E 导航-->
            <!--S 会员中心 需要安装会员模块-->
            <?php if(isModuleInstall('member')): ?>
            <div class="user fr">
                <ul>
                    <?php if(!app('session')->get('user_auth.uid')): ?>
                    <li class="log"><a href="<?php echo url('member/index/login'); ?>">登录</a></li>
                    <li class="reg"><a href="<?php echo url('member/index/register'); ?>">注册</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo url('member/index/index'); ?>">会员：<?php echo htmlentities(app('session')->get('user_auth.username')); ?></a></li>
                    <li><a href="<?php echo url('member/index/logout'); ?>">退出</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <!--E 会员中心-->
        </div>
    </div>
    <!--E 头部-->
</div>
<style type="text/css">
    body {
        background: #f6f6f6;
    }
</style>
<div class="headline-bg"></div>
<div class="main" style="position: relative;">
    <div class="w1200">
        <div class="container-top">
            <h2>关于我们<span>About us</span></h2>
            <!--S 面包屑 -->
            <div class="bread-nav">
                <a href="">首页</a>&gt; <a href="/about/index/index/?file=about.php">关于我们</a>
            </div>
            <!--E 面包屑 -->
        </div>
        <div class="content">
            <!-- 左栏 -->
            <div class="content-left">
    <h2 class="content-title">关于我们</h2>
    <div class="menu-list">

        <a href="/joinus/index/index/" class="transition active">加入我们</a>
        <a href="/about/index/blog/?url=https://lethe.site/about/" class="transition active">作者博客</a>

    </div>
    <!--S 联系我们 -->
    <div class="content-contact">
        <div class="h2bg">
            <h2>联系我们</h2>
        </div>
        <div class="cc-info">
            <!--此处变量可以后台配置设置调用-->
            <p>手　机：178-5114-6833</p>
            <p>邮　箱：admin@admin.com</p>
            <p>地　址：江苏省徐州市大学路一号</p>

            <!--此处变量可以后台配置设置调用-->
        </div>
    </div>
    <!--E 联系我们 -->
</div>
            <!-- 右栏 -->
            <div class="content-right">
                <div class="content-contact">
                    <h1  style="font-size:30px; padding-left: 35%">关于我们</h1>
                </div>
                <br><br>
                <div class="about" deep="4">
                    <p>邮箱：<?php echo htmlentities($info['email']); ?></p>
                    <p>手机：<?php echo htmlentities($info['phone']); ?></p>
                    <p>学校：<?php echo htmlentities($info['school']); ?></p>
                    <p>地址：<?php echo htmlentities($info['addr']); ?></p>
                    <br>
                    <img width="530" height="340" src="<?php echo htmlentities($info['img']); ?>">
                </div>
                <br><br>


            </div>
        </div>
    </div>
</div>

<!--S 底部-->
<div class="footer">
    <div class="w1200 clearfix">
        <div class="links">
            <!--此处可用安装友情链接模块-->
            <span>友情链接：</span>
            <a href="http://www.cumt.edu.cn/" target="_blank">中国矿业大学</a>
            <a href="http://is.cumt.edu.cn/" target="_blank">网络空间安全学院</a>
            <a href="https://lethe.site/" target="_blank">个人博客</a>
            <a href="http://www.thinkphp.cn/" target="_blank">ThinkPHP</a>
            <!--此处可用安装友情链接模块-->
        </div>
        <ul class="botnavlist fl">
            <?php $cache = 3600;$cacheID = to_guid_string(array('module'=>'cms','action'=>'category','catid'=>'0','cache'=>'3600','where'=>'id in(1,6,8)','order'=>'listorder ASC','num'=>'4','return'=>'data','page'=>'0',));if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(array('module'=>'cms','action'=>'category','catid'=>'0','cache'=>'3600','where'=>'id in(1,6,8)','order'=>'listorder ASC','num'=>'4','return'=>'data','page'=>'0',));if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo htmlentities($vo['url']); ?>" title="<?php echo htmlentities($vo['catname']); ?>"><?php echo htmlentities($vo['catname']); ?></a>
                <div class="drop clearfix">
                    <!--判断是否有子栏目-->
                    <?php if($vo['child'] == '1'): $cache = 3600;$cacheID = to_guid_string(array('module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(array('module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>'0',));if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo htmlentities($vo['url']); ?>" title="<?php echo htmlentities($vo['catname']); ?>"><?php echo htmlentities($vo['catname']); ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            
        </ul>
        <div class="qcode fr">
            <!--此处变量可以后台配置设置调用-->
            <div class="btel fl">
                <p class="p3">邮　箱：LetheSec@foxmail.com</p>
                <p class="p3">手　机：178-5114-6833</p>
                <p class="p3">地　址：江苏省徐州市大学路一号</p>
            </div>

            <!--此处变量可以后台配置设置调用-->
        </div>
    </div>


    <!--E 底部-->
    <script src="/static/modules/cms/js/base.js"></script>
    </body>

    </html>