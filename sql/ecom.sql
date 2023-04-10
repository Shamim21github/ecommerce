-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.17-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema test
--

CREATE DATABASE IF NOT EXISTS test;
USE test;

--
-- Temporary table structure for view `product_view`
--
DROP TABLE IF EXISTS `product_view`;
DROP VIEW IF EXISTS `product_view`;
CREATE TABLE `product_view` (
  `id` int(10),
  `name` varchar(20),
  `price` float,
  `manufacturer` varchar(20)
);

--
-- Definition of table `abc`
--

DROP TABLE IF EXISTS `abc`;
CREATE TABLE `abc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc`
--

/*!40000 ALTER TABLE `abc` DISABLE KEYS */;
INSERT INTO `abc` (`id`,`name`,`type`) VALUES 
 (1,'Jahid',1);
/*!40000 ALTER TABLE `abc` ENABLE KEYS */;


--
-- Definition of table `abc_users`
--

DROP TABLE IF EXISTS `abc_users`;
CREATE TABLE `abc_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_users`
--

/*!40000 ALTER TABLE `abc_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `abc_users` ENABLE KEYS */;


--
-- Definition of table `ac_trans`
--

DROP TABLE IF EXISTS `ac_trans`;
CREATE TABLE `ac_trans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned NOT NULL,
  `amount` float NOT NULL,
  `memo` varchar(45) NOT NULL,
  `trans_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_trans`
--

/*!40000 ALTER TABLE `ac_trans` DISABLE KEYS */;
INSERT INTO `ac_trans` (`id`,`account_id`,`amount`,`memo`,`trans_datetime`) VALUES 
 (1,1,100000,'deposit','0000-00-00 00:00:00'),
 (2,2,50000,'deposit','0000-00-00 00:00:00'),
 (3,1,-50000,'withdraw','0000-00-00 00:00:00'),
 (4,1,-10000,'withdraw','2020-07-10 00:00:00'),
 (5,1,500000,'Loan','2020-07-10 00:00:00');
/*!40000 ALTER TABLE `ac_trans` ENABLE KEYS */;


--
-- Definition of table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE `admission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `course_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

/*!40000 ALTER TABLE `admission` DISABLE KEYS */;
INSERT INTO `admission` (`id`,`student_id`,`course_id`,`created_at`) VALUES 
 (1,1,1,'2020-10-04 18:52:38'),
 (2,2,1,'2020-10-04 18:52:38'),
 (3,1,2,'2020-10-04 18:52:39');
/*!40000 ALTER TABLE `admission` ENABLE KEYS */;


--
-- Definition of table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`,`name`) VALUES 
 (1,'Dhaka'),
 (2,'Khulna'),
 (3,'Barishal'),
 (4,'Rajshaihi');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


--
-- Definition of table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `author` varchar(45) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `photo` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`,`title`,`subject_id`,`author`,`isbn`,`photo`) VALUES 
 (2,'Introducing Mathematics',1,'ABC','234234','introducing-mathematics.jpg'),
 (3,'Windows Application Development using C#.NET',2,'ABC3333434','234234','windows-application-development-using-c-net.PNG'),
 (4,'Windows Application Development using  Python',1,'ABC','234234','windows-application-development-using-python.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


--
-- Definition of table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_number` varchar(45) NOT NULL,
  `offence` varchar(45) NOT NULL,
  `victim` varchar(45) NOT NULL,
  `accuser` varchar(45) NOT NULL,
  `case_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` (`id`,`case_number`,`offence`,`victim`,`accuser`,`case_at`) VALUES 
 (2,'343433222','Stole','Kamalsfsadfsaf','Jahid','2021-01-01 00:00:00');
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;


