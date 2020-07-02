<?php /*a:1:{s:55:"/var/www/application/cms/view/cms/public_categorys.html";i:1589819576;}*/ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<HEAD>
    <title>YxjCMS</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/static/libs/zTree/metroStyle.css">
	<style>
	body {background-color: white; margin:0; padding:0; text-align: center; }
	div, p, table, th, td {list-style:none; margin:0; padding:0; color:#333; font-size:12px; font-family:dotum, Verdana, Arial, Helvetica, AppleGothic, sans-serif; }
	#testIframe {margin-left: 10px;}
	</style>
    <script src="/static/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/static/libs/zTree/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/static/libs/jquery.cookie.min.js"></script>
    <script type="text/javascript">
    <!--
    var zTree;
    var demoIframe;
    var zNodes = <?php echo $json; ?>;
    var setting = {
        data: {
            key: {
                name: "catname"
            },
            simpleData: {
                enable: true,
                idKey: "id",
                pIdKey: "parentid"
            }
        },
        callback: {
            //捕获单击节点之前的事件回调函数
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return true;
                }
            },
            onClick: function(event, treeId, treeNode) {
                //栏目ID
                var catid = treeNode.catid;
                //保存当前点击的栏目ID
                $.cookie("tree_catid", catid);
            }
        }
    };
    $(document).ready(function() {
        //初始化
        $.fn.zTree.init($("#tree"), setting, zNodes);
        //获取对象
        var zTree = $.fn.zTree.getZTreeObj("tree");
        //全选
        $("#ztree_expandAll").click(function() {
            if ($(this).data("open")) {
                zTree.expandAll(false);
                $(this).data("open", false);
            } else {
                zTree.expandAll(true);
                $(this).data("open", true);
            }
        });
        //定位到上次打开的栏目，进行展开tree_catid
        var tree_catid = $.cookie('tree_catid');
        if (tree_catid) {
            var nodes = zTree.getNodesByParam("catid", tree_catid, null);
            zTree.selectNode(nodes[0]);
        }
    });
    //-->
    </script>
</head>

<body>
    <table border=0 height=400px align=left>
        <tr>
            <td align=left valign=top>
                <ul class="ztree" style="margin-left: 5px;margin-top:5px; padding: 0;">
                    <li><a title="全部展开、折叠 "><span class="button ico_open"></span><span id="ztree_expandAll" data-open="false">全部展开、折叠 </span></a> </li>
                </ul>
                <ul id="tree" class="ztree" style="overflow:auto;"></ul>
            </td>
        </tr>
    </table>
</body>

</HTML>