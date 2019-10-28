/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : wcmin

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-10-28 16:06:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `it_address`
-- ----------------------------
DROP TABLE IF EXISTS `it_address`;
CREATE TABLE `it_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '电话号码',
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '省份',
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '城市',
  `country` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '区县',
  `detail` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '详细地址',
  `user_id` int(11) NOT NULL COMMENT '用户信息',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `address_name_unique` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_address
-- ----------------------------
INSERT INTO `it_address` VALUES ('1', '张三', '020-81167888', '广东省', '广州市', '海珠区', '新港中路397号', '1', '2018-08-07 11:56:44', '2018-08-07 11:56:44');

-- ----------------------------
-- Table structure for `it_admin`
-- ----------------------------
DROP TABLE IF EXISTS `it_admin`;
CREATE TABLE `it_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_username_unique` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_admin
-- ----------------------------
INSERT INTO `it_admin` VALUES ('1', '宋江', '$2y$10$y8QZ8h7aaBwbPyR1rF7wTeEptmtrpfycnjoXgUXQDS7sHTBp8cT7q', 'QaqIM8D4PFy5Jvv6clLwHQJaBlIYDVwWsvhTneXi28y5bBJuwJZzWinYdK1V', null, '2018-08-03 09:51:33');
INSERT INTO `it_admin` VALUES ('2', 'libai', '$2y$10$jYnDp8NQjPZ1us46lEYdMuftgDju2ugt9fAYtNxIyBdRQB6PD8yKi', null, null, null);

-- ----------------------------
-- Table structure for `it_category`
-- ----------------------------
DROP TABLE IF EXISTS `it_category`;
CREATE TABLE `it_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(32) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `cat_thumb` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_category
-- ----------------------------
INSERT INTO `it_category` VALUES ('1', '保湿产品', '让肌肤充满了水，太棒了', '/uploads/image/category1.jpg', '2019-10-16 12:39:45', '2019-10-16 12:39:45');
INSERT INTO `it_category` VALUES ('2', '美白产品', '肌肤晶莹剔透', '/uploads/image/index-banner1.jpg', '2019-10-16 12:39:50', '2019-10-16 12:39:50');
INSERT INTO `it_category` VALUES ('3', '去皱产品', '肌肤犹如新生', '/uploads/image/category3.jpg', '2019-10-16 12:39:54', '2019-10-16 12:39:54');
INSERT INTO `it_category` VALUES ('4', '祛痘产品', '排毒养颜，立回光嫩肌肤', '/uploads/image/index-banner2.jpg', '2019-10-16 12:39:58', '2019-10-16 12:39:58');
INSERT INTO `it_category` VALUES ('5', '手工香皂', '手工香皂，香味醇厚', '/uploads/image/index-banner3.jpg', '2019-10-16 12:40:01', '2019-10-16 12:40:01');

-- ----------------------------
-- Table structure for `it_goods`
-- ----------------------------
DROP TABLE IF EXISTS `it_goods`;
CREATE TABLE `it_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `cat_id` int(11) NOT NULL COMMENT '所属栏目的id',
  `goods_price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `stock` int(11) NOT NULL DEFAULT '100' COMMENT '库存',
  `goods_thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `goods_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `is_hot` int(11) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_goods_name_unique` (`goods_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_goods
