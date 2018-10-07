/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.40-84.0-log : Database - crossw57_cashcard
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crossw57_cashcard` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `crossw57_cashcard`;

/*Table structure for table `cm_acos` */

DROP TABLE IF EXISTS `cm_acos`;

CREATE TABLE `cm_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_acos` */

/*Table structure for table `cm_approvedaccounts` */

DROP TABLE IF EXISTS `cm_approvedaccounts`;

CREATE TABLE `cm_approvedaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardholder_id` int(11) NOT NULL,
  `approved_date` date NOT NULL,
  `approved_by` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `cm_approvedaccounts` */

insert  into `cm_approvedaccounts`(`id`,`cardholder_id`,`approved_date`,`approved_by`) values (1,9,'0000-00-00','admin'),(2,9,'0000-00-00','admin'),(3,9,'2018-09-27','admin'),(4,9,'2018-09-27','admin'),(5,9,'2018-09-27','admin'),(6,9,'2018-09-27','admin'),(7,9,'2018-09-27','admin'),(8,9,'2018-09-27','admin'),(9,10,'2018-09-27','admin'),(10,11,'2018-09-27','admin'),(11,11,'2018-09-27','admin'),(12,12,'2018-09-27','admin'),(13,13,'2018-10-02','admin'),(14,15,'2018-10-02','admin'),(15,14,'2018-10-02','admin'),(16,17,'2018-10-04','admin'),(17,18,'2018-10-04','admin'),(18,16,'2018-10-04','admin'),(19,19,'2018-10-04','admin'),(21,21,'2018-10-05','admin'),(22,22,'2018-10-06','TEST33'),(23,24,'2018-10-06','MANUEL2018'),(24,23,'2018-10-06','MANUEL2018');

/*Table structure for table `cm_aros` */

DROP TABLE IF EXISTS `cm_aros`;

CREATE TABLE `cm_aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_aros` */

/*Table structure for table `cm_aros_acos` */

DROP TABLE IF EXISTS `cm_aros_acos`;

CREATE TABLE `cm_aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_aros_acos` */

/*Table structure for table `cm_atmstations` */

DROP TABLE IF EXISTS `cm_atmstations`;

CREATE TABLE `cm_atmstations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `alias` varchar(10) DEFAULT NULL,
  `branch_id` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_atmstations` */

/*Table structure for table `cm_auditrails` */

DROP TABLE IF EXISTS `cm_auditrails`;

CREATE TABLE `cm_auditrails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `directory` text,
  `transaction_type` varchar(10) DEFAULT NULL,
  `description` varchar(35) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=latin1;

/*Data for the table `cm_auditrails` */

