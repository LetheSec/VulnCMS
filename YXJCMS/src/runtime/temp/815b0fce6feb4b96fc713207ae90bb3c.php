<?php /*a:2:{s:48:"/var/www/application/cms/view/cms/classlist.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    
    
<style type="text/css">
.childrenBody {
    background: #fff;
}
</style>
<div class="layui-form">
        <blockquote class="layui-elem-quote quoteBox">
            <form class="layui-form search-from" method="get">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="laydate" placeholder="搜索时间范围">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" class="layui-input searchVal" placeholder="请输入标题关键词">
                    </div>
                    <a class="layui-btn search_btn" data-type="reload">搜索</a>
                </div>
            </form>
        </blockquote>
    <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm" href="<?php echo url('add',['catid'=>$catid]); ?>">新增内容</a>
      <a class="layui-btn layui-btn-sm layui-btn-danger confirm layui-batch-all" data-href='<?php echo url("delete",["catid"=>$catid]); ?>'>批量删除</a>
      <a class="layui-btn layui-btn-sm layui-btn-normal" lay-event="move">批量移动</a>
      <a class="layui-btn layui-btn-sm layui-btn-danger" href="<?php echo url('recycle',['catid'=>$catid]); ?>">回收站</a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a href='<?php echo url("edit",["catid"=>$catid]); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("delete",["catid"=>$catid]); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="title">
  {{# if(d.flag.indexOf("1")!==-1){ }}
  <span class="text-danger">[置顶]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("2")!==-1){ }}
  <span class="text-danger">[头条]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("3")!==-1){ }}
  <span class="text-danger">[特荐]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("4")!==-1){ }}
  <span class="text-danger">[推荐]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("5")!==-1){ }}
  <span class="text-danger">[热点]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("6")!==-1){ }}
  <span class="text-danger">[幻灯]</span>
  {{#  } }}
  {{# if(d.thumb!==0){ }}
  <span class="text-success">[有图]</span>
  {{#  } }}
  {{ d.title }}
</script>
<script type="text/html" id="username">
	{{# if(d.sysadd==1){ }}
	{{ d.username }}
	{{#  } else { }}
	<span class="text-danger">{{ d.username }}</span>
	{{#  } }}
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" data-href='<?php echo url("setstate",["catid"=>$catid]); ?>?id={{d.id}}' value="{{d.id}}" lay-skin="switch" lay-text="通过|待审核" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
</script>
<div id="remove" style="display: none;">
	<div class="box-body" style="padding: 20px;">
		<blockquote class="layui-elem-quote">只能将数据移动到相同模型的栏目下，不同模型的数据移动将被忽略</blockquote>
		<div class="layui-form">
		    <div class="layui-form-item">
	            <select name="remove" lay-verify="required">
	                <option></option>
	                <?php echo $string; ?>
	            </select>
		    </div>
		</div>
	</div>
</div>
<style type="text/css">
.layui-layer-page .layui-layer-content {
    overflow: inherit;
}
</style>

    
<script>
layui.use(['table', 'laydate'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form,
        laydate = layui.laydate;
    laydate.render({
        elem: '#laydate',
        range: true,
    });
    table.render({
        elem: '#dataTable',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("cms/cms/classlist",["catid"=>$catid]); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'id', width: 60, title: 'ID' },
                { field: 'title', title: '标题',templet: '#title'},
                { field: 'hits', width: 80, title: '点击量' },
                { field: 'updatetime', width: 160, title: '更新时间' },
                { field: 'username', width: 80, title: '发布人',templet: '#username' },
                { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'status', width: 100, align: "center", title: '状态', templet: '#statusTpl', unresize: true },
                { fixed: 'right', width: 120, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });

    $(".search_btn").on("click", function() {
        table.reload("dataTable", {
            page: {
                curr: 1 //重新从第 1 页开始
            },
            where: {
                search_field: 'title',
                keyword: $(".searchVal").val(),
                filter_time: 'inputtime',
                filter_time_range: $("#laydate").val()
            }
        })
    });

        //监听单元格编辑
    table.on('edit(dataTable)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("cms/cms/listorder",["catid"=>$catid]); ?>', {'id': data.id,'value':value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                layer.msg(data.msg);
            }

        })
    });

    table.on('toolbar(dataTable)', function(obj) {
            var checkStatus = table.checkStatus(obj.config.id),
                
                ids = [],
                id = tag = '';
        if (obj.event === 'move') {
            var data = checkStatus.data;
            if (data.length > 0) {
                for (let i in data) {
                    id += tag + data[i].id;
                    tag = '|';
                    //ids.push(data[i].id);
                }
                layer.open({
                  title: false,
				  type: 1,
				  content: $('#remove'),
				  area: ['300px', '250px'],
                  btn: ['移动'],
                  yes: function(index, layero){
                      var tocatid = $("select[name='remove']").val();
                      if (tocatid == 0) {
                            layer.msg("请选择移动的栏目");
                            return;
                      }
                      $.post('<?php echo url("cms/cms/remove",["catid"=>$catid]); ?>', { 'ids': id,'tocatid':tocatid}, function(data) {
                           if (data.code == 1) {
                              layer.msg(data.msg);
                              layer.close(index);
                           }else{
                            layer.msg(data.msg);
                           }
                      })
                  }

				});
            } else {
                layer.msg("请选择需要移动的数据");
            }

        }
    });

});
</script>

</body>

</html>