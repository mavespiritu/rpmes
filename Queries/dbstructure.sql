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

/*Table structure for table `hits` */

DROP TABLE IF EXISTS `hits`;

CREATE TABLE `hits` (
  `id` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `projectexception` */

DROP TABLE IF EXISTS `projectexception`;

CREATE TABLE `projectexception` (
  `projid` int(11) default NULL,
  `q1reason` text,
  `q1datesub` datetime default NULL,
  `q1datesave` datetime default NULL,
  `q1savior` varchar(1000) default NULL,
  `q1submittor` varchar(1000) default NULL,
  `q2reason` text,
  `q2datesub` datetime default NULL,
  `q2datesave` datetime default NULL,
  `q2savior` varchar(1000) default NULL,
  `q2submittor` varchar(1000) default NULL,
  `q3reason` text,
  `q3datesub` datetime default NULL,
  `q3datesave` datetime default NULL,
  `q3savior` varchar(1000) default NULL,
  `q3submittor` varchar(1000) default NULL,
  `q4reason` text,
  `q4datesub` datetime default NULL,
  `q4datesave` datetime default NULL,
  `q4savior` varchar(1000) default NULL,
  `q4submittor` varchar(1000) default NULL,
  `q1recomendation` text,
  `q2recomendation` text,
  `q3recomendation` text,
  `q4recomendation` text,
  KEY `FK_projectexception` (`projid`),
  CONSTRAINT `FK_projectexception` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblagency` */

DROP TABLE IF EXISTS `tblagency`;

CREATE TABLE `tblagency` (
  `agencyid` int(11) NOT NULL auto_increment,
  `agencytype` int(11) default NULL,
  `agencycode` varchar(20) default NULL,
  `agencyhead` varchar(50) default NULL,
  `designation` varchar(50) default NULL,
  `agencyname` varchar(200) default NULL,
  PRIMARY KEY  (`agencyid`),
  KEY `agencytype` (`agencytype`),
  CONSTRAINT `tblagency_ibfk_1` FOREIGN KEY (`agencytype`) REFERENCES `tblagencytype` (`agencytypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=32699 DEFAULT CHARSET=latin1;

/*Table structure for table `tblagencytype` */

DROP TABLE IF EXISTS `tblagencytype`;

CREATE TABLE `tblagencytype` (
  `agencytypeid` int(11) NOT NULL default '0',
  `agencytypecode` varchar(20) default NULL,
  `agencytypedesc` varchar(50) default NULL,
  PRIMARY KEY  (`agencytypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblduedates` */

DROP TABLE IF EXISTS `tblduedates`;

CREATE TABLE `tblduedates` (
  `duedateId` int(11) NOT NULL,
  `duedate` date default NULL,
  `name` varchar(32) default NULL,
  PRIMARY KEY  (`duedateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblfundsrc` */

DROP TABLE IF EXISTS `tblfundsrc`;

CREATE TABLE `tblfundsrc` (
  `fundid` int(11) NOT NULL default '0',
  `fundtypeid` int(11) default NULL,
  `fundcode` varchar(20) default NULL,
  `funddesc` varchar(1000) default NULL,
  PRIMARY KEY  (`fundid`),
  KEY `fundtypeid` (`fundtypeid`),
  CONSTRAINT `tblfundsrc_ibfk_1` FOREIGN KEY (`fundtypeid`) REFERENCES `tblfundsrctype` (`fundtypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblfundsrctype` */

DROP TABLE IF EXISTS `tblfundsrctype`;

CREATE TABLE `tblfundsrctype` (
  `fundtypeid` int(11) NOT NULL default '0',
  `funddesc` varchar(100) default NULL,
  PRIMARY KEY  (`fundtypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbllocation` */

DROP TABLE IF EXISTS `tbllocation`;

CREATE TABLE `tbllocation` (
  `locid` int(11) NOT NULL default '0',
  `provincename` varchar(50) default NULL,
  `district` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  PRIMARY KEY  (`locid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblperiod` */

DROP TABLE IF EXISTS `tblperiod`;

CREATE TABLE `tblperiod` (
  `periodId` int(11) NOT NULL,
  `periodname` varchar(32) default NULL,
  PRIMARY KEY  (`periodId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblprojaccomplishment` */

DROP TABLE IF EXISTS `tblprojaccomplishment`;

CREATE TABLE `tblprojaccomplishment` (
  `projid` int(11) NOT NULL,
  `agencyid` int(11) default NULL,
  `q1Paccomp` double default '0',
  `q1Faccomp` double default '0',
  `q1Maccomp` double default '0',
  `q1datesub` datetime default NULL,
  `q1datesave` datetime default NULL,
  `q1savior` varchar(100) default NULL,
  `q1submittor` varchar(100) default NULL,
  `q1CashDis` double default '0',
  `q1AccPayable` double default '0',
  `q1Remarks` varchar(500) default NULL,
  `q1Expenditure` double default '0',
  `q1Releases` double default '0',
  `q1Obligations` double default '0',
  `q2Paccomp` double default '0',
  `q2Faccomp` double default '0',
  `q2Maccomp` double default '0',
  `q2datesub` datetime default NULL,
  `q2datesave` datetime default NULL,
  `q2savior` varchar(100) default NULL,
  `q2submittor` varchar(100) default NULL,
  `q2CashDis` double default '0',
  `q2AccPayable` double default '0',
  `q2Remarks` varchar(500) default NULL,
  `q2Expenditure` double default '0',
  `q2Releases` double default '0',
  `q2Obligations` double default '0',
  `q3Paccomp` double default '0',
  `q3Faccomp` double default '0',
  `q3Maccomp` double default '0',
  `q3datesub` datetime default NULL,
  `q3datesave` datetime default NULL,
  `q3savior` varchar(100) default NULL,
  `q3submittor` varchar(100) default NULL,
  `q3CashDis` double default '0',
  `q3AccPayable` double default '0',
  `q3Remarks` varchar(500) default NULL,
  `q3Expenditure` double default '0',
  `q3Releases` double default '0',
  `q3Obligations` double default '0',
  `q4Paccomp` double default '0',
  `q4Faccomp` double default '0',
  `q4Maccomp` double default '0',
  `q4datesub` datetime default NULL,
  `q4datesave` datetime default NULL,
  `q4savior` varchar(100) default NULL,
  `q4submittor` varchar(100) default NULL,
  `q4CashDis` double default '0',
  `q4AccPayable` double default '0',
  `q4Remarks` varchar(500) default NULL,
  `q4Expenditure` double default '0',
  `q4Releases` double default '0',
  `q4Obligations` double default '0',
  PRIMARY KEY  (`projid`),
  KEY `projid` (`projid`),
  KEY `agencyid` (`agencyid`),
  CONSTRAINT `FK_tblprojaccomplishment` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tblprojaccomplishment_ibfk_2` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblprojects` */

DROP TABLE IF EXISTS `tblprojects`;

CREATE TABLE `tblprojects` (
  `projid` int(20) NOT NULL,
  `agencyid` int(100) default '0',
  `fundid` int(100) default '0',
  `locid` int(100) default '0',
  `secid` int(100) default '0',
  `subsecid` int(100) default '0',
  `projname` varchar(1000) default NULL,
  `unitofmeasure` varchar(1000) default NULL,
  `yrenrolled` int(100) default NULL,
  `enrolledby` int(100) default NULL,
  `period` int(100) default NULL,
  `programname` varchar(1000) default NULL,
  `datatype` varchar(64) default 'Default',
  `typhoon` int(100) default NULL,
  `datestart` varchar(100) default NULL,
  `dateend` varchar(100) default NULL,
  `projObjective` text,
  `expectedresult` int(100) default NULL,
  `actualresult` int(100) default NULL,
  `iscompleted` varchar(24) default NULL,
  `ordering` double default NULL,
  PRIMARY KEY  (`projid`),
  KEY `agencyid` (`agencyid`),
  KEY `fundid` (`fundid`),
  KEY `locid` (`locid`),
  KEY `secid` (`secid`),
  KEY `subsecid` (`subsecid`),
  KEY `enrolledby` (`enrolledby`),
  KEY `FK_tblprojects3` (`period`),
  KEY `FK_tblprojectsTyphoon` (`typhoon`),
  CONSTRAINT `FK_tblprojects` FOREIGN KEY (`enrolledby`) REFERENCES `tbluser` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tblprojects3` FOREIGN KEY (`period`) REFERENCES `tblperiod` (`periodId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tblprojectsTyphoon` FOREIGN KEY (`typhoon`) REFERENCES `typhoon` (`typhoonid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tblprojects_ibfk_1` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`),
  CONSTRAINT `tblprojects_ibfk_3` FOREIGN KEY (`fundid`) REFERENCES `tblfundsrc` (`fundid`),
  CONSTRAINT `tblprojects_ibfk_4` FOREIGN KEY (`locid`) REFERENCES `tbllocation` (`locid`),
  CONSTRAINT `tblprojects_ibfk_5` FOREIGN KEY (`secid`) REFERENCES `tblprojsector` (`secid`),
  CONSTRAINT `tblprojects_ibfk_6` FOREIGN KEY (`subsecid`) REFERENCES `tblprojsubsector` (`subsecid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblprojsector` */

DROP TABLE IF EXISTS `tblprojsector`;

CREATE TABLE `tblprojsector` (
  `secid` int(11) NOT NULL auto_increment,
  `secname` varchar(50) default NULL,
  PRIMARY KEY  (`secid`)
) ENGINE=InnoDB AUTO_INCREMENT=32629 DEFAULT CHARSET=latin1;

/*Table structure for table `tblprojsubsector` */

DROP TABLE IF EXISTS `tblprojsubsector`;

CREATE TABLE `tblprojsubsector` (
  `subsecid` int(11) NOT NULL,
  `secid` int(11) default NULL,
  `subsecname` varchar(100) default NULL,
  PRIMARY KEY  (`subsecid`),
  KEY `secid` (`secid`),
  CONSTRAINT `tblprojsubsector_ibfk_1` FOREIGN KEY (`secid`) REFERENCES `tblprojsector` (`secid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tblprojtargets` */

DROP TABLE IF EXISTS `tblprojtargets`;

CREATE TABLE `tblprojtargets` (
  `projid` int(11) default NULL,
  `agencyid` int(11) default NULL,
  `q1Ptarget` double NOT NULL,
  `q1Ftarget` double NOT NULL,
  `q1Mtarget` double NOT NULL,
  `q2Ptarget` double NOT NULL,
  `q2Ftarget` double NOT NULL,
  `q2Mtarget` double NOT NULL,
  `q3Ptarget` double NOT NULL,
  `q3Ftarget` double NOT NULL,
  `q3Mtarget` double NOT NULL,
  `q4Ptarget` double NOT NULL,
  `q4Ftarget` double NOT NULL,
  `q4Mtarget` double NOT NULL,
  `datesub` datetime NOT NULL default '0000-00-00 00:00:00',
  `isApproved` tinyint(1) NOT NULL default '0',
  `submittor` varchar(64) default NULL,
  KEY `projid` (`projid`),
  KEY `agencyid` (`agencyid`),
  CONSTRAINT `tblprojtargets_ibfk_1` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`),
  CONSTRAINT `tblprojtargets_ibfk_2` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `userid` int(64) NOT NULL,
  `agencyid` int(64) default NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(64) default NULL,
  `rightid` int(11) default NULL,
  `email` varchar(64) default NULL,
  `position` varchar(64) default NULL,
  `lastname` varchar(64) default NULL,
  `firstname` varchar(64) default NULL,
  `middlename` varchar(64) default NULL,
  `division` varchar(64) default NULL,
  `title` varchar(64) default NULL,
  PRIMARY KEY  (`userid`,`uname`),
  UNIQUE KEY `tbluser` (`userid`,`uname`),
  KEY `agencyid` (`agencyid`),
  KEY `rightid` (`rightid`),
  CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`agencyid`) REFERENCES `tblagency` (`agencyid`),
  CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`rightid`) REFERENCES `tbluserrights` (`rightid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbluserrights` */

DROP TABLE IF EXISTS `tbluserrights`;

CREATE TABLE `tbluserrights` (
  `rightid` int(11) NOT NULL default '0',
  `rightdesc` varchar(20) default NULL,
  PRIMARY KEY  (`rightid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `typhoon` */

DROP TABLE IF EXISTS `typhoon`;

CREATE TABLE `typhoon` (
  `typhoonid` int(11) NOT NULL,
  `typhoonName` varchar(64) default NULL,
  `year` year(4) default NULL,
  PRIMARY KEY  (`typhoonid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
