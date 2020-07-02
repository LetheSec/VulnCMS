<?php /*a:2:{s:64:"/var/www/public/../public/templates/default/member/register.html";i:1589651409;s:61:"/var/www/public/../public/templates/default/member/layui.html";i:1589651409;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>会员注册</title>
    <link rel="stylesheet" type="text/css" href="/static/libs/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/modules/member/css/style.css" />
    <script src="/static/libs/layui/layui.js"></script>
</head>

<body>
    <div id="mydiv">
        <div class="login-main">
            <div class="layui-elip">会员注册</div>
            <form class="layui-form" action="<?php echo url('register'); ?>">
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">手机号</label>
                        <input type="text" name="mobile" lay-verify="phone|required" autocomplete="off" placeholder="手机号" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">用户名</label>
                        <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="账号" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">邮箱</label>
                        <input type="text" name="email" lay-verify="email|required" autocomplete="off" placeholder="邮箱" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">密码</label>
                        <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">密码确认</label>
                        <input type="password" name="password_confirm" lay-verify="required" autocomplete="off" placeholder="密码确认" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label class="item">昵称</label>
                        <input type="text" name="nickname" lay-verify="required" autocomplete="off" placeholder="昵称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item verify-box">
                        <label class="item">验证码</label>
                        <input type="text" name="verify" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                        <img id="verify" src="<?php echo url('api/checkcode/getVerify','font_size=18&imageW=130&imageH=38'); ?>" alt="验证码" class="captcha">
                    </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-inline login-btn">
                            <button class="layui-btn" lay-filter="login" lay-submit>注册</button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-trans layui-form-item layadmin-user-login-other">
                            <a href="<?php echo url('login'); ?>" class="layadmin-user-jump-change layadmin-link layui-hide-xs">用已有帐号登入</a>
                            <a href="<?php echo url('login'); ?>" class="layadmin-user-jump-change layadmin-link layui-hide-sm layui-show-xs-inline-block">登入</a>
                        </div>
                    </div>
            </form>
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
</body>

</html>