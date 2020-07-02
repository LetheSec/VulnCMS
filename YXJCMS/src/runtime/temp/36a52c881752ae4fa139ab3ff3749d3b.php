<?php /*a:2:{s:48:"/var/www/application/admin/view/index/index.html";i:1589651136;s:43:"/var/www/application/admin/view/layout.html";i:1590224794;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>YXJCMS后台管理系统</title>
    <meta name="author" content="YXJCMS">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/global.css">
    <link rel="stylesheet" href="/static/common/font/iconfont.css">
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <a href="#" class="logo">YXJCMS后台</a>
            <a href="javascript:;" class="hideMenu icon iconfont icon-other"></a>
            <!--<ul class="layui-nav mobileTopLevelMenus">
                <li class="layui-nav-item">
                    <a href="javascript:;">导航分类<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">内容管理</a></dd>
                        <dd><a href="javascript:;">用户中心</a></dd>
                        <dd><a href="javascript:;">系统设置</a></dd>
                        <dd><a href="javascript:;">使用文档</a></dd>
                    </dl>
                </li>
            </ul>-->
			<ul class="layui-nav Menus-winner topLevelMenus" id="J_B_main_block">
                <!--AJAX数据-->
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item"><a href="<?php echo url('/'); ?>" target="_blank"><i class="iconfont icon-homepage"></i><span class="winner-hide">&nbsp;站点主页</span></a></li>
                <li class="layui-nav-item"><a href="javascript:;"><i class="iconfont icon-richangqingli"></i><span class="winner-hide">&nbsp;清理缓存</span></a>
                    <dl class="layui-nav-child" id="deletecache">
                        <dd><a href="javascript:;" data-type="all">一键清理缓存<span class="layui-badge-dot"></span></a></dd>
                        <dd><a href="javascript:;" data-type="data">清理数据缓存</a></dd>
                        <dd><a href="javascript:;" data-type="template">清理模板缓存</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="javascript:;"><img src="/static/admin/img/avatar.png" class="layui-nav-img userAvatar" width="35" height="35"><?php echo htmlentities($userInfo['username']); ?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('admin/index/logout'); ?>"><i class="iconfont icon-tuichu"></i>&nbsp;安全退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="navBar layui-side-scroll" id="navBar">
                <ul class="layui-nav layui-nav-tree" id="B_menubar">
                    <!--AJAX数据-->
                </ul>
            </div>
        </div>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="layui-body" id="B_frame">
            <div class="layui-tab mag0" id="top_tabs_box" lay-filter="Tab">
                <div class="tab-go-refresh" id="J_refresh"><i class="iconfont icon-shuaxin1"></i></div>
                <div class="tab-go-left" id="page-prev"><i class="layui-icon layui-icon-left"></i></div>
                <ul class="layui-tab-title top_tab" id="B_history">
                    <li class="layui-this" lay-id="default"><i class="iconfont icon-homepage"></i>&nbsp;后台首页
                    </li>
                </ul>
                <div class="tab-right">
                    <div class="tab-go-right" id="page-next"><i class="layui-icon layui-icon-right"></i></div>
                    <ul class="layui-nav closeBox">
                        <li class="layui-nav-item">
                            <a href="javascript:;"><i class="layui-icon layui-icon-radio"></i>&nbsp;页面操作</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:;" class="closePageAll"><i class="layui-icon layui-icon-close"></i>&nbsp;关闭全部</a></dd>
                                <!--<dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a></dd>
                        -->
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="layui-tab-content clildFrame">
                <div class="iframe_box">
                    <iframe id="iframe_default" src="<?php echo url('main/index'); ?>" style="height: 100%; width: 100%;display:none;" lay-id="default" frameborder="0" scrolling="auto"></iframe>
                </div>
            </div>
        </div>
        <div class="layui-footer">
            © YXJCMS v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?>
        </div>
    </div>
    <script src="/static/libs/layui/layui.js"></script>
    <script type="text/javascript">
    layui.use(['element', 'layer', 'jquery'], function() {
        var $ = layui.jquery,
            element = layui.element,
            layer = layui.layer;
        var SUBMENU_CONFIG = <?php echo $SUBMENU_CONFIG; ?>;
        var openTabNum = 10; //最大可打开窗口数量
        //iframe 加载事件
        var iframe_default = document.getElementById('iframe_default');
        var def_iframe_height = 0;
        $(iframe_default.contentWindow.document).ready(function() {
            /*setTimeout(function() {
                $('#loading').hide();
            }, 500);*/
            $(iframe_default).show();
        });
        var html = [];
        $.each(SUBMENU_CONFIG, function(i, o) {
            html.push('<li class="layui-nav-item"><a href="javascript:;" title="' + o.title + '" lay-id="' + o.id + '"><i class="iconfont ' + o.icon + '"></i>&nbsp;' + o.title + '</a></li>');
        });
        $('#J_B_main_block').html(html.join(''));
        element.render(); //重新渲染
        //维持在线
        /*setInterval(function() {
            online();
        }, 60000);*/


        //顶部导航点击
        $('#J_B_main_block').on('click', 'a', function(e) {
            //取消事件的默认动作
            e.preventDefault();
            //终止事件 不再派发事件
            e.stopPropagation();
            $(this).parent().addClass('current').siblings().removeClass('current');
            var data_id = $(this).attr('lay-id'),
                data_list = SUBMENU_CONFIG[data_id],
                html = [],
                child_html = [],
                child_index = 0,
                B_menubar = $('#B_menubar');

            if (B_menubar.attr('lay-id') == data_id) {
                return false;
            };
            //显示左侧菜单
            //console.log(data_list['items']);
            show_left_menu(data_list['items']);
            B_menubar.html(html.join('')).attr('lay-id', data_id);
            element.render(); //重新渲染
            //左侧导航复位
            //$("#B_menunav").css({ "margin-top": "0px" });
            //检查是否应该出现上一页、下一页
            //checkMenuNext();
            //
            //显示左侧菜单
            function show_left_menu(data) {
                for (var attr in data) {
                    if (data[attr] && typeof(data[attr]) === 'object') {
                        //循环子对象
                        if (!data[attr].url && attr === 'items') {
                            //子菜单添加识别属性
                            $.each(data[attr], function(i, o) {
                                child_index++;
                                o.isChild = true;
                                o.child_index = child_index;
                            });
                        }
                        show_left_menu(data[attr]); //继续执行循环(筛选子菜单)
                    } else {
                        if (attr === 'title') {
                            data.url = data.url ? data.url : '#';
                            if (!(data['isChild'])) {
                                //一级菜单
                                html.push('<li class="layui-nav-item layui-nav-itemed"><a href="' + data.url + '" lay-id="' + data.id + '"><i class="iconfont ' + data.icon + '"></i>&nbsp;<b>' + data.title + '</b></a>');
                            } else {
                                //二级菜单
                                child_html.push('<dd><a href="' + data.url + '" lay-id="' + data.id + '"><i class="iconfont ' + data.icon + '"></i>&nbsp;' + data.title + '</a></dd>');
                                //二级菜单全部push完毕
                                if (data.child_index == child_index) {
                                    html.push('<dl class="layui-nav-child">' + child_html.join('') + '</dl></li>');
                                    child_html = [];
                                }
                            }
                        }
                    }
                }
            };
        });

        //后台位在第一个导航
        $('#J_B_main_block li:first > a').trigger("click");

        //左边菜单点击
        $('#B_menubar').on('click', 'a', function(e) {
            e.preventDefault();
            e.stopPropagation();
            //iframe_height();
            var $this = $(this),
                _dt = $this.parent(),
                _dl = $this.next('dl');
            //$("#B_menubar li").removeClass('current');
            //当前菜单状态
            //_dt.addClass('current').siblings('dt.current').removeClass('current');
            //子菜单显示&隐藏
            if (_dl.length) {
                //_dt.toggleClass('current');
                //_dl.toggle();
                //检查上下分页
                //checkMenuNext();
                return false;
            };
            if ($("#B_history li").length == openTabNum) {
                layer.msg('只能同时打开' + openTabNum + '个选项卡哦。不然系统会卡的！');
                return;
            }

            //$('#loading').show().focus(); //显示loading
            //$('#B_history li').removeClass('current');
            var data_id = $(this).attr('lay-id'),
                li = $('#B_history li[lay-id=' + data_id + ']');
            var href = this.href;

            iframeJudge({
                elem: $this,
                href: href,
                id: data_id
            });

        });

        //判断显示或创建iframe
        function iframeJudge(options) {
            var elem = options.elem,
                href = options.href,
                id = options.id,
                li = $('#B_history li[lay-id=' + id + ']');
            //如果iframe标签是已经存在的，则显示并让选项卡高亮,并不显示loading
            if (li.length > 0) {
                var iframe = $('#iframe_' + id);
                setTimeout(function() {
                    $('#loading').hide();
                }, 500);
                li.addClass('current');
                if (iframe[0].contentWindow && iframe[0].contentWindow.location.href !== href) {
                    iframe[0].contentWindow.location.href = href;
                }
                $('#B_frame iframe').hide();
                $('#iframe_' + id).show();
                showTab(li); //计算此tab的位置，如果不在屏幕内，则移动导航位置
            } else {
                //创建一个并加以标识
                var iframeAttr = {
                    src: href,
                    id: 'iframe_' + id,
                    frameborder: '0',
                    scrolling: 'auto',
                    height: '100%',
                    width: '100%'
                };
                var iframe = $('<iframe/>').prop(iframeAttr).appendTo('#B_frame .layui-tab-content .iframe_box');

                $(iframe[0].contentWindow.document).ready(function() {
                    $('#B_frame iframe').hide();
                    setTimeout(function() {
                        $('#loading').hide();
                    }, 500);
                    var li = $('<li>' + elem.html() + '<i class="layui-icon layui-unselect layui-tab-close">&#x1006;</i></li>').attr('lay-id', id);
                    li.appendTo('#B_history');
                    showTab(li); //计算此tab的位置，如果不在屏幕内，则移动导航位置
                    //$(this).show().unbind('load');
                });
            }
        }

        //点击一个tab页
        $('#B_history').on('click focus', 'li', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var data_id = $(this).attr('lay-id');
            if (data_id) {
                //选择顶部菜单
                var curid = data_id;
                if (curid == "default") curid = "changyong";
                var topmenu = getTopMenuByID(curid);
                var objtopmenu = $('#J_B_main_block').find("a[lay-id=" + topmenu.id + "]");
                if (objtopmenu.parent().attr("class") != "layui-this") {
                    //选中当前顶部菜单
                    objtopmenu.parent().addClass('layui-this').siblings().removeClass('layui-this');
                    //触发事件
                    objtopmenu.click();
                }
                //选择左边菜单
                $("#B_menubar").find(".layui-this").removeClass('layui-this');
                $("#B_menubar").find("a[lay-id=" + data_id + "]").parent().addClass('layui-this');
            }

            $(this).addClass('layui-this').siblings('li').removeClass('layui-this');
            /*try {
                var menuid = parseInt(data_id);
                if (menuid) {
                    setCookie("menuid", menuid);
                }
            } catch (err) {}*/
            $('#iframe_' + data_id).show().siblings('iframe').hide(); //隐藏其它iframe
        });

        //关闭一个tab页
        $('#B_history').on('click', '.layui-tab-close', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var li = $(this).parent(),
                prev_li = li.prev('li'),
                data_id = li.attr('lay-id');
            li.hide(60, function() {
                $(this).remove(); //移除选项卡
                $('#iframe_' + data_id).remove(); //移除iframe页面
                var current_li = $('#B_history li.layui-this');
                //找到关闭后当前应该显示的选项卡
                current_li = current_li.length ? current_li : prev_li;
                current_li.addClass('layui-this');
                cur_data_id = current_li.attr('lay-id');
                $('#iframe_' + cur_data_id).show();
            });
        });

        //上一个选项卡
        $('#page-prev').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var ul = $('#B_history'),
                current = ul.find('.layui-this'),
                li = current.prev('li');
            showTab(li);
        });


        //下一个选项卡
        $('#page-next').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var ul = $('#B_history'),
                current = ul.find('.layui-this'),
                li = current.next('li');
            showTab(li);
        });

        //显示顶部导航时作位置判断，点击左边菜单、上一tab、下一tab时公用
        function showTab(li) {
            if (li.length) {
                var ul = $('#B_history'),
                    li_offset = li.offset(),
                    li_width = li.outerWidth(true),
                    next_left = $('#page-next').offset().left, //右边按钮的界限位置
                    prev_right = $('#page-prev').offset().left + $('#page-prev').outerWidth(true); //左边按钮的界限位置
                if (li_offset.left + li_width > next_left) { //如果将要移动的元素在不可见的右边，则需要移动
                    var distance = li_offset.left + li_width - next_left; //计算当前父元素的右边距离，算出右移多少像素
                    ul.animate({
                        left: '-=' + distance
                    }, 200, 'swing');
                } else if (li_offset.left < prev_right) { //如果将要移动的元素在不可见的左边，则需要移动
                    var distance = prev_right - li_offset.left; //计算当前父元素的左边距离，算出左移多少像素
                    ul.animate({
                        left: '+=' + distance
                    }, 200, 'swing');
                }
                li.trigger('click');
            }
        }

        //刷新
        $('#J_refresh').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var index = layer.load();
            var id = $('#B_history .layui-this').attr('lay-id'),
                iframe = $('#iframe_' + id);
            if (iframe[0].contentWindow) {
                //common.js
                reloadPage(iframe[0].contentWindow);
                layer.close(index);
            }
        });

        //关闭全部选项卡
        $(".closePageAll").on("click", function() {
            if ($("#B_history li").length > 1) {
                $("#B_history li").each(function() {
                    data_id = $(this).attr('lay-id');
                    if (data_id != '' && data_id != 'default') {
                        //$(this).remove(); //移除选项卡
                        element.tabDelete("Tab", data_id);
                        $('#iframe_' + data_id).remove(); //移除iframe页面
                        $('#iframe_default').show();
                    }
                })

            } else {
                layer.msg("没有可以关闭的窗口了@_@");
            }

        })


        //通过菜单id查找菜单配置对象
        function getMenuByID(mid, menugroup) {
            var ret = {};
            mid = parseInt(mid);
            if (!menugroup) menugroup = SUBMENU_CONFIG;
            if (isNaN(mid)) {
                ret = menugroup['changyong'];
            } else {
                $.each(menugroup, function(i, o) {
                    if (o.id && parseInt(o.id) == mid) {
                        ret = o;
                        return false
                    } else if (o.items) {
                        var tmp = getMenuByID(mid, o.items);
                        if (tmp.id && parseInt(tmp.id) == mid) {
                            ret = tmp;
                            return false
                        }
                    }
                });
            }
            return ret;
        }

        function getTopMenuByID(mid) {
            var ret = {};
            var menu = getMenuByID(mid);
            if (menu) {
                if (menu.parent) {
                    var tmp = getTopMenuByID(menu.parent);
                    if (tmp && tmp.id) {
                        ret = tmp;
                    }
                } else {
                    ret = menu;
                }
            }
            return ret;
        }

        //隐藏左侧导航
        $(".hideMenu").click(function() {
            $(".layui-layout-admin").toggleClass("showMenu");

        })

        //重新刷新页面，使用location.reload()有可能导致重新提交
        function reloadPage(win) {
            var location = win.location;
            location.href = location.pathname + location.search;
        }


        //手机设备的简单适配
        var treeMobile = $('.site-tree-mobile'),
            shadeMobile = $('.site-mobile-shade')
        treeMobile.on('click', function() {
            $('body').addClass('site-mobile');
            $('.Menus-winner').removeClass('topLevelMenus');//解决top导航
            $('.Menus-winner').addClass('topLevelMenus-winner');//解决top导航

        });
        shadeMobile.on('click', function() {
            $('body').removeClass('site-mobile');
            $('.Menus-winner').addClass('topLevelMenus');//解决top导航
        });

        //用于维持在线
        function online() {}

        //清除缓存
        $(document).on('click', "dl#deletecache dd a", function() {
            $.ajax({
                url: '<?php echo url("admin/index/cache"); ?>',
                dataType: 'json',
                data: { type: $(this).data("type") },
                cache: false,
                success: function(res) {
                    if (res.code == 1) {
                        var index = layer.msg('清除缓存中，请稍候', { icon: 16, time: false, shade: 0.8 });
                        setTimeout(function() {
                            layer.close(index);
                            layer.msg("缓存清除成功！");
                        }, 1000);
                    }else{
                        layer.msg('清除缓存失败');
                    }
                },
                error: function() {
                    layer.msg('清除缓存失败');
                }
            });
        });


    })
    </script>
</body>

</html>