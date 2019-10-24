/*
Navicat MySQL Data Transfer

Source Server         : 不可更改3306,实验请去3333
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : wcmin

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2019-10-22 14:04:23
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `it_category` VALUES ('16', '啊啊', '啊啊', './uploads/image/5dad968f389652019-10-21-19-29-1988.jpg', '2019-10-21 19:29:19', '2019-10-21 19:29:19');
