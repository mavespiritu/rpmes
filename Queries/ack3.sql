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

/*Table structure for table `acknowledgement` */

DROP TABLE IF EXISTS `acknowledgement`;

CREATE TABLE `acknowledgement` (
  `agency` int(11) NOT NULL,
  `quarter` int(11) default NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` year(4) default NULL,
  KEY `FK_acknowledgement` (`agency`),
  CONSTRAINT `FK_acknowledgement` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `acknowledgementexc` */

DROP TABLE IF EXISTS `acknowledgementexc`;

CREATE TABLE `acknowledgementexc` (
  `agency` int(11) NOT NULL,
  `quarter` int(11) default NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` year(4) default NULL,
  KEY `FK_acknowledgementexc` (`agency`),
  CONSTRAINT `FK_acknowledgementexc` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `acknowledgementmoni` */

DROP TABLE IF EXISTS `acknowledgementmoni`;

CREATE TABLE `acknowledgementmoni` (
  `agency` int(11) NOT NULL,
  `findings` text,
  `action` text,
  `isRead` int(11) default NULL,
  `year` int(4) default NULL,
  KEY `FK_acknowledgemoni` (`agency`),
  CONSTRAINT `FK_acknowledgemoni` FOREIGN KEY (`agency`) REFERENCES `tblagency` (`agencyid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
