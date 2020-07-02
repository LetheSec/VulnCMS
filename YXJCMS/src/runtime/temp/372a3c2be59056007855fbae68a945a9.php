<?php /*a:2:{s:62:"/var/www/application/admin/view/auth_manager/managergroup.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">编辑访问权限</div>
    <div class="layui-card-body">
        <form class="layui-form form-horizontal" action="<?php echo url('writeGroup'); ?>" method="post">
            <div class="zTreeDemoBackground left">
                <ul class="ztree" style="margin-left: 5px;margin-top:5px; padding: 0;">
                    <li><a title="全部展开、折叠 "><span class="button ico_open"></span><span id="ztree_expandAll" data-open="false">全部展开、折叠 </span></a> </li>
                </ul>
                <ul id="treeDemo" class="ztree"></ul>
            </div>
            <input type="hidden" name="rules" value="" />
            <input type="hidden" name="id" value="<?php echo htmlentities($group_id); ?>" />
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn ajax-post" lay-submit="" lay-filter="*" target-form="form-horizontal">立即提交</button>
                    <button class="layui-btn layui-btn-normal" type="button" onclick="javascript:history.back(-1);">返回</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
<script>
layui.use(['jquery', 'ztree'], function() {
    var $ = layui.$;
    //配置
    var setting = {
        //设置 zTree 的节点上是否显示 checkbox / radio
        check: {
            enable: true,
            chkboxType: { "Y": "ps", "N": "ps" }
        },
        data: {
            simpleData: {
                enable: true,
                idKey: "nid",
                pIdKey: "parentid",
            }
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return false;
                } else {
                    return true;
                }
            },
            onClick: function(event, treeId, treeNode) {
                //栏目ID
                var catid = treeNode.catid;
                //保存当前点击的栏目ID
                setCookie('tree_catid', catid, 1);
            }
        }
    };
    //节点数据
    var zNodes = <?php echo $json; ?>;
    //zTree对象
    var zTree = null;
    $(document).ready(function() {
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        zTree = $.fn.zTree.getZTreeObj("treeDemo");
        zTree.expandAll(true);
        $("#ztree_expandAll").click(function() {
            if ($(this).data("open")) {
                zTree.expandAll(false);
                $(this).data("open", false);
            } else {
                zTree.expandAll(true);
                $(this).data("open", true);
            }
        });
    });

    layui.use(['layer', 'form'], function() {
        var layer = layui.layer,
            form = layui.form;
        //通用表单post提交
        $('.ajax-post').on('click', function(e) {
            var target, query, _form;
            var target_form = $(this).attr('target-form');
            var that = this;
            var nead_confirm = false;

            _form = $('.' + target_form);
            //处理被选中的数据
            _form.find('input[name="rules"]').val("");
            var nodes = zTree.getCheckedNodes(true);
            var str = "";
            $.each(nodes, function(i, value) {
                if (str != "") {
                    str += ",";
                }
                str += value.id;
            });
            _form.find('input[name="rules"]').val(str);

            if ($(this).hasClass('confirm')) {
                if (!confirm('确认要执行该操作吗?')) {
                    return false;
                }
            }
            if ($(this).attr('url') !== undefined) {
                target = $(this).attr('url');
            } else {
                target = _form.attr("action");
            }
            query = _form.serialize();

            $.post(target, query).success(function(data) {
                if (data.code == 1) {
                    if (data.url) {
                        layer.msg(data.msg + ' 页面即将自动跳转~');
                    } else {
                        layer.msg(data.msg);
                    }
                    setTimeout(function() {
                        if (data.url) {
                            location.href = data.url;
                        } else {
                            location.reload();
                        }
                    }, 1500);
                } else {
                    layer.msg(data.msg);
                    setTimeout(function() {
                        if (data.url) {
                            location.href = data.url;
                        }
                    }, 1500);
                }
            });
            return false;
        });
    });
});
</script>

</body>

</html>