--
-- Definition of table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`,`name`) VALUES 
 (1,'Sari'),
 (2,'Fish');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


--
-- Definition of table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE `children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `age` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` (`id`,`name`,`age`) VALUES 
 (3,'Munna',3),
 (6,'Raju',44),
 (7,'Banana33',3);
/*!40000 ALTER TABLE `children` ENABLE KEYS */;


--
-- Definition of table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`,`name`,`state_id`) VALUES 
 (1,'Dhaka',1),
 (2,'Khulna',1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


--
-- Definition of table `city2`
--

DROP TABLE IF EXISTS `city2`;
CREATE TABLE `city2` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `name` varchar(45) NOT NULL,
  `state_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city2`
--

/*!40000 ALTER TABLE `city2` DISABLE KEYS */;
INSERT INTO `city2` (`id`,`name`,`state_id`) VALUES 
 (1,'Dhaka',1),
 (2,'Khulna',1);
/*!40000 ALTER TABLE `city2` ENABLE KEYS */;


--
-- Definition of table `core_books`
--

DROP TABLE IF EXISTS `core_books`;
CREATE TABLE `core_books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_books`
--

/*!40000 ALTER TABLE `core_books` DISABLE KEYS */;
INSERT INTO `core_books` (`id`,`name`,`author`,`price`) VALUES 
 (1,'Introducing PHP','IsDB',1000);
/*!40000 ALTER TABLE `core_books` ENABLE KEYS */;


--
-- Definition of table `core_countries`
--

DROP TABLE IF EXISTS `core_countries`;
CREATE TABLE `core_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `abbr` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_countries`
--

/*!40000 ALTER TABLE `core_countries` DISABLE KEYS */;
INSERT INTO `core_countries` (`id`,`name`,`abbr`) VALUES 
 (1,'Bangladesh','bd'),
 (2,'United Kingdom','uk'),
 (3,'United States','us'),
 (4,'India','in'),
 (5,'France','fr'),
 (6,'Germany','de'),
 (7,'Australia','au');
/*!40000 ALTER TABLE `core_countries` ENABLE KEYS */;


--
-- Definition of table `core_customers`
--

DROP TABLE IF EXISTS `core_customers`;
CREATE TABLE `core_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(50) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `apartment` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_customers`
--

/*!40000 ALTER TABLE `core_customers` DISABLE KEYS */;
INSERT INTO `core_customers` (`id`,`name`,`mobile`,`email`,`created_at`,`updated_at`,`password`,`country_id`,`street_address`,`city`,`postcode`,`apartment`) VALUES 
 (1,'Jahidul Islam','45345435435','jahid@yahoo.com','2021-12-14 12:43:13','2021-12-14 12:43:13','111111',2,'Building 12, Road 1, Block E, Banasree','Rampur, Dhaka','1219','Ground Floor'),
 (2,'Rejaul Karim','4353445546','Reza@yahoo.com','2021-12-14 12:43:13','2021-12-14 12:43:13','111111',1,'fssa','Dhaka','1219',NULL),
 (3,'Niyamot','3434343','niyamot@yahoo.com','2021-12-14 06:44:25','2021-12-14 06:44:25','111111',1,'sfsaf','Dhaka','1219',NULL),
 (4,'Kamrul','23432432423','kamrul@gmail.com','2022-02-14 23:11:33','2022-02-14 23:11:33','111111',1,'ert','Dhaka','1219',NULL),
 (5,'Silvia','34324232','silvia@gmail.com','2022-02-14 23:13:24','2022-02-14 23:13:24','111111',1,'sdfdsaf','Dhaka','1219',NULL);
/*!40000 ALTER TABLE `core_customers` ENABLE KEYS */;


--
-- Definition of table `core_departments`
--

DROP TABLE IF EXISTS `core_departments`;
CREATE TABLE `core_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_departments`
--

/*!40000 ALTER TABLE `core_departments` DISABLE KEYS */;
INSERT INTO `core_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','Accounts'),
 (2,'20','IT'),
 (3,'30','HR'),
 (4,'40','Sales and Marketing');
/*!40000 ALTER TABLE `core_departments` ENABLE KEYS */;


--
-- Definition of table `core_district`
--

DROP TABLE IF EXISTS `core_district`;
CREATE TABLE `core_district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `division_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_district`
--

/*!40000 ALTER TABLE `core_district` DISABLE KEYS */;
INSERT INTO `core_district` (`id`,`name`,`division_id`) VALUES 
 (1,'Narayangang',1),
 (2,'Nonakhali',3),
 (3,'Feni',3),
 (4,'Tingile',1),
 (5,'Gajipur',1),
 (6,'Potuakhali',2),
 (7,'Dhaka',1);
/*!40000 ALTER TABLE `core_district` ENABLE KEYS */;


--
-- Definition of table `core_division`
--

DROP TABLE IF EXISTS `core_division`;
CREATE TABLE `core_division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_division`
--

/*!40000 ALTER TABLE `core_division` DISABLE KEYS */;
INSERT INTO `core_division` (`id`,`name`) VALUES 
 (1,'Dhaka'),
 (2,'Borishal'),
 (3,'Chottrogram');
/*!40000 ALTER TABLE `core_division` ENABLE KEYS */;


--
-- Definition of table `core_heros`
--

DROP TABLE IF EXISTS `core_heros`;
CREATE TABLE `core_heros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_heros`
--

/*!40000 ALTER TABLE `core_heros` DISABLE KEYS */;
INSERT INTO `core_heros` (`id`,`name`) VALUES 
 (1,'Asia Rahmaneee'),
 (45,'Jahidul Islamee'),
 (49,'Asia Rahman');
/*!40000 ALTER TABLE `core_heros` ENABLE KEYS */;


--
-- Definition of table `core_manufacturers`
--

DROP TABLE IF EXISTS `core_manufacturers`;
CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_manufacturers`
--

/*!40000 ALTER TABLE `core_manufacturers` DISABLE KEYS */;
INSERT INTO `core_manufacturers` (`id`,`name`) VALUES 
 (1,'APCL'),
 (2,'ISL'),
 (3,'IDB');
/*!40000 ALTER TABLE `core_manufacturers` ENABLE KEYS */;


--
-- Definition of table `core_order_details`
--

DROP TABLE IF EXISTS `core_order_details`;
CREATE TABLE `core_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_order_details`
--

/*!40000 ALTER TABLE `core_order_details` DISABLE KEYS */;
INSERT INTO `core_order_details` (`id`,`order_id`,`product_id`,`qty`,`price`,`vat`,`discount`,`created_at`,`updated_at`) VALUES 
 (1,1,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (2,1,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (3,2,18,4,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (4,2,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (5,3,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (6,3,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (7,4,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (8,4,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (9,5,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (10,14,18,1,30,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (11,14,17,1,15,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (12,15,18,1,40,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (13,15,17,2,16,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (14,16,28,1,5000,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (15,16,29,1,342,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (16,17,29,1,342,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (17,17,28,1,5000,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,17,20,1,110,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (19,18,28,10,5000,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (20,19,30,1,7999,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (21,19,31,1,4444,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (22,19,20,1,110,0,0,'2022-01-08 09:05:55','2022-01-08 09:05:55'),
 (23,20,29,1,342,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (24,20,20,1,110,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (25,20,30,1,7999,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (26,20,32,1,5555,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (27,21,29,1,342,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (28,21,28,1,5000,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (29,21,31,1,4444,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (30,21,32,2,5555,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (31,21,30,1,7999,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (32,21,20,1,110,0,0,'2022-01-08 09:07:28','2022-01-08 09:07:28');
/*!40000 ALTER TABLE `core_order_details` ENABLE KEYS */;


--
-- Definition of table `core_orders`
--

DROP TABLE IF EXISTS `core_orders`;
CREATE TABLE `core_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_orders`
--

/*!40000 ALTER TABLE `core_orders` DISABLE KEYS */;
INSERT INTO `core_orders` (`id`,`customer_id`,`order_date`,`delivery_date`,`shipping_address`,`order_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`,`created_at`,`updated_at`) VALUES 
 (1,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (2,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (3,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (4,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (5,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (6,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:01:16','2021-12-14 07:01:16'),
 (7,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:02:07','2021-12-14 07:02:07'),
 (8,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:03:51','2021-12-14 07:03:51'),
 (9,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:05:32','2021-12-14 07:05:32'),
 (10,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:06:21','2021-12-14 07:06:21'),
 (11,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:07:13','2021-12-14 07:07:13'),
 (12,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:10:25','2021-12-14 07:10:25'),
 (13,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:13:06','2021-12-14 07:13:06'),
 (14,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (15,3,'2021-12-15 00:00:00','2021-12-15 00:00:00','Rampura',0,0,'Testing',1,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (16,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (17,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (19,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (20,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (21,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27');
/*!40000 ALTER TABLE `core_orders` ENABLE KEYS */;


--
-- Definition of table `core_persons`
--

DROP TABLE IF EXISTS `core_persons`;
CREATE TABLE `core_persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_persons`
--

/*!40000 ALTER TABLE `core_persons` DISABLE KEYS */;
INSERT INTO `core_persons` (`id`,`name`,`position_id`,`sex`,`dob`,`doj`,`mobile`,`address`,`inactive`) VALUES 
 (1,'Jahidul Islam',1,0,'2000-01-01','2021-01-01','677657657567','Rampura',0);
/*!40000 ALTER TABLE `core_persons` ENABLE KEYS */;


--
-- Definition of table `core_positions`
--

DROP TABLE IF EXISTS `core_positions`;
CREATE TABLE `core_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_positions`
--

/*!40000 ALTER TABLE `core_positions` DISABLE KEYS */;
INSERT INTO `core_positions` (`id`,`name`,`grade`,`department_id`) VALUES 
 (1,'Programmer',6,2),
 (2,'System Analyst',3,1);
/*!40000 ALTER TABLE `core_positions` ENABLE KEYS */;


--
-- Definition of table `core_prescription_details`
--

DROP TABLE IF EXISTS `core_prescription_details`;
CREATE TABLE `core_prescription_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `timetable` varchar(45) NOT NULL,
  `dose` varchar(45) NOT NULL,
  `uom` varchar(45) NOT NULL,
  `days` varchar(45) NOT NULL,
  `suggestions` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_prescription_details`
--

/*!40000 ALTER TABLE `core_prescription_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_prescription_details` ENABLE KEYS */;


--
-- Definition of table `core_prescription_medicines`
--

DROP TABLE IF EXISTS `core_prescription_medicines`;
CREATE TABLE `core_prescription_medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_prescription_medicines`
--

/*!40000 ALTER TABLE `core_prescription_medicines` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_prescription_medicines` ENABLE KEYS */;


--
-- Definition of table `core_prescriptions`
--

DROP TABLE IF EXISTS `core_prescriptions`;
CREATE TABLE `core_prescriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` text NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `cc` text DEFAULT NULL,
  `oe` text DEFAULT NULL,
  `aa` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_prescriptions`
--

/*!40000 ALTER TABLE `core_prescriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_prescriptions` ENABLE KEYS */;


--
-- Definition of table `core_product_categories`
--

DROP TABLE IF EXISTS `core_product_categories`;
CREATE TABLE `core_product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_categories`
--

/*!40000 ALTER TABLE `core_product_categories` DISABLE KEYS */;
INSERT INTO `core_product_categories` (`id`,`name`,`section_id`,`created_at`,`updated_at`,`inactive`) VALUES 
 (2,'Hot Products',3,'2022-12-18 18:49:43',NULL,0),
 (3,'Laptops',3,'2022-12-19 15:42:46',NULL,0),
 (4,'TV & Audio',3,'2022-12-19 15:42:46',NULL,0),
 (5,'Smartphone',1,'2022-12-19 15:42:46',NULL,0),
 (6,'Trending Products',1,'2022-12-19 15:42:57',NULL,0),
 (7,'Mobile Phone',1,'2022-12-19 15:43:41',NULL,1),
 (8,'Sound & Vision',1,'2022-12-19 15:43:41',NULL,1),
 (9,'Women\'s',2,'2022-12-19 15:43:41',NULL,1),
 (10,'Men\'s',2,'2022-12-19 15:43:41',NULL,1),
 (11,'Kids',2,'2022-12-19 15:43:41',NULL,1),
 (12,'Cosmatics',4,'2022-12-19 15:43:41',NULL,1);
/*!40000 ALTER TABLE `core_product_categories` ENABLE KEYS */;


--
-- Definition of table `core_product_sections`
--

DROP TABLE IF EXISTS `core_product_sections`;
CREATE TABLE `core_product_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_product_sections`
--

/*!40000 ALTER TABLE `core_product_sections` DISABLE KEYS */;
INSERT INTO `core_product_sections` (`id`,`name`,`unit_id`,`photo`,`icon`) VALUES 
 (1,'Prime Video',1,NULL,NULL),
 (2,'Computers',1,NULL,NULL),
 (3,'Electornics',1,NULL,NULL),
 (4,'ChamCham',2,NULL,NULL),
 (5,'Meito',2,NULL,NULL),
 (6,'Sony Bravia',2,NULL,NULL),
 (7,'Camera Accessorices',3,NULL,NULL),
 (8,'XailStation',3,NULL,NULL);
/*!40000 ALTER TABLE `core_product_sections` ENABLE KEYS */;


--
-- Definition of table `core_product_units`
--

DROP TABLE IF EXISTS `core_product_units`;
CREATE TABLE `core_product_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_product_units`
--

/*!40000 ALTER TABLE `core_product_units` DISABLE KEYS */;
INSERT INTO `core_product_units` (`id`,`name`,`photo`,`icon`) VALUES 
 (1,'Laptops',NULL,NULL),
 (2,'TV & Audio',NULL,NULL),
 (3,'Smartphone',NULL,NULL),
 (4,'Cameras',NULL,NULL),
 (5,'Headphone',NULL,NULL),
 (6,'Smartwatch',NULL,NULL),
 (7,'Out Door Room',NULL,NULL),
 (8,'Charmcham',NULL,NULL),
 (9,'Mobile & Tablets',NULL,NULL),
 (10,'Accessories',NULL,NULL);
/*!40000 ALTER TABLE `core_product_units` ENABLE KEYS */;


--
-- Definition of table `core_products`
--

DROP TABLE IF EXISTS `core_products`;
CREATE TABLE `core_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(350) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) unsigned DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) unsigned NOT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_barcode` (`barcode`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_products`
--

