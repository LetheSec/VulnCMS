<?php /*a:2:{s:48:"/var/www/application/cms/view/category/edit.html";i:1589651136;s:49:"/var/www/application/admin/view/index_layout.html";i:1589819694;}*/ ?>
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
    <div class="layui-card-header">编辑栏目</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">基本设置</li>
                    <li>选项设置</li>
                    <li id="modeTab">模板设置</li>
                    <li>权限设置</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label>上级菜单</label>
                            <div class="w300">
                                <select name="parentid">
                                    <option value="0">作为顶级栏目</option>
                                    <?php echo $category; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>栏目标题 </label>
                            <div class="w300">
                                <input type="text" name="catname" autocomplete="off" lay-verify="required" placeholder="栏目名称" class="layui-input" value="<?php echo htmlentities($data['catname']); ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>唯一标识</label>
                            <div class="w300">
                                <input type="text" name="catdir" autocomplete="off" placeholder="唯一标识" class="layui-input" value="<?php echo htmlentities($data['catdir']); ?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">留空自动生成拼音，英文数字组成</div>
                        </div>
                        <div class="layui-form-item web_link">
                            <label>链接地址</label>
                            <div>
                                <div class="layui-input-inline w300">
                                    <input type="text" name="url" autocomplete="off" placeholder="自定义链接地址" class="layui-input" id="url" value="<?php echo htmlentities($data['url']); ?>">
                                </div>
                                <div class="layui-input-inline">
                                    <select lay-filter="fasttype">
                                        <option data-url="">常用内部链接</option>
                                        <option data-url="cms/index/index">首页</option>
                                        <option data-url="cms/index/lists?catid=2">列表页/单页</option>
                                        <option data-url="cms/index/shows?catid=2&id=1">详情页</option>
                                        <?php if(isModuleInstall('formguide')): ?>
                                        <option data-url="formguide/index/index?id=2">表单页</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="layui-form-mid layui-word-aux">有值时生效，内部链接格式:模块/控制器/操作?参数=参数值&...，外部链接则必须http://开头</div>
                        </div>
                        <div class="layui-form-item web_seo">
                            <label>栏目简介</label>
                            <div class="w300">
                                <textarea name="description" placeholder="栏目简介" class="layui-textarea"><?php echo htmlentities($data['description']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label>栏目图片</label>
                            <div class="layui-form-field-label">
                                <div class="js-upload-image">
                                    <?php echo \util\Form::images('image','',$data['image']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-item">
                            <label>在导航显示</label>
                            <div class="w300">
                                <input type="radio" name="status" value="1" title="显示" <?php if($data['status'] == '1'): ?>checked<?php endif; ?>>
                                <input type="radio" name="status" value="0" title="隐藏" <?php if($data['status'] == '0'): ?>checked<?php endif; ?>>
                            </div>
                        </div>
                            <div class="layui-form-item">
                                <label>显示排序</label>
                                <div class="w300">
                                    <input type="text" name="listorder" autocomplete="off" placeholder="显示排序" class="layui-input" value="<?php echo htmlentities($data['listorder']); ?>">
                                </div>
                            </div>
                            <div class="layui-form-item web_seo">
                                <label>网页标题</label>
                                <div class="w300">
                                    <input type="text" name="setting[meta_title]" autocomplete="off" placeholder="针对搜索引擎设置的标题" class="layui-input" value="<?php echo htmlentities($setting['meta_title']); ?>">
                                </div>
                            </div>
                            <div class="layui-form-item web_seo">
                                <label>网页关键词</label>
                                <div class="w300">
                                    <input type="text" name="setting[meta_keywords]" autocomplete="off" placeholder="关键字中间用半角逗号隔开" class="layui-input" value="<?php echo htmlentities($setting['meta_keywords']); ?>">
                                </div>
                            </div>
                            <div class="layui-form-item web_seo">
                                <label>网页描述</label>
                                <div class="w300">
                                    <textarea name="setting[meta_description]" placeholder="针对搜索引擎设置的网页描述" class="layui-textarea"><?php echo htmlentities($setting['meta_description']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="layui-form-item web_list">
                                <label>栏目首页模板</label>
                                <div class="w300">
                                    <select name="setting[category_template]">
                                        <option value="category.<?php echo config('template.view_suffix'); ?>" selected>默认栏目首页:category.<?php echo config('template.view_suffix'); ?></option>
                                        <?php if(is_array($tp_category) || $tp_category instanceof \think\Collection || $tp_category instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo); ?>" <?php if($setting['category_template'] == $vo): ?>selected<?php endif; ?>><?php echo htmlentities($vo); ?> </option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">新增模板以category_xx.<?php echo config('template.view_suffix'); ?>形式,【含有子栏目时生效】</div>
                            </div>
                            <div class="layui-form-item web_list">
                                <label>栏目列表页模板</label>
                                <div class="w300">
                                    <select name="setting[list_template]">
                                        <option value="list.<?php echo config('template.view_suffix'); ?>" selected>默认栏目列表页:list.<?php echo config('template.view_suffix'); ?></option>
                                        <?php if(is_array($tp_list) || $tp_list instanceof \think\Collection || $tp_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo); ?>" <?php if($setting['list_template'] == $vo): ?>selected<?php endif; ?>><?php echo htmlentities($vo); ?> </option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">新增模板以list_xx.<?php echo config('template.view_suffix'); ?>形式,【没有子栏目时生效】</div>
                            </div>
                            <div class="layui-form-item web_list">
                                <label>内容页模板</label>
                                <div class="w300">
                                    <select name="setting[show_template]">
                                        <option value="show.<?php echo config('template.view_suffix'); ?>" selected>默认内容页:show.<?php echo config('template.view_suffix'); ?></option>
                                        <?php if(is_array($tp_show) || $tp_show instanceof \think\Collection || $tp_show instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo); ?>" <?php if($setting['show_template'] == $vo): ?>selected<?php endif; ?>><?php echo htmlentities($vo); ?> </option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">新增模板以show_xx.<?php echo config('template.view_suffix'); ?>形式</div>
                            </div>
                            <div class="layui-form-item web_list">
                                <label>模板应用到子栏目</label>
                                <div class="w300">
                                    <input type="radio" name="template_child" value="1" title="是">
                                    <input type="radio" name="template_child" value="0" title="否" checked>
                                </div>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <?php if(isModuleInstall('member')): ?>
                            <div class="layui-form-item web_list">
                                <label>会员组权限</label>
                                <table class="layui-table" style="max-width: 250px;">
                                  <colgroup>
                                    <col width="150">
                                    <col width="100">
                                  </colgroup>
                                  <thead>
                                    <tr>
                                      <th>会员组名称</th>
                                      <th>允许投稿</th>
                                    </tr> 
                                  </thead>
                                  <tbody>
                                    <?php if(is_array($Member_Group) || $Member_Group instanceof \think\Collection || $Member_Group instanceof \think\Paginator): $i = 0; $__LIST__ = $Member_Group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                      <td><?php echo htmlentities($vo['name']); ?></td>
                                      <td><input type="checkbox" name="priv_groupid[]" value="add,<?php echo htmlentities($vo['id']); ?>" title="允许" lay-skin="primary" <?php  echo model("cms/CategoryPriv")->check_category_priv($privs,'add',$vo['id'],0); ?>></td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                  </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="hidden" name="modelid" value="<?php echo htmlentities($data['modelid']); ?>">
                    <input type="hidden" name="type" value="2">
                    <input name="id" type="hidden" value="<?php echo htmlentities($data['id']); ?>">
                    <div class="layui-form-item">
                        <div>
                            <button class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
                            <button class="layui-btn layui-btn-normal" type="button" onclick="javascript:history.back(-1);">返回</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>

    
<script type="text/javascript" src="/static/libs/viewer/viewer.min.js"></script>
<link rel="stylesheet" href="/static/libs/viewer/viewer.min.css">
<script type="text/javascript">
layui.use('form', function() {
    var form = layui.form;
    form.on('select(fasttype)', function(data) {
        $('#url').val($(data.elem).find("option:selected").attr("data-url"));
    });
});

$('.uploader-list').each(function () {
    $(this).viewer();
});
</script>

</body>

</html>