-- ----------------------------
INSERT INTO `it_goods` VALUES ('1', '珀莱雅美白', '2', '120.00', '100', '/uploads/image/product_8.jpg', '美白保湿', '1', '2018-08-03 10:28:41', '2018-08-03 10:28:41');
INSERT INTO `it_goods` VALUES ('2', '芦荟保湿', '1', '280.00', '80', '/uploads/image/product_7.jpg', '芦荟保湿，功能卓越', '0', '2018-08-03 10:28:41', '2018-08-03 10:28:41');
INSERT INTO `it_goods` VALUES ('3', '去皱霜', '3', '800.00', '120', '/uploads/image/product_9.jpg', '去皱晚霜', '1', '2018-08-03 11:44:59', '2018-08-03 11:44:59');
INSERT INTO `it_goods` VALUES ('4', '祛痘套装', '4', '999.00', '100', '/uploads/image/product_2.jpg', '祛痘三件套', '1', '2018-08-03 11:45:33', '2018-08-03 11:45:33');
INSERT INTO `it_goods` VALUES ('5', '保湿精华水', '1', '99.00', '50', '/uploads/image/product_4.jpg', '内含大量保湿精华', '1', '2018-08-03 11:51:16', '2018-08-03 11:51:16');
INSERT INTO `it_goods` VALUES ('6', '牛奶香皂', '5', '58.00', '30', '/uploads/image/product_11.jpg', '纯手工，进口奶酪香皂', '1', null, null);
INSERT INTO `it_goods` VALUES ('7', '去皱眼霜', '3', '699.00', '80', '/uploads/image/product_10.jpg', '去除岁月皱纹，还你一双明眸！', '0', null, null);
INSERT INTO `it_goods` VALUES ('8', '玫瑰香皂', '5', '58.00', '30', '/uploads/image/product_5.jpg', '玫瑰香氛', '0', null, null);
INSERT INTO `it_goods` VALUES ('9', '黑泥香皂', '5', '58.00', '30', '/uploads/image/product_3.jpg', '源自太平洋深层海藻泥', '0', null, null);
INSERT INTO `it_goods` VALUES ('10', '桂花香皂', '5', '58.00', '30', '/uploads/image/product_6.jpg', '浓浓桂花香', '0', null, null);
INSERT INTO `it_goods` VALUES ('11', 'aaaaaaaaa', '4', '0.00', '100', '/uploads/image/f794da20a79b40306479e6f047cf2354.png', 'aaaaaaaa', '0', '2019-10-28 15:55:51', '2019-10-28 15:55:51');

-- ----------------------------
-- Table structure for `it_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `it_migrations`;
CREATE TABLE `it_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_migrations
-- ----------------------------
INSERT INTO `it_migrations` VALUES ('1', '2018_08_02_091906_create_user_table', '1');
INSERT INTO `it_migrations` VALUES ('2', '2018_08_02_092327_create_category_table', '1');
INSERT INTO `it_migrations` VALUES ('3', '2018_08_02_154644_create_admin_table', '2');
INSERT INTO `it_migrations` VALUES ('5', '2018_08_03_101518_create_goods_table', '3');
INSERT INTO `it_migrations` VALUES ('6', '2018_08_07_093819_create_user_table', '4');
INSERT INTO `it_migrations` VALUES ('7', '2018_08_07_112920_create_address_table', '5');
INSERT INTO `it_migrations` VALUES ('8', '2018_08_07_151109_create_order_table', '6');

-- ----------------------------
-- Table structure for `it_order`
-- ----------------------------
DROP TABLE IF EXISTS `it_order`;
CREATE TABLE `it_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '会员的id',
  `order_sn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单的编号',
  `order_price` decimal(9,2) NOT NULL COMMENT '订单金额',
  `order_status` int(11) NOT NULL DEFAULT '1' COMMENT '订单状态1正常0取消',
  `trade_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '订单交易号',
  `is_pay` int(11) NOT NULL DEFAULT '0' COMMENT '是否支付1已经支付',
  `is_shop` int(11) NOT NULL DEFAULT '0' COMMENT '是否发货0未发货',
  `is_receipt` int(11) NOT NULL DEFAULT '0' COMMENT '是否收货0未收货',
  `order_msg` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '订单留言',
  `address` varchar(108) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '收货地址',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_order
-- ----------------------------
INSERT INTO `it_order` VALUES ('1', '1', '5b69498e257ea', '493.84', '1', '', '0', '0', '0', '', '', null, null);

-- ----------------------------
-- Table structure for `it_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `it_order_goods`;
CREATE TABLE `it_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品缩略图',
  `goods_price` decimal(9,2) NOT NULL COMMENT '商品金额',
  `goods_counts` int(11) NOT NULL COMMENT '购买数量',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_order_goods
-- ----------------------------
INSERT INTO `it_order_goods` VALUES ('1', '1', '水壶帽', 'http://www.shopapi.com/uploads/goods/a79644dd0e80638026196dce6715c368.jpeg', '56.90', '5', null, null);
INSERT INTO `it_order_goods` VALUES ('2', '1', '太阳帽', 'http://www.shopapi.com/uploads/goods/1f95a161bce32eaff2203b0ef5a6767b.jpeg', '34.89', '6', null, null);

-- ----------------------------
-- Table structure for `it_user`
-- ----------------------------
DROP TABLE IF EXISTS `it_user`;
CREATE TABLE `it_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'openid',
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `extend` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '扩展',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of it_user
-- ----------------------------
INSERT INTO `it_user` VALUES ('1', 'osnoY4yuuNinUh0QL8NWd7w6HdAk', '雄鹰展翅', '', '2018-08-07 09:46:55', '2018-08-07 11:08:18');