/*!40000 ALTER TABLE `core_products` DISABLE KEYS */;
INSERT INTO `core_products` (`id`,`name`,`offer_price`,`manufacturer_id`,`regular_price`,`description`,`photo`,`category_id`,`section_id`,`is_featured`,`star`,`is_brand`,`offer_discount`,`uom_id`,`weight`,`barcode`,`created_at`,`updated_at`) VALUES 
 (36,'HP Monitor 14 inch',12000,1,3000,'','36.jpg',2,1,1,5,1,0,1,0,'4456342342','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (39,'Dell Monitor 19 inch',333,1,333,'','39.jpg',2,3,0,2,0,2,2,4,'3432433','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (40,'Apple iPad 10 inch',222,2,222,'','40.jpg',2,3,0,1,0,1,2,2,'34242323','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (42,'Sony Head Phone',4000,3,4000,'Hp Notebook','42.jpg',2,1,0,0,0,0,3,0,'4325364','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (43,'Portable 360 degree Camera ',40000,3,30000,'Black','43.jpg',2,1,0,1,0,0,3,1,'45645','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (45,'Game Controller 34',120,1,150,'Game Controller','45.jpg',2,1,0,0,0,0,1,0,'1234','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (46,'Samsung Mobile 33 ',180,1,200,'Samsung Mobile','46.jpg',2,1,0,0,0,0,1,0,'2222','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (47,'Samsung Galaxy 2022',999,3,1000,'Samsung Galaxy 2022','47.jpg',2,1,0,0,0,0,3,0,'123abc','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (48,'Game Controller 100',5000,3,3300,'Game Controller 100','48.jpg',3,1,0,0,0,0,1,0,'123098','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (49,'Samsung Galaxy 2023',20000,1,20000,'','mobile2-jpg.jpg',5,1,1,3,0,0,1,0,'3343','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (50,'Symphony 34',4333,1,4666,'','mobile1-jpg.jpg',5,1,1,0,1,0,1,0,'45435345','2022-12-19 17:10:57','2022-12-19 17:10:57'),
 (51,'Samsung Tab A34',20000,1,20000,'','tab1-jpg.jpg',5,1,1,0,1,0,1,0,'3424234','2022-12-19 17:12:42','2022-12-19 17:12:42'),
 (52,'Samsung Headphone',3433,1,34343,'','52.jpg',5,1,1,0,1,0,1,0,'34534','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (53,'Dell Laptop',50000,1,50000,'','53.jpg',3,1,1,0,1,0,1,0,'454554545','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (54,'HP Laptop 19 inch',60000,1,60000,'','54.jpg',3,1,1,0,1,0,1,0,'534343432','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (55,'Lenovo Laptop 12 inch ',40000,1,40000,'','711jgf2lhpl-ac-sy355-jpg.jpg',3,1,1,0,1,0,1,0,'46534522','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `core_products` ENABLE KEYS */;


--
-- Definition of table `core_purchase_details`
--

DROP TABLE IF EXISTS `core_purchase_details`;
CREATE TABLE `core_purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchase_details`
--

/*!40000 ALTER TABLE `core_purchase_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_purchase_details` ENABLE KEYS */;


--
-- Definition of table `core_purchases`
--

DROP TABLE IF EXISTS `core_purchases`;
CREATE TABLE `core_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `vat` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchases`
--

/*!40000 ALTER TABLE `core_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_purchases` ENABLE KEYS */;


--
-- Definition of table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_roles`
--

/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` (`id`,`name`,`updated_at`,`created_at`) VALUES 
 (1,'Admin','2021-12-30 15:10:10','2021-12-30 15:10:19');
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;


--
-- Definition of table `core_sections`
--

DROP TABLE IF EXISTS `core_sections`;
CREATE TABLE `core_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_sections`
--

/*!40000 ALTER TABLE `core_sections` DISABLE KEYS */;
INSERT INTO `core_sections` (`id`,`name`) VALUES 
 (1,'Electronices'),
 (2,'Clothings'),
 (3,'Food and Beverages'),
 (4,'Health & Beauty'),
 (5,'Sports & Leisure'),
 (6,'Books & Entertainments');
/*!40000 ALTER TABLE `core_sections` ENABLE KEYS */;


--
-- Definition of table `core_site_album_details`
--

DROP TABLE IF EXISTS `core_site_album_details`;
CREATE TABLE `core_site_album_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_album_id` int(10) unsigned NOT NULL,
  `photo` varchar(345) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_album_details`
--

/*!40000 ALTER TABLE `core_site_album_details` DISABLE KEYS */;
INSERT INTO `core_site_album_details` (`id`,`site_album_id`,`photo`,`name`,`description`,`inactive`) VALUES 
 (1,1,'./uploads/posts/1548841158.jpg','Intellect Software Ltd','Leading Software Company',0),
 (2,1,'./uploads/posts/1548843065.jpg','Intellect Cloud POS','Intellect Enterprise Resource Planning (ERP) is business management&#8230;',0),
 (3,1,'./uploads/posts/1548841332.jpg','Education and Training','For many people, gaining new skills through accredited&#8230;',0),
 (4,2,'./uploads/posts/1548867137.svg','Food and Beverage',NULL,0),
 (5,2,'./uploads/posts/1548867301.svg','Retail Goods',NULL,0),
 (6,2,'./uploads/posts/1548867424.svg','Energy, Oil and Gas',NULL,0),
 (7,2,'./uploads/posts/1548867363.svg','Chemical Goods',NULL,0),
 (8,2,'./uploads/posts/1548867453.svg','Consumer Packaged Goods',NULL,0),
 (9,3,'./uploads/posts/15488786820.jpg','Screenshot1',NULL,0),
 (10,3,'./uploads/posts/15488786821.jpg','Screenshot2',NULL,0),
 (11,4,'./uploads/posts/15488797600.jpg','POS1',NULL,0),
 (12,4,'./uploads/posts/15488797601.jpg','POS2',NULL,0),
 (13,4,'./uploads/posts/15488797602.jpg','POS3',NULL,0);
/*!40000 ALTER TABLE `core_site_album_details` ENABLE KEYS */;


--
-- Definition of table `core_site_albums`
--

DROP TABLE IF EXISTS `core_site_albums`;
CREATE TABLE `core_site_albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_albums`
--

/*!40000 ALTER TABLE `core_site_albums` DISABLE KEYS */;
INSERT INTO `core_site_albums` (`id`,`name`,`created_at`,`description`,`photo`) VALUES 
 (1,'Main Slider',NULL,'Na',NULL),
 (2,'INDUSTRY SECTORS',NULL,'We cover different industry sectors, from food and beverage, chemical, retail, durable goods and more. Check the full list.',NULL),
 (3,'Screenshot - Home Page',NULL,NULL,NULL),
 (4,'POS',NULL,NULL,NULL);
/*!40000 ALTER TABLE `core_site_albums` ENABLE KEYS */;


--
-- Definition of table `core_site_attributes`
--

DROP TABLE IF EXISTS `core_site_attributes`;
CREATE TABLE `core_site_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_attributes`
--

/*!40000 ALTER TABLE `core_site_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_site_attributes` ENABLE KEYS */;


--
-- Definition of table `core_site_clients`
--

DROP TABLE IF EXISTS `core_site_clients`;
CREATE TABLE `core_site_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `review` text DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_clients`
--

/*!40000 ALTER TABLE `core_site_clients` DISABLE KEYS */;
INSERT INTO `core_site_clients` (`id`,`name`,`photo`,`review`,`website`) VALUES 
 (1,'Karnaphuli Group','1548871087-png.png','Na','https://www.karnaphuli.com/'),
 (2,'Doreen','1548871127-png.png','Na','https://doreen.com/');
/*!40000 ALTER TABLE `core_site_clients` ENABLE KEYS */;


--
-- Definition of table `core_site_menu_sub_details`
--

DROP TABLE IF EXISTS `core_site_menu_sub_details`;
CREATE TABLE `core_site_menu_sub_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `site_menu_sub_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_menu_sub_details`
--

/*!40000 ALTER TABLE `core_site_menu_sub_details` DISABLE KEYS */;
INSERT INTO `core_site_menu_sub_details` (`id`,`name`,`link`,`site_menu_sub_id`) VALUES 
 (1,'Grocery','#',1);
/*!40000 ALTER TABLE `core_site_menu_sub_details` ENABLE KEYS */;


--
-- Definition of table `core_site_menu_subs`
--

DROP TABLE IF EXISTS `core_site_menu_subs`;
CREATE TABLE `core_site_menu_subs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_menu_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_menu_subs`
--

/*!40000 ALTER TABLE `core_site_menu_subs` DISABLE KEYS */;
INSERT INTO `core_site_menu_subs` (`id`,`site_menu_id`,`name`,`link`,`has_child`) VALUES 
 (1,2,'POS ERP','pos-erp',0),
 (2,2,'ERP-Garments','garment-erp',0),
 (3,2,'ERP-General Insurance','general-insurance-erp',0),
 (4,2,'ERP-Education','education-erp',0),
 (5,2,'ERP Manufacturing','manufacturing-erp',0),
 (6,2,'ERP Hospital','hospital-erp',0),
 (7,2,'ERP Texttile','texttile-erp',0),
 (8,2,'ERP Real Estate','real-estate-erp',0),
 (9,8,'Web publising','webpublishing',0),
 (10,8,'Javascript Library','javascript-library',0),
 (11,8,'Server Side','server-side',0);
/*!40000 ALTER TABLE `core_site_menu_subs` ENABLE KEYS */;


--
-- Definition of table `core_site_menus`
--

DROP TABLE IF EXISTS `core_site_menus`;
CREATE TABLE `core_site_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `inactive` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_menus`
--

/*!40000 ALTER TABLE `core_site_menus` DISABLE KEYS */;
INSERT INTO `core_site_menus` (`id`,`name`,`link`,`has_child`,`inactive`) VALUES 
 (1,'Home','/',0,0),
 (2,'Software','./software.html',1,0),
 (3,'Service','./service.html',0,0),
 (4,'Partner','./partner.html',0,0),
 (5,'Client','./client.html',0,0),
 (6,'About','./about.html',0,0),
 (7,'Contact','/contact.html',0,0),
 (8,'Blog','./blog.html',1,0);
/*!40000 ALTER TABLE `core_site_menus` ENABLE KEYS */;


--
-- Definition of table `core_site_pages`
--

DROP TABLE IF EXISTS `core_site_pages`;
CREATE TABLE `core_site_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `slug` varchar(145) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_pages`
--

/*!40000 ALTER TABLE `core_site_pages` DISABLE KEYS */;
INSERT INTO `core_site_pages` (`id`,`name`,`link`,`inactive`,`slug`,`description`,`photo`) VALUES 
 (1,'POS ERP','http',0,NULL,'Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc',NULL);
/*!40000 ALTER TABLE `core_site_pages` ENABLE KEYS */;


--
-- Definition of table `core_site_post_categories`
--

DROP TABLE IF EXISTS `core_site_post_categories`;
CREATE TABLE `core_site_post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_post_categories`
--

/*!40000 ALTER TABLE `core_site_post_categories` DISABLE KEYS */;
INSERT INTO `core_site_post_categories` (`id`,`name`) VALUES 
 (1,'Business'),
 (2,'Software');
/*!40000 ALTER TABLE `core_site_post_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_post_details`
--

DROP TABLE IF EXISTS `core_site_post_details`;
CREATE TABLE `core_site_post_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_post_id` int(10) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_post_details`
--

/*!40000 ALTER TABLE `core_site_post_details` DISABLE KEYS */;
INSERT INTO `core_site_post_details` (`id`,`site_post_id`,`description`,`photo`,`name`) VALUES 
 (1,1,'Product multi-dimensional measurement unit',NULL,NULL),
 (2,1,'Convenience of buying and selling products according to batch / lot\r\n                                        number',NULL,NULL),
 (3,1,'Advantages of Product Metrics',NULL,NULL),
 (4,1,'Business data will never be lost or ',NULL,NULL),
 (5,1,'Buying from multiple branches can be sold through the same software',NULL,NULL),
 (6,1,'The software will never slow down, if the data is high or even from the remote\r\n                                        location.',NULL,NULL),
 (7,2,'Accounting Management',NULL,NULL),
 (8,2,'Payroll Management',NULL,NULL),
 (9,2,' Inventory Management',NULL,NULL),
 (10,2,'Purchase Management',NULL,NULL),
 (11,2,'Production & Distribution Management',NULL,NULL),
 (12,2,' Human Resource Management',NULL,NULL),
 (13,2,' Customer Relationship Management',NULL,NULL),
 (14,2,'Sales Management',NULL,NULL),
 (15,2,'Barcode Creator',NULL,NULL),
 (16,2,'Cloud Backup Server',NULL,NULL),
 (17,4,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos. Nulla nunc dui, tristique in semper vel.',NULL,'Super Design Layout '),
 (18,4,'Intellect Cloud pos software can be automated update after the release new\r\n                                        version of software. Update for the better performace and better userfriendly.',NULL,'Regular Updates & Support'),
 (19,4,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos nulla nunc dui.',NULL,'Responsive Web Design');
/*!40000 ALTER TABLE `core_site_post_details` ENABLE KEYS */;


--
-- Definition of table `core_site_posts`
--

DROP TABLE IF EXISTS `core_site_posts`;
CREATE TABLE `core_site_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(245) DEFAULT NULL,
  `site_album_id` int(10) unsigned DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `post_category_id` int(10) unsigned DEFAULT NULL,
  `post_page_id` int(10) unsigned DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_posts`
--

/*!40000 ALTER TABLE `core_site_posts` DISABLE KEYS */;
INSERT INTO `core_site_posts` (`id`,`name`,`description`,`slug`,`site_album_id`,`inactive`,`post_category_id`,`post_page_id`,`photo`) VALUES 
 (1,'Explain why its best','There are several kind of information we have for why we are best. Some the best features\r\n                                we provide for you that are the world wide challenging features. Some best features are\r\n                                given below.',NULL,3,0,1,1,NULL),
 (2,'Great way to Include with POS','With integrated POS software, the following business software is listed together.',NULL,4,0,1,1,NULL),
 (3,'ERP - POS','Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc',NULL,5,0,1,1,'./uploads/posts/1548843653.jpg'),
 (4,'Intellect Cloud POS Software - features','Responsive & optimized for mobile devices. Completely without coding skills!',NULL,NULL,0,NULL,NULL,'./uploads/posts/15488780820.jpg');
/*!40000 ALTER TABLE `core_site_posts` ENABLE KEYS */;


--
-- Definition of table `core_site_product_campaigns`
--

DROP TABLE IF EXISTS `core_site_product_campaigns`;
CREATE TABLE `core_site_product_campaigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `photo` varchar(45) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_site_product_campaigns`
--

/*!40000 ALTER TABLE `core_site_product_campaigns` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_site_product_campaigns` ENABLE KEYS */;


--
-- Definition of table `core_site_product_categories`
--

DROP TABLE IF EXISTS `core_site_product_categories`;
CREATE TABLE `core_site_product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_product_categories`
--

/*!40000 ALTER TABLE `core_site_product_categories` DISABLE KEYS */;
INSERT INTO `core_site_product_categories` (`id`,`name`) VALUES 
 (1,'ERP'),
 (2,'OTHER SOFTWARES');
/*!40000 ALTER TABLE `core_site_product_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_product_uoms`
--

DROP TABLE IF EXISTS `core_site_product_uoms`;
CREATE TABLE `core_site_product_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_product_uoms`
--

/*!40000 ALTER TABLE `core_site_product_uoms` DISABLE KEYS */;
INSERT INTO `core_site_product_uoms` (`id`,`name`) VALUES 
 (1,'Piece');
/*!40000 ALTER TABLE `core_site_product_uoms` ENABLE KEYS */;


--
-- Definition of table `core_site_routes`
--

DROP TABLE IF EXISTS `core_site_routes`;
CREATE TABLE `core_site_routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `src` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `site_menu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_route` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_routes`
--

/*!40000 ALTER TABLE `core_site_routes` DISABLE KEYS */;
INSERT INTO `core_site_routes` (`id`,`name`,`src`,`inactive`,`site_menu_id`) VALUES 
 (1,'pos-erp','views/pages/ERP-POS.php',0,2),
 (2,'garment-erp','views/pages/ERP-Garments.php',0,2),
 (3,'education-erp','views/pages/ERP-Education.php',0,2),
 (4,'general-insurance-erp','views/pages/ERP-General-Insurance.php',0,2),
 (5,'manufacturing-erp','views/pages/ERP-Manufacturing.php',0,2),
 (6,'hospital-erp','views/pages/ERP-Hospital.php',0,2),
 (7,'texttile-erp','views/pages/ERP-Textitle.php',0,2),
 (8,'real-estate-erp','views/pages/ERP-Real-Estate.php',0,2),
 (9,'cart','views/pages/cart.php',0,1),
 (10,'checkout','views/pages/checkout.php',0,1),
 (11,'login','views/pages/login.php',0,1),
 (12,'register','views/pages/register.php',0,1),
 (13,'logout','logout.php',0,1);
/*!40000 ALTER TABLE `core_site_routes` ENABLE KEYS */;


--
-- Definition of table `core_site_service_categories`
--

DROP TABLE IF EXISTS `core_site_service_categories`;
CREATE TABLE `core_site_service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_service_categories`
--

/*!40000 ALTER TABLE `core_site_service_categories` DISABLE KEYS */;
INSERT INTO `core_site_service_categories` (`id`,`name`) VALUES 
 (1,'Software Enable Service');
/*!40000 ALTER TABLE `core_site_service_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_services`
--

DROP TABLE IF EXISTS `core_site_services`;
CREATE TABLE `core_site_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `regular_price` float DEFAULT 0,
  `offer_price` float DEFAULT 0,
  `icon` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_site_services`
--

/*!40000 ALTER TABLE `core_site_services` DISABLE KEYS */;
INSERT INTO `core_site_services` (`id`,`name`,`category_id`,`description`,`regular_price`,`offer_price`,`icon`,`inactive`,`photo`) VALUES 
 (1,'Software Quality Assurance',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'./uploads/posts/1548863121.png'),
 (2,'Software forensic',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'./uploads/posts/1548863180.png'),
 (3,'Database Migration',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'./uploads/posts/1548863362.png'),
 (4,'Setup Own Hosting',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'./uploads/posts/1548863484.png'),
 (5,'Cloud Backup Service',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greate',0,0,NULL,0,'./uploads/posts/1548862800.png'),
 (6,'Software Upgrade and Maintenance',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'./uploads/posts/1548863512.png'),
 (7,'Incredibly Responsive',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-laptop v-icon\"></i>',0,NULL),
 (8,'Fully Customizible',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-leaf v-icon\"></i>',0,NULL),
 (9,'Interactive Elements',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-scissors v-icon\"></i>',0,NULL);
/*!40000 ALTER TABLE `core_site_services` ENABLE KEYS */;


--
-- Definition of table `core_status`
--

DROP TABLE IF EXISTS `core_status`;
CREATE TABLE `core_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_status`
--

/*!40000 ALTER TABLE `core_status` DISABLE KEYS */;
INSERT INTO `core_status` (`id`,`name`) VALUES 
 (1,'Processing'),
 (2,'Shifted'),
 (3,'Delivered'),
 (4,'Invoiced');
/*!40000 ALTER TABLE `core_status` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_details`
--

DROP TABLE IF EXISTS `core_stock_adjustment_details`;
CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_details`
--

/*!40000 ALTER TABLE `core_stock_adjustment_details` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_details` (`id`,`adjustment_id`,`product_id`,`qty`,`price`) VALUES 
 (1,2,20,5,400),
 (2,3,20,50,400),
 (3,4,28,70,6650),
 (4,4,20,30,300);
/*!40000 ALTER TABLE `core_stock_adjustment_details` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_types`
--

DROP TABLE IF EXISTS `core_stock_adjustment_types`;
CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_types`
--

/*!40000 ALTER TABLE `core_stock_adjustment_types` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_types` (`id`,`name`,`factor`) VALUES 
 (1,'Is Outdated',-1),
 (2,'Is Damaged',-1),
 (3,'Material Missing',-1),
 (4,'Product Is Obsolete',-1),
 (5,'Existing Inventory',1),
 (6,'Fixed/Found Inventory',1);
/*!40000 ALTER TABLE `core_stock_adjustment_types` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustments`
--

DROP TABLE IF EXISTS `core_stock_adjustments`;
CREATE TABLE `core_stock_adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) unsigned NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) unsigned NOT NULL,
  `werehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustments`
--

/*!40000 ALTER TABLE `core_stock_adjustments` DISABLE KEYS */;
INSERT INTO `core_stock_adjustments` (`id`,`adjustment_at`,`user_id`,`remark`,`adjustment_type_id`,`werehouse_id`) VALUES 
 (1,'2021-12-28 00:00:00',1,'ddd',2,1),
 (2,'2021-12-28 00:00:00',1,'ddd',2,1),
 (3,'2021-12-28 00:00:00',1,'ddddfd',6,1),
 (4,'2021-12-28 00:00:00',1,'NA',6,2);
/*!40000 ALTER TABLE `core_stock_adjustments` ENABLE KEYS */;


--
-- Definition of table `core_stocks`
--

DROP TABLE IF EXISTS `core_stocks`;
CREATE TABLE `core_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stocks`
--

/*!40000 ALTER TABLE `core_stocks` DISABLE KEYS */;
INSERT INTO `core_stocks` (`id`,`product_id`,`qty`,`transaction_type_id`,`remark`,`created_at`,`warehouse_id`) VALUES 
 (1,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (2,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (3,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (4,28,-4,1,'Order','2021-12-28 18:02:36',0),
 (5,17,-2,1,'Order','2021-12-13 11:24:00',0),
 (6,17,-2,1,'Order','2021-12-13 11:38:13',0),
 (7,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (8,17,-1,1,'Order','2021-12-13 11:39:01',0),
 (9,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (10,17,-1,1,'Order','2021-12-13 11:41:14',0),
 (11,28,17,1,'Adjustment','2021-12-28 18:03:12',0),
 (12,17,-2,1,'Order','2021-12-15 13:48:59',0),
 (13,20,-5,1,'Adjustment','2021-12-28 12:49:11',0),
 (14,20,50,1,'Adjustment','2021-12-28 12:54:21',0),
 (15,28,70,1,'Adjustment','2021-12-28 13:13:51',0),
 (16,20,30,1,'Adjustment','2021-12-28 13:13:51',0),
 (17,28,-1,1,'Order','2022-01-06 07:39:11',0),
 (18,29,-1,1,'Order','2022-01-06 07:39:11',0),
 (19,29,-1,1,'Order','2022-01-06 07:43:37',0),
 (20,28,-1,1,'Order','2022-01-06 07:43:37',0),
 (21,20,-1,1,'Order','2022-01-06 07:43:37',0),
 (22,28,-10,1,'Order','2022-01-06 10:14:42',0),
 (23,30,-1,1,'Order','2022-01-08 04:05:54',0),
 (24,31,-1,1,'Order','2022-01-08 04:05:54',0),
 (25,20,-1,1,'Order','2022-01-08 04:05:54',0),
 (26,29,-1,1,'Order','2022-01-08 04:06:58',0),
 (27,20,-1,1,'Order','2022-01-08 04:06:58',0),
 (28,30,-1,1,'Order','2022-01-08 04:06:58',0),
 (29,32,-1,1,'Order','2022-01-08 04:06:58',0),
 (30,29,-1,1,'Order','2022-01-08 04:07:27',0),
 (31,28,-1,1,'Order','2022-01-08 04:07:27',0),
 (32,31,-1,1,'Order','2022-01-08 04:07:27',0),
 (33,32,-2,1,'Order','2022-01-08 04:07:27',0),
 (34,30,-1,1,'Order','2022-01-08 04:07:27',0),
 (35,20,-1,1,'Order','2022-01-08 04:07:27',0);
/*!40000 ALTER TABLE `core_stocks` ENABLE KEYS */;


--
-- Definition of table `core_suppliers`
--

DROP TABLE IF EXISTS `core_suppliers`;
CREATE TABLE `core_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_suppliers`
--

/*!40000 ALTER TABLE `core_suppliers` DISABLE KEYS */;
INSERT INTO `core_suppliers` (`id`,`name`,`mobile`,`email`) VALUES 
 (1,'Md. Shahin','34223423455444','shahin@yahoo.com'),
 (2,'Tauhid Imdad','343254354235433','tauhid@gmail.com');
/*!40000 ALTER TABLE `core_suppliers` ENABLE KEYS */;


--
-- Definition of table `core_transaction_types`
--

DROP TABLE IF EXISTS `core_transaction_types`;
CREATE TABLE `core_transaction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_transaction_types`
--

/*!40000 ALTER TABLE `core_transaction_types` DISABLE KEYS */;
INSERT INTO `core_transaction_types` (`id`,`name`) VALUES 
 (1,'Sales Order'),
 (2,'Sales Return'),
 (3,'Purchase Order'),
 (4,'Purchase Return'),
 (5,'Positive Stock Adjustment'),
 (6,'Negative Stock Adjustment');
/*!40000 ALTER TABLE `core_transaction_types` ENABLE KEYS */;


--
-- Definition of table `core_uom`
--

DROP TABLE IF EXISTS `core_uom`;
CREATE TABLE `core_uom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uom`
--

/*!40000 ALTER TABLE `core_uom` DISABLE KEYS */;
INSERT INTO `core_uom` (`id`,`name`) VALUES 
 (1,'Piece'),
 (2,'Kg'),
 (3,'Pack'),
 (4,'Litter'),
 (5,'Gram');
/*!40000 ALTER TABLE `core_uom` ENABLE KEYS */;


--
-- Definition of table `core_uoms`
--

DROP TABLE IF EXISTS `core_uoms`;
CREATE TABLE `core_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uoms`
--

/*!40000 ALTER TABLE `core_uoms` DISABLE KEYS */;
INSERT INTO `core_uoms` (`id`,`name`) VALUES 
 (1,'Piece'),
 (2,'Kg'),
 (3,'Pack'),
 (4,'Litter');
/*!40000 ALTER TABLE `core_uoms` ENABLE KEYS */;


--
-- Definition of table `core_users`
--

DROP TABLE IF EXISTS `core_users`;
CREATE TABLE `core_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) unsigned DEFAULT 1,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_users`
--

/*!40000 ALTER TABLE `core_users` DISABLE KEYS */;
INSERT INTO `core_users` (`id`,`username`,`role_id`,`password`,`email`,`full_name`,`created_at`,`photo`,`verify_code`,`inactive`,`mobile`,`updated_at`) VALUES 
 (91,'admin',1,'111111','rana@yahoo.com',NULL,'2022-12-04 15:50:47','91.jpg',NULL,0,'34332332','2022-02-19 17:11:50'),
 (127,'Towhid',1,'111111','towhid1@outlook.com','Mohammad Towhidul Islam','2022-02-15 21:00:46','127.jpg','45354353',0,'34324324','2022-02-15 21:00:46'),
 (128,'Sawpna',1,'333','swapna@yahoo.com','Sawpna Akter','2022-02-15 20:59:39','128.jpg','45354353333',0,'34343434','2022-02-15 20:59:39'),
 (129,'Kamrul',1,'111111','kamrul@yahoo.com','Kamrul','2022-02-15 20:59:57','129.jpg','45354353333',0,'323333333333','2022-02-15 20:59:57'),
 (130,'Neyamot',1,'111111','neyamot@gmail.com','Neyamot Ullah','2022-02-15 21:00:26','130.jpg','3432432432',0,'534534543','2022-02-15 21:00:26'),
 (131,'Forhad',1,'33333','forhad@yahoo.com','Forhad Hassan','2021-12-30 15:24:19','131.jpg','4535435333333',0,'32333333',NULL),
 (146,'Munmun',2,'222222','munmun.akter@yahoo.com','Munmun Akter','0000-00-00 00:00:00','munmun.jpg','44444',0,'44455666666','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `core_users` ENABLE KEYS */;


--
-- Definition of table `core_warehouses`
--

DROP TABLE IF EXISTS `core_warehouses`;
CREATE TABLE `core_warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_warehouses`
--

/*!40000 ALTER TABLE `core_warehouses` DISABLE KEYS */;
INSERT INTO `core_warehouses` (`id`,`name`,`city`,`contact`) VALUES 
 (1,'Tajgon','Dhaka','4543534534'),
 (2,'Rangpur','Rangpur','324242342'),
 (3,'Badda','Rampura','3434334324');
/*!40000 ALTER TABLE `core_warehouses` ENABLE KEYS */;


--
-- Definition of table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`,`name`) VALUES 
 (1,'Bangladesh'),
 (2,'Pakistan'),
 (3,'India');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


--
-- Definition of table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `price` float DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`,`title`,`price`,`user_id`) VALUES 
 (1,'Web development with PHP',15000,1),
 (2,'Android Application Development',12000,1),
 (3,'ASP.NET Application Development',20000,2),
 (4,'Windows Application Development using C#.NET',30000,91);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


--
-- Definition of table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`,`name`,`mobile`) VALUES 
 (1,'Ashraf','7324978234'),
 (2,'Jahid','3434335556');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;


--
-- Definition of table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`,`name`,`position`,`mobile`,`salary`,`user_id`) VALUES 
 (1,'Monzur Rahman','Manager','01632484606',50000,3),
 (2,'Mehedi Hassan','Officer','01303868272',40000,1),
 (3,'Abdullah Shah','CEO','01682554025',200000,2),
 (4,'Munmun','Computer Operator','01946924453',123000,1);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


--
-- Definition of table `ext_products`
--

DROP TABLE IF EXISTS `ext_products`;
CREATE TABLE `ext_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ext_products`
--

/*!40000 ALTER TABLE `ext_products` DISABLE KEYS */;
INSERT INTO `ext_products` (`id`,`name`,`price`,`category_id`,`photo`) VALUES 
 (11,'Apple','120.00',2,'apple.jpg'),
 (12,'Orange','150.00',2,'orange.jpg'),
 (13,'Pear','90.00',1,'pear.jpg'),
 (14,'Guava','50.00',1,'guava.jpg'),
 (15,'Banana','80.00',1,'banana.jpg'),
 (16,'Grapes White','140.00',3,'grapes_white.jpg');
/*!40000 ALTER TABLE `ext_products` ENABLE KEYS */;


--
-- Definition of table `hr_departments`
--

DROP TABLE IF EXISTS `hr_departments`;
CREATE TABLE `hr_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_departments`
--

/*!40000 ALTER TABLE `hr_departments` DISABLE KEYS */;
INSERT INTO `hr_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','HR'),
 (2,'11','IT');
/*!40000 ALTER TABLE `hr_departments` ENABLE KEYS */;


--
-- Definition of table `hr_employees`
--

DROP TABLE IF EXISTS `hr_employees`;
CREATE TABLE `hr_employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `hr_department_id` int(10) unsigned NOT NULL,
  `hr_position_id` int(10) unsigned NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `basic` int(10) unsigned NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employees`
--

/*!40000 ALTER TABLE `hr_employees` DISABLE KEYS */;
INSERT INTO `hr_employees` (`id`,`name`,`hr_department_id`,`hr_position_id`,`dob`,`doj`,`basic`,`mobile`,`email`,`address`) VALUES 
 (1,'Jahidul Islam',1,3,'1997-01-01','2020-01-01',20000,'43435345435','jahid@yahoo.com','Rampura');
/*!40000 ALTER TABLE `hr_employees` ENABLE KEYS */;


--
-- Definition of table `hr_positions`
--

DROP TABLE IF EXISTS `hr_positions`;
CREATE TABLE `hr_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_positions`
--

/*!40000 ALTER TABLE `hr_positions` DISABLE KEYS */;
INSERT INTO `hr_positions` (`id`,`name`,`rank`) VALUES 
 (1,'Programmer',4),
 (2,'Jr. Programmer',5),
 (3,'Hr Admin',3),
 (4,'Pion',10),
 (5,'Driver',10),
 (6,'Manager',5),
 (7,'Support Engineer',5),
 (8,'Support Engineer',5),
 (9,'Trainer ',3);
/*!40000 ALTER TABLE `hr_positions` ENABLE KEYS */;


--
-- Definition of table `mfg`
--

DROP TABLE IF EXISTS `mfg`;
CREATE TABLE `mfg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg`
--

/*!40000 ALTER TABLE `mfg` DISABLE KEYS */;
INSERT INTO `mfg` (`id`,`name`) VALUES 
 (1,'BD Food'),
 (2,'Pran'),
 (3,'Akiz');
/*!40000 ALTER TABLE `mfg` ENABLE KEYS */;


--
-- Definition of trigger `ad_mfg`
--

DROP TRIGGER /*!50030 IF EXISTS */ `ad_mfg`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `ad_mfg` AFTER DELETE ON `mfg` FOR EACH ROW begin
  delete from product where mfg_id=old.id;
end $$

DELIMITER ;

--
-- Definition of table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `discount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`,`order_id`,`product_id`,`price`,`qty`,`discount`) VALUES 
 (1,1,1,30,3,0),
 (2,1,2,40,1,0),
 (3,1,3,31,4,0),
 (10,9,1,44,8,4),
 (11,9,4,4555,4,7),
 (12,9,10,4555,4,7),
 (13,9,8,3444,3,3),
 (14,10,1,434,1,1),
 (15,10,12,400,1,0),
 (16,11,11,5000,1,0),
 (17,11,2,20000,1,0),
 (18,17,1,44,0,0),
 (19,22,16,120,2,2),
 (20,22,17,15,1,1),
 (21,23,16,120,2,2),
 (22,23,17,15,1,1),
 (23,23,14,1200,5,10);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `discount` float NOT NULL,
  `vat` float NOT NULL,
  `due_date` datetime NOT NULL,
  `customer_note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`,`customer_id`,`order_date`,`shipping_address`,`discount`,`vat`,`due_date`,`customer_note`) VALUES 
 (1,1,'2021-07-01 00:00:00','Rampura',0,0,'2021-07-04 00:00:00',''),
 (9,1,'2021-07-19 00:00:00','na',0,0,'2021-07-19 00:00:00',''),
 (10,1,'2021-08-19 00:00:00','na',0,0,'2021-08-19 00:00:00',''),
 (11,1,'2021-08-19 00:00:00','na',0,0,'2021-08-19 00:00:00',''),
 (17,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (18,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (19,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (20,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (21,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (22,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (23,1,'2021-11-16 00:00:00','Testing',0,0,'2021-11-16 00:00:00','Na');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(20) DEFAULT NULL,
  `method` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`,`student_id`,`amount`,`discount`,`created_at`,`remark`,`method`) VALUES 
 (1,1,10000,5000,'2020-10-04 18:52:39','Txs344333','BKash'),
 (2,2,15000,0,'2020-10-04 18:52:39','Txs334533','Cash');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


--
-- Definition of table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `area_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` (`id`,`name`,`mobile`,`area_id`) VALUES 
 (1,'Rana','3434345345345',4),
 (2,'Kamrul','343434',4),
 (3,'Neyamot','343434',3),
 (4,'Monir','343434',2);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;


--
-- Definition of table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `mfg_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`,`name`,`price`,`mfg_id`) VALUES 
 (1,'Piza Family Size',200,1),
 (2,'Mango Slice',40,2),
 (3,'Mum 2 li',30,2),
 (4,'Cookie Super 40piece',120,3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


--
-- Definition of table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` (`id`,`name`,`section_id`) VALUES 
 (1,'Sari',2),
 (2,'Shirt',2),
 (3,'T-Shirt',2),
 (4,'Rice',1);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;


--
-- Definition of table `product_section`
--

DROP TABLE IF EXISTS `product_section`;
CREATE TABLE `product_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_section`
--

/*!40000 ALTER TABLE `product_section` DISABLE KEYS */;
INSERT INTO `product_section` (`id`,`name`) VALUES 
 (1,'Grocery'),
 (2,'Clothing'),
 (3,'Fish');
/*!40000 ALTER TABLE `product_section` ENABLE KEYS */;


--
-- Definition of table `products_tmp`
--

DROP TABLE IF EXISTS `products_tmp`;
CREATE TABLE `products_tmp` (
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tmp`
--

/*!40000 ALTER TABLE `products_tmp` DISABLE KEYS */;
INSERT INTO `products_tmp` (`name`,`price`) VALUES 
 ('Apple','120.00'),
 ('Orange','150.00'),
 ('Pear','90.00'),
 ('Guava','50.00'),
 ('Banana','80.00'),
 ('Grapes White','140.00');
/*!40000 ALTER TABLE `products_tmp` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice`
--

DROP TABLE IF EXISTS `purchase_invoice`;
CREATE TABLE `purchase_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `remark` text NOT NULL,
  `ref` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_invoice`
--

/*!40000 ALTER TABLE `purchase_invoice` DISABLE KEYS */;
INSERT INTO `purchase_invoice` (`id`,`vendor_id`,`purchase_date`,`shipping_address`,`remark`,`ref`) VALUES 
 (1,1,'2021-08-16 17:25:27','sdfds','dsf','34343');
/*!40000 ALTER TABLE `purchase_invoice` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice1`
--

DROP TABLE IF EXISTS `purchase_invoice1`;
CREATE TABLE `purchase_invoice1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) unsigned NOT NULL,
  `ref` varchar(45) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='vendor_id,ref,purchase_date,shipping_address,remark';

--
-- Dumping data for table `purchase_invoice1`
--

/*!40000 ALTER TABLE `purchase_invoice1` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoice1` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice_details`
--

DROP TABLE IF EXISTS `purchase_invoice_details`;
CREATE TABLE `purchase_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_invoice_details`
--

/*!40000 ALTER TABLE `purchase_invoice_details` DISABLE KEYS */;
INSERT INTO `purchase_invoice_details` (`id`,`invoice_id`,`item_id`,`qty`,`price`,`discount`) VALUES 
 (1,1,2,1,333,0),
 (2,1,1,1,6566,0);
/*!40000 ALTER TABLE `purchase_invoice_details` ENABLE KEYS */;


--
-- Definition of table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` (`id`,`name`,`country_id`) VALUES 
 (1,'Bangladesh',1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;


--
-- Definition of table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `qty` varchar(45) NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`,`product_id`,`qty`,`transaction_type_id`) VALUES 
 (1,14,'100',1),
 (2,16,'60',1),
 (3,14,'-2',3),
 (4,14,'-10',2),
 (5,14,'-5',3),
 (6,14,'20',1);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;


--
-- Definition of table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`,`name`,`mobile`,`email`,`created_at`,`course`) VALUES 
 (5,'Silvia','3434343','silvia@yahoo.com','2021-10-28 18:28:46','Java'),
 (7,'Jahidul',NULL,NULL,'2021-10-28 18:30:43','MBA');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


--
-- Definition of table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`,`name`) VALUES 
 (1,'English'),
 (2,'Bengali');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;


--
-- Definition of table `system_log`
--

DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_log`
--

/*!40000 ALTER TABLE `system_log` DISABLE KEYS */;
INSERT INTO `system_log` (`id`,`name`,`description`,`created_at`) VALUES 
 (4,'UPDATE','Update user id: 56','2021-08-25 08:42:57'),
 (7,'LOGIN','Successfully logged in user: Rana','2021-11-07 13:08:32'),
 (8,'LOGIN','Fail to Login: Invalid username or password','2021-11-07 13:08:51'),
 (9,'LOGIN','Successfull login user:91 | Rana','2021-11-10 12:38:23'),
 (10,'LOGIN','Successfully logined in user : 91-Rana','2021-11-10 12:39:20'),
 (11,'LOGOUT',' 91-Rana user logged out','2021-11-10 12:51:06'),
 (18,'LOGIN','Fail to Login: Invalid username or password','2021-11-15 10:24:59'),
 (19,'LOGIN','Successfully logged in user: Rana','2021-11-15 10:25:02'),
 (20,'LOGIN','Successfully logged in user: Rana','2021-11-16 09:46:22'),
 (21,'LOGIN','Successfully logged in user: Rana','2021-11-30 11:15:27');
/*!40000 ALTER TABLE `system_log` ENABLE KEYS */;


--
-- Definition of table `thana`
--

DROP TABLE IF EXISTS `thana`;
CREATE TABLE `thana` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

/*!40000 ALTER TABLE `thana` DISABLE KEYS */;
INSERT INTO `thana` (`id`,`name`,`district_id`) VALUES 
 (1,'Mirpur',7),
 (2,'Mohammadpur',7),
 (3,'Chatkhil',2);
/*!40000 ALTER TABLE `thana` ENABLE KEYS */;


--
-- Definition of table `transaction_type`
--

DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE `transaction_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_type`
--

/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
INSERT INTO `transaction_type` (`id`,`name`) VALUES 
 (1,'Purchase Order'),
 (2,'Purchase Return'),
 (3,'Sales Order'),
 (4,'Sales Return');
/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`) VALUES 
 (50,'admin','111'),
 (51,'manjur','0ed9422357395a0d4879191c66f4faa2'),
 (53,'mitu','9862c12156360fa73af41fb1eb207493'),
 (56,'mehedi','d0970714757783e6cf17b26fb8e2298f'),
 (57,'Accountant','bcbe3365e6ac95ea2c0343a2395834dd'),
 (58,'demo','698d51a19d8a121ce581499d7b701668'),
 (59,'demo2','310dcbbf4cce62f762a2aaa148d556bd'),
 (60,'demo21','698d51a19d8a121ce581499d7b701668');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users2`
--

DROP TABLE IF EXISTS `users2`;
CREATE TABLE `users2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users2`
--

/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;


--
-- Definition of procedure `save_mfg`
--

DROP PROCEDURE IF EXISTS `save_mfg`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `save_mfg`(_name varchar(20))
begin
  insert into mfg(name)values(_name);
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `show_roles_users`
--

DROP PROCEDURE IF EXISTS `show_roles_users`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `show_roles_users`()
begin
select * from roles;
select * from users;
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `users`
--

DROP PROCEDURE IF EXISTS `users`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `users`()
select * from users $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of view `product_view`
--

DROP TABLE IF EXISTS `product_view`;
DROP VIEW IF EXISTS `product_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_view` AS select `p`.`id` AS `id`,`p`.`name` AS `name`,`p`.`price` AS `price`,`m`.`name` AS `manufacturer` from (`product` `p` join `mfg` `m`) where `m`.`id` = `p`.`mfg_id` and `p`.`price` < 300;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
