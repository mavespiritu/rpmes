<?PHp

    class acknowledgementDAO{

        function getByAgencyEXC($year,$agency){
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgementexc.*
    , tblagency.agencycode
FROM
    acknowledgementexc
    INNER JOIN tblagency 
        ON (acknowledgementexc.agency = tblagency.agencyid)
        WHERE tblagency.agencyid = :agency 
        and   acknowledgementexc.year  = :year' );
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $agency);
            $statement->execute();
           
            return $statement;
            
        }
        function getByAgency($year,$agency){
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.*
    , tblagency.agencycode
  
FROM
    acknowledgement
    INNER JOIN tblagency 
        ON (acknowledgement.agency = tblagency.agencyid)
        WHERE tblagency.agencyid = :agency 
        and   acknowledgement.year  = :year GROUP BY quarter ORDER BY quarter ASC' );
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $agency);
            $statement->execute();
           
            return $statement;
            
        }
        function getByAgencyforAck($year,$agency){
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.*
    , tblagency.agencycode
FROM
    acknowledgement
    INNER JOIN tblagency 
        ON (acknowledgement.agency = tblagency.agencyid) WHERE tblagency.agencyid = :agency and   acknowledgement.year  = :year' );
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $agency);
            $statement->execute();
           
            return $statement;
            
        }
        function getByAgencyforExp($year,$agency){
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
q1datesub ,
q2datesub ,
q3datesub ,
q4datesub ,
tblprojects.agencyid,
tblprojects.yrenrolled
FROM
    tblprojects
    INNER JOIN projectexception 
        ON (projectexception.projid = tblprojects.projid)
where agencyid = :agency
and yrenrolled = :year

' );
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $agency);
            $statement->execute();
           
            return $statement;
            
        }
        function getdateSubACC($id,$quarter,$year){
              $db = new database();
            $statement =  $db->getDb()->prepare('SELECT DISTINCT
    tblprojaccomplishment.q'.$quarter.'datesub as datesub
FROM
    tblprojaccomplishment
INNER JOIN tblagency

ON(tblagency.agencyid = tblprojaccomplishment.agencyid)

INNER JOIN acknowledgement

ON(tblagency.agencyid = acknowledgement.agency)

WHERE 
    tblprojaccomplishment.agencyid = :agency
AND 
    acknowledgement.year = :year
AND year(tblprojaccomplishment.q'.$quarter.'datesub)     = :year
');
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $id);
      
            $statement->execute();
           
            $rr =  $statement->fetch();
           return    $rr[0];
            
        }
        function getdateSubEXC($id,$quarter,$year){ //  getting the distinct date of submission of  project exception
              $db = new database();
             
               
            $statement =  $db->getDb()->prepare('SELECT DISTINCT
    projectexception.q'.$quarter.'datesub as datesub
FROM
    projectexception
INNER JOIN tblprojects

ON(tblprojects.projid = projectexception.projid)

INNER JOIN tblagency

ON(tblagency.agencyid = tblprojects.agencyid)

INNER JOIN acknowledgementexc

ON(acknowledgementexc.agency = tblagency.agencyid)

WHERE 

acknowledgementexc.agency = :agency

AND 

acknowledgementexc.year = :year
AND 
year(projectexception.q'.$quarter.'datesub) = :year

ORDER BY q'.$quarter.'datesub desc');
          
            $statement->bindParam(':year', $year);
            $statement->bindParam(':agency', $id);
      
            $statement->execute();
           
            $rr =  $statement->fetch();
            return $rr[0];
        }
        function getAllACC($year){ //getting all acknowledgement  by year
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.*
    , tblagency.agencycode
FROM
    acknowledgement
    INNER JOIN tblagency 
        ON (acknowledgement.agency = tblagency.agencyid) WHERE    acknowledgement.year  = :year' );
            $statement->bindParam(':year', $year);
      
            $statement->execute();
           
            return $statement;
            
        }
        function getAllMON($year,$agency){ // getting all monitoring plan acknowledgement
            
          
            $db = new database();
                if($agency==0){
                    $param = '';
                }
                else{
                    $param = " and acknowledgementmoni.agency = ".$agency;
                }
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgementmoni.*
    , tblagency.agencycode
,tblprojtargets.datesub
FROM
    acknowledgementmoni
    INNER JOIN tblagency 
        ON (acknowledgementmoni.agency = tblagency.agencyid) 
    INNER JOIN tblprojtargets
	ON (tblprojtargets.agencyid = tblagency.agencyid)
	WHERE    year(tblprojtargets.datesub)  = :year
	AND acknowledgementmoni.year  = :year' . $param .' GROUP BY acknowledgementmoni.agency ');
            $statement->bindParam(':year', $year);
            $statement->execute();
           
            return $statement;
            
        }
        function getAllEXC($year){ // getting all project exception acknowledgement
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgementexc.*
    , tblagency.agencycode
FROM
    acknowledgementexc
    INNER JOIN tblagency 
        ON 
        (acknowledgementexc.agency = tblagency.agencyid)
        WHERE    acknowledgementexc.year  = :year' );
            $statement->bindParam(':year', $year);
      
            $statement->execute();
           
            return $statement;
            
        }
        function getUnread($year){ //getting all unread acknowledgement
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.*
    , tblagency.agencycode
FROM
    acknowledgement
    INNER JOIN tblagency 
        ON (acknowledgement.agency = tblagency.agencyid) WHERE  acknowledgement.isRead = 0 and acknowledgement.year  = :year' );
            $statement->bindParam(':year', $year);
            $statement->execute();
           
            return $statement;
            
        }
        
        function acknowledgemoni($findings,$action,$agency,$year){ // setting acknowledgement for monitoring plan
            $db =  new database();
            $data  = array(":findings"=>$findings,
                ":action"=>$action,
                ":agency"=>$agency,
                ":year"=>$year
                );
            $statement = $db->getDb()->prepare('
                UPDATE 
                acknowledgementmoni 
                SET 
                findings = :findings,
                action = :action,
                isRead = 1
                WHERE
                agency = :agency 
                AND
                year = :year
                ');
            
            $statement->execute($data);
        return $statement;
        }
        function acknowledgeexc($findings,$action,$agency,$quarter,$year){ // setting acknowledgement for project exception
            $db =  new database();
            $data  = array(":findings"=>$findings,
                ":action"=>$action,
                ":agency"=>$agency,
                ":quarter"=>$quarter,
                ":year"=>$year
                );
            $statement = $db->getDb()->prepare('
                UPDATE 
                acknowledgementexc 
                SET 
                findings = :findings,
                action = :action,
                isRead = 1
                WHERE
                agency = :agency 
                AND
                quarter = :quarter
                AND
                year = :year
                ');
            
            $statement->execute($data);
        return $statement;
        }
        function acknowledge($findings,$action,$agency,$quarter,$year){ // setting acknowledgement for accomplishment
            $db =  new database();
            $data  = array(":findings"=>$findings,
                ":action"=>$action,
                ":agency"=>$agency,
                ":quarter"=>$quarter,
                ":year"=>$year
                );
            $statement = $db->getDb()->prepare('
                UPDATE 
                acknowledgement 
                SET 
                findings = :findings,
                action = :action,
                isRead = 1
                WHERE
                agency = :agency 
                AND
                quarter = :quarter
                AND
                year = :year
                ');
            
            $statement->execute($data);
        return $statement;
        }
        function getRead($year){ // getting all read acknowledgement 
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.*
    , tblagency.agencycode
FROM
    acknowledgement
    INNER JOIN tblagency 
        ON (acknowledgement.agency = tblagency.agencyid) WHERE  acknowledgement.isRead = 1 and acknowledgement.year  = :year' );
            $statement->bindParam(':year', $year);
            $statement->execute();
           
            return $statement;
            
        }
        function countInbox($year){ //counting all unread acknowledgement
            
            $db = new database();
            $statement =  $db->getDb()->prepare('SELECT
    acknowledgement.agency
FROM
    acknowledgement where year = :year and isRead = 0  ' );
            
            $statement1 =  $db->getDb()->prepare('SELECT
    acknowledgementmoni.agency
FROM
    acknowledgementmoni where year = :year and isRead = 0  ' );
            
            $statement2 =  $db->getDb()->prepare('SELECT
    acknowledgementexc.agency
FROM
    acknowledgementexc where year = :year and isRead = 0  ' );
            
            
            $statement->bindParam(':year', $year);
            $statement1->bindParam(':year', $year);
            $statement2->bindParam(':year', $year);
            
            
            
            $statement->execute();
            $statement1->execute();
            $statement2->execute();
            
            return ($statement->rowCount()+$statement1->rowCount()+$statement2->rowCount());
            
        }
        function countException($year){ // counting project exception acknowledgement 
            
            $db = new database();
    
  
            $statement2 =  $db->getDb()->prepare('SELECT
    acknowledgementexc.agency
FROM
    acknowledgementexc where year = :year and isRead = 0  ' );
            
            
         
            $statement2->bindParam(':year', $year);
            
            
            
         
            $statement2->execute();
            
            return $statement2->rowCount();
            
        }
        function countAccomplishment($year){ //counting accomplishment
            
            $db = new database();
    
  
            $statement2 =  $db->getDb()->prepare('SELECT
    acknowledgement.agency
FROM
    acknowledgement where year = :year and isRead = 0  ' );
            
            
         
            $statement2->bindParam(':year', $year);
            
            
            
         
            $statement2->execute();
            
            return $statement2->rowCount();
            
        }
        function countMonitoring($year){ // counting monitoring
            
            $db = new database();
    
  
            $statement2 =  $db->getDb()->prepare('SELECT
    acknowledgementmoni.agency
FROM
    acknowledgementmoni where year = :year and isRead = 0  ' );
            
            
         
            $statement2->bindParam(':year', $year);
            
            
            
         
            $statement2->execute();
            
            return $statement2->rowCount();
            
        }
        
        function    initializeExcep($pid){ // initialized project exception
            
            $db =  new database();
            $statement=  $db->getDb()->prepare('
                INSERT INTO  tblform7 (
                projid
                )
                VALUES (
                '.$pid.');
                INSERT INTO  tblform8 (
                projid
                )
                VALUES (
                '.$pid.');
                INSERT INTO  projectexception (
                projid 
                )
                VALUES (
                '.$pid.');

');
            $statement->execute();
        }
        
        function isContainPE($projid){  // checking if the project id exist in project exception
            $db =  new database();
            $statement =  $db->getDb()->prepare("select projid  as tod from projectexception where projectexception.projid = :projid");
               $statement->bindParam(':projid', $projid);
            $statement->execute();
            if( $statement->rowCount()>0){
            return true;}
            else {
                return false;
            }
            
        }
        
        function initialize($pid,$quarter){ // initialized acknowledgement
            
            $db =  new database();
            $statement=  $db->getDb()->prepare('
                INSERT INTO acknowledgement (agency,quarter,isRead,year)
                values ((select tblprojects.agencyid from tblprojects where projid = :projid ),:quarter,0,year(now()));
             ');
            $statement->bindParam(':projid', $pid);
            $statement->bindParam(':quarter', $quarter);
      
            $statement->execute();
        }
        function initializeEx($pid,$quarter){ //initialize acknowledgment of project exception
            
            $db =  new database();
            $statement=  $db->getDb()->prepare('
                INSERT INTO acknowledgementexc (agency,quarter,isRead,year)
                values ((select tblprojects.agencyid from tblprojects where projid = :projid ),:quarter,0,year(now()));
             ');
            $statement->bindParam(':projid', $pid);
            $statement->bindParam(':quarter', $quarter);
            $statement->execute();
        }
        function initializeMon($id){ //initialize acknowledgment of monitoring plan
          //  error_log($id . $year);
            $db =  new database();
            $statement=  $db->getDb()->prepare('
                INSERT INTO acknowledgementmoni (agency,isRead,year)
                values (:id,0,year(now()));
             ');
            $statement->bindParam(':id', $id);
            
        
            $statement->execute();
            return $statement;
        }
        function isContain($pid,$quarter){ // checking if the acknowledgement is contained
                $db =  new database();
                

            $statement=  $db->getDb()->prepare('select agency from acknowledgement where
 acknowledgement.agency = (select agencyid from tblprojects where projid =  :projid) and acknowledgement.quarter = :quarter and acknowledgement.year =  year(now())');
            $statement->bindParam(':projid', $pid);
            $statement->bindParam(':quarter', $quarter);
        
            $statement->execute();
            
            
            $result =  $statement->rowCount();
          
            if($result>0){
                return true;
                
                }
            else{ 
               return false;
                
                }
              
        }
        function isContainEx($pid,$quarter){
                $db =  new database();
                

            $statement=  $db->getDb()->prepare('select agency from acknowledgementexc where
 acknowledgementexc.agency = (select agencyid from tblprojects where projid =  :projid) and acknowledgementexc.quarter = :quarter and acknowledgementexc.year =  year(now())');
            $statement->bindParam(':projid', $pid);
            $statement->bindParam(':quarter', $quarter);
            $statement->execute();
            
            
            $result =  $statement->rowCount();
          
            if($result>0){
                return true;
                
                }
            else{ 
               return false;
                
                }
              
        }
        function isContainMon($id){
                $db =  new database();
                

            $statement=  $db->getDb()->prepare('select agency from acknowledgementmoni where
 acknowledgementmoni.agency = :id and acknowledgementmoni.year = year(now())');
            $statement->bindParam(':id', $id);
           
            $statement->execute();
            
            
            $result =  $statement->rowCount();
          
            if($result>0){
                return true;
                
                }
            else{ 
               return false;
                
                }
              
        }
        
    }
?>