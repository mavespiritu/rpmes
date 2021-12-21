<?php

   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }

           
        $statement0 = $db->prepare('
DROP TABLE IF EXISTS `tblform7`;

CREATE TABLE `tblform7` (
  `projid` int(11) NOT NULL,
  `nameOfProject` varchar(500) default NULL,
  `location` varchar(200) default NULL,
  `implementingAgency` varchar(200) default NULL,
  `q1dateOfProjectInspection` varchar(200) default NULL,
  `q1physicalStatus` varchar(200) default NULL,
  `q1issues` text,
  `q1actionRecommendation` text,
  `q2dateOfProjectInspection` varchar(200) default NULL,
  `q2physicalStatus` varchar(200) default NULL,
  `q2issues` text,
  `q2actionRecommendation` text,
  `q3dateOfProjectInspection` varchar(200) default NULL,
  `q3physicalStatus` varchar(200) default NULL,
  `q3issues` text,
  `q3actionRecommendation` text,
  `q4dateOfProjectInspection` varchar(200) default NULL,
  `q4physicalStatus` varchar(200) default NULL,
  `q4issues` text,
  `q4actionRecommendation` text,
  PRIMARY KEY  (`projid`),
  CONSTRAINT `FK_tblform7` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `tblform8`;

CREATE TABLE `tblform8` (
  `projid` int(11) NOT NULL,
  `nameOfProject` varchar(500) default NULL,
  `location` varchar(200) default NULL,
  `implementingAgency` varchar(200) default NULL,
  `q1dateOfPSS` varchar(200) default NULL,
  `q1concernedAgencies` varchar(200) default NULL,
  `q1agreementsReached` varchar(200) default NULL,
  `q1nextSteps` tinytext,
  `q2dateOfPSS` varchar(200) default NULL,
  `q2concernedAgencies` varchar(200) default NULL,
  `q2agreementsReached` varchar(200) default NULL,
  `q2nextSteps` tinytext,
  `q3dateOfPSS` varchar(200) default NULL,
  `q3concernedAgencies` varchar(200) default NULL,
  `q3agreementsReached` varchar(200) default NULL,
  `q3nextSteps` tinytext,
  `q4dateOfPSS` varchar(200) default NULL,
  `q4concernedAgencies` varchar(200) default NULL,
  `q4agreementsReached` varchar(200) default NULL,
  `q4nextSteps` text,
  PRIMARY KEY  (`projid`),
  CONSTRAINT `FK_tblform8` FOREIGN KEY (`projid`) REFERENCES `tblprojects` (`projid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




');
      
       
        $statement0->execute();
        echo "<pre>".json_encode(print_r($statement0)). "</pre>";
?>
