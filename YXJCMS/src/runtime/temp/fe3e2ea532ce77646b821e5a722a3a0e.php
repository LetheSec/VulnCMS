<?php /*a:1:{s:48:"/var/www/application/admin/view/index/login.html";i:1589819634;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="/static/libs/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/style.css" />
</head>

<body>
    <style type="text/css">
    body {
        background-color: #2D2D2D
    }
    </style>
    <div id="mydiv">
        <div class="login-main">
            <div class="layui-elip">YXJCMS管理系统&nbsp;<span class="version">v1.0.0</span></div>
            <form class="layui-form" action="<?php echo url('admin/index/login'); ?>">
                <div class="layui-form-item">
                    <div class="layui-input-inline input-item">
                        <label for="username">用户名</label>
                        <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="账号" class="layui-input">
                    </div>
                    <div class="layui-input-inline input-item">
                        <label for="password">密码</label>
                        <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="密码" class="layui-input">
                    </div>
                    <div class="layui-input-inline input-item verify-box">
                        <label for="verify">验证码</label>
                        <input type="text" name="verify" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                        <img id="verify" src="<?php echo url('api/checkcode/getVerify','font_size=18&imageW=130&imageH=38'); ?>" alt="验证码" class="captcha">
                    </div>
                    <div class="layui-input-inline login-btn">
                        <button class="layui-btn" lay-filter="login" lay-submit>登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/static/libs/layui/layui.js"></script>
    <script type="text/javascript">
    layui.use(['form', 'layer', 'jquery'], function() {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.jquery;
        //登录
        form.on("submit(login)", function(data) {
            var action = $(data.form).attr('action');
            $.post(action, $(data.form).serialize(), success, "json");
            return false;

            function success(data) {
                if (data.code) {
                    layer.msg('登入成功', {
                        offset: '15px',
                        icon: 1,
                        time: 1000
                    }, function() {
                        window.location.href = data.url;
                    });
                } else {
                    layer.msg(data.msg, { icon: 5 });
                    //刷新验证码
                    $("#verify").click();
                }
            }
        });

        //表单输入效果
        $(".login-main .input-item").click(function(e) {
            e.stopPropagation();
            $(this).addClass("layui-input-focus").find(".layui-input").focus();
        })
        $(".login-main .input-item .layui-input").focus(function() {
            $(this).parent().addClass("layui-input-focus");
        })
        $(".login-main .input-item .layui-input").blur(function() {
            $(this).parent().removeClass("layui-input-focus");
            if ($(this).val() != '') {
                $(this).parent().addClass("layui-input-active");
            } else {
                $(this).parent().removeClass("layui-input-active");
            }
        })

        //刷新验证码
        $("#verify").click(function() {
            var verifyimg = $("#verify").attr("src");
            $("#verify").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
        });
    })
    </script>
</body>

</html>