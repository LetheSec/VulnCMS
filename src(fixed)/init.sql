
CREATE DATABASE yxjcms;

use yxjcms;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for yxj_addons
-- ----------------------------
DROP TABLE IF EXISTS `yxj_addons`;
CREATE TABLE `yxj_addons`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '插件描述',
  `config` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '配置',
  `author` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '作者',
  `version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '版本号',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '安装时间',
  `has_adminlist` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否有后台列表',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '插件表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_addons
-- ----------------------------
INSERT INTO `yxj_addons` VALUES (2, 'saiyouems', '邮箱插件', '邮箱插件-by赛邮', '{\"from\":\"\",\"appid\":\"\",\"appkey\":\"\"}', '御宅男', '1.0.0', 1589651885, 0, 1);

-- ----------------------------
-- Table structure for yxj_admin
-- ----------------------------
DROP TABLE IF EXISTS `yxj_admin`;
CREATE TABLE `yxj_admin`  (
  `id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理账号',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理密码',
  `roleid` tinyint(4) UNSIGNED NULL DEFAULT 0,
  `encrypt` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '加密因子',
  `nickname` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '昵称',
  `last_login_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '最后登录时间',
  `last_login_ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `username`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_admin
-- ----------------------------
INSERT INTO `yxj_admin` VALUES (1, 'admin', '9724b5e6c56b95f5723009ef81961bfe', 1, 'Wo0bAa', '御宅男', 1590224854, '127.0.0.1', '530765310@qq.com', 1);
INSERT INTO `yxj_admin` VALUES (2, 'ken678', '932e31f030b850a87702a86c0e16db16', 2, 'Sxq6dR', '御宅男', 1542781151, '127.0.0.1', '530765310@qq.com', 1);

-- ----------------------------
-- Table structure for yxj_adminlog
-- ----------------------------
DROP TABLE IF EXISTS `yxj_adminlog`;
CREATE TABLE `yxj_adminlog`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `uid` smallint(3) NOT NULL DEFAULT 0 COMMENT '操作者ID',
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '说明',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作IP',
  `get` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '操作日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_adminlog
