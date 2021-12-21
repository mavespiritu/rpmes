<?php

class submissionDAO{
    
    function getInfoFor($agencyId,$year){
        
        
        $db = new database();
        $statement = $db->getDb()->prepare('SELECT * FROM tblsubmission WHERE 
            agencyid = :agencyid 
            AND 
            yearEnrolled = :year');
        $statement->bindParam(':agencyid', $agencyId);
        $statement->bindParam(':year', $year);
        $statement->execute();
        return $statement;
        
        
    }
    function initializeSubmission($agencyId,$year){
        $db = new database();
        $statement = $db->getDb()->prepare('INSERT INTO tblsubmission (
            `agencyid`
            ,`quarte1`
            ,`quarte2`
            ,`quarte3`
            ,`quarte4`
            ,`yearEnrolled`
            ,`submitor`
            )
            VALUES (:agencyid , NULL ,NULL, NULL ,NULL,:year,NULL)
            ');
        $statement->bindParam(':agencyid', $agencyId);
        $statement->bindParam(':year', $year);
        $statement->execute();
        return $statement;
    }
    
    
}
?>
