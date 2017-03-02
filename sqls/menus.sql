-- MySQL dump 10.14  Distrib 5.5.47-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cornershort
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menu_parent`
--

DROP TABLE IF EXISTS `menu_parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_parent`
--

LOCK TABLES `menu_parent` WRITE;
/*!40000 ALTER TABLE `menu_parent` DISABLE KEYS */;
INSERT INTO `menu_parent` VALUES (1,'Home','fa fa-home','cornershort_mlmapp_homepage',0,''),(2,'Register Member','fa fa-user-plus','',1,''),(3,'*Request For Upgrade','fa fa-level-up','',2,''),(4,'Upgrade Member (Level)','fa fa-key','cornershort_mlmapp_upgrade_member_page_manual',3,''),(5,'*Family Tree','fa fa-users','cornershort_mlmapp_family_tree_page',4,''),(6,'User Account','fa fa-user','',5,''),(7,'Admin Tools','fa fa-pencil-square-o','',6,''),(8,'Admin Reports','fa fa-line-chart','',10,'');
/*!40000 ALTER TABLE `menu_parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_child`
--

DROP TABLE IF EXISTS `menu_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_child`
--

LOCK TABLES `menu_child` WRITE;
/*!40000 ALTER TABLE `menu_child` DISABLE KEYS */;
INSERT INTO `menu_child` VALUES (1,2,'Show My Members','cornershort_mlmapp_register_member_page_show',97,0),(2,2,'Add New Member','cornershort_mlmapp_register_member_page_add',97,1),(3,3,'*Auto Request','cornershort_mlmapp_request_for_upgrade_page_auto',97,0),(4,3,'Manual Request','cornershort_mlmapp_request_for_upgrade_page_manual',97,1),(5,6,'Show My Account','cornershort_mlmapp_user_account_page_show',97,0),(6,6,'Edit My Account','cornershort_mlmapp_user_account_page_edit',97,1),(7,7,'Member Info','cornershort_mlmapp_admin_tools_page_member_info_show',100,0),(8,7,'Member Payment History','cornershort_mlmapp_admin_tools_page_member_payment_history_show',100,0),(9,7,'Upgrade Member (Product)','cornershort_mlmapp_admin_tools_page_upgrade_member_manual',100,1),(10,8,'Sales Tab 1','cornershort_mlmapp_report_page_sales_tab_1',100,0),(11,8,'Sales Tab 2','cornershort_mlmapp_report_page_sales_tab_2',100,1),(12,8,'Sales Tab 3','cornershort_mlmapp_report_page_sales_tab_3',100,2),(13,8,'Show Bank Withdrawal','cornershort_mlmapp_report_page_bank_withdraw_show',100,3);
/*!40000 ALTER TABLE `menu_child` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-02  8:02:31
