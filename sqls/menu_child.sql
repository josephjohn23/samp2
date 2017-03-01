/*
Navicat MySQL Data Transfer

Source Server         : 172.16.100.181
Source Server Version : 50547
Source Host           : 172.16.100.181:3306
Source Database       : cornershort

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-03-01 17:31:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `menu_child`
-- ----------------------------
DROP TABLE IF EXISTS `menu_child`;
CREATE TABLE `menu_child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_level` int(11) NOT NULL,
  `sort_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_parent_id` (`menu_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_child
-- ----------------------------
INSERT INTO `menu_child` VALUES ('1', '2', 'Show My Members', 'cornershort_mlmapp_register_member_page_show', '97', '0');
INSERT INTO `menu_child` VALUES ('2', '2', 'Add New Member', 'cornershort_mlmapp_register_member_page_add', '97', '1');
INSERT INTO `menu_child` VALUES ('3', '3', '*Auto Request', 'cornershort_mlmapp_request_for_upgrade_page_auto', '97', '0');
INSERT INTO `menu_child` VALUES ('4', '3', 'Manual Request', 'cornershort_mlmapp_request_for_upgrade_page_manual', '97', '1');
INSERT INTO `menu_child` VALUES ('5', '6', 'Show My Account', 'cornershort_mlmapp_user_account_page_show', '97', '0');
INSERT INTO `menu_child` VALUES ('6', '6', 'Edit My Account', 'cornershort_mlmapp_user_account_page_edit', '97', '1');
INSERT INTO `menu_child` VALUES ('7', '7', 'Member Info', 'cornershort_mlmapp_admin_tools_page_member_info_show', '100', '0');
INSERT INTO `menu_child` VALUES ('8', '7', 'Member Payment History', 'cornershort_mlmapp_admin_tools_page_member_payment_history_show', '100', '0');
INSERT INTO `menu_child` VALUES ('9', '7', 'Upgrade Member (Product)', 'cornershort_mlmapp_admin_tools_page_upgrade_member_manual', '100', '1');
INSERT INTO `menu_child` VALUES ('10', '8', 'Sales Tab 1', 'cornershort_mlmapp_report_page_sales_tab_1', '100', '0');
INSERT INTO `menu_child` VALUES ('11', '8', 'Sales Tab 2', 'cornershort_mlmapp_report_page_sales_tab_2', '100', '1');
INSERT INTO `menu_child` VALUES ('12', '8', 'Sales Tab 3', 'cornershort_mlmapp_report_page_sales_tab_3', '100', '2');
INSERT INTO `menu_child` VALUES ('13', '8', 'Show Bank Withdrawal', 'cornershort_mlmapp_report_page_bank_withdraw_show', '100', '3');