-- ----------------------------
INSERT INTO `yxj_adminlog` VALUES (1, 0, 0, '提示语:请先登陆', 1589651318, '::1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (2, 0, 0, '提示语:验证码输入错误！', 1589651340, '::1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (3, 1, 1, '提示语:恭喜您，登陆成功', 1589651347, '::1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (4, 1, 1, '提示语:模块安装成功！一键清理缓存后生效！', 1589651398, '::1', '/admin/module/install.html?module=cms');
INSERT INTO `yxj_adminlog` VALUES (5, 1, 1, '提示语:模块安装成功！一键清理缓存后生效！', 1589651409, '::1', '/admin/module/install.html?module=member');
INSERT INTO `yxj_adminlog` VALUES (6, 1, 1, '提示语:模块安装成功！一键清理缓存后生效！', 1589651419, '::1', '/admin/module/install.html?module=formguide');
INSERT INTO `yxj_adminlog` VALUES (7, 1, 1, '提示语:插件安装成功！清除浏览器缓存和框架缓存后生效！', 1589651885, '::1', '/addons/addons/install.html?addon_name=saiyouems');
INSERT INTO `yxj_adminlog` VALUES (8, 1, 1, '提示语:清理缓存', 1589651892, '::1', '/admin/index/cache.html?type=all&_=1589651512859');
INSERT INTO `yxj_adminlog` VALUES (9, 1, 1, '提示语:清理缓存', 1589651973, '::1', '/admin/index/cache.html?type=all&_=1589651512860');
INSERT INTO `yxj_adminlog` VALUES (10, 1, 1, '提示语:清理缓存', 1589651974, '::1', '/admin/index/cache.html?type=all&_=1589651512861');
INSERT INTO `yxj_adminlog` VALUES (11, 1, 1, '提示语:修改成功！', 1589652433, '::1', '/member/group/edit.html?id=7');
INSERT INTO `yxj_adminlog` VALUES (12, 1, 1, '提示语:清理缓存', 1589652485, '::1', '/admin/index/cache.html?type=all&_=1589651512862');
INSERT INTO `yxj_adminlog` VALUES (13, 1, 1, '提示语:清理缓存', 1589652491, '::1', '/admin/index/cache.html?type=all&_=1589651512863');
INSERT INTO `yxj_adminlog` VALUES (14, 1, 1, '提示语:清理缓存', 1589652528, '::1', '/admin/index/cache.html?type=all&_=1589651512864');
INSERT INTO `yxj_adminlog` VALUES (15, 1, 1, '提示语:修改成功！', 1589652600, '::1', '/cms/category/edit.html?id=4');
INSERT INTO `yxj_adminlog` VALUES (16, 1, 1, '提示语:修改成功！', 1589652642, '::1', '/cms/category/edit.html?id=4');
INSERT INTO `yxj_adminlog` VALUES (17, 1, 1, '提示语:清理缓存', 1589652648, '::1', '/admin/index/cache.html?type=all&_=1589651512865');
INSERT INTO `yxj_adminlog` VALUES (18, 0, 0, '提示语:请先登陆', 1589652693, '::1', '/admin/index/index.html');
INSERT INTO `yxj_adminlog` VALUES (19, 0, 0, '提示语:验证码输入错误！', 1589652702, '::1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (20, 1, 1, '提示语:恭喜您，登陆成功', 1589652709, '::1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (21, 0, 0, '提示语:请先登陆', 1589653216, '::1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (22, 0, 0, '提示语:请先登陆', 1589653532, '::1', '/cms/models/index/menuid/84.html');
INSERT INTO `yxj_adminlog` VALUES (23, 0, 0, '提示语:请先登陆', 1589653533, '::1', '/cms/category/index/menuid/75.html');
INSERT INTO `yxj_adminlog` VALUES (24, 1, 1, '提示语:恭喜您，登陆成功', 1589653551, '::1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (25, 0, 0, '提示语:请先登陆', 1589777492, '127.0.0.1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (26, 1, 1, '提示语:恭喜您，登陆成功', 1589777589, '127.0.0.1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (27, 1, 1, '提示语:清理缓存', 1589777600, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589777593737');
INSERT INTO `yxj_adminlog` VALUES (28, 1, 1, '提示语:清理缓存', 1589777629, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589777627482');
INSERT INTO `yxj_adminlog` VALUES (29, 1, 1, '提示语:删除成功！', 1589777751, '127.0.0.1', '/cms/cms/delete/catid/9.html');
INSERT INTO `yxj_adminlog` VALUES (30, 1, 1, '提示语:删除成功！', 1589777760, '127.0.0.1', '/cms/cms/delete/catid/14.html');
INSERT INTO `yxj_adminlog` VALUES (31, 0, 1, '提示语:SQLSTATE[22003]: Numeric value out of range: 1690 BIGINT UNSIGNED value is out of range in \'(`yzn`.`yxj_category`.`items` - 1)\'', 1589777769, '127.0.0.1', '/cms/cms/delete/catid/5.html');
INSERT INTO `yxj_adminlog` VALUES (32, 0, 1, '提示语:该信息不存在！', 1589777776, '127.0.0.1', '/cms/cms/delete/catid/5.html?ids=9');
INSERT INTO `yxj_adminlog` VALUES (33, 0, 1, '提示语:该信息不存在！', 1589777780, '127.0.0.1', '/cms/cms/delete/catid/5.html?ids=9');
INSERT INTO `yxj_adminlog` VALUES (34, 0, 1, '提示语:该信息不存在！', 1589777782, '127.0.0.1', '/cms/cms/delete/catid/5.html?ids=4');
INSERT INTO `yxj_adminlog` VALUES (35, 1, 1, '提示语:删除成功！', 1589777805, '127.0.0.1', '/cms/cms/delete/catid/4.html');
INSERT INTO `yxj_adminlog` VALUES (36, 1, 1, '提示语:栏目删除成功！', 1589777817, '127.0.0.1', '/cms/category/delete.html');
INSERT INTO `yxj_adminlog` VALUES (37, 1, 1, '提示语:栏目删除成功！', 1589777829, '127.0.0.1', '/cms/category/delete.html?ids=9');
INSERT INTO `yxj_adminlog` VALUES (38, 1, 1, '提示语:清理缓存', 1589777853, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589777627483');
INSERT INTO `yxj_adminlog` VALUES (39, 0, 1, '提示语:栏目含有信息，不得删除！', 1589778218, '127.0.0.1', '/cms/category/delete.html?ids=5');
INSERT INTO `yxj_adminlog` VALUES (40, 0, 1, '提示语:SQLSTATE[22003]: Numeric value out of range: 1690 BIGINT UNSIGNED value is out of range in \'(`yzn`.`yxj_category`.`items` - 1)\'', 1589778232, '127.0.0.1', '/cms/cms/delete/catid/5.html?ids=2');
INSERT INTO `yxj_adminlog` VALUES (41, 0, 1, '提示语:SQLSTATE[22003]: Numeric value out of range: 1690 BIGINT UNSIGNED value is out of range in \'(`yzn`.`yxj_category`.`items` - 1)\'', 1589778252, '127.0.0.1', '/cms/cms/delete/catid/5.html?ids=1');
INSERT INTO `yxj_adminlog` VALUES (42, 1, 1, '提示语:修改成功！', 1589778290, '127.0.0.1', '/cms/category/edit.html?id=19');
INSERT INTO `yxj_adminlog` VALUES (43, 1, 1, '提示语:更新成功！', 1589778344, '127.0.0.1', '/cms/setting/index/menuid/74.html');
INSERT INTO `yxj_adminlog` VALUES (44, 1, 1, '提示语:清理缓存', 1589778346, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589777627484');
INSERT INTO `yxj_adminlog` VALUES (45, 0, 0, '提示语:请先登陆', 1589786633, '127.0.0.1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (46, 1, 1, '提示语:恭喜您，登陆成功', 1589786643, '127.0.0.1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (47, 1, 1, '提示语:清理缓存', 1589787204, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589787160949');
INSERT INTO `yxj_adminlog` VALUES (48, 0, 0, '提示语:请先登陆', 1589791216, '127.0.0.1', '/admin/main/ping');
INSERT INTO `yxj_adminlog` VALUES (49, 1, 1, '提示语:恭喜您，登陆成功', 1589791229, '127.0.0.1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (50, 1, 1, '提示语:添加成功！', 1589792117, '127.0.0.1', '/admin/menu/add.html');
INSERT INTO `yxj_adminlog` VALUES (51, 1, 1, '提示语:编辑成功！', 1589792664, '127.0.0.1', '/admin/menu/edit.html?id=116');
INSERT INTO `yxj_adminlog` VALUES (52, 0, 1, '提示语:该页面不存在！', 1589792669, '127.0.0.1', '/admin/main/ping/menuid/116.html');
INSERT INTO `yxj_adminlog` VALUES (53, 0, 1, '提示语:该页面不存在！', 1589792674, '127.0.0.1', '/admin/main/ping/menuid/116.html');
INSERT INTO `yxj_adminlog` VALUES (54, 0, 1, '提示语:该页面不存在！', 1589792681, '127.0.0.1', '/admin/main/ping/menuid/116.html');
INSERT INTO `yxj_adminlog` VALUES (55, 1, 1, '提示语:清理缓存', 1589792692, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589792126196');
INSERT INTO `yxj_adminlog` VALUES (56, 0, 1, '提示语:该页面不存在！', 1589792700, '127.0.0.1', '/admin/main/ping/menuid/116.html');
INSERT INTO `yxj_adminlog` VALUES (57, 0, 1, '提示语:该页面不存在！', 1589792708, '127.0.0.1', '/admin/main/ping/');
INSERT INTO `yxj_adminlog` VALUES (58, 0, 1, '提示语:该页面不存在！', 1589792713, '127.0.0.1', '/admin/main/ping/menuid/116.html');
INSERT INTO `yxj_adminlog` VALUES (59, 1, 1, '提示语:清理缓存', 1589797747, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589797745238');
INSERT INTO `yxj_adminlog` VALUES (60, 1, 1, '提示语:清理缓存', 1589797748, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589797745239');
INSERT INTO `yxj_adminlog` VALUES (61, 0, 0, '提示语:请先登陆', 1589810522, '127.0.0.1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (62, 1, 1, '提示语:恭喜您，登陆成功', 1589810529, '127.0.0.1', '/admin/index/login.html');
INSERT INTO `yxj_adminlog` VALUES (63, 1, 1, '提示语:添加成功！', 1589810619, '127.0.0.1', '/admin/menu/add.html');
INSERT INTO `yxj_adminlog` VALUES (64, 1, 1, '提示语:清理缓存', 1589810715, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589810625656');
INSERT INTO `yxj_adminlog` VALUES (65, 1, 1, '提示语:栏目删除成功！', 1589815460, '127.0.0.1', '/cms/category/delete.html?ids=5');
INSERT INTO `yxj_adminlog` VALUES (66, 1, 1, '提示语:栏目删除成功！', 1589815479, '127.0.0.1', '/cms/category/delete.html?ids=14');
INSERT INTO `yxj_adminlog` VALUES (67, 1, 1, '提示语:修改成功！', 1589815523, '127.0.0.1', '/cms/category/edit.html?id=6');
INSERT INTO `yxj_adminlog` VALUES (68, 1, 1, '提示语:修改成功！', 1589815580, '127.0.0.1', '/cms/category/edit.html?id=6');
INSERT INTO `yxj_adminlog` VALUES (69, 1, 1, '提示语:清理缓存', 1589815592, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589815429569');
INSERT INTO `yxj_adminlog` VALUES (70, 1, 1, '提示语:修改成功！', 1589815654, '127.0.0.1', '/cms/category/edit.html?id=6');
INSERT INTO `yxj_adminlog` VALUES (71, 1, 1, '提示语:更新缓存成功！', 1589815662, '127.0.0.1', '/cms/category/public_cache.html');
INSERT INTO `yxj_adminlog` VALUES (72, 1, 1, '提示语:操作成功！', 1589815684, '127.0.0.1', '/cms/category/setstate.html?id=8&status=0');
INSERT INTO `yxj_adminlog` VALUES (73, 1, 1, '提示语:操作成功！', 1589815685, '127.0.0.1', '/cms/category/setstate.html?id=18&status=0');
INSERT INTO `yxj_adminlog` VALUES (74, 1, 1, '提示语:操作成功！', 1589815686, '127.0.0.1', '/cms/category/setstate.html?id=18&status=1');
INSERT INTO `yxj_adminlog` VALUES (75, 1, 1, '提示语:操作成功！', 1589815687, '127.0.0.1', '/cms/category/setstate.html?id=18&status=0');
INSERT INTO `yxj_adminlog` VALUES (76, 1, 1, '提示语:更新缓存成功！', 1589815689, '127.0.0.1', '/cms/category/public_cache.html');
INSERT INTO `yxj_adminlog` VALUES (77, 1, 1, '提示语:栏目数量校正成功！', 1589815690, '127.0.0.1', '/cms/category/count_items.html');
INSERT INTO `yxj_adminlog` VALUES (78, 1, 1, '提示语:修改成功！', 1589815764, '127.0.0.1', '/cms/category/edit.html?id=1');
INSERT INTO `yxj_adminlog` VALUES (79, 1, 1, '提示语:修改成功！', 1589815785, '127.0.0.1', '/cms/category/edit.html?id=1');
INSERT INTO `yxj_adminlog` VALUES (80, 1, 1, '提示语:排序成功！', 1589815803, '127.0.0.1', '/cms/category/listorder.html');
INSERT INTO `yxj_adminlog` VALUES (81, 1, 1, '提示语:排序成功！', 1589815805, '127.0.0.1', '/cms/category/listorder.html');
INSERT INTO `yxj_adminlog` VALUES (82, 1, 1, '提示语:排序成功！', 1589815806, '127.0.0.1', '/cms/category/listorder.html');
INSERT INTO `yxj_adminlog` VALUES (83, 1, 1, '提示语:更新缓存成功！', 1589815807, '127.0.0.1', '/cms/category/public_cache.html');
INSERT INTO `yxj_adminlog` VALUES (84, 1, 1, '提示语:栏目数量校正成功！', 1589815808, '127.0.0.1', '/cms/category/count_items.html');
INSERT INTO `yxj_adminlog` VALUES (85, 1, 1, '提示语:清理缓存', 1589815821, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589815429570');
INSERT INTO `yxj_adminlog` VALUES (86, 1, 1, '提示语:修改成功！', 1589815925, '127.0.0.1', '/cms/category/edit.html?id=1');
INSERT INTO `yxj_adminlog` VALUES (87, 1, 1, '提示语:操作成功！', 1589815975, '127.0.0.1', '/cms/models/setstate.html?id=1&status=0');
INSERT INTO `yxj_adminlog` VALUES (88, 1, 1, '提示语:操作成功！', 1589815976, '127.0.0.1', '/cms/models/setstate.html?id=2&status=0');
INSERT INTO `yxj_adminlog` VALUES (89, 1, 1, '提示语:操作成功！', 1589815976, '127.0.0.1', '/cms/models/setstate.html?id=3&status=0');
INSERT INTO `yxj_adminlog` VALUES (90, 1, 1, '提示语:操作成功！', 1589815977, '127.0.0.1', '/cms/models/setstate.html?id=4&status=0');
INSERT INTO `yxj_adminlog` VALUES (91, 1, 1, '提示语:清理缓存', 1589815979, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589815429571');
INSERT INTO `yxj_adminlog` VALUES (92, 1, 1, '提示语:操作成功！', 1589816037, '127.0.0.1', '/cms/models/setstate.html?id=1&status=1');
INSERT INTO `yxj_adminlog` VALUES (93, 1, 1, '提示语:操作成功！', 1589816038, '127.0.0.1', '/cms/models/setstate.html?id=2&status=1');
INSERT INTO `yxj_adminlog` VALUES (94, 1, 1, '提示语:操作成功！', 1589816039, '127.0.0.1', '/cms/models/setstate.html?id=3&status=1');
INSERT INTO `yxj_adminlog` VALUES (95, 1, 1, '提示语:操作成功！', 1589816040, '127.0.0.1', '/cms/models/setstate.html?id=4&status=1');
INSERT INTO `yxj_adminlog` VALUES (96, 1, 1, '提示语:操作成功！', 1589816041, '127.0.0.1', '/cms/models/setstate.html?id=4&status=0');
INSERT INTO `yxj_adminlog` VALUES (97, 1, 1, '提示语:操作成功！', 1589816042, '127.0.0.1', '/cms/models/setstate.html?id=3&status=0');
INSERT INTO `yxj_adminlog` VALUES (98, 1, 1, '提示语:操作成功！', 1589816042, '127.0.0.1', '/cms/models/setstate.html?id=4&status=1');
INSERT INTO `yxj_adminlog` VALUES (99, 1, 1, '提示语:清理缓存', 1589818822, '127.0.0.1', '/admin/index/cache.html?type=all&_=1589815429572');
INSERT INTO `yxj_adminlog` VALUES (100, 1, 1, '提示语:清理缓存', 1589819703, '127.0.0.1', '/admin/index/cache?type=all&_=1589819701462');
INSERT INTO `yxj_adminlog` VALUES (101, 1, 0, '提示语:注销成功！', 1589819766, '127.0.0.1', '/admin/index/logout');
INSERT INTO `yxj_adminlog` VALUES (102, 0, 0, '提示语:请先登陆', 1589819770, '127.0.0.1', '/admin/');
INSERT INTO `yxj_adminlog` VALUES (103, 1, 1, '提示语:恭喜您，登陆成功', 1589819816, '127.0.0.1', '/admin/index/login');
INSERT INTO `yxj_adminlog` VALUES (104, 0, 0, '提示语:请先登陆', 1589901653, '127.0.0.1', '/admin');
INSERT INTO `yxj_adminlog` VALUES (105, 1, 1, '提示语:恭喜您，登陆成功', 1589901664, '127.0.0.1', '/admin/index/login');
INSERT INTO `yxj_adminlog` VALUES (106, 1, 1, '提示语:清理缓存', 1589901829, '127.0.0.1', '/admin/index/cache?type=all&_=1589901668398');
INSERT INTO `yxj_adminlog` VALUES (107, 1, 1, '提示语:删除日志成功！', 1589901866, '127.0.0.1', '/admin/adminlog/deletelog');
INSERT INTO `yxj_adminlog` VALUES (108, 0, 0, '提示语:请先登陆', 1590224717, '127.0.0.1', '/admin/');
INSERT INTO `yxj_adminlog` VALUES (109, 0, 0, '提示语:请先登陆', 1590224725, '127.0.0.1', '/admin/');
INSERT INTO `yxj_adminlog` VALUES (110, 0, 0, '提示语:验证码输入错误！', 1590224846, '127.0.0.1', '/admin/index/login');
INSERT INTO `yxj_adminlog` VALUES (111, 1, 1, '提示语:恭喜您，登陆成功', 1590224854, '127.0.0.1', '/admin/index/login');

-- ----------------------------
-- Table structure for yxj_article
-- ----------------------------
DROP TABLE IF EXISTS `yxj_article`;
CREATE TABLE `yxj_article`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` int(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '缩略图',
  `flag` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '属性',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Tags标签',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 100 COMMENT '排序',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `sysadd` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否后台添加',
  `hits` mediumint(8) UNSIGNED NULL DEFAULT 0 COMMENT '点击量',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '文章模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_article
-- ----------------------------
INSERT INTO `yxj_article` VALUES (5, 10, '个人建设网站有哪些步骤？', 0, '', '', '虽然互联网上付费提供网站建设和网站制作服务的公司或者个人有很多，都是为企业或者个人提供网站建设和网页设计服务的，但是对于那些刚刚走出校门或者刚刚参加工作的朋友来说，如果想通过互联网创业，想要做一个自己的网站，但是又没有明确的经营理念，只是想要尝试一下互联网创业，这时候大部分人都会选择自己建网站，一方面是为了能够节省较高的网站建设费用，另一方面也可以简单的学习一些网站建设或网站制作的一些基本知识，那么自己建网站到底应该如何入手呢今天小编就跟大家写一篇自己建网站的全攻略，希望能够帮助那些想要自己建网站的朋友有', '', 100, 1, 'admin', 1, 1, 1550449817, 1550476910, 1);
INSERT INTO `yxj_article` VALUES (6, 10, '企业建设手机网站注意的事项？', 0, '', '', ' 虽然很多企业都专门弄起了APP软件，不过从综合层面来说，还是网站更加靠谱一些，因为网站比制作APP成本要低廉很多，而且受传统思维习惯的影响，大部分的会主动寻找相关内容的人来说，他们还是更加习惯利用搜索引擎去进行寻找。并且这一群人在社会上面也拥有一定的社会经验以及地位，像是销售人员、采购人员等等，如果他们不再办公室，正好在上班途中或者是出差途中的话，肯定是需要使用手机来搜索某些信息的，所以从实用性角度来看的话，反倒是企业网站比APP更好一些，那么，企业建设手机网站的时候要注意什么?', '', 100, 1, 'admin', 1, 0, 1550450424, 1550476700, 1);

-- ----------------------------
-- Table structure for yxj_article_data
-- ----------------------------
DROP TABLE IF EXISTS `yxj_article_data`;
CREATE TABLE `yxj_article_data`  (
  `did` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '内容',
  PRIMARY KEY (`did`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '文章模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_article_data
-- ----------------------------
INSERT INTO `yxj_article_data` VALUES (6, '&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;虽然很多企业都专门弄起了APP软件，不过从综合层面来说，还是网站更加靠谱一些，因为网站比制作APP成本要低廉很多，而且受传统思维习惯的影响，大部分的会主动寻找相关内容的人来说，他们还是更加习惯利用搜索引擎去进行寻找。并且这一群人在社会上面也拥有一定的社会经验以及地位，像是销售人员、采购人员等等，如果他们不再办公室，正好在上班途中或者是出差途中的话，肯定是需要使用手机来搜索某些信息的，所以从实用性角度来看的话，反倒是企业网站比APP更好一些，那么，企业建设手机网站的时候要注意什么?&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;第一、图片设计&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  虽然当前的手机企业网站在建设的时候都是弄成的响应式网站，它可以按照上网具体设备的不同，而自动调整成符合当前屏幕大小的格式，但是只要稍微留心一些，就会发现，就算是那些超级大型的网站，他们在图片处理方面都已经十分谨慎了，还是会出现因为图片出现一些问题，因为只要出现图片就会消耗流量，另外如果图片太多的话，也会导致企业网站页面的加载速度变得非常慢，导致用户体验严重受到影响，因此在不是特别有必要的情况之下，最好还是少使用图片比较合适。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;  &lt;strong&gt;第二、页面简洁&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  既然是建设手机企业网站，那在设计的时候建议还是弄得简单一些更合适，不需要像电脑PC端的网站一样弄很多的内容，因为手机本身的屏幕就要比PC端小很多，如果手机企业网站建设的时候设计很多的内容，会导致人们浏览起来变得比较困难的，特别是用内容作为主导倾向的网站，建设成简洁的形式，更加容易让网友找到自己需要的信息&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;  &lt;strong&gt;第三、断点功能&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  对于移动网站的断点设置，在CSS模式样式中，都支持断点功能设置，而传统PC端网站就缺少这个功能设置，所以经常会出现网站显示不合理，大量乱码等现象。但是，网站断点功能并非就保证网站访问流畅，对于断点技术的研究，还在进一步探讨中，比如说，在移动设备显示不错的网站，可是反过来用PC端却显示紊乱，在特别注重移动端网站的时候，也要注意到传统网站的感受，只要这样全兼容的设计，才符合未来网站的发展方向。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `yxj_article_data` VALUES (5, '&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;虽然互联网上付费提供网站建设和网站制作服务的公司或者个人有很多，都是为企业或者个人提供网站建设和网页设计服务的，但是对于那些刚刚走出校门或者刚刚参加工作的朋友来说，如果想通过互联网创业，想要做一个自己的网站，但是又没有明确的经营理念，只是想要尝试一下互联网创业，这时候大部分人都会选择自己建网站，一方面是为了能够节省较高的网站建设费用，另一方面也可以简单的学习一些网站建设或网站制作的一些基本知识，那么自己建网站到底应该如何入手呢今天小编就跟大家写一篇自己建网站的全攻略，希望能够帮助那些想要自己建网站的朋友有一个系统的认识和了解。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1、了解基础的脚本语言&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  无论你是打算用网络上分享出来的免费源代码做网站还是用自助建站系统来建网站，首先应该学习和了解的就是网站前台脚本语言，网站前台脚本语言主要是html/js/css这三种，其中html是客户端网页源代码的主要语言，js脚本语言用来实现各种网页特效，css脚本语言用来实现网站的各种布局及网页色调的调整。&lt;/p&gt;&lt;p&gt;  相对于php、java等编程语言来说，脚本语言更加容易记忆和学习，所以一般想要接触网站建设的朋友都应该首先学习和认识上边说道的三种脚本语言。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2、免费的源码程序&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  对于刚学网站建设的朋友来说，自己建网站肯定不可能上来就自己写一套强大的网站CMS系统，这几乎是不可能的，而且也是不现实的，毕竟一套功能强大的网站管理系统往往都是很多人开发测试很久才能完成的，依靠一个人的力量快速的完全一套建站系统显然难度很大，所以这就需要借助网络上已经分享出来的免费网站源码程序来快速完成自己建网站的目的。&lt;/p&gt;&lt;p&gt;  自建网站虽然除了使用免费的源码程序还可以通过选择一些免费的自助建站平台来完成，但是小编这里推荐大家使用免费的源码程序来做网站，这样一方面是保证网站最终的控制权在自己手里，另一方面也有助于更好的提升自己的网站建设的认识和熟悉，如果你使用自助建站平台，永远都不可能明白网站开发的基本框架设计，但是你通过研究别人分享出来的免费源码就可以很好的掌握整个程序的框架结构和页面设计方面的一些知识，能够更好的提升自己的专业技能。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3、服务器及域名&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;  通过学习第一步骤的那些前台脚本语言，然后按照第二步骤说的去下载和研究别人的源码程序，相信很快你就可以自己建网站了，但是建立好的网站如果只是在本地运行，那只有你自己可以访问和看到，如何才能让网络上的所有人都看到自己做的网站呢，这就涉及到了网站的发布，网站发布就需要使用服务器和域名，这时候就需要我们去接触服务器和域名。&lt;/p&gt;&lt;p&gt;  虽然说大部分的新手自己建网站都不希望花费太高的成本，但是服务器和域名的成本是每一个做网站的人都要承担的，而且一个稳定的服务器直接影响到你网站将来的打开速度、网站性能及搜索引擎收录情况，所以建议新手们在购买服务器的时候还是要选择性价比比较高的服务器。&lt;/p&gt;&lt;p&gt;  哦，最后还得补充一下，要想自己建网站，除了上边说道的这些都必须要学习和了解之外，还有两个重要的软件需要下载安装和学习怎么使用，一个是Dreamweaver(简称DW)另一个就是Photoshop(简称PS)这两款软件即使你不打算自己开发设计，你就是研究和修改别人的源码程序也一样需要用到，比如你在步骤二中需要修改别人的网页代码，肯定需要用DW打开网页文件来编辑，需要修改别人程序的中图标或者图片就肯定需要使用PS来作图，所以这两款软件也是自己建网站过程中必须要学习使用的。&lt;/p&gt;');

-- ----------------------------
-- Table structure for yxj_attachment
-- ----------------------------
DROP TABLE IF EXISTS `yxj_attachment`;
CREATE TABLE `yxj_attachment`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aid` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '管理员id',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `name` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件名',
  `module` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模块名，由哪个模块上传的',
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件路径',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图路径',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件链接',
  `mime` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `ext` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件类型',
  `size` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文件大小',
  `md5` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'sha1 散列值',
  `driver` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'local' COMMENT '上传驱动',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上传时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorders` int(5) NOT NULL DEFAULT 100 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '附件表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `yxj_auth_group`;
CREATE TABLE `yxj_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `parentid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父组别',
  `module` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述信息',
  `rules` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限组表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_auth_group
-- ----------------------------
INSERT INTO `yxj_auth_group` VALUES (1, 0, 'admin', 1, '超级管理员', '拥有所有权限', '', 1);
INSERT INTO `yxj_auth_group` VALUES (2, 1, 'admin', 1, '编辑', '编辑', '', 1);

-- ----------------------------
-- Table structure for yxj_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `yxj_auth_rule`;
CREATE TABLE `yxj_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1-url;2-主菜单',
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `condition` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则附加条件',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `module`(`module`, `status`, `type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '规则表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_cache
-- ----------------------------
DROP TABLE IF EXISTS `yxj_cache`;
CREATE TABLE `yxj_cache`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缓存KEY值',
  `name` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
  `module` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模块名称',
  `model` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模型名称',
  `action` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '方法名',
  `system` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否系统',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ckey`(`key`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '缓存列队表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of yxj_cache
-- ----------------------------
INSERT INTO `yxj_cache` VALUES (1, 'Config', '网站配置', 'admin', 'Config', 'config_cache', 1);
INSERT INTO `yxj_cache` VALUES (2, 'Menu', '后台菜单', 'admin', 'Menu', 'menu_cache', 1);
INSERT INTO `yxj_cache` VALUES (3, 'Module', '可用模块列表', 'admin', 'Module', 'module_cache', 1);
INSERT INTO `yxj_cache` VALUES (4, 'Model', '模型列表', 'admin', 'Models', 'model_cache', 1);
INSERT INTO `yxj_cache` VALUES (5, 'ModelField', '模型字段', 'admin', 'ModelField', 'model_field_cache', 1);
INSERT INTO `yxj_cache` VALUES (6, 'Category', '栏目索引', 'cms', 'Category', 'category_cache', 0);
INSERT INTO `yxj_cache` VALUES (7, 'Cms_Config', 'CMS配置', 'cms', 'Cms', 'cms_cache', 0);
INSERT INTO `yxj_cache` VALUES (8, 'Member_Config', '会员配置', 'member', 'Member', 'member_cache', 0);
INSERT INTO `yxj_cache` VALUES (9, 'Member_Group', '会员组', 'member', 'MemberGroup', 'membergroup_cache', 0);
INSERT INTO `yxj_cache` VALUES (10, 'Model_form', '自定义表单模型', 'formguide', 'Formguide', 'formguide_cache', 0);

-- ----------------------------
-- Table structure for yxj_category
-- ----------------------------
DROP TABLE IF EXISTS `yxj_category`;
CREATE TABLE `yxj_category`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `catname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catdir` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '唯一标识',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '类别',
  `modelid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '模型ID',
  `parentid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父ID',
  `arrparentid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '所有父ID',
  `arrchildid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '所有子栏目ID',
  `child` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否存在子栏目，1存在',
  `image` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目图片',
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '栏目描述',
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `items` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文档数量',
  `setting` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '相关配置信息',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '栏目表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_category
-- ----------------------------
INSERT INTO `yxj_category` VALUES (6, '新闻中心', 'news', 2, 1, 0, '0', '6,10', 1, 0, '', '', 0, 'a:6:{s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:13:\"category.html\";s:13:\"list_template\";s:9:\"list.html\";s:13:\"show_template\";s:9:\"show.html\";}', 1, 1);
INSERT INTO `yxj_category` VALUES (8, '联系我们', 'contact', 1, 0, 0, '0', '8,18', 1, 0, '', 'cms/index/lists?catid=18', 0, 'N;', 3, 0);
INSERT INTO `yxj_category` VALUES (19, '加入我们', 'joinus', 1, 0, 0, '0', '19', 0, 0, '', '/joinus/index/index', 0, 'a:4:{s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"page_template\";s:9:\"page.html\";}', 10, 1);
INSERT INTO `yxj_category` VALUES (10, '网站知识', 'knowledge', 2, 1, 6, '0,6', '10', 0, 0, '', '', 2, 'a:7:{s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:17:\"category_template\";s:13:\"category.html\";s:13:\"list_template\";s:9:\"list.html\";s:13:\"show_template\";s:9:\"show.html\";s:13:\"page_template\";s:9:\"page.html\";}', 1, 1);
INSERT INTO `yxj_category` VALUES (1, '关于我们', 'about', 1, 0, 0, '0', '1', 0, 0, '', '/about/index/index/?file=about.php', 0, 'a:4:{s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"page_template\";s:9:\"page.html\";}', 2, 1);
INSERT INTO `yxj_category` VALUES (18, '联系方式', 'fangshi', 1, 0, 8, '0,8', '18', 0, 0, '', '', 0, 'a:4:{s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"page_template\";s:9:\"page.html\";}', 100, 0);

-- ----------------------------
-- Table structure for yxj_category_priv
-- ----------------------------
DROP TABLE IF EXISTS `yxj_category_priv`;
CREATE TABLE `yxj_category_priv`  (
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `roleid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色或者组ID',
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否为管理员 1、管理员',
  `action` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '动作',
  INDEX `catid`(`catid`, `roleid`, `is_admin`, `action`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '栏目权限表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of yxj_category_priv
-- ----------------------------
INSERT INTO `yxj_category_priv` VALUES (4, 2, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (4, 7, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 1, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 2, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 4, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 5, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 6, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 7, 0, 'add');
INSERT INTO `yxj_category_priv` VALUES (6, 8, 0, 'add');

-- ----------------------------
-- Table structure for yxj_config
-- ----------------------------
DROP TABLE IF EXISTS `yxj_config`;
CREATE TABLE `yxj_config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置类型',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置分组',
  `options` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置项',
  `remark` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '配置说明',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '配置值',
  `listorder` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uk_name`(`name`) USING BTREE,
  INDEX `type`(`type`) USING BTREE,
  INDEX `group`(`group`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站配置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_config
-- ----------------------------
INSERT INTO `yxj_config` VALUES (1, 'web_site_icp', 'text', '备案信息', 'base', '', '', 1551244923, 1551244971, 1, '', 1);
INSERT INTO `yxj_config` VALUES (2, 'web_site_statistics', 'textarea', '站点代码', 'base', '', '', 1551244957, 1551244957, 1, '', 100);
INSERT INTO `yxj_config` VALUES (3, 'mail_type', 'radio', '邮件发送模式', 'email', '1:SMTP\r\n2:Mail', '', 1553652833, 1553652915, 1, '1', 1);
INSERT INTO `yxj_config` VALUES (4, 'mail_smtp_host', 'text', '邮件服务器', 'email', '', '错误的配置发送邮件会导致服务器超时', 1553652889, 1553652917, 1, 'smtp.163.com', 2);
INSERT INTO `yxj_config` VALUES (5, 'mail_smtp_port', 'text', '邮件发送端口', 'email', '', '不加密默认25,SSL默认465,TLS默认587', 1553653165, 1553653292, 1, '465', 3);
INSERT INTO `yxj_config` VALUES (6, 'mail_auth', 'radio', '身份认证', 'email', '0:关闭\r\n1:开启', '', 1553658375, 1553658392, 1, '1', 4);
INSERT INTO `yxj_config` VALUES (7, 'mail_smtp_user', 'text', '用户名', 'email', '', '', 1553653267, 1553658393, 1, '', 5);
INSERT INTO `yxj_config` VALUES (8, 'mail_smtp_pass', 'text', '密码', 'email', '', '', 1553653344, 1553658394, 1, '', 6);
INSERT INTO `yxj_config` VALUES (9, 'mail_verify_type', 'radio', '验证方式', 'email', '1:TLS\r\n2:SSL', '', 1553653426, 1553658395, 1, '2', 7);
INSERT INTO `yxj_config` VALUES (10, 'mail_from', 'text', '发件人邮箱', 'email', '', '', 1553653500, 1553658397, 1, '', 8);
INSERT INTO `yxj_config` VALUES (11, 'config_group', 'array', '配置分组', 'system', '', '', 1494408414, 1494408414, 1, 'base:基础\r\nemail:邮箱\r\nsystem:系统\r\nupload:上传\r\ndevelop:开发', 0);
INSERT INTO `yxj_config` VALUES (12, 'theme', 'text', '主题风格', 'system', '', '', 1541752781, 1541756888, 1, 'default', 1);
INSERT INTO `yxj_config` VALUES (13, 'admin_forbid_ip', 'textarea', '后台禁止访问IP', 'system', '', '匹配IP段用\"*\"占位，如192.168.*.*，多个IP地址请用英文逗号\",\"分割', 1551244957, 1551244957, 1, '', 2);
INSERT INTO `yxj_config` VALUES (14, 'upload_image_size', 'text', '图片上传大小限制', 'upload', '', '0为不限制大小，单位：kb', 1540457656, 1552436075, 1, '0', 2);
INSERT INTO `yxj_config` VALUES (15, 'upload_image_ext', 'text', '允许上传的图片后缀', 'upload', '', '多个后缀用逗号隔开，不填写则不限制类型', 1540457657, 1552436074, 1, 'gif,jpg,jpeg,bmp,png', 1);
INSERT INTO `yxj_config` VALUES (16, 'upload_file_size', 'text', '文件上传大小限制', 'upload', '', '0为不限制大小，单位：kb', 1540457658, 1552436078, 1, '0', 3);
INSERT INTO `yxj_config` VALUES (17, 'upload_file_ext', 'text', '允许上传的文件后缀', 'upload', '', '多个后缀用逗号隔开，不填写则不限制类型', 1540457659, 1552436080, 1, 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip,gz,bz2,7z', 4);
INSERT INTO `yxj_config` VALUES (18, 'upload_driver', 'radio', '上传驱动', 'upload', 'local:本地', '图片或文件上传驱动', 1541752781, 1552436085, 1, 'local', 9);
INSERT INTO `yxj_config` VALUES (19, 'upload_thumb_water', 'switch', '添加水印', 'upload', '', '', 1552435063, 1552436080, 1, '0', 5);
INSERT INTO `yxj_config` VALUES (20, 'upload_thumb_water_pic', 'image', '水印图片', 'upload', '', '只有开启水印功能才生效', 1552435183, 1552436081, 1, '', 6);
INSERT INTO `yxj_config` VALUES (21, 'upload_thumb_water_position', 'radio', '水印位置', 'upload', '1:左上角\r\n2:上居中\r\n3:右上角\r\n4:左居中\r\n5:居中\r\n6:右居中\r\n7:左下角\r\n8:下居中\r\n9:右下角', '只有开启水印功能才生效', 1552435257, 1552436082, 1, '9', 7);
INSERT INTO `yxj_config` VALUES (22, 'upload_thumb_water_alpha', 'text', '水印透明度', 'upload', '', '请输入0~100之间的数字，数字越小，透明度越高', 1552435299, 1552436083, 1, '50', 8);

-- ----------------------------
-- Table structure for yxj_download
-- ----------------------------
DROP TABLE IF EXISTS `yxj_download`;
CREATE TABLE `yxj_download`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` int(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '缩略图',
  `flag` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '属性',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Tags标签',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 100 COMMENT '排序',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `sysadd` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否后台添加',
  `hits` mediumint(8) UNSIGNED NULL DEFAULT 0 COMMENT '点击量',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '下载模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_download
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_download_data
-- ----------------------------
DROP TABLE IF EXISTS `yxj_download_data`;
CREATE TABLE `yxj_download_data`  (
  `did` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '内容',
  PRIMARY KEY (`did`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '下载模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_download_data
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_ems
-- ----------------------------
DROP TABLE IF EXISTS `yxj_ems`;
CREATE TABLE `yxj_ems`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `event` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '事件',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '验证码',
  `times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '验证次数',
  `ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作IP',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮箱验证码表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_ems
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_field_type
-- ----------------------------
DROP TABLE IF EXISTS `yxj_field_type`;
CREATE TABLE `yxj_field_type`  (
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '字段类型',
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中文类型名',
  `listorder` int(4) NOT NULL DEFAULT 0 COMMENT '排序',
  `default_define` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '默认定义',
  `ifoption` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否需要设置选项',
  `ifstring` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否自由字符',
  `vrule` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '验证规则',
  PRIMARY KEY (`name`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '字段类型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_field_type
-- ----------------------------
INSERT INTO `yxj_field_type` VALUES ('text', '输入框', 1, 'varchar(255) NOT NULL DEFAULT \'\'', 0, 1, '');
INSERT INTO `yxj_field_type` VALUES ('checkbox', '复选框', 2, 'varchar(32) NOT NULL DEFAULT \'\'', 1, 0, '');
INSERT INTO `yxj_field_type` VALUES ('textarea', '多行文本', 3, 'varchar(255) NOT NULL DEFAULT \'\'', 0, 1, '');
INSERT INTO `yxj_field_type` VALUES ('radio', '单选按钮', 4, 'char(10) NOT NULL DEFAULT \'\'', 1, 0, '');
INSERT INTO `yxj_field_type` VALUES ('switch', '开关', 5, 'tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'', 0, 0, 'isBool');
INSERT INTO `yxj_field_type` VALUES ('array', '数组', 6, 'varchar(512) NOT NULL DEFAULT \'\'', 0, 0, '');
INSERT INTO `yxj_field_type` VALUES ('select', '下拉框', 7, 'char(10) NOT NULL DEFAULT \'\'', 1, 0, '');
INSERT INTO `yxj_field_type` VALUES ('image', '单张图', 8, 'int(5) UNSIGNED NOT NULL DEFAULT \'0\'', 0, 0, 'isNumber');
INSERT INTO `yxj_field_type` VALUES ('images', '多张图', 9, 'varchar(256) NOT NULL DEFAULT \'\'', 0, 0, '');
INSERT INTO `yxj_field_type` VALUES ('tags', '标签', 10, 'varchar(255) NOT NULL DEFAULT \'\'', 0, 1, '');
INSERT INTO `yxj_field_type` VALUES ('number', '数字', 11, 'int(10) UNSIGNED NOT NULL DEFAULT \'0\'', 0, 0, 'isNumber');
INSERT INTO `yxj_field_type` VALUES ('datetime', '日期和时间', 12, 'int(10) UNSIGNED NOT NULL DEFAULT \'0\'', 0, 0, '');
INSERT INTO `yxj_field_type` VALUES ('Ueditor', '百度编辑器', 13, 'text NOT NULL', 0, 1, '');
INSERT INTO `yxj_field_type` VALUES ('markdown', 'markdown编辑器', 14, 'text NOT NULL', 0, 1, '');
INSERT INTO `yxj_field_type` VALUES ('files', '多文件', 15, 'varchar(255) NOT NULL DEFAULT \'\'', 0, 0, '');
INSERT INTO `yxj_field_type` VALUES ('file', '单文件', 16, 'int(5) UNSIGNED NOT NULL DEFAULT \'0\'', 0, 0, 'isNumber');
INSERT INTO `yxj_field_type` VALUES ('color', '颜色值', 17, 'varchar(7) NOT NULL DEFAULT \'\'', 0, 0, '');

-- ----------------------------
-- Table structure for yxj_hooks
-- ----------------------------
DROP TABLE IF EXISTS `yxj_hooks`;
CREATE TABLE `yxj_hooks`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '类型',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `addons` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 \'，\'分割',
  `modules` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '钩子挂载的模块 \'，\'分割',
  `system` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否系统',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '插件和模块钩子' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_hooks
-- ----------------------------
INSERT INTO `yxj_hooks` VALUES (1, 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', 1, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (2, 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', 1, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (3, 'smsGet', '短信获取行为', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (4, 'smsSend', '短信发送行为', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (5, 'smsNotice', '短信发送通知', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (6, 'smsCheck', '检测短信验证是否正确', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (7, 'smsFlush', '清空短信验证行为', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (8, 'emsGet', '邮件获取行为', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (9, 'emsSend', '邮件发送行为', 2, 1509174020, 'saiyouems', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (10, 'emsNotice', '邮件发送通知', 2, 1509174020, 'saiyouems', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (11, 'emsCheck', '检测邮件验证是否正确', 2, 1509174020, 'saiyouems', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (12, 'emsFlush', '清空邮件验证行为', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (13, 'uploadAfter', '第三方附件上传钩子', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (14, 'uploadDelete', '第三方附件删除钩子', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (15, 'syncLogin', '第三方登陆位置', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (16, 'userConfig', '用户配置页面钩子', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (17, 'baidupush', '百度熊掌号+百度站长推送', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (18, 'markdown', 'markdown编辑器', 2, 1509174020, '', '', 1, 1);
INSERT INTO `yxj_hooks` VALUES (19, 'userSidenavAfter', '会员左侧导航', 1, 1589651398, '', 'cms', 0, 1);
INSERT INTO `yxj_hooks` VALUES (20, 'contentDeleteEnd', '内容删除后调用', 2, 1589651409, '', 'member', 0, 1);
INSERT INTO `yxj_hooks` VALUES (21, 'contentEditEnd', '内容编辑后调用', 2, 1589651409, '', 'member', 0, 1);

-- ----------------------------
-- Table structure for yxj_member
-- ----------------------------
DROP TABLE IF EXISTS `yxj_member`;
CREATE TABLE `yxj_member`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `nickname` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `encrypt` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '加密因子',
  `point` mediumint(8) NOT NULL DEFAULT 0 COMMENT '用户积分',
  `amount` decimal(8, 2) UNSIGNED NOT NULL COMMENT '钱金总额',
  `login` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登录次数',
  `email` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `mobile` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `avatar` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '头像',
  `groupid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户组ID',
  `modelid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户模型ID',
  `vip` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'VIP会员',
  `overduedate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '过期时间',
  `reg_ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '注册IP',
  `reg_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '注册时间',
  `last_login_ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `ischeck_email` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否验证过邮箱',
  `ischeck_mobile` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否验证过手机',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  INDEX `mobile`(`mobile`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_member
-- ----------------------------
INSERT INTO `yxj_member` VALUES (1, 'test', 'test', '7549c140ac2a6b32498163fcebebffbb', 'zUYzVO', 0, 0.00, 2, 'LetheSec@foxmail.com', '17851146833', 0, 2, 0, 0, 0, '::1', 1589651462, '::1', 1589652546, 0, 0, 1);
INSERT INTO `yxj_member` VALUES (2, 'testtest', 'testtest', '0c58888c91e57197dec5b437b8c5c047', '55NmD2', 0, 0.00, 4, 'testtest@test.com', '17851141234', 0, 2, 0, 0, 0, '127.0.0.1', 1589784855, '127.0.0.1', 1589820507, 0, 0, 1);
INSERT INTO `yxj_member` VALUES (3, 'test123', 'alert(1)', '064369f2321e35e5050a9bfff9bdbf29', 'opok9X', 0, 0.00, 2, 'test123@test123.com', '17851141233', 0, 2, 0, 0, 0, '127.0.0.1', 1589976341, '127.0.0.1', 1589976733, 0, 0, 1);

-- ----------------------------
-- Table structure for yxj_member_content
-- ----------------------------
DROP TABLE IF EXISTS `yxj_member_content`;
CREATE TABLE `yxj_member_content`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) NOT NULL COMMENT '栏目ID',
  `content_id` int(10) NOT NULL COMMENT '信息ID',
  `uid` mediumint(8) NOT NULL COMMENT '会员ID',
  `username` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`catid`, `content_id`, `status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员投稿信息记录表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of yxj_member_content
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_member_group
-- ----------------------------
DROP TABLE IF EXISTS `yxj_member_group`;
CREATE TABLE `yxj_member_group`  (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员组id',
  `name` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户组名称',
  `issystem` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否是系统组',
  `starnum` tinyint(2) UNSIGNED NOT NULL COMMENT '会员组星星数',
  `point` smallint(6) UNSIGNED NOT NULL COMMENT '积分范围',
  `allowmessage` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '许允发短消息数量',
  `allowvisit` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否允许访问',
  `allowpost` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否允许发稿',
  `allowpostverify` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否投稿不需审核',
  `allowsearch` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否允许搜索',
  `allowupgrade` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否允许自主升级',
  `allowsendmessage` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '允许发送短消息',
  `allowpostnum` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '每天允许发文章数',
  `allowattachment` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否允许上传附件',
  `price_y` decimal(8, 2) UNSIGNED NOT NULL,
  `price_m` decimal(8, 2) UNSIGNED NOT NULL,
  `price_d` decimal(8, 2) UNSIGNED NOT NULL,
  `icon` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户组图标',
  `usernamecolor` char(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户名颜色',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `expand` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '拓展',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_member_group
-- ----------------------------
INSERT INTO `yxj_member_group` VALUES (1, '禁止访问', 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0, '', '0', 0, 1, '');
INSERT INTO `yxj_member_group` VALUES (2, '新手上路', 1, 1, 50, 100, 1, 1, 0, 0, 0, 1, 0, 0, 50.00, 10.00, 1.00, 0, '', '', 2, 1, '');
INSERT INTO `yxj_member_group` VALUES (6, '注册会员', 1, 2, 100, 150, 0, 1, 0, 0, 1, 1, 0, 0, 300.00, 30.00, 1.00, 0, '', '', 6, 1, '');
INSERT INTO `yxj_member_group` VALUES (4, '中级会员', 1, 3, 150, 500, 1, 1, 0, 1, 1, 1, 0, 0, 360.00, 60.00, 1.00, 0, '', '', 4, 1, '');
INSERT INTO `yxj_member_group` VALUES (5, '高级会员', 1, 5, 300, 999, 1, 1, 0, 1, 1, 1, 0, 0, 500.00, 90.00, 1.00, 0, '', '', 5, 1, '');
INSERT INTO `yxj_member_group` VALUES (7, '邮件认证', 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0, '#000000', '', 7, 1, '');
INSERT INTO `yxj_member_group` VALUES (8, '游客', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0, '', '', 0, 1, '');

-- ----------------------------
-- Table structure for yxj_menu
-- ----------------------------
DROP TABLE IF EXISTS `yxj_menu`;
CREATE TABLE `yxj_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `icon` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '图标',
  `parentid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级分类ID',
  `app` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '应用标识',
  `controller` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '控制器标识',
  `action` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '方法标识',
  `parameter` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '附加参数',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `tip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '提示',
  `is_dev` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否开发者可见',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序ID',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pid`(`parentid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 118 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台菜单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_menu
-- ----------------------------
INSERT INTO `yxj_menu` VALUES (3, '设置', 'icon-setup', 0, 'admin', 'setting', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (4, '模块', 'icon-supply', 0, 'admin', 'module', 'index1', '', 1, '', 0, 9);
INSERT INTO `yxj_menu` VALUES (5, '扩展', 'icon-tools', 0, 'addons', 'addons', 'index1', '', 1, '', 0, 10);
INSERT INTO `yxj_menu` VALUES (10, '系统配置', 'icon-zidongxiufu', 3, 'admin', 'config', 'index1', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (11, '配置管理', 'icon-apartment', 10, 'admin', 'config', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (12, '删除日志', '', 20, 'admin', 'adminlog', 'deletelog', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (13, '网站设置', 'icon-setup', 10, 'admin', 'config', 'setting', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (14, '菜单管理', 'icon-other', 10, 'admin', 'menu', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (15, '权限管理', 'icon-guanliyuan', 3, 'admin', 'manager', 'index1', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (16, '管理员管理', 'icon-guanliyuan', 15, 'admin', 'manager', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (17, '角色管理', 'icon-group', 15, 'admin', 'authManager', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (18, '添加管理员', '', 16, 'admin', 'manager', 'add', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (19, '编辑管理员', '', 16, 'admin', 'manager', 'edit', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (20, '管理日志', 'icon-rizhi', 15, 'admin', 'adminlog', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (21, '删除管理员', '', 16, 'admin', 'manager', 'del', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (22, '添加角色', '', 17, 'admin', 'authManager', 'createGroup', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (23, '附件管理', 'icon-accessory', 10, 'attachment', 'attachments', 'index', '', 1, '', 0, 1);
INSERT INTO `yxj_menu` VALUES (24, '新增配置', '', 11, 'admin', 'config', 'add', '', 1, '', 0, 1);
INSERT INTO `yxj_menu` VALUES (25, '编辑配置', '', 11, 'admin', 'config', 'edit', '', 1, '', 0, 2);
INSERT INTO `yxj_menu` VALUES (26, '删除配置', '', 11, 'admin', 'config', 'del', '', 1, '', 0, 3);
INSERT INTO `yxj_menu` VALUES (27, '新增菜单', '', 14, 'admin', 'menu', 'add', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (28, '编辑菜单', '', 14, 'admin', 'menu', 'edit', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (29, '删除菜单', '', 14, 'admin', 'menu', 'delete', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (30, '附件上传', '', 23, 'attachment', 'attachments', 'upload', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (31, '附件删除', '', 23, 'attachment', 'attachments', 'delete', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (32, '编辑器附件', '', 23, 'attachment', 'ueditor', 'run', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (33, '图片列表', '', 23, 'attachment', 'attachments', 'showFileLis', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (34, '图片本地化', '', 23, 'attachment', 'attachments', 'getUrlFile', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (38, '插件扩展', 'icon-tools', 5, 'addons', 'addons', 'index2', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (39, '插件管理', 'icon-plugins-', 38, 'addons', 'addons', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (40, '行为管理', 'icon-hangweifenxi', 38, 'addons', 'addons', 'hooks', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (41, '插件后台列表', 'icon-liebiaosousuo', 5, 'addons', 'addons', 'addonadmin', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (43, '本地模块', 'icon-supply', 4, 'admin', 'module', 'index2', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (44, '模块管理', 'icon-mokuaishezhi', 43, 'admin', 'module', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (45, '模块后台列表', 'icon-liebiaosousuo', 4, 'admin', 'module', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (48, '编辑角色', '', 17, 'admin', 'authManager', 'editGroup', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (49, '删除角色', '', 17, 'admin', 'authManager', 'deleteGroup', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (50, '访问授权', '', 17, 'admin', 'authManager', 'access', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (51, '角色授权', '', 17, 'admin', 'authManager', 'writeGroup', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (52, '模块安装', '', 44, 'admin', 'module', 'install', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (53, '模块卸载', '', 44, 'admin', 'module', 'uninstall', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (54, '本地安装', '', 44, 'admin', 'module', 'local', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (55, '内容', 'icon-shiyongwendang', 0, 'cms', 'cms', 'index1', '', 1, '', 0, 3);
INSERT INTO `yxj_menu` VALUES (56, '内容管理', 'icon-neirongguanli', 55, 'cms', 'cms', 'index2', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (57, '管理内容', 'icon-neirongguanli', 56, 'cms', 'cms', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (58, '面板', '', 57, 'cms', 'cms', 'panl', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (59, '栏目列表', '', 57, 'cms', 'cms', 'public_categorys', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (60, '信息列表', '', 57, 'cms', 'cms', 'classlist', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (61, '添加', '', 57, 'cms', 'cms', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (62, '编辑', '', 57, 'cms', 'cms', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (63, '删除', '', 57, 'cms', 'cms', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (64, '排序', '', 57, 'cms', 'cms', 'listorder', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (65, '批量移动', '', 57, 'cms', 'cms', 'remove', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (66, '回收站', 'icon-trash', 57, 'cms', 'cms', 'recycle', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (67, '稿件管理', 'icon-neirongguanli', 56, 'cms', 'publish', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (68, 'Tags管理', 'icon-label', 56, 'cms', 'tags', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (69, '列表', '', 68, 'cms', 'tags', 'index', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (70, '添加', '', 68, 'cms', 'tags', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (71, '编辑', '', 68, 'cms', 'tags', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (72, '删除', '', 68, 'cms', 'tags', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (73, '相关设置', 'icon-zidongxiufu', 55, 'cms', 'category', 'index1', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (74, 'CMS配置', 'icon-setup', 73, 'cms', 'setting', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (75, '栏目列表', 'icon-other', 73, 'cms', 'category', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (76, '添加栏目', '', 75, 'cms', 'category', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (77, '添加单页', '', 75, 'cms', 'category', 'singlepage', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (78, '添加外部链接', '', 75, 'cms', 'category', 'wadd', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (79, '编辑栏目', '', 75, 'cms', 'category', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (80, '删除栏目', '', 75, 'cms', 'category', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (81, '更新栏目', '', 75, 'cms', 'category', 'public_cache', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (82, '排序', '', 75, 'cms', 'category', 'listorder', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (83, '状态设置', '', 75, 'cms', 'category', 'setstate', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (84, '模型管理', 'icon-apartment', 73, 'cms', 'models', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (85, '字段管理', '', 84, 'cms', 'field', 'index', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (86, '字段添加', '', 84, 'cms', 'field', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (87, '字段编辑', '', 84, 'cms', 'field', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (88, '字段删除', '', 84, 'cms', 'field', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (89, '字段排序', '', 84, 'cms', 'field', 'listorder', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (90, '字段状态', '', 84, 'cms', 'field', 'setstate', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (91, '字段搜索', '', 84, 'cms', 'field', 'setsearch', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (92, '字段隐藏', '', 84, 'cms', 'field', 'setvisible', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (93, '字段必须', '', 84, 'cms', 'field', 'setrequire', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (94, '添加模型', '', 84, 'cms', 'models', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (95, '修改模型', '', 84, 'cms', 'models', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (96, '删除模型', '', 84, 'cms', 'models', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (97, '模型投稿', '', 84, 'cms', 'models', 'setSub', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (98, '设置模型状态', '', 84, 'cms', 'models', 'setstate', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (99, '会员', 'icon-people', 0, 'member', 'member', 'index1', '', 1, '', 0, 4);
INSERT INTO `yxj_menu` VALUES (100, '会员管理', 'icon-people', 99, 'member', 'member', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (101, '会员设置', 'icon-setup', 100, 'member', 'setting', 'setting', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (102, '会员管理', 'icon-huiyuan', 100, 'member', 'member', 'manage', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (103, '审核会员', 'icon-shenhe', 100, 'member', 'member', 'userverify', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (104, '会员组', 'icon-huiyuan2', 99, 'member', 'group', 'index1', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (105, '会员组管理', 'icon-huiyuan2', 104, 'member', 'group', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (106, '表单管理', 'icon-shiyongwendang', 45, 'formguide', 'formguide', 'index', '', 1, '', 0, 3);
INSERT INTO `yxj_menu` VALUES (107, '添加表单', '', 106, 'formguide', 'formguide', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (108, '编辑表单', '', 106, 'formguide', 'formguide', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (109, '删除表单', '', 106, 'formguide', 'formguide', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (110, '字段管理', '', 106, 'formguide', 'field', 'index', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (111, '添加字段', '', 106, 'formguide', 'field', 'add', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (112, '编辑字段', '', 106, 'formguide', 'field', 'edit', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (113, '删除字段', '', 106, 'formguide', 'field', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (114, '信息列表', '', 106, 'formguide', 'info', 'index', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (115, '信息删除', '', 106, 'formguide', 'info', 'delete', '', 0, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (116, '服务器状态', 'icon-global', 10, 'admin', 'Ping', 'index', '', 1, '', 0, 0);
INSERT INTO `yxj_menu` VALUES (117, '反序列化漏洞演示', 'icon-bug-fill', 10, 'admin', 'Serialize', 'index', '', 1, '', 0, 0);

-- ----------------------------
-- Table structure for yxj_model
-- ----------------------------
DROP TABLE IF EXISTS `yxj_model`;
CREATE TABLE `yxj_model`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '所属模块',
  `name` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模型名称',
  `tablename` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '表名',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `setting` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '配置信息',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '模型类别：1-独立表，2-主附表',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorders` tinyint(3) NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '模型列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_model
-- ----------------------------
INSERT INTO `yxj_model` VALUES (1, 'cms', '文章模型', 'article', '文章模型', 'a:3:{s:17:\"category_template\";s:13:\"category.html\";s:13:\"list_template\";s:9:\"list.html\";s:13:\"show_template\";s:9:\"show.html\";}', 2, 1546574975, 1589816037, 0, 1);
INSERT INTO `yxj_model` VALUES (2, 'cms', '图片模型', 'picture', '图片模型', 'a:3:{s:17:\"category_template\";s:21:\"category_picture.html\";s:13:\"list_template\";s:17:\"list_picture.html\";s:13:\"show_template\";s:17:\"show_picture.html\";}', 2, 1548754193, 1589816038, 0, 1);
INSERT INTO `yxj_model` VALUES (3, 'cms', '产品模型', 'product', '产品模型', 'a:3:{s:17:\"category_template\";s:21:\"category_picture.html\";s:13:\"list_template\";s:17:\"list_picture.html\";s:13:\"show_template\";s:17:\"show_picture.html\";}', 2, 1549165800, 1589816042, 0, 0);
INSERT INTO `yxj_model` VALUES (4, 'cms', '下载模型', 'download', '下载模型', 'a:3:{s:17:\"category_template\";s:13:\"category.html\";s:13:\"list_template\";s:9:\"list.html\";s:13:\"show_template\";s:9:\"show.html\";}', 2, 1549624988, 1589816042, 0, 1);

-- ----------------------------
-- Table structure for yxj_model_field
-- ----------------------------
DROP TABLE IF EXISTS `yxj_model_field`;
CREATE TABLE `yxj_model_field`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '模型ID',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '别名',
  `remark` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '字段提示',
  `pattern` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '数据校验正则',
  `errortips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '数据校验未通过的提示信息',
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '字段类型',
  `setting` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ifsystem` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否主表字段 1 是',
  `iscore` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否内部字段',
  `iffixed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否固定不可修改',
  `ifrequire` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否必填',
  `ifsearch` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '作为搜索条件',
  `isadd` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '在投稿中显示',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`, `modelid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '模型字段列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_model_field
-- ----------------------------
INSERT INTO `yxj_model_field` VALUES (1, 1, 'id', '文档id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (2, 1, 'catid', '栏目id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (3, 1, 'title', '标题', '', '', '', 'text', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 1, 1, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (4, 1, 'flag', '属性', '', '', '', 'checkbox', 'a:3:{s:6:\"define\";s:31:\"varchar(32) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:76:\"1:置顶[1]\r\n2:头条[2]\r\n3:特荐[3]\r\n4:推荐[4]\r\n5:热点[5]\r\n6:幻灯[6]\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1551846870, 1551846870, 100, 1);
INSERT INTO `yxj_model_field` VALUES (5, 1, 'keywords', 'SEO关键词', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (6, 1, 'description', 'SEO摘要', '如不填写，则自动截取附表中编辑器的200字符', '', '', 'textarea', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (7, 1, 'tags', 'Tags标签', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (8, 1, 'uid', '用户id', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (9, 1, 'username', '用户名', '', '', '', 'text', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (10, 1, 'sysadd', '是否后台添加', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (11, 1, 'listorder', '排序', '', '', '', 'number', 'a:3:{s:6:\"define\";s:40:\"tinyint(3) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:3:\"100\";}', 1, 0, 1, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (12, 1, 'status', '状态', '', '', '', 'radio', 'a:3:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:21:\"0:待审核\r\n1:通过\";s:5:\"value\";s:1:\"1\";}', 1, 0, 1, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (13, 1, 'inputtime', '创建时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1546574975, 1546574975, 200, 1);
INSERT INTO `yxj_model_field` VALUES (14, 1, 'updatetime', '更新时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 1, 1, 0, 0, 0, 1546574975, 1546574975, 200, 1);
INSERT INTO `yxj_model_field` VALUES (15, 1, 'hits', '点击量', '', '', '', 'number', 'a:3:{s:6:\"define\";s:42:\"mediumint(8) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:1:\"0\";}', 1, 0, 1, 0, 0, 0, 1546574975, 1546574975, 200, 1);
INSERT INTO `yxj_model_field` VALUES (16, 1, 'did', '附表文档id', '', '', '', 'hidden', '', 0, 1, 1, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (17, 1, 'content', '内容', '', '', '', 'Ueditor', 'a:3:{s:6:\"define\";s:13:\"text NOT NULL\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 0, 0, 0, 0, 0, 1, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (18, 2, 'id', '文档id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (19, 2, 'catid', '栏目id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (20, 2, 'title', '标题', '', '', '', 'text', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 1, 1, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (21, 2, 'flag', '属性', '', '', '', 'checkbox', 'a:3:{s:6:\"define\";s:31:\"varchar(32) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:76:\"1:置顶[1]\r\n2:头条[2]\r\n3:特荐[3]\r\n4:推荐[4]\r\n5:热点[5]\r\n6:幻灯[6]\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1551846870, 1551846870, 100, 1);
INSERT INTO `yxj_model_field` VALUES (22, 2, 'keywords', 'SEO关键词', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (23, 2, 'description', 'SEO摘要', '如不填写，则自动截取附表中编辑器的200字符', '', '', 'textarea', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (24, 2, 'tags', 'Tags标签', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (25, 2, 'uid', '用户id', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (26, 2, 'username', '用户名', '', '', '', 'text', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (27, 2, 'sysadd', '是否后台添加', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (28, 2, 'listorder', '排序', '', '', '', 'number', 'a:3:{s:6:\"define\";s:40:\"tinyint(3) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:3:\"100\";}', 1, 0, 1, 0, 0, 0, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (29, 2, 'status', '状态', '', '', '', 'radio', 'a:3:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:21:\"0:待审核\r\n1:通过\";s:5:\"value\";s:1:\"1\";}', 1, 0, 1, 0, 0, 0, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (30, 2, 'inputtime', '创建时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1548754192, 1548754192, 200, 1);
INSERT INTO `yxj_model_field` VALUES (31, 2, 'updatetime', '更新时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 1, 1, 0, 0, 0, 1548754192, 1548754192, 200, 1);
INSERT INTO `yxj_model_field` VALUES (32, 2, 'hits', '点击量', '', '', '', 'number', 'a:3:{s:6:\"define\";s:42:\"mediumint(8) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:1:\"0\";}', 1, 0, 1, 0, 0, 0, 1548754192, 1548754192, 200, 1);
INSERT INTO `yxj_model_field` VALUES (33, 2, 'did', '附表文档id', '', '', '', 'hidden', '', 0, 1, 1, 0, 0, 0, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (34, 2, 'content', '内容', '', '', '', 'Ueditor', 'a:3:{s:6:\"define\";s:13:\"text NOT NULL\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 0, 0, 0, 0, 0, 1, 1548754192, 1548754192, 100, 1);
INSERT INTO `yxj_model_field` VALUES (35, 3, 'id', '文档id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (36, 3, 'catid', '栏目id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (37, 3, 'title', '标题', '', '', '', 'text', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 1, 1, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (38, 3, 'flag', '属性', '', '', '', 'checkbox', 'a:3:{s:6:\"define\";s:31:\"varchar(32) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:76:\"1:置顶[1]\r\n2:头条[2]\r\n3:特荐[3]\r\n4:推荐[4]\r\n5:热点[5]\r\n6:幻灯[6]\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1551846870, 1551846870, 100, 1);
INSERT INTO `yxj_model_field` VALUES (39, 3, 'keywords', 'SEO关键词', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (40, 3, 'description', 'SEO摘要', '如不填写，则自动截取附表中编辑器的200字符', '', '', 'textarea', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (41, 3, 'tags', 'Tags标签', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (42, 3, 'uid', '用户id', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (43, 3, 'username', '用户名', '', '', '', 'text', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (44, 3, 'sysadd', '是否后台添加', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (45, 3, 'listorder', '排序', '', '', '', 'number', 'a:3:{s:6:\"define\";s:40:\"tinyint(3) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:3:\"100\";}', 1, 0, 1, 0, 0, 0, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (46, 3, 'status', '状态', '', '', '', 'radio', 'a:3:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:21:\"0:待审核\r\n1:通过\";s:5:\"value\";s:1:\"1\";}', 1, 0, 1, 0, 0, 0, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (47, 3, 'inputtime', '创建时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1549165800, 1549165800, 200, 1);
INSERT INTO `yxj_model_field` VALUES (48, 3, 'updatetime', '更新时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 1, 1, 0, 0, 0, 1549165800, 1549165800, 200, 1);
INSERT INTO `yxj_model_field` VALUES (49, 3, 'hits', '点击量', '', '', '', 'number', 'a:3:{s:6:\"define\";s:42:\"mediumint(8) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:1:\"0\";}', 1, 0, 1, 0, 0, 0, 1549165800, 1549165800, 200, 1);
INSERT INTO `yxj_model_field` VALUES (50, 3, 'did', '附表文档id', '', '', '', 'hidden', '', 0, 1, 1, 0, 0, 0, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (51, 3, 'content', '内容', '', '', '', 'Ueditor', 'a:3:{s:6:\"define\";s:13:\"text NOT NULL\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 0, 0, 0, 0, 0, 1, 1549165800, 1549165800, 100, 1);
INSERT INTO `yxj_model_field` VALUES (52, 3, 'type', '类型', '', '', '', 'radio', 'a:4:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:91:\"1:营销网站\r\n2:电商网站\r\n3:响应式网站\r\n4:手机网站\r\n5:外贸网站\r\n6:其他\";s:10:\"filtertype\";s:1:\"1\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 1, 0, 1, 1552368369, 1552372294, 0, 1);
INSERT INTO `yxj_model_field` VALUES (53, 3, 'trade', '行业', '', '', '', 'radio', 'a:4:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:78:\"1:机械设备\r\n2:车辆物流\r\n3:地产建筑装修\r\n4:教育培训\r\n5:其他\";s:10:\"filtertype\";s:1:\"1\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 1, 0, 1, 1552372387, 1552372387, 0, 1);
INSERT INTO `yxj_model_field` VALUES (54, 3, 'price', '价格', '', '', '', 'radio', 'a:4:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:42:\"1:≤2500\r\n2:≤5000\r\n3:≤8000\r\n4:≥1万\";s:10:\"filtertype\";s:1:\"1\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 1, 0, 1, 1552372433, 1552372433, 0, 1);
INSERT INTO `yxj_model_field` VALUES (55, 4, 'id', '文档id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (56, 4, 'catid', '栏目id', '', '', '', 'hidden', '', 1, 0, 1, 0, 0, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (57, 4, 'title', '标题', '', '', '', 'text', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 1, 1, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (58, 4, 'flag', '属性', '', '', '', 'checkbox', 'a:3:{s:6:\"define\";s:31:\"varchar(32) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:76:\"1:置顶[1]\r\n2:头条[2]\r\n3:特荐[3]\r\n4:推荐[4]\r\n5:热点[5]\r\n6:幻灯[6]\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1551846870, 1551846870, 100, 1);
INSERT INTO `yxj_model_field` VALUES (59, 4, 'keywords', 'SEO关键词', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (60, 4, 'description', 'SEO摘要', '如不填写，则自动截取附表中编辑器的200字符', '', '', 'textarea', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (61, 4, 'tags', 'Tags标签', '关键词用回车确认', '', '', 'tags', 'a:3:{s:6:\"define\";s:32:\"varchar(255) NOT NULL DEFAULT \'\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 0, 1546574975, 1546574975, 100, 1);
INSERT INTO `yxj_model_field` VALUES (62, 4, 'uid', '用户id', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (63, 4, 'username', '用户名', '', '', '', 'text', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (64, 4, 'sysadd', '是否后台添加', '', '', '', 'number', NULL, 1, 1, 1, 0, 0, 0, 1558767044, 1558767044, 100, 1);
INSERT INTO `yxj_model_field` VALUES (65, 4, 'listorder', '排序', '', '', '', 'number', 'a:3:{s:6:\"define\";s:40:\"tinyint(3) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:3:\"100\";}', 1, 0, 1, 0, 0, 0, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (66, 4, 'status', '状态', '', '', '', 'radio', 'a:3:{s:6:\"define\";s:40:\"tinyint(2) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:21:\"0:待审核\r\n1:通过\";s:5:\"value\";s:1:\"1\";}', 1, 0, 1, 0, 0, 0, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (67, 4, 'inputtime', '创建时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 1, 0, 0, 0, 1549624988, 1549624988, 200, 1);
INSERT INTO `yxj_model_field` VALUES (68, 4, 'updatetime', '更新时间', '', '', '', 'datetime', 'a:3:{s:6:\"define\";s:37:\"int(10) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 1, 1, 0, 0, 0, 1549624988, 1549624988, 200, 1);
INSERT INTO `yxj_model_field` VALUES (69, 4, 'hits', '点击量', '', '', '', 'number', 'a:3:{s:6:\"define\";s:42:\"mediumint(8) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:1:\"0\";}', 1, 0, 1, 0, 0, 0, 1549624988, 1549624988, 200, 1);
INSERT INTO `yxj_model_field` VALUES (70, 4, 'did', '附表文档id', '', '', '', 'hidden', '', 0, 1, 1, 0, 0, 0, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (71, 4, 'content', '内容', '', '', '', 'Ueditor', 'a:3:{s:6:\"define\";s:13:\"text NOT NULL\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 0, 0, 0, 0, 0, 1, 1549624988, 1549624988, 100, 1);
INSERT INTO `yxj_model_field` VALUES (72, 1, 'thumb', '缩略图', '', '', '', 'image', 'a:3:{s:6:\"define\";s:36:\"int(5) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1565948216, 1565948216, 100, 1);
INSERT INTO `yxj_model_field` VALUES (73, 2, 'thumb', '缩略图', '', '', '', 'image', 'a:3:{s:6:\"define\";s:36:\"int(5) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1565948216, 1565948216, 100, 1);
INSERT INTO `yxj_model_field` VALUES (74, 3, 'thumb', '缩略图', '', '', '', 'image', 'a:3:{s:6:\"define\";s:36:\"int(5) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1565948216, 1565948216, 100, 1);
INSERT INTO `yxj_model_field` VALUES (75, 4, 'thumb', '缩略图', '', '', '', 'image', 'a:3:{s:6:\"define\";s:36:\"int(5) UNSIGNED NOT NULL DEFAULT \'0\'\";s:7:\"options\";s:0:\"\";s:5:\"value\";s:0:\"\";}', 1, 0, 0, 0, 0, 1, 1565948216, 1565948216, 100, 1);

-- ----------------------------
-- Table structure for yxj_module
-- ----------------------------
DROP TABLE IF EXISTS `yxj_module`;
CREATE TABLE `yxj_module`  (
  `module` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '模块',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模块名称',
  `sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '签名',
  `iscore` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '内置模块',
  `version` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '版本',
  `setting` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '设置信息',
  `installtime` int(10) NOT NULL DEFAULT 0 COMMENT '安装时间',
  `updatetime` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`module`) USING BTREE,
  INDEX `sign`(`sign`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '已安装模块列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_module
-- ----------------------------
INSERT INTO `yxj_module` VALUES ('cms', 'cms模块', 'b19cc279ed484c13c96c2f7142e2f437', 0, '1.0.0', 'a:6:{s:15:\"web_site_status\";i:1;s:9:\"site_name\";s:30:\"网络攻防实践演示站点\";s:10:\"site_title\";s:30:\"网络攻防实践演示站点\";s:12:\"site_keyword\";s:47:\"网络攻防实践,内容管理系统,CMS系统\";s:16:\"site_description\";s:53:\"网络攻防实践演示站点，内置10种漏洞。\";s:15:\"site_cache_time\";s:4:\"3600\";}', 1589651397, 1589651397, 0, 1);
INSERT INTO `yxj_module` VALUES ('member', '会员模块', 'fcfe4d97f35d1f30df5d6018a84f74ba', 0, '1.0.0', 'a:6:{s:13:\"allowregister\";s:1:\"1\";s:14:\"registerverify\";s:1:\"0\";s:16:\"openverification\";s:1:\"1\";s:12:\"defualtpoint\";s:1:\"0\";s:13:\"defualtamount\";s:1:\"0\";s:14:\"rmb_point_rate\";s:2:\"10\";}', 1589651409, 1589651409, 0, 1);
INSERT INTO `yxj_module` VALUES ('formguide', '表单模块', '1fa2d9a6f16e75616918c57ce3b88440', 0, '1.0.0', NULL, 1589651419, 1589651419, 0, 1);

-- ----------------------------
-- Table structure for yxj_page
-- ----------------------------
DROP TABLE IF EXISTS `yxj_page`;
CREATE TABLE `yxj_page`  (
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `title` varchar(160) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '内容',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`catid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '单页内容表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_page
-- ----------------------------
INSERT INTO `yxj_page` VALUES (2, '关于我们', '', '', '<p>&nbsp; &nbsp; xxx网络科技股份有限公司是一家集策略咨询、创意创新、视觉设计、技术研发、内容制造、营销推广为一体的综合型数字化创新服务企业，其利用公司持续积累的核心技术和互联网思维，提供以互联网、移动互联网为核心的网络技术服务和互动整合营销服务，为传统企业实现“互联网+”升级提供整套解决方案。公司定位于中大型企业为核心客户群，可充分满足这一群体相比中小企业更为丰富、高端、多元的互联网数字综合需求。</p><p><br/></p><p>&nbsp; &nbsp; xxx网络科技股份有限公司作为一家互联网数字服务综合商，其主营业务包括移动互联网应用开发服务、数字互动整合营销服务、互联网网站建设综合服务和电子商务综合服务。</p><p><br/></p><p>&nbsp; &nbsp; xxx网络科技股份有限公司秉承实现全网价值营销的理念，通过实现互联网与移动互联网的精准数字营销和用户数据分析，日益深入到客户互联网技术建设及运维营销的方方面面，在帮助客户形成自身互联网运作体系的同时，有效对接BAT(百度，阿里，腾讯)等平台即百度搜索、阿里电商、腾讯微信，通过平台的推广来推进互联网综合服务，实现企业、用户、平台三者完美对接，并形成高效互动的枢纽，在帮助客户获取互联网高附加价值的同时获得自身的不断成长和壮大。</p>', 0, 0);
INSERT INTO `yxj_page` VALUES (3, '企业文化', '', '', '<p>【愿景】</p><ul class=\" list-paddingleft-2\" style=\"list-style-type: disc;\"><li><p>不断倾听和满足用户需求，引导并超越用户需求，赢得用户尊敬</p></li><li><p>通过提升品牌形象，使员工具有高度企业荣誉感，赢得员工尊敬&nbsp;</p></li><li><p>推动互联网行业的健康发展，与合作伙伴共成长，赢得行业尊敬</p></li><li><p>注重企业责任，用心服务，关爱社会、回馈社会，赢得社会尊敬</p></li></ul><p><br/></p><p>【使命】</p><ul class=\" list-paddingleft-2\" style=\"list-style-type: disc;\"><li><p>使产品和服务像水和电融入人们的生活，为人们带来便捷和愉悦</p></li><li><p>关注不同地域、群体，并针对不同对象提供差异化的产品和服务</p></li><li><p>打造开放共赢平台，与合作伙伴共同营造健康的互联网生态环境</p></li></ul><p><br/></p><p>【管理理念】</p><ul class=\" list-paddingleft-2\" style=\"list-style-type: disc;\"><li><p>为员工提供良好的工作环境和激励机制&nbsp;</p></li><li><p>完善员工培养体系和职业发展通道，使员工与企业同步成长</p></li><li><p>充分尊重和信任员工，不断引导和鼓励，使其获得成就的喜悦</p></li></ul>', 0, 0);
INSERT INTO `yxj_page` VALUES (18, '联系我们', '', '', '<p>手　机：158-88888888</p><p>传　真：0512-88888888</p><p>邮　编：215000</p><p>邮　箱：admin@admin.com</p><p>地　址：江苏省苏州市吴中区某某工业园一区</p><p><br/></p><p><img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=116.404,39.915&zoom=10&width=530&height=340&markers=116.404,39.915\"/></p>', 0, 0);

-- ----------------------------
-- Table structure for yxj_picture
-- ----------------------------
DROP TABLE IF EXISTS `yxj_picture`;
CREATE TABLE `yxj_picture`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` int(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '缩略图',
  `flag` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '属性',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Tags标签',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 100 COMMENT '排序',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `sysadd` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否后台添加',
  `hits` mediumint(8) UNSIGNED NULL DEFAULT 0 COMMENT '点击量',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '图片模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_picture
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_picture_data
-- ----------------------------
DROP TABLE IF EXISTS `yxj_picture_data`;
CREATE TABLE `yxj_picture_data`  (
  `did` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '内容',
  PRIMARY KEY (`did`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '图片模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_picture_data
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_product
-- ----------------------------
DROP TABLE IF EXISTS `yxj_product`;
CREATE TABLE `yxj_product`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` int(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '缩略图',
  `flag` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '属性',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Tags标签',
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 100 COMMENT '排序',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `sysadd` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否后台添加',
  `hits` mediumint(8) UNSIGNED NULL DEFAULT 0 COMMENT '点击量',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '状态',
  `type` tinyint(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型',
  `trade` tinyint(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '行业',
  `price` tinyint(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '价格',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '产品模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_product
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_product_data
-- ----------------------------
DROP TABLE IF EXISTS `yxj_product_data`;
CREATE TABLE `yxj_product_data`  (
  `did` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '内容',
  PRIMARY KEY (`did`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '产品模型模型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_product_data
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_sms
-- ----------------------------
DROP TABLE IF EXISTS `yxj_sms`;
CREATE TABLE `yxj_sms`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `event` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '事件',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '验证码',
  `times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '验证次数',
  `ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作IP',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '短信验证码表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_sms
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_tags
-- ----------------------------
DROP TABLE IF EXISTS `yxj_tags`;
CREATE TABLE `yxj_tags`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'tagID',
  `tag` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'tag名称',
  `seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'seo简介',
  `usetimes` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '信息总数',
  `hits` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点击数',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tag`(`tag`) USING BTREE,
  INDEX `usetimes`(`usetimes`, `listorder`) USING BTREE,
  INDEX `hits`(`hits`, `listorder`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'tags主表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_tags
-- ----------------------------
INSERT INTO `yxj_tags` VALUES (1, '精密机器', '', '', '', 0, 0, 1553067267, 1553067267, 0);
INSERT INTO `yxj_tags` VALUES (2, '专业培训', '', '', '', 0, 0, 1553067267, 1553067267, 0);
INSERT INTO `yxj_tags` VALUES (3, '资格证书', '', '', '', 0, 0, 1553067267, 1553067267, 0);
INSERT INTO `yxj_tags` VALUES (4, '机械设备', '', '', '', 0, 0, 1553067296, 1553067296, 0);
INSERT INTO `yxj_tags` VALUES (5, '升降机', '', '', '', 0, 0, 1553067296, 1553067296, 0);
INSERT INTO `yxj_tags` VALUES (6, '租赁服务', '', '', '', 0, 0, 1553067296, 1553067296, 0);
INSERT INTO `yxj_tags` VALUES (7, '餐饮管理', '', '', '', 0, 0, 1553067319, 1553067319, 0);
INSERT INTO `yxj_tags` VALUES (8, '婚庆礼仪', '', '', '', 0, 0, 1553067319, 1553067319, 0);
INSERT INTO `yxj_tags` VALUES (9, '劳务派遣', '', '', '', 0, 0, 1553067319, 1553067319, 0);
INSERT INTO `yxj_tags` VALUES (10, '校外教育', '', '', '', 0, 0, 1553067339, 1553067339, 0);
INSERT INTO `yxj_tags` VALUES (11, '智能课程', '', '', '', 0, 0, 1553067339, 1553067339, 0);
INSERT INTO `yxj_tags` VALUES (12, '物流服务', '', '', '', 0, 0, 1553067377, 1553067377, 0);
INSERT INTO `yxj_tags` VALUES (13, '注脂', '', '', '', 0, 0, 1553067408, 1553067408, 0);
INSERT INTO `yxj_tags` VALUES (14, '打胶', '', '', '', 0, 0, 1553067408, 1553067408, 0);

-- ----------------------------
-- Table structure for yxj_tags_content
-- ----------------------------
DROP TABLE IF EXISTS `yxj_tags_content`;
CREATE TABLE `yxj_tags_content`  (
  `tag` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'tag名称',
  `modelid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '模型ID',
  `contentid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '信息ID',
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `updatetime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  INDEX `modelid`(`modelid`, `contentid`) USING BTREE,
  INDEX `tag`(`tag`(10)) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'tags数据表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of yxj_tags_content
-- ----------------------------

-- ----------------------------
-- Table structure for yxj_terms
-- ----------------------------
DROP TABLE IF EXISTS `yxj_terms`;
CREATE TABLE `yxj_terms`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parentid` smallint(5) NOT NULL DEFAULT 0 COMMENT '父ID',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `module` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '所属模块',
  `setting` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '相关配置信息',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE,
  INDEX `module`(`module`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yxj_terms
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
