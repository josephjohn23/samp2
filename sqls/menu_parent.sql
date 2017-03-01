/*
Navicat MySQL Data Transfer

Source Server         : 172.16.100.181
Source Server Version : 50547
Source Host           : 172.16.100.181:3306
Source Database       : cornershort

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-03-01 17:31:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `menu_parent`
-- ----------------------------
DROP TABLE IF EXISTS `menu_parent`;
CREATE TABLE `menu_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_parent
-- ----------------------------
INSERT INTO `menu_parent` VALUES ('1', 'Home', 'fa fa-home', 'cornershort_mlmapp_homepage', '0', '');
INSERT INTO `menu_parent` VALUES ('2', 'Register Member', 'fa fa-user-plus', '', '1', '');
INSERT INTO `menu_parent` VALUES ('3', '*Request For Upgrade', 'fa fa-level-up', '', '2', '');
INSERT INTO `menu_parent` VALUES ('4', 'Upgrade Member (Level)', 'fa fa-key', 'cornershort_mlmapp_upgrade_member_page_manual', '3', '');
INSERT INTO `menu_parent` VALUES ('5', '*Family Tree', 'fa fa-users', 'cornershort_mlmapp_family_tree_page', '4', '');
INSERT INTO `menu_parent` VALUES ('6', 'User Account', 'fa fa-user', '', '5', '');
INSERT INTO `menu_parent` VALUES ('7', 'Admin Tools', 'fa fa-pencil-square-o', '', '6', '');
INSERT INTO `menu_parent` VALUES ('8', 'Admin Reports', 'fa fa-line-chart', '', '7', '');