insert  into `cm_auditrails`(`id`,`username`,`role`,`directory`,`transaction_type`,`description`,`transaction_date`) values (1,'test','CARD MANAGEMENT DEPARTMENT OFFICER','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 00:59:07'),(2,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 00:59:20'),(3,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 00:59:42'),(4,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:01:00'),(5,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:01:52'),(6,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:02:00'),(7,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:02:03'),(8,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:02:27'),(9,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:02:34'),(10,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:02:44'),(11,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:02:50'),(12,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:03:02'),(13,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:03:40'),(14,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 01:04:27'),(15,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:04:36'),(16,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:04:42'),(17,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:04:45'),(18,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:05:37'),(19,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:05:44'),(20,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:06:01'),(21,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 01:06:38'),(22,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:06:57'),(23,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:07:03'),(24,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHANGE PIN','2018-10-05 01:07:14'),(25,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:07:35'),(26,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:07:43'),(27,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 01:07:54'),(28,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 01:08:00'),(29,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 01:44:56'),(30,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:45:32'),(31,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:45:41'),(32,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:45:44'),(33,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:46:14'),(34,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:46:21'),(35,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:46:27'),(36,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:46:52'),(37,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:46:59'),(38,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:47:02'),(39,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:47:13'),(40,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:47:20'),(41,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 01:47:31'),(42,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:47:43'),(43,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:47:51'),(44,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:47:54'),(45,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:48:06'),(46,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:48:13'),(47,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 01:48:20'),(48,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:48:35'),(49,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:48:41'),(50,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 01:48:47'),(51,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 01:49:16'),(52,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:49:36'),(53,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:49:42'),(54,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 01:49:50'),(55,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 01:50:02'),(56,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 01:50:09'),(57,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 01:50:12'),(58,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 02:09:24'),(59,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 02:09:37'),(60,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 02:09:57'),(61,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 02:10:04'),(62,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 02:10:06'),(63,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 02:10:26'),(64,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 02:10:32'),(65,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 02:10:41'),(66,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 02:11:03'),(67,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 02:11:10'),(68,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHANGE PIN','2018-10-05 02:11:27'),(69,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 02:11:46'),(70,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 02:11:52'),(71,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 02:12:15'),(72,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PURCHASE','2018-10-05 02:12:27'),(73,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 02:13:01'),(74,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 02:13:08'),(75,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 02:13:21'),(76,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 03:03:01'),(77,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:05:11'),(78,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:05:41'),(79,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:06:55'),(80,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 03:08:06'),(81,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:08:36'),(82,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 03:08:49'),(83,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 03:08:52'),(84,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:09:12'),(85,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 03:09:19'),(86,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 03:09:38'),(87,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:10:06'),(88,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 03:10:14'),(89,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 03:10:17'),(90,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 03:30:14'),(91,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 04:24:06'),(92,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:24:36'),(93,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 04:29:49'),(94,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:30:04'),(95,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:30:39'),(96,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 04:30:47'),(97,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHANGE PIN','2018-10-05 04:30:58'),(98,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 04:41:32'),(99,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:41:42'),(100,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 04:41:50'),(101,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 04:41:57'),(102,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:42:11'),(103,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 04:42:17'),(104,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 04:42:20'),(105,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 04:42:32'),(106,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 04:42:39'),(107,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 04:42:46'),(108,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 06:42:44'),(109,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 06:43:39'),(110,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 06:56:16'),(111,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 06:56:30'),(112,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 06:56:33'),(113,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 06:57:24'),(114,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 06:57:34'),(115,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 06:57:56'),(116,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 07:00:10'),(117,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 07:00:30'),(118,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CARD LOADING','2018-10-05 07:04:21'),(119,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 07:48:56'),(120,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 07:49:05'),(121,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 07:49:08'),(122,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\auditlogs\\20181005.csv','ON US','LOGIN','2018-10-05 09:08:27'),(123,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:08:49'),(124,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:09:02'),(125,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:09:12'),(126,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 09:09:15'),(127,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:09:44'),(128,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:09:52'),(129,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 09:09:59'),(130,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:21:26'),(131,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:21:34'),(132,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 09:21:37'),(133,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:23:16'),(134,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:23:25'),(135,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 09:23:34'),(136,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:27:18'),(137,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:27:26'),(138,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 09:27:30'),(139,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:29:05'),(140,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:29:21'),(141,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CASH OUT','2018-10-05 09:29:32'),(142,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','CHECK CARD STATUS','2018-10-05 09:54:25'),(143,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','PIN VALIDATION','2018-10-05 09:54:35'),(144,'test1','SUPER ADMINISTRATOR','c:\\Users\\MEMB14081533\\Documents\\Node\\important\\cashmate_node_api\\2018\\10\\test1\\transactionlogs\\20181005.csv','ON US','BALANCE INQUIRY','2018-10-05 09:54:39'),(145,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:35:56'),(146,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:36:20'),(147,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:36:29'),(148,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 12:36:32'),(149,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:37:01'),(150,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:37:11'),(151,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CASH OUT','2018-10-06 12:37:27'),(152,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:37:51'),(153,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:38:00'),(154,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 12:38:03'),(155,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:38:29'),(156,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:38:37'),(157,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PURCHASE','2018-10-06 12:38:59'),(158,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:39:21'),(159,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:39:31'),(160,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 12:39:47'),(161,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 12:40:08'),(162,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 12:40:17'),(163,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 12:40:19'),(164,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:41:39'),(165,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:41:47'),(166,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:43:05'),(167,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:43:38'),(168,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:43:44'),(169,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 12:44:05'),(170,'admin','SUPER ADMINISTRATOR','/app\\2018\\10\\admin\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 20:51:45'),(171,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 21:08:58'),(172,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 22:35:22'),(173,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 22:35:31'),(174,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 22:35:33'),(175,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 22:39:11'),(176,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 22:40:29'),(177,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 22:40:38'),(178,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 22:40:48'),(179,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 22:43:40'),(180,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 22:49:46'),(181,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 22:57:17'),(182,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 22:57:41'),(183,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 22:57:48'),(184,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 22:57:59'),(185,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:02:39'),(186,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:02:57'),(187,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:03:06'),(188,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CASH OUT','2018-10-06 23:03:13'),(189,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:06:41'),(190,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:06:59'),(191,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:07:06'),(192,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:07:14'),(193,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:11:30'),(194,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:11:43'),(195,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:11:49'),(196,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 23:11:52'),(197,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:12:56'),(198,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:13:07'),(199,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:13:29'),(200,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:16:34'),(201,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:16:47'),(202,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:16:57'),(203,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:17:05'),(204,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:17:17'),(205,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:20:53'),(206,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:21:10'),(207,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:21:17'),(208,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:21:25'),(209,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:24:40'),(210,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:24:49'),(211,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHANGE PIN','2018-10-06 23:25:03'),(212,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:25:29'),(213,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:25:35'),(214,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 23:25:38'),(215,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:26:04'),(216,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:26:10'),(217,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:26:33'),(218,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:27:14'),(219,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:27:45'),(220,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:28:12'),(221,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:28:21'),(222,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:28:28'),(223,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','BALANCE INQUIRY','2018-10-06 23:28:30'),(224,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:28:49'),(225,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:29:00'),(226,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:29:08'),(227,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:31:52'),(228,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:32:37'),(229,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:32:56'),(230,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:33:10'),(231,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CASH OUT','2018-10-06 23:33:22'),(232,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:33:50'),(233,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:33:56'),(234,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:34:05'),(235,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:45:45'),(236,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:49:41'),(237,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:49:51'),(238,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:49:58'),(239,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:50:10'),(240,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:51:37'),(241,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:51:48'),(242,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:51:54'),(243,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:52:01'),(244,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:59:10'),(245,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181006.csv','ON US','LOGIN','2018-10-06 23:59:21'),(246,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CHECK CARD STATUS','2018-10-06 23:59:32'),(247,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','PIN VALIDATION','2018-10-06 23:59:38'),(248,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181006.csv','ON US','CARD LOADING','2018-10-06 23:59:45'),(249,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\auditlogs\\20181007.csv','ON US','LOGIN','2018-10-07 00:01:52'),(250,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','CHECK CARD STATUS','2018-10-07 00:02:04'),(251,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','PIN VALIDATION','2018-10-07 00:02:16'),(252,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','BALANCE INQUIRY','2018-10-07 00:02:19'),(253,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','CHECK CARD STATUS','2018-10-07 00:02:34'),(254,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','PIN VALIDATION','2018-10-07 00:02:40'),(255,'test1','SUPER ADMINISTRATOR','/app\\2018\\10\\test1\\transactionlogs\\20181007.csv','ON US','CARD LOADING','2018-10-07 00:02:47');

/*Table structure for table `cm_branches` */

DROP TABLE IF EXISTS `cm_branches`;

CREATE TABLE `cm_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branchnumber` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `branchcode` varchar(10) DEFAULT NULL,
  `address` text,
  `contactno` varchar(13) DEFAULT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `branch_manager` varchar(255) DEFAULT NULL,
  `registered` date DEFAULT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `posdevice_id` int(11) DEFAULT NULL,
  `deviceadded` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `cm_branches` */

insert  into `cm_branches`(`id`,`branchnumber`,`name`,`branchcode`,`address`,`contactno`,`tel_no`,`email`,`branch_manager`,`registered`,`terminal_id`,`posdevice_id`,`deviceadded`,`modified`,`status`) values (2,56140002,'Quezon  Branch','A0001','Quezon City','3-23-656-5656','232-623-2323','quezo456456456n@brb.com','Juanito Gamad','2018-08-31',NULL,2,'0000-00-00 00:00:00','2018-09-15 09:28:55','Active'),(3,56140003,'Cavite branch','C0000','Dasmarinas Cavite','6-56-563-2323','232-623-2323','kent_clark@gmail.com','Kenneth Clark Valde','2018-09-01',NULL,3,'2018-09-01 02:43:24','2018-09-01 02:43:24','Active'),(4,56140004,'Cebu branch','00123','Cebu City','3-23-263-2323','323-232-3265','juangamad@gmail.com','Juanito Gamad','2018-09-15',NULL,NULL,'2018-09-15 09:15:52','2018-09-15 09:28:45','Active'),(14,0,'BRANCH1','2012','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(15,0,'BRANCH2','2013','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(16,0,'BRANCH3','2014','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(17,0,'BRANCH3','2015','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(18,0,'BRANCH4','2016','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(19,0,'BRANCH1','2017','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(20,0,'BRANCH1','2018','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(21,0,'BRANCH1','2019','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active'),(22,0,'BRANCH1','2020','Sample address','345345345','123-123-123','sample@email.com','Sample Branch Manager','2018-09-29',NULL,NULL,'0000-00-00 00:00:00','2018-09-29 13:35:57','Active');

/*Table structure for table `cm_cardannuallimits` */

DROP TABLE IF EXISTS `cm_cardannuallimits`;

CREATE TABLE `cm_cardannuallimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardannuallimits` */

insert  into `cm_cardannuallimits`(`id`,`product_id`,`cardtype_id`,`channel_atm`,`channel_pos`,`channel_bol`,`min_withdrawalvalue`,`min_withdrawalfee`,`max_transvalue`,`max_transfee`,`total_withdrawalvalue`,`total_withdrawalfee`,`total_fundtransvalue`,`total_fundtransfee`,`min_loadingvalue`,`min_loadingfee`,`max_loadingvalue`,`max_loadingfee`,`added`,`addedby`,`modified`,`modifiedby`) values (1,5,1,1,1,1,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-09-13','Portal Administrator','2018-09-13',NULL),(2,5,2,1,1,1,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-09-13','Portal Administrator','2018-09-13',NULL),(3,2,1,1,1,1,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-09-17','Portal Administrator','2018-09-17',NULL);

/*Table structure for table `cm_cardapplications` */

DROP TABLE IF EXISTS `cm_cardapplications`;

CREATE TABLE `cm_cardapplications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid` varchar(64) NOT NULL,
  `registration` date NOT NULL,
  `cardtype_id` smallint(1) NOT NULL,
  `approved_by` varchar(20) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `processed_by` varchar(20) NOT NULL,
  `processed_date` date NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `others` varchar(35) DEFAULT NULL,
  `status` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardapplications` */

insert  into `cm_cardapplications`(`id`,`refid`,`registration`,`cardtype_id`,`approved_by`,`approved_date`,`processed_by`,`processed_date`,`purpose`,`others`,`status`) values (1,'2018092504WBGoec2FTnAH1519PM','2018-09-25',1,NULL,NULL,'Portal Administrator','2018-09-25','New Application',NULL,1),(2,'2018092705wy3ZW49gH7nI0051AM','2018-09-28',2,NULL,NULL,'Portal Administrator','2018-09-27','New Application',NULL,1),(3,'2018092705Ie8P953cqdYq4124AM','2018-09-27',2,NULL,NULL,'Portal Administrator','2018-09-27','New Application',NULL,1),(4,'2018092706PwrWO9NIxOiV5810AM','2018-09-27',2,NULL,NULL,'Portal Administrator','2018-09-27','New Application',NULL,1),(5,'2018092901y1u9vSZmsfiM4511PM','2018-09-29',2,NULL,NULL,'Portal Administrator','2018-09-29','New Application',NULL,1),(6,'2018093001Lg8afgJXoEUa2820PM','2018-09-30',2,NULL,NULL,'Portal Administrator','2018-09-30','New Application',NULL,1),(7,'2018100201cWfzfp0UVja25126AM','2018-10-02',2,NULL,NULL,'Portal Administrator','2018-10-02','New Application',NULL,1),(8,'2018100211E5T5jaWL46r42444AM','2018-10-02',2,NULL,NULL,'Portal Administrator','2018-10-02','New Application',NULL,1),(9,'2018100202dJTYvbWK3ONN2631PM','2018-10-02',0,NULL,NULL,'Portal Administrator','2018-10-02','New Application',NULL,1),(10,'2018100407ucR2j63JkjBa1709PM','2018-10-04',0,NULL,NULL,'Portal Administrator','2018-10-04','New Application',NULL,1),(11,'2018100410F6JBYWqNdSE23956PM','2018-10-05',0,NULL,NULL,'Portal Administrator','2018-10-04','New Application',NULL,1),(12,'2018100501zpif8PS8xYpT0735AM','2018-10-05',0,NULL,NULL,'BRANCH FIVE','2018-10-05','New Application',NULL,1),(13,'2018100501UhR8hcRnmurO3706AM','2018-10-05',0,NULL,NULL,'Portal Administrator','2018-10-05','New Application',NULL,1),(14,'2018100609q6wYEDxFVBp13134AM','2018-10-06',0,NULL,NULL,'JASON BUSA','2018-10-06','New Application',NULL,1),(15,'2018100611kjBCPhAJvXRF4740AM','2018-10-06',0,NULL,NULL,'Portal Administrator','2018-10-06','New Application',NULL,1),(16,'2018100609WOgJjr4hVpz01513PM','2018-10-06',0,NULL,NULL,'LOURDES MAYNES','2018-10-06','New Application',NULL,1);

/*Table structure for table `cm_cardclaims` */

DROP TABLE IF EXISTS `cm_cardclaims`;

CREATE TABLE `cm_cardclaims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(20) NOT NULL,
  `claim_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardclaims` */

/*Table structure for table `cm_carddailylimits` */

DROP TABLE IF EXISTS `cm_carddailylimits`;

CREATE TABLE `cm_carddailylimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  `expiry_date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `cm_carddailylimits` */

insert  into `cm_carddailylimits`(`id`,`product_id`,`cardtype_id`,`channel_atm`,`channel_pos`,`channel_bol`,`min_withdrawalvalue`,`min_withdrawalfee`,`max_transvalue`,`max_transfee`,`total_withdrawalvalue`,`total_withdrawalfee`,`total_fundtransvalue`,`total_fundtransfee`,`min_loadingvalue`,`min_loadingfee`,`max_loadingvalue`,`max_loadingfee`,`added`,`addedby`,`modified`,`modifiedby`,`expiry_date`) values (1,3,1,0,0,1,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-09-12',NULL,'2018-09-12','Portal Administrator','6 Months'),(2,3,2,0,0,1,0.00,56565.00,56565.00,5656.00,123123.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2018-09-12','Portal Administrator','2018-09-12','Portal Administrator','6 Months'),(3,2,1,0,1,0,1231.33,1231.00,565.00,5000.00,1000.00,100.00,100.00,100.00,100.00,100.00,100.00,100.00,'2018-09-12','Portal Administrator','2018-09-12','Portal Administrator','1 Month'),(4,2,2,1,1,1,5655.23,0.00,323.00,232.00,32.00,32.00,32.00,32.00,32.00,32.00,32.00,32.00,'2018-09-13','Portal Administrator','2018-09-13','Portal Administrator','5 Years');

/*Table structure for table `cm_cardeliveries` */

DROP TABLE IF EXISTS `cm_cardeliveries`;

CREATE TABLE `cm_cardeliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `added` date NOT NULL,
  `status` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardeliveries` */

/*Table structure for table `cm_cardexpires` */

DROP TABLE IF EXISTS `cm_cardexpires`;

CREATE TABLE `cm_cardexpires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(35) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `added` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardexpires` */

/*Table structure for table `cm_cardholderids` */

DROP TABLE IF EXISTS `cm_cardholderids`;

CREATE TABLE `cm_cardholderids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardholder_id` int(11) NOT NULL,
  `refid` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardholderids` */

insert  into `cm_cardholderids`(`id`,`cardholder_id`,`refid`,`path`) values (1,6,2018081505,'Uploads/2018/08/ID-2018081505G8EXeWhQgQwW0359PM0507.jpg'),(2,6,2018081505,'Uploads/2018/08/ID-2018081505G8EXeWhQgQwW0359PM0543.jpg'),(3,6,2018081505,'Uploads/2018/08/ID-2018081505G8EXeWhQgQwW0359PM0500.jpg'),(4,7,2018081505,'Uploads/2018/08/ID-2018081505TlVYjRbkSKq05443PM0554.png'),(5,8,2147483647,'Uploads/2018/09/ID-20180917036gvSZx4NLjiL4234PM0331.png'),(6,9,2018092504,'Uploads/2018/09/ID-2018090609WzzKc97HXlA25843AM1020.png'),(7,10,2018092705,'Uploads/2018/09/ID-2018092705wy3ZW49gH7nI0051AM0547.jpg'),(8,11,2018092705,'Uploads/2018/09/ID-2018092705Ie8P953cqdYq4124AM0535.jpeg'),(9,11,2018092705,'Uploads/2018/09/ID-2018092705Ie8P953cqdYq4124AM0652.jpg'),(10,11,2018092705,'Uploads/2018/09/ID-2018092705Ie8P953cqdYq4124AM0626.jpg'),(11,12,2018092706,'Uploads/2018/09/ID-2018092706PwrWO9NIxOiV5810AM0609.jpg'),(12,12,2018092706,'Uploads/2018/09/ID-2018092706PwrWO9NIxOiV5810AM0708.jpg'),(13,12,2018092706,'Uploads/2018/09/ID-2018092706PwrWO9NIxOiV5810AM0704.jpg'),(14,13,2018092901,'Uploads/2018/09/ID-2018092901y1u9vSZmsfiM4511PM0232.png'),(15,14,2018093001,'Uploads/2018/09/ID-2018093001Lg8afgJXoEUa2820PM0116.jpg'),(16,15,2018100201,'Uploads/2018/10/ID-2018100201cWfzfp0UVja25126AM0231.jpg'),(17,16,2147483647,'Uploads/2018/10/ID-2018100211E5T5jaWL46r42444AM1141.png'),(18,17,2018100202,'Uploads/2018/10/ID-2018100202dJTYvbWK3ONN2631PM0233.png'),(19,18,2018100407,'Uploads/2018/10/ID-2018100407ucR2j63JkjBa1709PM0744.png'),(20,18,2018100407,'Uploads/2018/10/ID-2018100407ucR2j63JkjBa1709PM0731.jpg'),(21,18,2018100407,'Uploads/2018/10/ID-2018100407ucR2j63JkjBa1709PM0725.jpg'),(22,19,2018100410,'Uploads/2018/10/ID-2018100410F6JBYWqNdSE23956PM1041.jpg'),(23,20,2018100501,'Uploads/2018/10/ID-2018100501zpif8PS8xYpT0735AM0102.jpg'),(24,21,2018100501,'Uploads/2018/10/ID-2018100501UhR8hcRnmurO3706AM0143.jpg'),(25,22,2018100609,'Uploads/2018/10/ID-2018100609q6wYEDxFVBp13134AM0928.png'),(26,23,2018100611,'Uploads/2018/10/ID-2018100611kjBCPhAJvXRF4740AM1144.png'),(27,24,2018100609,'Uploads/2018/10/ID-2018100609WOgJjr4hVpz01513PM0917.jpg');

/*Table structure for table `cm_cardholders` */

DROP TABLE IF EXISTS `cm_cardholders`;

CREATE TABLE `cm_cardholders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cif_no` varchar(8) DEFAULT NULL,
  `title` varchar(4) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `suffix` varchar(6) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT 'M',
  `birthdate` date DEFAULT NULL,
  `mothermaiden` varchar(100) DEFAULT NULL,
  `present_address` text,
  `pre_street_no` varchar(35) DEFAULT NULL,
  `pre_street_name` varchar(35) DEFAULT NULL,
  `pre_subd_name` varchar(35) DEFAULT NULL,
  `pre_brgy` varchar(35) DEFAULT NULL,
  `pre_town_city` varchar(35) DEFAULT NULL,
  `pre_province` varchar(35) DEFAULT NULL,
  `pre_country` varchar(35) DEFAULT NULL,
  `permanent_address` text,
  `per_street_no` varchar(35) DEFAULT NULL,
  `per_street_name` varchar(35) DEFAULT NULL,
  `per_subd_name` varchar(35) DEFAULT NULL,
  `per_brgy` varchar(35) DEFAULT NULL,
  `per_town_city` varchar(35) DEFAULT NULL,
  `per_province` varchar(35) DEFAULT NULL,
  `per_country` varchar(35) DEFAULT NULL,
  `province_address` text,
  `placeofbirth` text,
  `contact_no` varchar(16) DEFAULT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `email_address` varchar(50) NOT NULL,
  `nationality` varchar(12) NOT NULL,
  `civil_status` varchar(15) DEFAULT NULL,
  `idpresented` varchar(35) DEFAULT NULL,
  `idp_no` varchar(35) DEFAULT NULL,
  `idp_expire` date DEFAULT NULL,
  `tin` varchar(18) DEFAULT NULL,
  `nature_of_work` varchar(50) DEFAULT NULL,
  `employeer` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `business_address` text,
  `nature_of_business` varchar(50) DEFAULT NULL,
  `office_no` varchar(20) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `annual_income` decimal(12,2) DEFAULT NULL,
  `fund_source` text,
  `refid` varchar(64) DEFAULT NULL,
  `cardholderstatus_id` smallint(1) NOT NULL DEFAULT '2',
  `registration` datetime NOT NULL,
  `approved` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `processed_by` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `purpose` varchar(18) DEFAULT NULL,
  `others` varchar(35) DEFAULT NULL,
  `institution_id` smallint(2) DEFAULT NULL,
  `product_id` smallint(2) DEFAULT NULL,
  `has_card` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardholders` */

insert  into `cm_cardholders`(`id`,`cif_no`,`title`,`firstname`,`middlename`,`lastname`,`suffix`,`fullname`,`card_name`,`gender`,`birthdate`,`mothermaiden`,`present_address`,`pre_street_no`,`pre_street_name`,`pre_subd_name`,`pre_brgy`,`pre_town_city`,`pre_province`,`pre_country`,`permanent_address`,`per_street_no`,`per_street_name`,`per_subd_name`,`per_brgy`,`per_town_city`,`per_province`,`per_country`,`province_address`,`placeofbirth`,`contact_no`,`tel_no`,`email_address`,`nationality`,`civil_status`,`idpresented`,`idp_no`,`idp_expire`,`tin`,`nature_of_work`,`employeer`,`position`,`business_address`,`nature_of_business`,`office_no`,`business_name`,`annual_income`,`fund_source`,`refid`,`cardholderstatus_id`,`registration`,`approved`,`modified`,`processed_by`,`approved_by`,`modified_by`,`purpose`,`others`,`institution_id`,`product_id`,`has_card`) values (2,'','','Juanito','Conjurado','Gamad','','Juanito Conjurado Gamad','Juanito Conjurado Gamad','M','1988-06-25','Elecima Conjurado Gamad','Block 10 Unit 405 Timpolok St. Brgy Babag 1 Lapu Lapu City Cebu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Block 10 Unit 405 Timpolok St. Brgy Babag 1 Lapu Lapu City Cebu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bislig City','947-999-0391','562-323-2323','juangamad@gmail.com','Filipino','Married','Driver’s License',NULL,NULL,'2326232323','Information Technology / IT','MLhuillier','Programmer','Block 10 Unit 405 Timpolok St. Brgy Babag 1 Lapu Lapu City Cebu','Service Business','653-232-3233',NULL,100000.00,NULL,'2018081108tYuynN1zYteq2955AM',2,'2018-08-11 00:00:00','0000-00-00 00:00:00','2018-09-07 10:35:30','Portal Administrator','Portal Administrator','Portal Administrator','New Application','',NULL,NULL,0),(4,'','','Jufiel','Valde','Larios','','Jufiel Valde Larios','Jufiel Valde Larios','M','1988-05-26','Jessica Alba Lariosa','Cebu City',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Cebu City',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Cebu City','946-935-6262','232-323-2323','','Filipino','Single','Senior Citizen ID',NULL,NULL,'','Manufacturer','','','','Service Business','',NULL,NULL,NULL,'2018081301ENL9C5JjcgPg4046PM',2,'2018-08-13 00:00:00','0000-00-00 00:00:00','2018-09-01 08:19:08','Portal Administrator','Portal Administrator',NULL,'New Application','',NULL,NULL,0),(5,'','','ROCKY','BALBOA','ESCOBAR','','ROCKY BALBOA ESCOBAR','ROCKY BALBOA ESCOBAR','M','1988-06-25','JESSICA ALBA GOMEZ','Bohol','','','','','','','PHILIPPINES','Bohol','','','','','','','',NULL,'BOHOL','947-999-0391','564-654-6545','juangamad@gmail.com','Filipino','Married','Driver’s License',NULL,NULL,'456146131','Manufacturer','','','','Service Business','695-656-5656',NULL,250000.00,'','2018081410LtqPx7F0KYGK5418AM',1,'2018-08-14 00:00:00','0000-00-00 00:00:00','2018-09-27 04:04:30','Portal Administrator','Portal Administrator','admin','New Application','',NULL,NULL,0),(7,'','','Deunilo','Roxas','Gunoy','','Deunilo Roxas Gunoy','Deunilo Roxas Gunoy','M','1985-06-25','Luisita Morio Gunoy','surigao del sur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'surigao del sur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Surigao del sur','947-999-0391','','','Filipino','Single','Philippine passport',NULL,NULL,'','Manufacturer','','','','Service Business','',NULL,10000.00,NULL,'2018081505TlVYjRbkSKq05443PM',2,'2018-08-15 00:00:00','0000-00-00 00:00:00','2018-09-17 15:11:40','Portal Administrator','Portal Administrator','Portal Administrator','New Application','',NULL,NULL,0),(8,'','','sdfsdf','sdfsdfg','efgdfg','','sdfsdf sdfsdfg efgdfg','sdfsdf sdfsdfg efgdfg','M','2018-09-05','asdfasdfasdfa','wdawdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wdfsdfsdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'werwerq','234-234-2342','234-234-____','eff@emial.com','Filipino','Married','Driver’s License',NULL,NULL,'234234','Media and event management Companies','sdfsdfgdfg','sdfgsd','sdfgsdfg','Merchandising Business','345-345-3453',NULL,20000.00,NULL,'20180917036gvSZx4NLjiL4234PM',2,'2018-09-17 00:00:00','2018-09-17 04:14:40','2018-09-17 16:15:26','Portal Administrator','Portal Administrator','Portal Administrator','New Application','',NULL,NULL,0),(9,'','','GERALDINE ARABELA','TABUGOL','ELEDONIA','','GERALDINE ARABELA TABUGOL ELEDONIA','GERALDINE TABUGOL ELEDONIA','M','1991-11-05','ROSALINA T ELEDONIA',NULL,'101','TIMPOLOK','STA MONICA','BABAG 1','LAPU-LAPU','CEBU','PHILIPPINES',NULL,'101','TIMPOLOK','STA MONICA','BABAG 1','LAPU-LAPU','CEBU','PHILIPPINES',NULL,'TANDAG CITY','956-232-6232','','GELEDONIA@GMAIL.COM','Filipino','Married','Philippine passport',NULL,NULL,'','Manufacturer','','','','Service Business','',NULL,NULL,'THIS IS THE EXAMPLE BUSINESS PLEASE CHILL','2018092504WBGoec2FTnAH1519PM',1,'2018-10-06 08:41:45','2018-09-27 03:30:45','2018-09-27 03:30:45','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(10,'','','LASJDALSJD','LAJSDLAJSD','JAKLSDJA','','LASJDALSJD LAJSDLAJSD JAKLSDJA','LASJDALSJD LAJSDLAJSD JAKLSDJA','M','2018-09-26','ASDFASDFASDFASDF',NULL,'ASDA','ASDASD','ASDASD','ASDASDASD','ASDASDAS','ASDASDASD','PHILIPPINES',NULL,'ASDA','ASDASD','ASDASD','ASDASDASD','ASDASDAS','ASDASDASD','PHILIPPINES',NULL,'ASDASD','234-234-23__','123-423-4234','asdad@email.com','Filipino','Widowed','IBP ID',NULL,NULL,'','Reseller(includes Wholesalers)','','','','Service Business','',NULL,NULL,'ASDASDASDASD','2018092705wy3ZW49gH7nI0051AM',1,'2018-09-28 00:00:00','2018-09-27 05:29:03','2018-09-27 05:29:03','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(11,'','','FSDFGSDFG','SDFSDFSDF','ASDFSF','','FSDFGSDFG SDFSDFSDF ASDFSF','FSDFGSDFG SDFSDFSDF ASDFSF','M','2018-09-16','DAFGSDFGSDFGDG',NULL,'GSDSDF','SDF','SDF','SDF','SDF','SDF','PHILIPPINES',NULL,'GSDSDF','SDF','SDF','SDF','SDF','SDF','PHILIPPINES',NULL,'ASDASDA','545-421-2121','245-145-4545','adsa_@email.com','Filipino','Widowed','OFW ID',NULL,NULL,'','Advertising Agency','ASD','','','Service Business','',NULL,NULL,'ASDASDASDASDASDASDASDASDASDASDASD','2018092705Ie8P953cqdYq4124AM',2,'2018-09-27 00:00:00','2018-09-27 06:30:58','2018-10-05 12:22:40','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(12,'','','ASDASDASD','ASDASDAD','ASDASDASD','','ASDASDASD ASDASDAD ASDASDASD','ASDASDASD ASDASDAD ASDASDASD','M','2018-09-27','ASDASDAASD',NULL,'ASDASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINES',NULL,'ASDASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINES',NULL,'ASDASDAD','323-232-3233','223-232-3232','SDFSDF@EMAIL.COM','American','Married','IBP ID',NULL,NULL,'123123','','','','','','',NULL,NULL,'ASDASDASD','2018092706PwrWO9NIxOiV5810AM',2,'2018-09-27 00:00:00','2018-09-27 07:27:37','2018-10-05 12:21:59','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(13,'01000001','','JASON','CONJURADO','GAMAD','','JASON CONJURADO GAMAD','JASON CONJURADO GAMAD','M','1988-01-06','JESSICA CONJURADO',NULL,'ASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINES',NULL,'ASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINES',NULL,'MANGAGOY','209-380-2384','203-948-2034','juangamad@gmail.com','Filipino','Widowed','SSS UMID Card',NULL,NULL,'65653232','Consultancy Firms / Agencies','DKLJFGLSDFG','','','Merchandising Business','',NULL,NULL,'THIS IS THE EXAMPLE SOURCE OF INCOME','2018092901y1u9vSZmsfiM4511PM',1,'2018-09-29 00:00:00','2018-10-02 02:25:44','2018-10-02 14:25:44','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(14,'01000002','','JUANITOSSS','CONJURADOSS','GAMADSS','','JUANITOSSS CONJURADOSS GAMADSS','JUANITOSSS CONJURADOSS GAMADSS','M','1988-06-25','ELECIMA GAMAD',NULL,'ADASD','ASDAD','ASDASD','ASDASD','ASDASD','ASDASD','PHILIPPINES',NULL,'ADASD','ASDAD','ASDASD','ASDASD','ASDASD','ASDASD','PHILIPPINES',NULL,'MANGAGOY','094-799-3512','253-232-3232','juangamad@gmail.com','Filipino','Widowed','SSS UMID Card',NULL,NULL,'653232323','House Keeping Services','ASDASD','ASDASD','ASDASD','Merchandising Business','232-323-2323',NULL,NULL,'ASDASDASDASD','2018093001Lg8afgJXoEUa2820PM',1,'2018-09-30 00:00:00','2018-10-02 03:13:46','2018-10-02 15:13:46','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(15,'01000003','','JUANITO','CONJURADO','GAMAD','','JUANITO CONJURADO GAMAD','JUANITO CONJURADO GAMAD','M','2018-10-31','EXAMPLE MOTHERS NAME',NULL,'ASDAD','ASD','SF','SDF','SWDF','SDF','PHILIPPINES',NULL,'ASDAD','ASD','SF','SDF','SWDF','SDF','PHILIPPINES',NULL,'ASDASDASD','345-345-3453','345-345-3453','asdasdasd@email.com','Filipino','Married','OWWA ID',NULL,NULL,'23423423','Media and event management Companies','NAME OF THE EMPLOYEER','','','Merchandising Business','',NULL,NULL,'THIS ASD ASD ASD','2018100201cWfzfp0UVja25126AM',1,'2018-10-02 00:00:00','2018-10-02 03:10:41','2018-10-02 15:10:41','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(16,'01000004','','DFGSDFG','SDFGSDFG','DFGSDFGSDFG','','DFGSDFG SDFGSDFG DFGSDFGSDFG','DFGSDFG SDFGSDFG DFGSDFGSDFG','M','2018-10-30','ASDFASDFASDF',NULL,'SADFASDFSD','FSDFSDF','DFSDFSDF','SDFSDF','SDFSDF','SDFSDF','PHILIPPINES',NULL,'SADFASDFSD','FSDFSDF','DFSDFSDF','SDFSDF','SDFSDF','SDFSDF','PHILIPPINES',NULL,'ADFGSDFG','656-232-3233','','asdasdasd@email.com','Filipino','Married','Philippine passport',NULL,NULL,'','','','','','','',NULL,NULL,'ASDASDASD','2018100211E5T5jaWL46r42444AM',2,'2018-10-02 00:00:00','2018-10-04 07:35:46','2018-10-05 12:22:25','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(17,'01000005','','WAAAA','WAAA','WAAAA','','WAAAA WAAA WAAAA','WAAAA WAAA WAAAA','M','2018-10-31','WAAAAA',NULL,'WAAAA','WAAA','WAAA','WAAA','WAAAA','WAAAA','PHILIPPINES',NULL,'WAAAA','WAAA','WAAA','WAAA','WAAAA','WAAAA','PHILIPPINES',NULL,'WAAAA','031-232-3232','','waaa@gmail.com','Filipino','Married','Driver’s License',NULL,NULL,'','Hotels / Boarding / Lodging','WAAAAA','','','Service Business','',NULL,NULL,'WAAAAA','2018100202dJTYvbWK3ONN2631PM',1,'2018-10-06 11:08:57','2018-10-04 07:32:53','2018-10-04 19:32:53','Portal Administrator','admin','admin','New Application',NULL,1,4,0),(18,'01000006','','ASDASD','ASDASD','ASDASD','','ASDASD ASDASD ASDASD','ASDASD ASDASD ASDASD','M','2018-10-19','ASASDASD',NULL,'ASDASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINESASD',NULL,'ASDASD','ASD','ASD','ASD','ASD','ASD','PHILIPPINESASD',NULL,'ASDASDASDASD','132-131-3131','','asdas@email.com','Filipino','Widowed','SSS UMID Card',NULL,NULL,'asdasd','','AASDASD','','','','',NULL,NULL,'','2018100407ucR2j63JkjBa1709PM',2,'2018-10-04 00:00:00','2018-10-04 07:33:25','2018-10-05 12:25:39','Portal Administrator','admin','admin','New Application',NULL,1,1,0),(19,'01000007','','JUN','DIAZ','GOMEZ','','JUN DIAZ GOMEZ','JUN DIAZ GOMEZ','M','1990-01-01','JOANA DIAZ',NULL,'','','','','','','PHILIPPINES',NULL,'','','','','','','PHILIPPINES',NULL,'MAKATI','912-234-5671','','sample@gmail.com','Filipino','Single','Philippine passport',NULL,NULL,'7686868','','','','','','',NULL,NULL,'','2018100410F6JBYWqNdSE23956PM',1,'2018-10-05 00:00:00','2018-10-04 10:48:46','2018-10-04 22:48:46','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(20,'01000008','','MARK ANTHONY','TOM','FERNANDEZ','','MARK ANTHONY TOM FERNANDEZ','MARK ANTHONY TOM FERNANDEZ','M','2000-01-01','MANUELA BERMUDEZ',NULL,'123','BOLANOS ST','','LEGAZPI','MAKATI CITY','','PHILIPPINES',NULL,'123','BOLANOS ST','','LEGAZPI','MAKATI CITY','','PHILIPPINES',NULL,'MAKATI','910-123-4567','002-123-4567','arleneolarte_11@yahoo.com','Filipino','Married','SSS UMID Card',NULL,NULL,'123456789','','','','','','',NULL,NULL,'','2018100501zpif8PS8xYpT0735AM',1,'2018-10-05 00:00:00','2018-10-05 01:17:21','2018-10-05 01:17:21','BRANCH FIVE','admin','admin','New Application','',NULL,NULL,0),(21,'01000009','','AYALA','MAGALLANEZ','LOPEZ','','AYALA MAGALLANEZ LOPEZ','AYALA MAGALLANEZ LOPEZ','F','2011-01-01','MARIA LOPEZ',NULL,'123','BOLANOS ST','','LEGAZPI','MAKATI CITY','','PHILIPPINES',NULL,'123','BOLANOS ST','','LEGAZPI','MAKATI CITY','','PHILIPPINES',NULL,'GUADALUPE','915-123-4567','','arleneolarte_11@yahoo.com','Filipino','Married','SSS UMID Card',NULL,NULL,'3393895851','','','','','','',NULL,NULL,'','2018100501UhR8hcRnmurO3706AM',1,'2018-10-05 00:00:00','2018-10-05 01:41:18','2018-10-05 01:41:18','Portal Administrator','admin','admin','New Application',NULL,NULL,NULL,0),(22,'01000010','','JACOB','UMBASLAO','ANG','','JACOB UMBASLAO ANG','JACOB UMBASLAO ANG','M','1988-06-25','ELIASA UMBASLAO LORIGA',NULL,'1122','TIMPOLOK','','BABAG I','LAPU-LAPU','CEBU','PHILIPPINES',NULL,'1122','TIMPOLOK','','BABAG I','LAPU-LAPU','CEBU','PHILIPPINES',NULL,'CEBU','956-185-9623','','ang_jacob@gmail.com','Filipino','Married','Philippine passport',NULL,NULL,'56323232','','','','','','',NULL,NULL,'','2018100609q6wYEDxFVBp13134AM',1,'2018-10-06 09:33:22','2018-10-06 10:42:55','2018-10-06 10:42:55','JASON BUSA','TEST33','TEST33','New Application',NULL,1,5,1),(23,'01000011','','RJ','RALPH','MAGONCIA','','RJ RALPH MAGONCIA','RJ R.  MAGONCIA','M','2018-10-25','ASDASDASDASD',NULL,'ASDASD','FDASDKFJ','SDF','SDF','ASFD','SDF','PHILIPPINESSDF',NULL,'ASDASD','FDASDKFJ','SDF','SDF','ASFD','SDF','PHILIPPINESSDF',NULL,'ASDASDASDADASD','479-990-3262','','rj@gmail.com','Filipino','Married','Driver’s License',NULL,NULL,'232234234','','','','','','',NULL,NULL,'','2018100611kjBCPhAJvXRF4740AM',1,'2018-10-06 11:48:39','2018-10-06 11:46:40','2018-10-06 23:46:40','Portal Administrator','MANUEL2018','MANUEL2018','New Application',NULL,1,2,0),(24,'01000012','','JOLINA','LOPEZ','MAGDANGAL','','JOLINA LOPEZ MAGDANGAL','JOLINA L.  MAGDANGAL','F','2000-11-11','NANAY JOLINA LOPEZ',NULL,'35','FLAVIANA','SUAREZ VILLE','PINAGBUHATAN','PASIG','MANILA','PHILIPPINES',NULL,'35','FLAVIANA','SUAREZ VILLE','PINAGBUHATAN','PASIG','MANILA','PHILIPPINES',NULL,'MAKATI','915-123-4567','002-123-4567','jolina@yahoo.com','Filipino','Single','SSS UMID Card',NULL,NULL,'3393895851','','','','','','',NULL,NULL,'','2018100609WOgJjr4hVpz01513PM',1,'2018-10-06 21:24:17','2018-10-06 09:37:56','2018-10-06 21:38:39','LOURDES MAYNES','MANUEL2018','MANUEL2018','New Application',NULL,3,1,1);

/*Table structure for table `cm_cardholderstatuses` */

DROP TABLE IF EXISTS `cm_cardholderstatuses`;

CREATE TABLE `cm_cardholderstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardholderstatuses` */

insert  into `cm_cardholderstatuses`(`id`,`name`) values (1,'Active'),(2,'Inactive'),(3,'For Approval');

/*Table structure for table `cm_cardmonthlylimits` */

DROP TABLE IF EXISTS `cm_cardmonthlylimits`;

CREATE TABLE `cm_cardmonthlylimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardmonthlylimits` */

insert  into `cm_cardmonthlylimits`(`id`,`product_id`,`cardtype_id`,`channel_atm`,`channel_pos`,`channel_bol`,`min_withdrawalvalue`,`min_withdrawalfee`,`max_transvalue`,`max_transfee`,`total_withdrawalvalue`,`total_withdrawalfee`,`total_fundtransvalue`,`total_fundtransfee`,`min_loadingvalue`,`min_loadingfee`,`max_loadingvalue`,`max_loadingfee`,`added`,`addedby`,`modified`,`modifiedby`) values (1,2,1,1,1,1,56.00,0.00,556.00,65.00,65.00,65.00,65.00,65.00,65.00,65.00,65.00,6.00,'2018-09-13','Portal Administrator','2018-09-13','Portal Administrator'),(2,2,2,1,1,1,565.00,0.00,65.00,6565.00,65.00,65.00,65.00,65.00,65.00,65.00,65.00,65.00,'2018-09-13','Portal Administrator','2018-09-13','Portal Administrator'),(3,1,1,1,1,1,100.00,10.00,2000.00,10.00,2000.00,20.00,2000.00,20.00,2000.00,200.00,1000000.00,500000.00,'2018-10-06','Portal Administrator','2018-10-06',NULL);

/*Table structure for table `cm_cardnos` */

DROP TABLE IF EXISTS `cm_cardnos`;

CREATE TABLE `cm_cardnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `last` varchar(6) NOT NULL,
  `current` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardnos` */

/*Table structure for table `cm_cardpregens` */

DROP TABLE IF EXISTS `cm_cardpregens`;

CREATE TABLE `cm_cardpregens` (
  `user_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `cardtype` smallint(1) NOT NULL,
  `product` smallint(1) NOT NULL,
  `institution` smallint(1) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` smallint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardpregens` */

insert  into `cm_cardpregens`(`user_id`,`cardno`,`pincode`,`cardtype`,`product`,`institution`,`date_time`,`status`) values (1,'5901331010000840','123456',1,1,3,'2018-10-05 01:36:47',1),(1,'5901331010000112','123456',1,1,3,'2018-10-06 21:36:48',1);

/*Table structure for table `cm_cardquarterlylimits` */

DROP TABLE IF EXISTS `cm_cardquarterlylimits`;

CREATE TABLE `cm_cardquarterlylimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardquarterlylimits` */

/*Table structure for table `cm_cards` */

DROP TABLE IF EXISTS `cm_cards`;

CREATE TABLE `cm_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardapplication_id` int(11) DEFAULT NULL,
  `cardholder_id` int(11) DEFAULT NULL,
  `cardno` varchar(20) NOT NULL,
  `embossed_name` varchar(25) DEFAULT NULL,
  `cardstatus_id` smallint(1) NOT NULL,
  `bin` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `check_digit` smallint(1) DEFAULT NULL,
  `cardtype_id` smallint(1) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `last_transaction` datetime DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `refid` varchar(64) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `processed_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `registration` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `activated` datetime DEFAULT NULL,
  `reactivated` datetime DEFAULT NULL,
  `has_card` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cards` */

insert  into `cm_cards`(`id`,`cardapplication_id`,`cardholder_id`,`cardno`,`embossed_name`,`cardstatus_id`,`bin`,`sequence`,`check_digit`,`cardtype_id`,`product_id`,`institution_id`,`last_transaction`,`pincode`,`balance`,`currency_id`,`refid`,`expiration`,`processed_by`,`approved_by`,`registration`,`modified`,`modified_by`,`activated`,`reactivated`,`has_card`) values (3,NULL,2,'561421001000000',NULL,2,56142100,0,1,1,3,NULL,NULL,881237,0.00,1,'2018081108tYuynN1zYteq2955AM',NULL,'Portal Administrator','Portal Administrator','2018-09-07 00:00:00','2018-09-17 00:00:00','Agent Branch Branches',NULL,NULL,0),(4,NULL,5,'590133101011000',NULL,1,56142100,3,1,1,2,NULL,'2018-10-05 03:09:40',111111,0.00,1,'2018081410LtqPx7F0KYGK5418AM',NULL,'Portal Administrator','Portal Administrator','2018-08-14 00:00:00','2018-09-30 00:00:00','Portal Administrator',NULL,NULL,0),(5,NULL,6,'561421001000004',NULL,1,56142100,4,1,1,2,NULL,NULL,169942,50000.00,1,'2018081505G8EXeWhQgQwW0359PM',NULL,'Portal Administrator','Portal Administrator','2018-08-15 00:00:00','2018-09-01 00:00:00',NULL,NULL,NULL,0),(6,NULL,7,'561421001000005',NULL,1,56142100,5,1,1,2,NULL,NULL,971935,0.00,1,'2018081505TlVYjRbkSKq05443PM',NULL,'Portal Administrator','Portal Administrator','2018-08-16 00:00:00','2018-09-17 00:00:00','Portal Administrator',NULL,NULL,0),(8,NULL,4,'561421001000007',NULL,1,56142100,7,1,1,2,NULL,NULL,555751,0.00,1,'2018081301ENL9C5JjcgPg4046PM',NULL,'Portal Administrator','Portal Administrator','2018-08-16 00:00:00','2018-09-01 00:00:00',NULL,NULL,NULL,0),(10,NULL,9,'5900011045000000003',NULL,1,56142100,9,7,1,3,NULL,'2018-10-06 12:39:48',111111,17245.00,1,'2018092504WBGoec2FTnAH1519PM',NULL,'Portal Administrator',NULL,'2018-09-25 00:00:00','2018-09-25 00:00:00',NULL,NULL,NULL,0),(11,NULL,10,'5614210010000103',NULL,2,56142100,10,3,1,1,NULL,NULL,507323,0.00,1,'2018092705wy3ZW49gH7nI0051AM',NULL,'Portal Administrator',NULL,'2018-09-27 00:00:00','2018-09-27 00:00:00',NULL,NULL,NULL,0),(14,NULL,12,'5614210010000114',NULL,1,56142100,11,4,2,1,NULL,NULL,593645,0.00,1,'2018092706PwrWO9NIxOiV5810AM',NULL,'Portal Administrator',NULL,'2018-09-27 07:14:13','2018-10-05 00:00:00','Portal Administrator',NULL,NULL,0),(132,NULL,15,'5614210010000213',NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,1234,0.00,1,'2018100201cWfzfp0UVja25126AM',NULL,'Portal Administrator',NULL,'2018-10-02 01:54:12','2018-10-05 00:00:00','Portal Administrator',NULL,NULL,0),(133,NULL,16,'5614210010000144',NULL,2,NULL,NULL,NULL,NULL,1,NULL,NULL,1234,0.00,1,'2018100211E5T5jaWL46r42444AM',NULL,'Portal Administrator',NULL,'2018-10-04 07:36:41','2018-10-04 07:36:41',NULL,NULL,NULL,0),(134,NULL,19,'590133101000011',NULL,2,NULL,NULL,NULL,NULL,1,NULL,'2018-10-05 04:42:47',111111,1500.00,1,'2018100410F6JBYWqNdSE23956PM',NULL,'Portal Administrator',NULL,'2018-10-04 11:23:18','2018-10-05 00:00:00','Portal Administrator',NULL,NULL,0),(135,NULL,21,'5901331010000840',NULL,1,NULL,NULL,NULL,NULL,1,NULL,'2018-10-05 09:29:33',123456,80350.00,1,'2018100501UhR8hcRnmurO3706AM',NULL,'Portal Administrator',NULL,'2018-10-05 01:42:00','2018-10-05 00:00:00','Portal Administrator',NULL,NULL,0),(136,NULL,13,'5614210010001355',NULL,2,56142100,135,5,2,1,NULL,NULL,161133,0.00,1,'2018092901y1u9vSZmsfiM4511PM',NULL,'JASON BUSA',NULL,'2018-10-06 08:57:16','2018-10-06 08:57:16',NULL,NULL,NULL,0),(137,NULL,20,'5614210010001361',NULL,2,56142100,136,1,2,1,NULL,NULL,420584,0.00,1,'2018100501zpif8PS8xYpT0735AM',NULL,'JASON BUSA',NULL,'2018-10-06 09:00:14','2018-10-06 09:00:14',NULL,NULL,NULL,0),(138,NULL,14,'5614210010001376',NULL,2,56142100,137,6,2,1,NULL,NULL,414376,0.00,1,'2018093001Lg8afgJXoEUa2820PM',NULL,'JUAN CRUZ',NULL,'2018-10-06 10:57:30','2018-10-06 10:57:30',NULL,NULL,NULL,0),(139,NULL,22,'5614210060000009',NULL,2,56142100,0,9,2,6,NULL,NULL,826255,0.00,1,'2018100609q6wYEDxFVBp13134AM',NULL,'JUAN CRUZ',NULL,'2018-10-06 11:17:26','2018-10-06 11:17:26',NULL,NULL,NULL,0),(140,NULL,24,'5901331010000112',NULL,1,NULL,NULL,NULL,1,1,NULL,'2018-10-06 23:33:24',111111,150.00,1,'2018100609WOgJjr4hVpz01513PM',NULL,'MANUEL OJASCASTRO',NULL,'2018-10-06 09:38:39','2018-10-06 00:00:00','Portal Administrator',NULL,NULL,0);

/*Table structure for table `cm_cardsemiannuallimits` */

DROP TABLE IF EXISTS `cm_cardsemiannuallimits`;

CREATE TABLE `cm_cardsemiannuallimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardsemiannuallimits` */

/*Table structure for table `cm_cardstatuses` */

DROP TABLE IF EXISTS `cm_cardstatuses`;

CREATE TABLE `cm_cardstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `status_id` smallint(1) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardstatuses` */

insert  into `cm_cardstatuses`(`id`,`name`,`status_id`,`color`) values (1,'Active',1,'rgb(0, 128, 0)'),(2,'Inactive',1,'rgb(255, 0, 0)'),(3,'Stolen',1,'rgb(255, 128, 0)'),(4,'Lost',1,'rgb(238, 130, 238)'),(5,'Temporary Block',1,'rgb(255, 110, 0)'),(6,'Permanent Block',1,'rgb(255, 110, 0)'),(7,'Expired',1,'rgb(255, 110, 0)');

/*Table structure for table `cm_cardtypes` */

DROP TABLE IF EXISTS `cm_cardtypes`;

CREATE TABLE `cm_cardtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `status_id` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardtypes` */

insert  into `cm_cardtypes`(`id`,`name`,`alias`,`status_id`) values (1,'PRE-GENERATED','gen',1),(2,'PERSONALIZED','cust',1);

/*Table structure for table `cm_cardweeklylimits` */

DROP TABLE IF EXISTS `cm_cardweeklylimits`;

CREATE TABLE `cm_cardweeklylimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cardtype_id` int(11) NOT NULL,
  `channel_atm` smallint(1) DEFAULT NULL,
  `channel_pos` smallint(1) DEFAULT NULL,
  `channel_bol` smallint(1) DEFAULT NULL,
  `min_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `min_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `max_transvalue` decimal(12,2) DEFAULT NULL,
  `max_transfee` decimal(12,2) DEFAULT NULL,
  `total_withdrawalvalue` decimal(12,2) DEFAULT NULL,
  `total_withdrawalfee` decimal(12,2) DEFAULT NULL,
  `total_fundtransvalue` decimal(12,2) DEFAULT NULL,
  `total_fundtransfee` decimal(12,2) DEFAULT NULL,
  `min_loadingvalue` decimal(12,2) DEFAULT NULL,
  `min_loadingfee` decimal(12,2) DEFAULT NULL,
  `max_loadingvalue` decimal(12,2) DEFAULT NULL,
  `max_loadingfee` decimal(12,2) DEFAULT NULL,
  `added` date DEFAULT NULL,
  `addedby` varchar(50) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_cardweeklylimits` */

/*Table structure for table `cm_credits` */

DROP TABLE IF EXISTS `cm_credits`;

CREATE TABLE `cm_credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(100) DEFAULT NULL,
  `cardno` varchar(35) DEFAULT NULL,
  `cif_no` varchar(35) DEFAULT NULL,
  `product` varchar(35) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_credits` */

/*Table structure for table `cm_currencies` */

DROP TABLE IF EXISTS `cm_currencies`;

CREATE TABLE `cm_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cm_currencies` */

insert  into `cm_currencies`(`id`,`name`,`code`) values (1,'Philippine Peso','PHP'),(2,'US Dollar','USD');

/*Table structure for table `cm_deactivateaccounts` */

DROP TABLE IF EXISTS `cm_deactivateaccounts`;

CREATE TABLE `cm_deactivateaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardholder_id` int(11) NOT NULL,
  `processed_date` date NOT NULL,
  `processed_by` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_deactivateaccounts` */

/*Table structure for table `cm_debitcredits` */

DROP TABLE IF EXISTS `cm_debitcredits`;

CREATE TABLE `cm_debitcredits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(100) DEFAULT NULL,
  `cardno` varchar(35) DEFAULT NULL,
  `cif_no` varchar(35) DEFAULT NULL,
  `product` varchar(35) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `debit` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `cm_debitcredits` */

insert  into `cm_debitcredits`(`id`,`account_name`,`cardno`,`cif_no`,`product`,`company`,`debit`,`credit`) values (1,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05333055','PAYROLL','BRB',0.00,10.00),(2,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05192521','PAYROLL','BRB',0.00,10.00),(3,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05735863','PAYROLL','BRB',0.00,10.00),(4,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05895206','PAYROLL','BRB',0.00,10.00),(5,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05922247','PAYROLL','BRB',0.00,10.00),(6,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05772862','PAYROLL','BRB',0.00,1000.00),(7,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05299151','PAYROLL','BRB',0.00,10000.00),(8,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05098565','PAYROLL','BRB',0.00,50.00),(9,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05985216','PAYROLL','BRB',0.00,1100.00),(10,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05074246','PAYROLL','BRB',0.00,500.00),(11,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05012235','PAYROLL','BRB',0.00,100.00),(12,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05787169','PAYROLL','BRB',0.00,250.00),(13,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','05071779','PAYROLL','BRB',0.00,1200.00),(14,'ROCKY BALBOA ESCOBAR','5901331010000840','05378478','CASH MATE GIFT CARD','BRB',0.00,0.00),(15,'JUN DIAZ GOMEZ','5901331010000840','05666564','CASH MATE CO-BRANDED','BRB',0.00,2000.00),(16,'JUN DIAZ GOMEZ','5901331010000840','05370798','CASH MATE CO-BRANDED','BRB',0.00,500.00),(17,'AYALA MAGALLANEZ LOPEZ','5901331010000840','05382383','CASH MATE CO-BRANDED','BRB',0.00,100000.00),(18,'AYALA MAGALLANEZ LOPEZ','5901331010000840','05772197','CASH MATE CO-BRANDED','BRB',0.00,750.00),(19,'AYALA MAGALLANEZ LOPEZ','5901331010000840','05007095','CASH MATE CO-BRANDED','BRB',0.00,20000.00),(20,'AYALA MAGALLANEZ LOPEZ','5901331010000840','05139495','CASH MATE CO-BRANDED','BRB',0.00,250.00),(21,'AYALA MAGALLANEZ LOPEZ','5901331010000840','05639338','CASH MATE CO-BRANDED','BRB',0.00,150.00),(22,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','06485413','PAYROLL','BRB',0.00,1005.00),(23,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','06677427','PAYROLL','BRB',0.00,2000.00),(24,'GERALDINE ARABELA TABUGOL ELEDONIA','5900011045000000003','06136967','PAYROLL','BRB',10000.00,0.00),(25,'JOLINA LOPEZ MAGDANGAL','5901331010000112','06764642','CASH MATE CO-BRANDED','BRB',300.00,0.00),(26,'JOLINA LOPEZ MAGDANGAL','5901331010000112','06259558','CASH MATE CO-BRANDED','BRB',0.00,150.00);

/*Table structure for table `cm_debits` */

DROP TABLE IF EXISTS `cm_debits`;

CREATE TABLE `cm_debits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(100) DEFAULT NULL,
  `cardno` varchar(35) DEFAULT NULL,
  `cif_no` varchar(35) DEFAULT NULL,
  `product` varchar(35) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_debits` */

/*Table structure for table `cm_groupaccesses` */

DROP TABLE IF EXISTS `cm_groupaccesses`;

CREATE TABLE `cm_groupaccesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupmenu_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `controller` varchar(35) NOT NULL,
  `action` varchar(100) NOT NULL,
  `model` varchar(35) DEFAULT NULL,
  `allowed` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_groupaccesses` */

/*Table structure for table `cm_groupmenus` */

DROP TABLE IF EXISTS `cm_groupmenus`;

CREATE TABLE `cm_groupmenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `cm_groupmenus` */

insert  into `cm_groupmenus`(`id`,`name`) values (8,'Account Settings'),(4,'Branch'),(2,'BRB Accounts'),(3,'Merchant'),(6,'Reports'),(9,'System'),(7,'Terminal'),(5,'Transactions');

/*Table structure for table `cm_groups` */

DROP TABLE IF EXISTS `cm_groups`;

CREATE TABLE `cm_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `layout` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `cm_groups` */

insert  into `cm_groups`(`id`,`name`,`layout`) values (1,'SUPER ADMINISTRATOR',''),(13,'SYSTEM AND DATA ADMINISTRATOR OFFICER',''),(14,'TECHNICAL AND TECHNICAL COMPLIANCE OFFICER',''),(15,'CUSTOMER CARE OFFICER',''),(16,'CUSTOMER CARE STAFF',''),(17,'BRB BRANCH - STAFF',''),(18,'BRB BRANCH - OFFICER',''),(19,'CARD PRODUCTION DEPARTMENT OFFICER',''),(20,'CARD MANAGEMENT DEPARTMENT OFFICER',''),(21,'AGENT BRANCH - CENTRAL UNIT','agent-branch-central-unit'),(22,'AGENT BRANCH - BRANCHES','agent-branch-branches');

/*Table structure for table `cm_groupsettings` */

DROP TABLE IF EXISTS `cm_groupsettings`;

CREATE TABLE `cm_groupsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) DEFAULT NULL,
  `group_id` smallint(1) DEFAULT NULL,
  `groups` text NOT NULL,
  `groupsettingscategory_id` smallint(1) NOT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `action` text,
  `status_id` smallint(1) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cm_groupsettings` */

insert  into `cm_groupsettings`(`id`,`name`,`group_id`,`groups`,`groupsettingscategory_id`,`controller`,`action`,`status_id`,`description`) values (1,'Enrolled User',NULL,'a:3:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:2:\"22\";}',2,'cardholders','a:3:{i:0;s:3:\"add\";i:1;s:6:\"modify\";i:2;s:4:\"edit\";}',1,NULL);

/*Table structure for table `cm_groupsettingscategories` */

DROP TABLE IF EXISTS `cm_groupsettingscategories`;

CREATE TABLE `cm_groupsettingscategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `cm_groupsettingscategories` */

insert  into `cm_groupsettingscategories`(`id`,`name`) values (1,'Card Management'),(2,'Account Management'),(3,'Transaction Management'),(4,'Reports'),(5,'Access Management');

/*Table structure for table `cm_institutions` */

DROP TABLE IF EXISTS `cm_institutions`;

CREATE TABLE `cm_institutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `mnemonic` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `added` date NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `modified` date DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_institutions` */

insert  into `cm_institutions`(`id`,`code`,`mnemonic`,`name`,`product_id`,`added`,`addedby`,`modified`,`modifiedby`) values (1,'0002','PPB','PHIL. POSTAL SAVINGS BANK','1,2,3,4,5,6','2018-09-25','admin','2018-09-25','admin'),(2,'2342','ASD','ASDASDASDASDAD','1,2,3,4','2018-09-27','admin','2018-09-27','admin'),(3,'ASDA','ASD','THIS IS THE EXAMPLE BRANCH NAME','1,2,3,4,5,6','0000-00-00','','2018-09-30',NULL);

/*Table structure for table `cm_merchants` */

DROP TABLE IF EXISTS `cm_merchants`;

CREATE TABLE `cm_merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `code` varbinary(35) DEFAULT NULL,
  `address` text,
  `posdevice_id` int(11) NOT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `registered` date DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cm_merchants` */

insert  into `cm_merchants`(`id`,`name`,`owner`,`code`,`address`,`posdevice_id`,`tel_no`,`contact_no`,`email`,`registered`,`status`) values (1,'Example merchant name','Juanito Gamad','983453','Cebu City',1,'456-565-6565','956-222-3232','juangamad@gmail.com','2018-08-17','Active');

/*Table structure for table `cm_nationalities` */

DROP TABLE IF EXISTS `cm_nationalities`;

CREATE TABLE `cm_nationalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_nationalities` */

/*Table structure for table `cm_partners` */

DROP TABLE IF EXISTS `cm_partners`;

CREATE TABLE `cm_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `contactno` varchar(11) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `telno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cm_partners` */

insert  into `cm_partners`(`id`,`name`,`address`,`contactno`,`contact_person`,`telno`) values (1,'MACRO FINANCIAL SERVICESSS','Timpolok St Babag II Lapu-Lapu City Cebu','09479990391','Juanito Gamad','656656565'),(2,'NITZ COPRA BUYER INCS','NICBI','09479990394','Juanito Gamad','987-89898');

/*Table structure for table `cm_passwordhistories` */

DROP TABLE IF EXISTS `cm_passwordhistories`;

CREATE TABLE `cm_passwordhistories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `refpass` varchar(255) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `cm_passwordhistories` */

insert  into `cm_passwordhistories`(`id`,`user_id`,`refpass`,`change_date`,`expiry_date`) values (1,1,'$2a$10$9fuOuH3SrnjTW.9dGMkuw.bszyvB5bJ2fT4yQkgWYhIGkHjv75z.y','2018-08-09 00:00:00','2018-08-08'),(2,1,'$2a$10$thDQryByy3bN1lKGFZDVWOZNY1nTFKZUV8pwJQfgex8NnrLJvLDVa','2018-08-09 00:00:00','2018-08-08'),(3,1,'$2a$10$Tv8Xn7814TA3OF/byP0fWO3nfjso.2hvul8qIbaNGpU/bGMekDkgi','2018-08-09 00:00:00','2018-08-08'),(4,1,'$2a$10$kN75yCB6L6SEQDn/YXMPJe0m1GKsLYMJyALO9DlMWMQhoqaJKdLrS','2018-08-09 00:00:00','2018-08-08'),(5,5,'$2a$10$owxZ6T6lk.bkfc7GS.ztPumnCTG.QhYTF5vjdfxJ6XqVplAgWk0L2','2018-08-09 00:00:00','2018-08-08'),(6,1,'$2a$10$uwewT/Up8D2GGjNucJZv8OdKqi6nWCAMwEbRMoXjyUQasjYmxmHZS','2018-09-07 00:00:00','2018-09-08'),(7,1,'$2a$10$0nb9XmrzMnnL3ET8pjzkQOm/JxHb/spZ0rijMnKKpzN.ksqPV3h5y','2018-09-07 00:00:00','2018-10-07'),(8,1,'$2a$10$ofVtUqQJiRtq26IEmNGj4.nz6bgWHA.lDrI5ZbH/4plmYDCP7Rhoi','2018-09-10 00:00:00','2018-10-07'),(9,1,'$2a$10$Yn1yVWjwFwTQP0KjsZSi6u1xGdJrr3DEVBX.7NvJ/2iNT2ONB7gWe','2018-09-10 00:00:00','2018-10-10'),(10,10,'$2a$10$rdKwOOYc2sqAJ0IQqIlpaOYj0k4UR9oHRgnwOr9xxeiPKq1BMpejG','2018-09-17 00:00:00','2018-09-17'),(11,12,'$2a$10$R4069FRObaBsHUolJnI9KO.KkUMonNFa2tXngJjgYDv2dvBSusQBm','2018-10-05 00:00:00','2018-10-04'),(12,16,'$2a$10$y7Z5FgFtznsigob1YaVrkunpGF1kO8tZG7xT41UM0Zyvf1v7iEpr2','2018-10-05 00:00:00','2018-10-05'),(13,15,'$2a$10$WYMY96QLHbr18vILzYdNiePdH4CjQ0TBVyHmTc0MvcdsA53KqQSeq','2018-10-05 00:00:00','2018-10-05'),(14,17,'$2a$10$LhKIunn0ENn2mp7clkBrb.lQCSiT0sX7KHHBT1D0qIna5LdOu/OgG','2018-10-05 00:00:00','2018-10-05'),(15,18,'$2a$10$ZD7QBaC.9h2mC9n2GIKtS.43M8OuyRq9wIamGtFhcn7j2tTFDPJMm','2018-10-06 00:00:00','2018-10-05'),(16,21,'$2a$10$AIR5NVI.97LenzI.LQhrWukwqmJMWNPpTuNfaFwlyBJ5QXYX/EEXK','2018-10-06 00:00:00','2018-10-06'),(17,20,'$2a$10$k0QTsSPEbu2CJnKNNVaa3OPxjxujZjsVWfn0BOIpZeng.TnNM9kBe','2018-10-06 00:00:00','2018-10-06');

/*Table structure for table `cm_posdevices` */

DROP TABLE IF EXISTS `cm_posdevices`;

CREATE TABLE `cm_posdevices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posnumber` int(11) NOT NULL DEFAULT '56140000',
  `name` varchar(50) NOT NULL,
  `model` varchar(35) NOT NULL,
  `sn` varchar(35) DEFAULT NULL,
  `imei` varchar(35) NOT NULL,
  `branchcode` varchar(11) DEFAULT NULL,
  `ip` varchar(35) DEFAULT NULL,
  `mac` varchar(35) DEFAULT NULL,
  `registered` date DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_posdevices` */

insert  into `cm_posdevices`(`id`,`posnumber`,`name`,`model`,`sn`,`imei`,`branchcode`,`ip`,`mac`,`registered`,`status`) values (1,56140001,'Ayala POS Terminal','HG4545','595223665215856','56956223645232',NULL,'192.168.19.236','1485.2658.7155.1254','2018-08-31','Active'),(2,56140002,'Quezon POS Terminal','KIKJU','5684554212565','1247942113685',NULL,'192.168.192.132','5986.5684.1254.1245','2018-08-31','Active'),(3,56140003,'POS Cavite','YUIHG8989','16231323596232','23656459865564',NULL,'192.168.19.237','65425.123.13.1233','2018-08-31','Active');

/*Table structure for table `cm_postations` */

DROP TABLE IF EXISTS `cm_postations`;

CREATE TABLE `cm_postations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `alias` varchar(15) DEFAULT NULL,
  `branch_id` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_postations` */

/*Table structure for table `cm_productlimits` */

DROP TABLE IF EXISTS `cm_productlimits`;

CREATE TABLE `cm_productlimits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `limit_cycle` varchar(15) NOT NULL,
  `limit_value` decimal(12,2) NOT NULL,
  `limit_fees` decimal(12,2) NOT NULL,
  `channels` varchar(15) NOT NULL,
  `cardtype_id` smallint(1) NOT NULL,
  `expiry_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_productlimits` */

insert  into `cm_productlimits`(`id`,`product_id`,`name`,`limit_cycle`,`limit_value`,`limit_fees`,`channels`,`cardtype_id`,`expiry_date`) values (1,2,'Minimum Withdrawal','Daily',555.99,66.99,'ATM',1,'1 Month'),(2,2,'Minimum Withdrawal','Daily',1111.00,55500.00,'POS',1,'3 Months'),(3,6,'Minimum Withdrawal','Daily',2232.66,565.56,'ATM',1,'3 Years');

/*Table structure for table `cm_products` */

DROP TABLE IF EXISTS `cm_products`;

CREATE TABLE `cm_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `expiration` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cm_products` */

insert  into `cm_products`(`id`,`name`,`expiration`) values (1,'CASH MATE CO-BRANDED','1 Year'),(2,'CASH MATE GIFT CARD','6 Months'),(3,'PAYROLL','6 Months'),(4,'PERSONAL LOAN','6 Months'),(5,'PENSION','5 Years'),(6,'REMITTANCE','6 Months');

/*Table structure for table `cm_settings` */

DROP TABLE IF EXISTS `cm_settings`;

CREATE TABLE `cm_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address1` text,
  `address2` text,
  `bin` int(11) NOT NULL,
  `bankcode` int(11) NOT NULL DEFAULT '5614',
  `check_digit` int(11) NOT NULL,
  `currency_account` varchar(5) DEFAULT NULL,
  `tel_no` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cm_settings` */

insert  into `cm_settings`(`id`,`name`,`address1`,`address2`,`bin`,`bankcode`,`check_digit`,`currency_account`,`tel_no`) values (1,'Binangonan Rural Bank (BRB) Digital','Example Address 1','Example Address 2',56142100,5614,1,'PHP','262-323-2323');

/*Table structure for table `cm_statuses` */

DROP TABLE IF EXISTS `cm_statuses`;

CREATE TABLE `cm_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `cm_statuses` */

insert  into `cm_statuses`(`id`,`name`,`code`) values (1,'Active','active'),(2,'Pending','pending'),(3,'Canceled','canceled'),(4,'Blocked','blocked');

/*Table structure for table `cm_terminals` */

DROP TABLE IF EXISTS `cm_terminals`;

CREATE TABLE `cm_terminals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `deviceno` varchar(10) DEFAULT NULL,
  `name` varchar(35) NOT NULL,
  `type` varchar(3) DEFAULT 'POS',
  `model_number` varchar(35) NOT NULL,
  `device_imei` varchar(35) DEFAULT NULL,
  `device_sn` varchar(35) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `mac_address` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `added` datetime DEFAULT NULL,
  `addedby` varchar(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(20) DEFAULT NULL,
  `local_port` varchar(10) DEFAULT NULL,
  `keys` varchar(35) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cm_terminals` */

insert  into `cm_terminals`(`id`,`branch_id`,`deviceno`,`name`,`type`,`model_number`,`device_imei`,`device_sn`,`ip_address`,`mac_address`,`status`,`added`,`addedby`,`modified`,`modifiedby`,`local_port`,`keys`,`address`) values (1,1,'20100312','POS AYALA BRANCH','POS','562232','4a116543ef6622d4','3232323','192.168.16.26','323.232.232.23','Active','2018-09-15 00:00:00','admin','2018-09-15 00:00:00','admin','3245345','345345','THIS IS THE EXAMPLE ADDRESS'),(2,3,'20100313','POS CAVITE TERMINAL BRANCH','POS','56565','353998b8211','6565656','192.16.19.23','2366.232.2323.323','Active','2018-09-15 00:00:00','admin','2018-09-15 00:00:00','admin','345345','3453453',NULL),(3,14,'3539989B82','TEST TERMINAL','POS','3539989B8211EFEC','3539989B8211EFEC','3539989B82EFEC','3539989B82EFEC','3539989B82EFEC','Active','2018-10-04 00:00:00','admin','2018-10-04 00:00:00','admin','3539989B82','3539989B82EFEC','BRB HEAD OFFICE');

/*Table structure for table `cm_terminaltransactions` */

DROP TABLE IF EXISTS `cm_terminaltransactions`;

CREATE TABLE `cm_terminaltransactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terminal_id` int(11) NOT NULL,
  `device_no` varchar(20) NOT NULL,
  `processing_code` varchar(35) NOT NULL,
  `transaction_type` varchar(15) NOT NULL,
  `channel` varchar(8) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_terminaltransactions` */

/*Table structure for table `cm_transactions` */

DROP TABLE IF EXISTS `cm_transactions`;

CREATE TABLE `cm_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `running_balance` decimal(12,2) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `transdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i_card_trace` (`cardno`,`trace_number`),
  KEY `i_card_process` (`cardno`,`processing_code`),
  KEY `i_process` (`processing_code`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transactions` */

insert  into `cm_transactions`(`id`,`cardno`,`account_name`,`trace_number`,`transaction_amount`,`service_charge`,`running_balance`,`processing_code`,`transdate`) values (1,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000003',10000.00,0.00,10000.00,'CARD LOADING','2018-10-05 01:02:44'),(2,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000004',10000.00,0.00,10010.00,'CARD LOADING','2018-10-05 01:02:50'),(3,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000005',10000.00,0.00,10020.00,'CARD LOADING','2018-10-05 01:03:02'),(4,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000006',10000.00,0.00,10030.00,'CARD LOADING','2018-10-05 01:03:40'),(5,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000007',10000.00,0.00,10040.00,'CARD LOADING','2018-10-05 01:06:01'),(6,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000008',1000.00,0.00,1050.00,'CARD LOADING','2018-10-05 01:46:27'),(7,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000009',10000.00,0.00,11050.00,'CARD LOADING','2018-10-05 01:47:31'),(8,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000007',50.00,0.00,11000.00,'PURCHASE','2018-10-05 01:48:20'),(9,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000009',1100.00,0.00,9900.00,'PURCHASE','2018-10-05 01:49:16'),(10,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000003',500.00,0.00,9400.00,'CASH OUT','2018-10-05 01:49:50'),(11,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000004',100.00,0.00,9300.00,'CASH OUT','2018-10-05 02:10:41'),(12,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000012',250.00,0.00,9050.00,'PURCHASE','2018-10-05 02:12:27'),(13,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000010',1200.00,0.00,10250.00,'CARD LOADING','2018-10-05 02:13:21'),(14,'5901331010000840','ROCKY BALBOA ESCOBAR','000011',0.00,0.00,0.00,'CARD LOADING','2018-10-05 03:09:38'),(15,'5901331010000840','JUN DIAZ GOMEZ','000012',2000.00,0.00,2000.00,'CARD LOADING','2018-10-05 04:41:57'),(16,'5901331010000840','JUN DIAZ GOMEZ','000005',500.00,0.00,1500.00,'CASH OUT','2018-10-05 04:42:46'),(17,'5901331010000840','AYALA MAGALLANEZ LOPEZ','000013',100000.00,0.00,100000.00,'CARD LOADING','2018-10-05 06:57:56'),(18,'5901331010000840','AYALA MAGALLANEZ LOPEZ','000014',750.00,0.00,100750.00,'CARD LOADING','2018-10-05 07:04:21'),(19,'5901331010000840','AYALA MAGALLANEZ LOPEZ','000006',20000.00,0.00,80750.00,'CASH OUT','2018-10-05 09:09:59'),(20,'5901331010000840','AYALA MAGALLANEZ LOPEZ','000007',250.00,0.00,80500.00,'CASH OUT','2018-10-05 09:23:34'),(21,'5901331010000840','AYALA MAGALLANEZ LOPEZ','000008',150.00,0.00,80350.00,'CASH OUT','2018-10-05 09:29:32'),(22,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000009',1005.00,0.00,9245.00,'CASH OUT','2018-10-06 12:37:27'),(23,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000013',2000.00,0.00,7245.00,'PURCHASE','2018-10-06 12:38:59'),(24,'5900011045000000003','GERALDINE ARABELA TABUGOL ELEDONIA','000015',10000.00,0.00,17245.00,'CARD LOADING','2018-10-06 12:39:47'),(25,'5901331010000112','JOLINA LOPEZ MAGDANGAL','000023',300.00,0.00,300.00,'CARD LOADING','2018-10-06 23:21:25'),(26,'5901331010000112','JOLINA LOPEZ MAGDANGAL','000011',150.00,0.00,150.00,'CASH OUT','2018-10-06 23:33:22');

/*Table structure for table `cm_transactiontypes` */

DROP TABLE IF EXISTS `cm_transactiontypes`;

CREATE TABLE `cm_transactiontypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `status_id` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transactiontypes` */

insert  into `cm_transactiontypes`(`id`,`name`,`status_id`) values (1,'Purchase',1),(2,'Balance Inquiry',1),(3,'Load Cash',1),(4,'Change Pin',1),(5,'Bills Payment',1),(6,'Withdrawal',1);

/*Table structure for table `cm_transbalanceinquiries` */

DROP TABLE IF EXISTS `cm_transbalanceinquiries`;

CREATE TABLE `cm_transbalanceinquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transbalanceinquiries` */

insert  into `cm_transbalanceinquiries`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Rejected',1000.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Approved',20000.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(3,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Approved',-10000.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(4,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Approved',-3000.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(5,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Approved',3000.87,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(6,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000006','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:02:03',NULL,'20100312','','test1'),(7,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000007','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:04:45',NULL,'20100312','','test1'),(8,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000008','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:45:44',NULL,'20100312','','test1'),(9,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000009','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:47:02',NULL,'20100312','','test1'),(10,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000010','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:47:54',NULL,'20100312','','test1'),(11,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000011','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:50:12',NULL,'20100312','','test1'),(12,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000012','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 02:10:06',NULL,'20100312','','test1'),(13,4,'5901331010000840',5,'ROCKY BALBOA ESCOBAR','000013','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 03:08:52',NULL,'3539989B82','','test1'),(14,4,'5901331010000840',5,'ROCKY BALBOA ESCOBAR','000014','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 03:10:17',NULL,'3539989B82','','test1'),(15,134,'5901331010000840',19,'JUN DIAZ GOMEZ','000015','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 04:42:20',NULL,'3539989B82','','test1'),(16,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000016','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 06:56:33',NULL,'3539989B82','','test1'),(17,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000017','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 07:49:08',NULL,'3539989B82','','test1'),(18,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000018','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 09:09:15',NULL,'3539989B82','','test1'),(19,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000019','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 09:21:37',NULL,'3539989B82','','test1'),(20,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000020','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 09:27:30',NULL,'3539989B82','','test1'),(21,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000021','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 09:54:39',NULL,'3539989B82','','test1'),(22,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000022','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 12:36:32',NULL,'20100312','','test1'),(23,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000023','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 12:38:03',NULL,'20100312','','test1'),(24,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000024','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 12:40:19',NULL,'20100312','','test1'),(25,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000025','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-06 22:35:33',NULL,'3539989B82','','test1'),(26,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000026','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-06 23:11:52',NULL,'3539989B82','','test1'),(27,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000027','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-06 23:25:38',NULL,'3539989B82','','test1'),(28,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000028','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-06 23:28:30',NULL,'3539989B82','','test1'),(29,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000029','ON US','BALANCE INQUIRY','POS','5614210','APPROVED',0.00,0.00,'2018-10-07 00:02:19',NULL,'3539989B82','','test1');

/*Table structure for table `cm_transbillspayments` */

DROP TABLE IF EXISTS `cm_transbillspayments`;

CREATE TABLE `cm_transbillspayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transbillspayments` */

insert  into `cm_transbillspayments`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`,`institution_id`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Bills Payment','POS','BRB','APPROVED',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin',1),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Bills Payment','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin',2),(3,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Bills Payment','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin',1),(4,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Bills Payment','POS','BRB','Approved',20.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin',2),(5,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Bills Payment','POS','BRB','Approved',5.50,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin',2);

/*Table structure for table `cm_transbillspayments_old` */

DROP TABLE IF EXISTS `cm_transbillspayments_old`;

CREATE TABLE `cm_transbillspayments_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(3) NOT NULL,
  `transcode` varchar(35) NOT NULL,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `partner_id` int(2) DEFAULT NULL,
  `terminal_id` smallint(1) DEFAULT NULL,
  `postation_id` smallint(3) DEFAULT NULL,
  `accountnumber` varbinary(35) DEFAULT NULL,
  `transdate` datetime NOT NULL,
  `remaining_balance` decimal(12,2) NOT NULL,
  `amount_due` decimal(12,2) NOT NULL,
  `customer_charge` decimal(12,2) DEFAULT NULL,
  `partner_charge` decimal(12,2) DEFAULT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `status_id` smallint(1) NOT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `processed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_transbillspayments_old` */

/*Table structure for table `cm_transcashouts` */

DROP TABLE IF EXISTS `cm_transcashouts`;

CREATE TABLE `cm_transcashouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transcashouts` */

insert  into `cm_transcashouts`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Cash Out','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Cash Out','POS','BRB','Rejected',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(3,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000003','ON US','CASH OUT','POS','5614210','APPROVED',500.00,0.00,'2018-10-05 01:49:50',NULL,'20100312','','test1'),(4,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000004','ON US','CASH OUT','POS','5614210','APPROVED',100.00,0.00,'2018-10-05 02:10:41',NULL,'20100312','','test1'),(5,134,'5901331010000840',19,'JUN DIAZ GOMEZ','000005','ON US','CASH OUT','POS','5614210','APPROVED',500.00,0.00,'2018-10-05 04:42:46',NULL,'3539989B82','','test1'),(6,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000006','ON US','CASH OUT','POS','5614210','APPROVED',20000.00,0.00,'2018-10-05 09:09:59',NULL,'3539989B82','','test1'),(7,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000007','ON US','CASH OUT','POS','5614210','APPROVED',250.00,0.00,'2018-10-05 09:23:34',NULL,'3539989B82','','test1'),(8,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000008','ON US','CASH OUT','POS','5614210','APPROVED',150.00,0.00,'2018-10-05 09:29:32',NULL,'3539989B82','','test1'),(9,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000009','ON US','CASH OUT','POS','5614210','APPROVED',1005.00,0.00,'2018-10-05 12:37:27',NULL,'20100312','','test1'),(10,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000010','ON US','CASH OUT','POS','5614210','REJECTED',100.00,0.00,'2018-10-06 23:03:13',NULL,'3539989B82','','test1'),(11,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000011','ON US','CASH OUT','POS','5614210','APPROVED',150.00,0.00,'2018-10-06 23:33:22',NULL,'3539989B82','','test1');

/*Table structure for table `cm_transcashouts_old` */

DROP TABLE IF EXISTS `cm_transcashouts_old`;

CREATE TABLE `cm_transcashouts_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(1) NOT NULL,
  `transcode` varchar(35) DEFAULT NULL,
  `card_id` smallint(1) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` smallint(1) NOT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `terminal_id` smallint(1) NOT NULL,
  `remaining_balance` decimal(12,2) NOT NULL,
  `cashout_amount` decimal(12,2) NOT NULL,
  `current_balance` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `atmstation_id` smallint(1) DEFAULT NULL,
  `status_id` smallint(1) NOT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `pricessed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_transcashouts_old` */

/*Table structure for table `cm_transchangepins` */

DROP TABLE IF EXISTS `cm_transchangepins`;

CREATE TABLE `cm_transchangepins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transchangepins` */

insert  into `cm_transchangepins`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000001','ON US','CHANGE PIN','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 01:07:14',NULL,'20100312','','test1'),(2,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000002','ON US','CHANGE PIN','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 02:11:27',NULL,'20100312','','test1'),(3,134,'5901331010000840',19,'JUN DIAZ GOMEZ','000003','ON US','CHANGE PIN','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 04:30:58',NULL,'3539989B82','','test1'),(4,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000004','ON US','CHANGE PIN','POS','5614210','APPROVED',0.00,0.00,'2018-10-06 23:25:03',NULL,'3539989B82','','test1');

/*Table structure for table `cm_transchangepins_old` */

DROP TABLE IF EXISTS `cm_transchangepins_old`;

CREATE TABLE `cm_transchangepins_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(1) DEFAULT NULL,
  `transcode` varchar(35) DEFAULT NULL,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) DEFAULT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `old_pin` int(6) DEFAULT NULL,
  `new_pin` int(6) DEFAULT NULL,
  `status_id` smallint(1) DEFAULT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `pricessed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_transchangepins_old` */

/*Table structure for table `cm_transinterbanks` */

DROP TABLE IF EXISTS `cm_transinterbanks`;

CREATE TABLE `cm_transinterbanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `trans_cardnumber` varchar(20) DEFAULT NULL,
  `receiving_accountno` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transinterbanks` */

insert  into `cm_transinterbanks`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`trans_cardnumber`,`receiving_accountno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Cash Out','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','561421001000003','5614210010','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Cash Out','POS','BRB','Rejected',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','561421001000003','5614210010','','admin');

/*Table structure for table `cm_transloadcashes` */

DROP TABLE IF EXISTS `cm_transloadcashes`;

CREATE TABLE `cm_transloadcashes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transloadcashes` */

insert  into `cm_transloadcashes`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Cash Load','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','CARD LOADING','POS','BRB','Rejected',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(3,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000003','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:02:44',NULL,'20100312','','test1'),(4,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000004','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:02:50',NULL,'20100312','','test1'),(5,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000005','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:03:02',NULL,'20100312','','test1'),(6,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000006','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:03:40',NULL,'20100312','','test1'),(7,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000007','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:06:01',NULL,'20100312','','test1'),(8,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000008','ON US','CARD LOADING','POS','5614210','APPROVED',1000.00,0.00,'2018-10-05 01:46:27',NULL,'20100312','','test1'),(9,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000009','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 01:47:31',NULL,'20100312','','test1'),(10,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000010','ON US','CARD LOADING','POS','5614210','APPROVED',1200.00,0.00,'2018-10-05 02:13:21',NULL,'20100312','','test1'),(11,4,'5901331010000840',5,'ROCKY BALBOA ESCOBAR','000011','ON US','CARD LOADING','POS','5614210','APPROVED',0.00,0.00,'2018-10-05 03:09:38',NULL,'3539989B82','','test1'),(12,134,'5901331010000840',19,'JUN DIAZ GOMEZ','000012','ON US','CARD LOADING','POS','5614210','APPROVED',2000.00,0.00,'2018-10-05 04:41:57',NULL,'3539989B82','','test1'),(13,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000013','ON US','CARD LOADING','POS','5614210','APPROVED',100000.00,0.00,'2018-10-05 06:57:56',NULL,'3539989B82','','test1'),(14,135,'5901331010000840',21,'AYALA MAGALLANEZ LOPEZ','000014','ON US','CARD LOADING','POS','5614210','APPROVED',750.00,0.00,'2018-10-05 07:04:21',NULL,'3539989B82','','test1'),(15,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000015','ON US','CARD LOADING','POS','5614210','APPROVED',10000.00,0.00,'2018-10-05 12:39:47',NULL,'20100312','','test1'),(16,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000016','ON US','CARD LOADING','POS','5614210','REJECTED',500.00,0.00,'2018-10-06 22:40:38',NULL,'3539989B82','','test1'),(17,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000017','ON US','CARD LOADING','POS','5614210','REJECTED',500.00,0.00,'2018-10-06 22:40:48',NULL,'3539989B82','','test1'),(18,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000018','ON US','CARD LOADING','POS','5614210','REJECTED',500.00,0.00,'2018-10-06 22:43:40',NULL,'3539989B82','','test1'),(19,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000019','ON US','CARD LOADING','POS','5614210','REJECTED',10000.00,0.00,'2018-10-06 22:57:59',NULL,'3539989B82','','test1'),(20,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000020','ON US','CARD LOADING','POS','5614210','REJECTED',250.00,0.00,'2018-10-06 23:07:14',NULL,'3539989B82','','test1'),(21,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000021','ON US','CARD LOADING','POS','5614210','REJECTED',900.00,0.00,'2018-10-06 23:13:29',NULL,'3539989B82','','test1'),(22,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000022','ON US','CARD LOADING','POS','5614210','REJECTED',25000.00,0.00,'2018-10-06 23:17:17',NULL,'3539989B82','','test1'),(23,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000023','ON US','CARD LOADING','POS','5614210','APPROVED',300.00,0.00,'2018-10-06 23:21:25',NULL,'3539989B82','','test1'),(24,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000024','ON US','CARD LOADING','POS','5614210','REJECTED',100000.00,0.00,'2018-10-06 23:26:33',NULL,'3539989B82','','test1'),(25,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000025','ON US','CARD LOADING','POS','5614210','REJECTED',1000.00,0.00,'2018-10-06 23:27:14',NULL,'3539989B82','','test1'),(26,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000026','ON US','CARD LOADING','POS','5614210','REJECTED',100.00,0.00,'2018-10-06 23:27:45',NULL,'3539989B82','','test1'),(27,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000027','ON US','CARD LOADING','POS','5614210','REJECTED',10000.00,0.00,'2018-10-06 23:29:08',NULL,'3539989B82','','test1'),(28,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000028','ON US','CARD LOADING','POS','5614210','REJECTED',26000.00,0.00,'2018-10-06 23:31:52',NULL,'3539989B82','','test1'),(29,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000029','ON US','CARD LOADING','POS','5614210','REJECTED',30000.00,0.00,'2018-10-06 23:34:05',NULL,'3539989B82','','test1'),(30,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000030','ON US','CARD LOADING','POS','5614210','REJECTED',30000.00,0.00,'2018-10-06 23:45:45',NULL,'3539989B82','','test1'),(31,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000031','ON US','CARD LOADING','POS','5614210','REJECTED',60000.00,0.00,'2018-10-06 23:50:10',NULL,'3539989B82','','test1'),(32,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000032','ON US','CARD LOADING','POS','5614210','REJECTED',2000.00,0.00,'2018-10-06 23:52:01',NULL,'3539989B82','','test1'),(33,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000033','ON US','CARD LOADING','POS','5614210','REJECTED',50000.00,0.00,'2018-10-06 23:59:45',NULL,'3539989B82','','test1'),(34,140,'5901331010000112',24,'JOLINA LOPEZ MAGDANGAL','000034','ON US','CARD LOADING','POS','5614210','REJECTED',35000.00,0.00,'2018-10-07 00:02:47',NULL,'3539989B82','','test1');

/*Table structure for table `cm_transloadcashes_old` */

DROP TABLE IF EXISTS `cm_transloadcashes_old`;

CREATE TABLE `cm_transloadcashes_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(1) NOT NULL,
  `transcode` varchar(35) NOT NULL,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `terminal_id` smallint(1) DEFAULT NULL,
  `transdate` datetime NOT NULL,
  `remaining_balance` decimal(12,2) NOT NULL,
  `load_amount` decimal(12,2) NOT NULL,
  `current_balance` decimal(12,2) NOT NULL,
  `atmstation_id` smallint(1) DEFAULT NULL,
  `postation_id` int(11) DEFAULT NULL,
  `status_id` smallint(1) DEFAULT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `pricessed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_transloadcashes_old` */

/*Table structure for table `cm_transpurchases` */

DROP TABLE IF EXISTS `cm_transpurchases`;

CREATE TABLE `cm_transpurchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transpurchases` */

insert  into `cm_transpurchases`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Purchase','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Purchase','POS','BRB','Reversal',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(3,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Purchase','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(4,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Purchase','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(5,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000005','ON US','PURCHASE','POS','5614210','REJECTED',100.00,0.00,'2018-10-05 01:07:54',NULL,'20100312','','test1'),(6,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000006','ON US','PURCHASE','POS','5614210','REJECTED',100.00,0.00,'2018-10-05 01:08:00',NULL,'20100312','','test1'),(7,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000007','ON US','PURCHASE','POS','5614210','APPROVED',50.00,0.00,'2018-10-05 01:48:20',NULL,'20100312','','test1'),(8,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000008','ON US','PURCHASE','POS','5614210','REJECTED',20000.00,0.00,'2018-10-05 01:48:47',NULL,'20100312','','test1'),(9,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000009','ON US','PURCHASE','POS','5614210','APPROVED',1100.00,0.00,'2018-10-05 01:49:16',NULL,'20100312','','test1'),(10,0,'',0,'','','','','','','',0.00,0.00,'0000-00-00 00:00:00',NULL,'','',''),(11,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000011','ON US','PURCHASE','POS','5614210','REJECTED',11000.00,0.00,'2018-10-05 02:12:15',NULL,'20100312','','test1'),(12,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000012','ON US','PURCHASE','POS','5614210','APPROVED',250.00,0.00,'2018-10-05 02:12:27',NULL,'20100312','','test1'),(13,10,'5900011045000000003',9,'GERALDINE ARABELA TABUGOL ELEDONIA','000013','ON US','PURCHASE','POS','5614210','APPROVED',2000.00,0.00,'2018-10-05 12:38:59',NULL,'20100312','','test1');

/*Table structure for table `cm_transpurchases_old` */

DROP TABLE IF EXISTS `cm_transpurchases_old`;

CREATE TABLE `cm_transpurchases_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(64) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `terminal_id` smallint(1) NOT NULL,
  `transdate` datetime NOT NULL,
  `remaining_balance` decimal(12,2) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `current_balance` decimal(12,2) NOT NULL,
  `postation_id` int(11) DEFAULT NULL,
  `atmstation_id` int(11) DEFAULT NULL,
  `status_id` smallint(1) NOT NULL,
  `ornumber` varchar(20) DEFAULT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `processed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transpurchases_old` */

insert  into `cm_transpurchases_old`(`id`,`transactiontype_id`,`user_id`,`card_id`,`cardno`,`cardholder_id`,`accountname`,`terminal_id`,`transdate`,`remaining_balance`,`total_amount`,`current_balance`,`postation_id`,`atmstation_id`,`status_id`,`ornumber`,`posimei`,`processed_by`) values (2,2,2,3,'65623232323',1,'dgsdfgsfgsdfg',2,'2018-08-14 00:00:00',50000.00,50000.00,1000.00,1,1,1,'234234','345345345','Juanito gamad');

/*Table structure for table `cm_transwithdrawals` */

DROP TABLE IF EXISTS `cm_transwithdrawals`;

CREATE TABLE `cm_transwithdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `trace_number` varchar(20) NOT NULL,
  `transaction_type` varchar(10) NOT NULL,
  `processing_code` varchar(15) NOT NULL,
  `channels` varchar(3) NOT NULL,
  `acquirer_institution` varchar(15) NOT NULL,
  `response` varchar(15) NOT NULL,
  `transaction_amount` decimal(12,2) NOT NULL,
  `service_charge` decimal(12,2) NOT NULL,
  `transdate` datetime NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `deviceno` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `cm_transwithdrawals` */

insert  into `cm_transwithdrawals`(`id`,`card_id`,`cardno`,`cardholder_id`,`account_name`,`trace_number`,`transaction_type`,`processing_code`,`channels`,`acquirer_institution`,`response`,`transaction_amount`,`service_charge`,`transdate`,`terminal_id`,`deviceno`,`status`,`username`) values (1,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Reversal',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(2,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Balance Inquiry','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(3,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','Acquirer','Balance Inquiry','POS','BRB','Reversal',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin'),(4,4,'561421001000003',11,'Juanito Conjurado Gamad','02123213','On Us','Balance Inquiry','POS','BRB','Approved',10.00,2.00,'2018-09-18 00:00:00',NULL,'20100312','','admin');

/*Table structure for table `cm_uploadpregeneratecards` */

DROP TABLE IF EXISTS `cm_uploadpregeneratecards`;

CREATE TABLE `cm_uploadpregeneratecards` (
  `user_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_uploadpregeneratecards` */

insert  into `cm_uploadpregeneratecards`(`user_id`,`path`,`date_time`) values (1,'C:\\xampp\\htdocs\\cashmate\\app\\webroot/Uploads/2018/10/PRE_GENERATED2018100207LCYLPA2623AM.csv','2018-10-02 07:26:23'),(1,'C:\\xampp\\htdocs\\cashmate\\app\\webroot/Uploads/2018/10/PRE_GENERATED2018100207CEAGYH2814AM.csv','2018-10-02 07:28:14'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002078QYXPE3404AM.csv','2018-10-02 07:34:04'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207YEI5OC3544AM.csv','2018-10-02 07:35:44'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207KMMTMK3628AM.csv','2018-10-02 07:36:28'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207VPXOBN3709AM.csv','2018-10-02 07:37:09'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207067A7J3801AM.csv','2018-10-02 07:38:01'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207Y4XYSQ3816AM.csv','2018-10-02 07:38:16'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207FXBTCB3843AM.csv','2018-10-02 07:38:43'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207RDLNT23943AM.csv','2018-10-02 07:39:43'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002073FFKN64025AM.csv','2018-10-02 07:40:25'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207NHTIZH4110AM.csv','2018-10-02 07:41:10'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207K4HVKO4150AM.csv','2018-10-02 07:41:50'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207XJ1O8T4207AM.csv','2018-10-02 07:42:07'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207LGW5MC4230AM.csv','2018-10-02 07:42:30'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207OSJKSX4309AM.csv','2018-10-02 07:43:09'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207PWF3WD4340AM.csv','2018-10-02 07:43:40'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002076X2SRH4356AM.csv','2018-10-02 07:43:56'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207DPZTDQ4409AM.csv','2018-10-02 07:44:09'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207UVAPG44551AM.csv','2018-10-02 07:45:51'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207W9WOC74613AM.csv','2018-10-02 07:46:13'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207VHYPPH4749AM.csv','2018-10-02 07:47:49'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207JZGWV55544AM.csv','2018-10-02 07:55:44'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100207UVM6BA5616AM.csv','2018-10-02 07:56:16'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208YSYLFT0644AM.csv','2018-10-02 08:06:44'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208SZSQQJ0725AM.csv','2018-10-02 08:07:25'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208H8OPH60952AM.csv','2018-10-02 08:09:52'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002083SOXPC1054AM.csv','2018-10-02 08:10:54'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208GHZHJQ1208AM.csv','2018-10-02 08:12:08'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208OWUSI41248AM.csv','2018-10-02 08:12:48'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208BD4W9F1521AM.csv','2018-10-02 08:15:21'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002088PMH7U2151AM.csv','2018-10-02 08:21:51'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002081FFISJ2555AM.csv','2018-10-02 08:25:55'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208YKYMOP2636AM.csv','2018-10-02 08:26:36'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100208RHMZKE5923AM.csv','2018-10-02 08:59:23'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002097CQTYL0638AM.csv','2018-10-02 09:06:38'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181002095CWF7C2035AM.csv','2018-10-02 09:20:35'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100209WTPF6U2127AM.csv','2018-10-02 09:21:27'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100209ABEE2G2524AM.csv','2018-10-02 09:25:24'),(1,'webroot/Uploads/2018/10/PRE_GENERATED20181004118HHOKA1741PM.csv','2018-10-04 23:17:41'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100411BSWPV31805PM.csv','2018-10-04 23:18:05'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100411U7LRV71905PM.csv','2018-10-04 23:19:05'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100411KO5PVA2302PM.csv','2018-10-04 23:23:02'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501ZEUQG31418AM.csv','2018-10-05 01:14:18'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501PNMR242320AM.csv','2018-10-05 01:23:20'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501NQUJRQ2557AM.csv','2018-10-05 01:25:57'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501O4HZRD2721AM.csv','2018-10-05 01:27:21'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501O3VEV82759AM.csv','2018-10-05 01:27:59'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501MFB0KP2857AM.csv','2018-10-05 01:28:57'),(1,'webroot/Uploads/2018/10/PRE_GENERATED2018100501KJXY0I3647AM.csv','2018-10-05 01:36:47'),(1,'webroot/Uploads/2018/10/PRE_GENERATED201810060904J4VY3648PM.csv','2018-10-06 21:36:48');

/*Table structure for table `cm_userattempts` */

DROP TABLE IF EXISTS `cm_userattempts`;

CREATE TABLE `cm_userattempts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `date_time` datetime NOT NULL,
  `ip_address` varchar(64) DEFAULT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_userattempts` */

insert  into `cm_userattempts`(`user_id`,`username`,`date_time`,`ip_address`,`status`) values (1,'admin','2018-10-01 09:38:52','::1','failed'),(1,'admin','2018-10-01 09:40:18','::1','failed'),(1,'admin','2018-10-01 09:55:12','::1','failed'),(1,'admin','2018-10-01 09:55:18','::1','failed'),(1,'admin','2018-10-01 11:13:07','::1','success'),(1,'admin','2018-10-02 01:41:11','::1','success'),(1,'admin','2018-10-02 05:29:03','::1','success'),(1,'admin','2018-10-02 06:30:46','::1','success'),(1,'admin','2018-10-02 07:02:48','::1','success'),(1,'admin','2018-10-02 10:18:31','::1','success'),(1,'admin','2018-10-02 11:24:39','::1','success'),(1,'admin','2018-10-02 13:07:31','::1','success'),(1,'admin','2018-10-02 13:07:30','::1','success'),(1,'admin','2018-10-02 17:32:40','::1','success'),(1,'admin','2018-10-03 08:33:45','::1','success'),(1,'admin','2018-10-03 12:40:40','::1','success'),(1,'admin','2018-10-03 14:46:45','::1','success'),(1,'admin','2018-10-04 16:45:07','::1','success'),(5,'test','2018-10-04 19:43:42','::1','success'),(1,'admin','2018-10-04 19:44:52','::1','success'),(1,'admin','2018-10-04 20:50:47','130.105.41.144','success'),(1,'admin','2018-10-04 21:01:48','130.105.41.144','failed'),(1,'admin','2018-10-04 21:01:52','130.105.41.144','success'),(1,'admin','2018-10-04 21:47:19','120.89.49.234','success'),(1,'admin','2018-10-04 21:56:01','119.93.11.56','success'),(1,'admin','2018-10-04 22:38:44','130.105.41.144','success'),(1,'admin','2018-10-04 22:39:31','175.158.226.4','success'),(12,'BRANCH1','2018-10-04 22:42:49','175.158.226.4','success'),(1,'admin','2018-10-04 22:43:30','175.158.226.4','success'),(14,'BRANCH2','2018-10-04 22:46:35','175.158.226.4','success'),(1,'admin','2018-10-04 22:47:30','175.158.226.4','success'),(1,'admin','2018-10-05 00:07:24','175.158.226.4','success'),(1,'admin','2018-10-05 00:32:49','119.93.11.56','success'),(1,'admin','2018-10-05 00:35:47','122.54.26.91','success'),(1,'admin','2018-10-05 00:48:54','119.93.11.56','success'),(12,'BRANCH1','2018-10-05 00:53:31','175.158.208.184','success'),(12,'BRANCH1','2018-10-05 00:58:52','175.158.208.174','success'),(16,'BRANCH01','2018-10-05 01:03:24','119.93.11.56','failed'),(16,'BRANCH01','2018-10-05 01:03:41','119.93.11.56','success'),(16,'BRANCH01','2018-10-05 01:06:13','119.93.11.56','success'),(1,'admin','2018-10-05 01:06:56','119.93.11.56','success'),(16,'BRANCH01','2018-10-05 01:07:30','119.93.11.56','success'),(13,'CEUNIT1','2018-10-05 01:10:38','175.158.208.156','success'),(1,'admin','2018-10-05 01:13:24','119.93.11.56','success'),(15,'CENTRALUNIT01','2018-10-05 01:15:00','119.93.11.56','success'),(15,'CENTRALUNIT01','2018-10-05 01:15:56','119.93.11.56','success'),(1,'admin','2018-10-05 01:16:54','119.93.11.56','success'),(1,'admin','2018-10-05 01:26:13','119.93.11.56','success'),(1,'admin','2018-10-05 01:28:41','119.93.11.56','success'),(1,'admin','2018-10-05 01:43:30','119.93.11.56','success'),(12,'BRANCH1','2018-10-05 02:21:49','119.93.11.56','failed'),(12,'BRANCH1','2018-10-05 02:21:59','119.93.11.56','success'),(12,'BRANCH1','2018-10-05 02:21:59','119.93.11.56','success'),(1,'admin','2018-10-05 02:40:54','119.93.11.56','success'),(1,'admin','2018-10-05 18:02:32','119.93.11.56','success'),(17,'TEST22','2018-10-05 20:42:35','::1','success'),(17,'TEST22','2018-10-05 20:43:16','::1','success'),(1,'admin','2018-10-05 21:59:00','::1','success'),(17,'TEST22','2018-10-05 22:00:00','::1','success'),(1,'admin','2018-10-05 22:04:42','::1','success'),(17,'TEST22','2018-10-05 22:08:20','::1','success'),(1,'admin','2018-10-06 08:16:14','::1','success'),(17,'TEST22','2018-10-06 08:18:06','::1','success'),(18,'TEST33','2018-10-06 10:22:56','::1','success'),(18,'TEST33','2018-10-06 10:22:57','::1','success'),(18,'TEST33','2018-10-06 10:24:42','::1','success'),(1,'admin','2018-10-06 11:24:32','::1','success'),(1,'admin','2018-10-06 20:51:33','112.210.32.80','success'),(1,'admin','2018-10-06 20:53:25','180.190.47.99','success'),(21,'LOURDES2018','2018-10-06 21:08:33','180.190.47.99','success'),(21,'LOURDES2018','2018-10-06 21:10:32','180.190.47.99','success'),(1,'admin','2018-10-06 21:13:31','112.210.32.80','success'),(1,'admin','2018-10-06 21:13:43','49.147.131.125','success'),(1,'admin','2018-10-06 21:14:05','112.210.32.80','success'),(1,'admin','2018-10-06 21:19:07','49.147.131.125','success'),(20,'MANUEL2018','2018-10-06 21:30:15','180.190.47.99','failed'),(20,'MANUEL2018','2018-10-06 21:30:31','180.190.47.99','success'),(20,'MANUEL2018','2018-10-06 21:33:03','180.190.47.99','success'),(23,'CEUNIT3','2018-10-06 21:34:21','112.210.32.80','success'),(1,'admin','2018-10-06 21:34:36','180.190.47.99','success'),(20,'MANUEL2018','2018-10-06 21:37:17','180.190.47.99','success'),(1,'admin','2018-10-06 21:39:53','180.190.47.99','success'),(1,'admin','2018-10-06 21:40:46','112.210.32.80','success'),(1,'admin','2018-10-06 21:48:54','112.210.32.80','success'),(20,'MANUEL2018','2018-10-06 21:51:06','180.190.47.99','success'),(1,'admin','2018-10-06 21:54:52','180.190.47.99','success'),(13,'CEUNIT1','2018-10-06 21:56:42','112.210.32.80','failed'),(23,'CEUNIT3','2018-10-06 21:56:48','112.210.32.80','failed'),(23,'CEUNIT3','2018-10-06 21:56:54','112.210.32.80','failed'),(1,'admin','2018-10-06 22:25:08','112.210.32.80','success'),(20,'MANUEL2018','2018-10-06 22:26:10','180.190.47.99','success'),(1,'admin','2018-10-06 22:27:47','180.190.47.99','success'),(20,'MANUEL2018','2018-10-06 22:33:30','180.190.47.99','success'),(1,'admin','2018-10-06 23:28:20','112.210.32.80','success'),(1,'admin','2018-10-06 23:53:16','180.190.47.99','success'),(21,'LOURDES2018','2018-10-07 00:18:23','180.190.47.99','success'),(20,'MANUEL2018','2018-10-07 00:19:40','180.190.47.99','success'),(21,'LOURDES2018','2018-10-07 00:22:34','180.190.47.99','failed'),(21,'LOURDES2018','2018-10-07 00:22:52','180.190.47.99','failed'),(21,'LOURDES2018','2018-10-07 00:23:14','180.190.47.99','failed'),(21,'LOURDES2018','2018-10-07 00:23:41','180.190.47.99','success'),(1,'admin','2018-10-07 09:28:13','49.147.131.125','success');

/*Table structure for table `cm_useravatars` */

DROP TABLE IF EXISTS `cm_useravatars`;

CREATE TABLE `cm_useravatars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `refid` varchar(35) NOT NULL,
  `image_file` text,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `cm_useravatars` */

insert  into `cm_useravatars`(`id`,`user_id`,`refid`,`image_file`,`added`) values (7,3,'2018071409exUPpRKSXI9W5843AM','Uploads/2018/07/2018071409exUPpRKSXI9W5843AM0556.jpg','2018-07-16 11:41:56'),(8,1,'2018071409exUPpRKSXI9W5843PM','Uploads/2018/10/2018071409exUPpRKSXI9W5843PM1249.png','2018-10-06 12:01:49'),(9,4,'2018071505XVRAo4XUWaKz1302PM','Uploads/2018/07/2018071505XVRAo4XUWaKz1302PM0513.png','2018-07-16 11:41:13'),(10,5,'201807171034ei0HhJ2gRz0427AM','Uploads/2018/07/201807171034ei0HhJ2gRz0427AM0456.png','2018-07-30 22:12:56'),(11,6,'20180808090PG7AVSBU6dS5505AM','Uploads/2018/08/20180808090PG7AVSBU6dS5505AM.png','2018-08-08 16:09:31'),(12,7,'2018080811LtMmXCvKPcK70932AM','Uploads/2018/08/2018080811LtMmXCvKPcK70932AM.png','2018-08-08 17:11:16'),(13,9,'2018091703fg4lgoQcXSmf5222AM','Uploads/2018/09/2018091703fg4lgoQcXSmf5222AM.png','2018-09-17 09:55:48'),(14,10,'2018091701YqG6uAP5Ddtw0728PM','Uploads/2018/09/2018091701YqG6uAP5Ddtw0728PM.png','2018-09-17 19:08:13'),(15,11,'2018092712QS8DFw9xRl1w5727PM','Uploads/2018/09/2018092712QS8DFw9xRl1w5727PM.jpg','2018-09-27 19:06:55'),(16,12,'2018100410pvAIZdyVZGJT3158PM','Uploads/2018/10/2018100410pvAIZdyVZGJT3158PM.png','2018-10-05 11:36:58'),(17,13,'2018100410JssATyO7IO3T3704PM','Uploads/2018/10/2018100410JssATyO7IO3T3704PM.png','2018-10-05 11:38:11'),(18,15,'2018100512UWMwBCKdXzFA5840AM','Uploads/2018/10/2018100512UWMwBCKdXzFA5840AM.jpg','2018-10-05 14:01:07'),(19,17,'2018100508dS0lqPcJYzai3256PM','Uploads/2018/10/2018100508dS0lqPcJYzai3256PM.png','2018-10-05 20:34:40'),(20,18,'2018100508fjT7WmogzAnA3443PM','Uploads/2018/10/2018100508fjT7WmogzAnA3443PM.jpg','2018-10-05 20:35:31'),(21,22,'201810060904Mxd8fz0Sca1359PM','Uploads/2018/10/201810060904Mxd8fz0Sca1359PM.png','2018-10-06 21:15:04');

/*Table structure for table `cm_useresetpasswords` */

DROP TABLE IF EXISTS `cm_useresetpasswords`;

CREATE TABLE `cm_useresetpasswords` (
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_useresetpasswords` */

/*Table structure for table `cm_users` */

DROP TABLE IF EXISTS `cm_users`;

CREATE TABLE `cm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(4) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `picture` text,
  `last_login` datetime DEFAULT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `refid` varchar(35) DEFAULT NULL,
  `userToken` text,
  `deviceid` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `pass_expire` date DEFAULT NULL,
  `added` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `attempts` smallint(1) DEFAULT '0',
  `layout` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `cm_users` */

insert  into `cm_users`(`id`,`group_id`,`username`,`password`,`title`,`firstname`,`middlename`,`lastname`,`suffix`,`contact_no`,`tel_no`,`email`,`picture`,`last_login`,`terminal_id`,`refid`,`userToken`,`deviceid`,`status_id`,`pass_expire`,`added`,`added_by`,`modified`,`modified_by`,`attempts`,`layout`) values (1,1,'admin','$2a$10$QlRs8NnanQB6jwkNqXNk6O4cVHAToeT3Akp/OZ3bJLXGm3QrsKLG.',NULL,'Portal','Sample','Administrator','','45454545','458454845',NULL,'','2018-10-06 20:51:45',4,'2018071409exUPpRKSXI9W5843PM','eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfdXNlciI6eyJpZCI6MX0sImlhdCI6MTUzMzgwNjQwN30.pmebjRHMIpXS6wr5kg2grfZE2rsNvqMqeLc6vWE6mfU','0001233',1,'2018-10-10','0000-00-00 00:00:00','','2018-10-07 09:28:13','',0,NULL),(3,1,'nitzgamz','$2a$10$i3GQqAlm6ENEhGbcXrRp2eWyyQ5cavq6EAywGsrAlSHXhJeaBtWZG',NULL,'Juantio','Conjurado','Gamad','','344444','4646546464',NULL,NULL,NULL,3,'2018071409exUPpRKSXI9W5843AM',NULL,NULL,1,'2018-08-08','0000-00-00 00:00:00','','0000-00-00 00:00:00','',0,NULL),(5,20,'test','$2a$10$BMQgMx/sgH2CyVKjeddJBuCwggdFb8wfCOUjlQ6s5RVesA4inAAju',NULL,'Jayrek','Delacruz','Tabasa','','917456454','55656',NULL,NULL,'2018-08-10 12:36:00',1,'201807171034ei0HhJ2gRz0427AM','eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfdXNlciI6eyJpZCI6NX0sImlhdCI6MTUzMzg3NjEwOX0.ojATpcb9vLZcqNf59wZZcmdFGFhXkR384ICdz142-BE','0001233',1,'2018-09-08','0000-00-00 00:00:00','','2018-10-04 19:43:42','Portal Administrator',0,NULL),(6,1,'test1','$2a$10$SadVqYIhyKFSyj8Et7rHl.5D/Aim3OJeDYYNaIV.bU8aRqv9mNVMS','Mr','Jufiel','Valde','Lariosa','','+63947-999-03','',NULL,NULL,'2018-10-07 00:01:52',4,'20180808090PG7AVSBU6dS5505AM','eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfdXNlciI6eyJpZCI6NiwiaW1lIjoiMzUzOTk4OWI4MjExZWZlYyJ9LCJpYXQiOjE1Mzg4NDE3MTR9.UsmrPVLk3XaeJje2kXRuEobSsOdGEp4H80X7cz4Ez20','3539989B82',1,NULL,'0000-00-00 00:00:00','','0000-00-00 00:00:00','',0,NULL),(7,1,'test2','$2a$10$H110ku5ldPhWPZVJQMGwfucOnjMQj7RtYIov8TPsDXpeKgjGNtcle','Mr','Jeffery','Sins','Mata','Sr','+63947-999-03','',NULL,NULL,NULL,4,'2018080811LtMmXCvKPcK70932AM',NULL,NULL,1,NULL,'0000-00-00 00:00:00','','0000-00-00 00:00:00','',0,NULL),(8,13,'asdasd','$2a$10$UC2wytRaFZ4kkulBOWgWW.toO33tqfHKCKxvtJ3fJTOrG3j4OqTDq','Mr','asd','_asd','_asdasd','_asd','+63234-234-2342','',NULL,NULL,NULL,3,'2018080811eriUMvskP3s91529AM',NULL,NULL,1,'2018-09-07','0000-00-00 00:00:00','','0000-00-00 00:00:00','',0,NULL),(9,22,'test_agent','$2a$10$c3mPw2RPUQVfxEzlNr1SAujKVdErqV1ViEFVGV1KE0ydeyeWjC8.S','Mr','Agent Branch','Test','Branches','','+63966-532-3232','232-302-3620',NULL,NULL,NULL,NULL,'2018091703fg4lgoQcXSmf5222AM',NULL,NULL,4,'2018-09-17','2018-09-17 03:52:22','Portal Administrator','2018-10-01 12:41:56','',0,NULL),(10,22,'agent_branch','$2a$10$z8z1MIJDRfrF3VLc7k9/b.rfiBdo6sx813kUnEAnu.2OYlcfzHSIe','Mr','Agent Branch','Test','Branches','','+63562-323-2323','233-232-3233',NULL,NULL,NULL,NULL,'2018091701YqG6uAP5Ddtw0728PM',NULL,NULL,1,'2018-10-17','2018-09-17 01:07:28','Portal Administrator','2018-10-02 15:24:55','',0,NULL),(11,13,'TEST11','$2a$10$NZ/T5TGVR5V0K7Yx5dpUM.cNph7Fv7XsLENRINfqcP9j0PYa5THjW','Mr','TEST','TESTT','TEST','','+63+63+63+63636-','356-565-6565','juangamad@gmail.com',NULL,NULL,NULL,'2018092712QS8DFw9xRl1w5727PM',NULL,NULL,1,'2018-09-27','2018-09-27 12:57:27','Portal Administrator','2018-09-27 13:39:35','',0,NULL),(12,22,'BRANCH1','$2a$10$KinDbRT2PSN5M91nPu64vu39NX3DpbnOLK4GDKq.AhP1MslVC9ZCO','Miss','TEST','D','BRANCH','','+63912-123-4556','','fernandezjuly14@gmail.com',NULL,NULL,NULL,'2018100410pvAIZdyVZGJT3158PM',NULL,NULL,1,'2018-11-04','2018-10-04 10:31:58','Portal Administrator','2018-10-05 02:21:59','',0,NULL),(13,21,'CEUNIT1','$2a$10$PIlZWXKIuzd0/0.0QeWrNOBkmCIXWn1TAu5tQgceykJDJHjCKHuFG','Mr','CENTRAL','D','UNIT','','+63912-345-6788','','a@gmail.com',NULL,NULL,NULL,'2018100410JssATyO7IO3T3704PM',NULL,NULL,1,'2018-10-04','2018-10-04 10:37:04','Portal Administrator','2018-10-06 21:56:42','',1,NULL),(14,17,'BRANCH2','$2a$10$yiRR1Ue8o2nM5xZZ3KIo..SZlLIJMYvNShiNItYPIMXqKc1Z3jTbe','Mr','TEST','TEST','BRANCH TWO','','+63030-312-3131','313-131-3131','branch3@email.com',NULL,NULL,NULL,'2018100410ofqxaVY0807d4358PM',NULL,NULL,1,'2018-10-04','2018-10-04 10:43:58','Portal Administrator','2018-10-04 22:46:35','',0,NULL),(15,22,'CENTRALUNIT01','$2a$10$UX.H5syxlecHWT7aPxw0oOiodP7sBydJgYtMxUi.wWBwgb6QZuudG','Mr','DAFIVE','FIVE','CENTRAL UNIT','','+63916-123-4567','002-123-4567','arleneolarte_11@yahoo.com',NULL,NULL,NULL,'2018100512UWMwBCKdXzFA5840AM',NULL,NULL,1,'2018-11-04','2018-10-05 12:58:40','Portal Administrator','2018-10-05 01:15:56','',0,NULL),(16,22,'BRANCH01','$2a$10$fFpA90cSqW7b6zCDV8ohou1oyWAKA.SNNryCNz1L5uS8ZNvb3K3Qu','Mr','BRANCH','DA','FIVE','','+63910-123-4567','002-123-4567','anavarro@yahoo.com',NULL,NULL,NULL,'20181005018GVcol4USD1e0125AM',NULL,NULL,1,'2018-11-04','2018-10-05 01:01:25','Portal Administrator','2018-10-05 01:07:30','',0,NULL),(17,22,'TEST22','$2a$10$Ul3Tu1aFAuDIkBZUvNXR8e.g5JKFHt0ubMenjllMLQQbBHtQgXTwO','Mr','JASON','RULETE','BUSA','','+63926-232-6232','','jason_rulete@gmail.com',NULL,'2018-10-05 22:08:20',NULL,'2018100508dS0lqPcJYzai3256PM',NULL,NULL,1,'2018-11-04','2018-10-05 08:32:56','Portal Administrator','2018-10-06 08:18:06','',0,NULL),(18,21,'TEST33','$2a$10$vv/UknKyTIy8JcxV40CsS.NxnwVKLXCETXX3b4gQ6GLgjfmu0//fq','Mr','JUAN','DELA','CRUZ','','+63947-999-0391','','juan_delacruz@gmail.com',NULL,NULL,NULL,'2018100508fjT7WmogzAnA3443PM',NULL,NULL,1,'2018-11-05','2018-10-05 08:34:43','Portal Administrator','2018-10-06 10:24:42','',0,NULL),(19,17,'BETH2018','$2a$10$QLLstkK4n4Phx7amo1W21uSMIERYuTD1RMhVmvYnFge6zH5zVng7G','Mr','ELIZABETH','MEDINA','SANTOS','','+63910-123-4567','002-123-4567','elizabeth@yahoo.com',NULL,NULL,NULL,'2018100609fduPP078wq9l0044PM',NULL,NULL,1,'2018-10-06','2018-10-06 09:00:44','Portal Administrator','2018-10-06 21:02:45','',0,NULL),(20,21,'MANUEL2018','$2a$10$p2dG6z48mkA6o/z7nf7VpO5cuZBiM3KZd.Om60.bL1e/n0hPuNW0m','Mr','MANUEL','OBANOS','OJASCASTRO','','+63910-123-4567','002-123-4567','manuel@yahoo.com',NULL,NULL,NULL,'2018100609gEj6xEXEZOjx0314PM',NULL,NULL,1,'2018-11-05','2018-10-06 09:03:14','Portal Administrator','2018-10-07 00:19:40','',0,NULL),(21,22,'LOURDES2018','$2a$10$7JRRzsPKMDv7KeHpqIxL3.7vA7vSBws3WsZBje81tUjZlZ9/wOSeu','Miss','LOURDES','LAZO','MAYNES','','+63915-123-4567','002-123-4567','lourdes@yahoo.com',NULL,NULL,NULL,'2018100609WBaZ62oFGq0L0524PM',NULL,NULL,1,'2018-11-05','2018-10-06 09:05:24','Portal Administrator','2018-10-07 00:23:41','',0,NULL),(22,21,'TEST44','$2a$10$4dOhv8KPWnlnN.XwyWAoWOgbkSq7tABkGq4FPdfmxbRrDopn/vs8y','Mr',' TEST','TEST','TESTTEST','','+63789-756-5656','','test44@email.com',NULL,NULL,NULL,'201810060904Mxd8fz0Sca1359PM',NULL,NULL,1,'2018-10-06','2018-10-06 09:13:59','Portal Administrator','2018-10-06 21:14:54','',0,NULL),(23,22,'CEUNIT3','$2a$10$fs2p.uEOkpcmm3doTwDoruh.0ZExF48Y5dMKU428QECPJUZFPDWh6','Mr','SAMPLE','A','ACCESS','','+63123-456-7888','','a@sample.com',NULL,NULL,NULL,'2018100609BXNgDlAsYwCm1754PM',NULL,NULL,1,'2018-10-06','2018-10-06 09:17:54','Portal Administrator','2018-10-06 21:56:54','',2,NULL);

/*Table structure for table `cm_usertokens` */

DROP TABLE IF EXISTS `cm_usertokens`;

CREATE TABLE `cm_usertokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `expiresIn` datetime NOT NULL,
  `refreshToken` text NOT NULL,
  `lastlogin` datetime NOT NULL,
  `logindevice` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_usertokens` */

/*Table structure for table `cm_withdrawals` */

DROP TABLE IF EXISTS `cm_withdrawals`;

CREATE TABLE `cm_withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiontype_id` smallint(2) DEFAULT NULL,
  `transcode` varchar(35) DEFAULT NULL,
  `card_id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `terminal_id` smallint(1) NOT NULL,
  `transdate` datetime NOT NULL,
  `remaining_balance` decimal(12,2) NOT NULL,
  `withdrawal_amount` decimal(12,2) NOT NULL,
  `current_balance` decimal(12,2) NOT NULL,
  `status_id` smallint(1) NOT NULL,
  `posimei` varchar(35) DEFAULT NULL,
  `pricessed_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cm_withdrawals` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
