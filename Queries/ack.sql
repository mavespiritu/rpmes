/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.0.51b-community-nt : Database - rpmesregion1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`rpmesregion1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rpmesregion1`;

/*Data for the table `acknowledgement` */

LOCK TABLES `acknowledgement` WRITE;

insert  into `acknowledgement`(`agency`,`quarter`,`findings`,`action`,`isRead`,`year`) values (1,2,NULL,NULL,0,2016),(1,1,NULL,NULL,0,2016),(2,1,NULL,NULL,0,2016),(2,3,NULL,NULL,0,2016),(2,2,'nothing','nothing',1,2016),(2,4,'walang findings','sd',1,2016),(1,3,'asdfdf','sdfsdf',1,2016),(1,4,'donnie\r\nwala \r\nanu\r\n\r\n\r\n','sabi \r\nko nga',1,2016),(7044,3,'aaa','fsa',1,2016),(7044,2,NULL,NULL,0,2016);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
