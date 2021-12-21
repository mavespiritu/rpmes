<?php





    
class projectDAO {

    
       function  generateNewID(){ // this is to generate a new ID... purpose of this is to avoid the conflict of ID
        
    
            $db = new database();
    
    
    $id = rand();
   
       $statement = $db->getDb()->prepare(' SELECT if(count(projid)>0,"true", "false") as isExist  FROM tblprojects WHERE tblprojects.projid = '.$id);
       
    
        $statement->execute();
       
        
       $result = $statement->fetch(PDO::FETCH_OBJ);
       
       

      if($result->isExist == "false")
          
      {
          return $id;
      }
      else
      {
         $this->generateNewID(); 
      }
     
 
            
    
        
    }
    function getProjectResult($year,$agency){
        
        if($agency != 0){
            $que = " AND tblprojects.agencyid  = ".$agency;
        }
        else
        {
            $que = "";
        }
               $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
    tblprojects.projid,
	tblprojects.projname,
		tblprojects.projObjective,
		tblprojects.expectedresult as indicator,
			tblprojects.actualresult as observedresult    
FROM
     tblprojects  
INNER JOIN tblprojtargets
on ( tblprojects.projid = tblprojtargets.projid)
WHERE (tblprojects.projObjective IS NOT NULL and NOT tblprojects.projObjective  = "" ) 
and (tblprojects.expectedresult IS NOT NULL and NOT tblprojects.expectedresult  = "")
and tblprojects.yrenrolled = :year and tblprojtargets.isApproved = 1   '.$que);
    
       $statement->bindParam(':year', $year);
    $statement->execute();   
    
    
       
        return $statement;
       
        
        
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
    }
   
    
   function approve($id,$submittor){
       
        
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
    tblprojects.projid
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
WHERE (tblprojects.agencyid = :id
    AND tblprojtargets.isApproved = 0)');
    
       $statement->bindParam(':id', $id);
    $statement->execute();   
    $result = $statement;   
       $statement1 = $db->getDb()->prepare('Update  tblprojtargets  SET isApproved  = 1 , submittor = :submittor , datesub = now() where projid = :id');
       
       
       while($row=$result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
                {
        if($row){
           $statement1->bindParam(':id', $row[0]);
       
              $statement1->bindParam(':submittor', $submittor);
              $statement1->execute();
        }
              }
    
       
    return $statement;
       
        
        
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }


   }
   
       function getPrograms(){
        
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
     tblprojects.programname
FROM
   tblprojects  WHERE not tblprojects.programname = "no program"
GROUP BY programname
    ');
    

    $statement->execute();   
 
      
    
       
        return $statement;
       
        
        
        }    catch (PDOException $e){
          
     
            return false;
       
 }
    
    }
   
   function delete($id){
       
        
            $db = new database();
    
        try{
      
       $statement = $db->getDb()->prepare('DELETE from tblprojtargets where projid = :id;
                                            DELETE from tblprojaccomplishment where projid = :id;
                                            DELETE from projectexception where projid = :id;
                                            DELETE from tblform7 where projid = :id;
                                            DELETE from tblform8 where projid = :id;
                                            DELETE from tblprojects where projid = :id;
                                             ');
          $statement->bindParam(':id', $id);
  
            $statement->execute();
  
        return true;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }


   }
   function deleteFrm7($id,$quarter){
       
        
            $db = new database();
    
        try{
      
       $statement = $db->getDb()->prepare('UPDATE  `tblform7` SET  `nameOfProject` = NULL ,
`location` = NULL ,
`implementingAgency` = NULL ,
`q'.$quarter.'dateOfProjectInspection` = NULL ,
`q'.$quarter.'physicalStatus` = NULL ,
`q'.$quarter.'issues` = NULL ,
`projectCost` = NULL ,
`q'.$quarter.'actionRecommendation` = NULL WHERE  `tblform7`.`projid` =:id LIMIT 1 ;
                                             ');
          $statement->bindParam(':id', $id);
  
            $statement->execute();
  
        return true;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }


   }
   function deleteFrm8($id,$quarter){
       
        
            $db = new database();
    
        try{
      
       $statement = $db->getDb()->prepare('UPDATE  `tblform8` SET  `nameOfProject` = NULL ,
`location` = NULL ,
`implementingAgency` = NULL ,
`q'.$quarter.'dateOfPSS` = NULL ,
`q'.$quarter.'concernedAgencies` = NULL ,
`q'.$quarter.'agreementsReached` = NULL ,
`q'.$quarter.'nextSteps` = NULL WHERE  `tblform8`.`projid` =:id LIMIT 1 ;
                                             ');
          $statement->bindParam(':id', $id);
  
            $statement->execute();
  
        return true;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }


   }
     function  addProject(projects $model){
         
   
             $arr =array(':projid'=> $model->getProjid(),
               ':agencyid'=> $model->getAgencyid(), 
      
           ':fundid'=>$model->getFundid(),
           ':locid'=> $model->getLocid(),
           ':secid'=> $model->getSecid(),
           ':subsecid'=> $model->getSubsecid(),
           ':projname'=> $model->getProjname(),
           ':unitofmeasure'=> $model->getUnitofmeasure(),
           ':enrolledby'=> $model->getEnrolledby(),
           ':programname'=> $model->getProgramname(),
           ':datatype'=> $model->getDatatype(),
           ':datestart'=> $model->getStart(),
           ':dateend'=> $model->getEnd(),
           ':typhoon'=> $model->getTyphoon(),
           ':projobj'=> $model->getProjObjective(),
           ':expresult'=> $model->getExpectedResult(),
           ':ordering'=> $model->getOrdering(),
           ':period'=> $model->getPeriod());
       
     
       
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblprojects (
                                                `projid` ,
                                                `agencyid` ,                                           
                                                `fundid` ,
                                                `locid` ,
                                                `secid` ,
                                                `subsecid` ,
                                                `projname` ,
                                                `unitofmeasure` ,
                                                `yrenrolled` ,
                                                `enrolledby`,
                                                `period`,
                                                `programname`,
                                                `datatype`,
                                                `typhoon`,
                                                `datestart`,
                                                `dateend`,
                                                `projObjective`,
                                                `expectedresult`,
                                                `ordering`
                                                
                    )
                    VALUES (
                    :projid , :agencyid ,  :fundid , :locid , :secid , :subsecid ,
                    :projname , :unitofmeasure, year(now()), :enrolledby,:period,
                    :programname,:datatype,:typhoon,:datestart,:dateend,:projobj,:expresult,:ordering
                    )');
       
   
       
    
        $statement->execute($arr);
       
        return $statement;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
        
   
    }
     function  updateProject(projects $model){
         
   
               $arr =array(':projid'=> $model->getProjid(),
               ':agencyid'=> $model->getAgencyid(), 
      
           ':fundid'=>$model->getFundid(),
           ':locid'=> $model->getLocid(),
           ':secid'=> $model->getSecid(),
           ':subsecid'=> $model->getSubsecid(),
           ':projname'=> $model->getProjname(),
           ':unitofmeasure'=> $model->getUnitofmeasure(),
           ':projObj'=> $model->getProjObjective(),
           ':expproj'=> $model->getExpectedResult(),
         
         
           ':programname'=> $model->getProgramname(),
           ':datatype'=> $model->getDatatype(),
           ':datestart'=> $model->getStart(),
           ':dateend'=> $model->getEnd(),
           ':typhoon'=> $model->getTyphoon(),
           ':ordering'=> $model->getOrdering(),
           ':period'=> $model->getPeriod());
       
     
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('Update tblprojects set
                                              
                                                agencyid = :agencyid,
                                           
                                                fundid = :fundid,
                                                locid = :locid,
                                                secid = :secid,
                                                subsecid = :subsecid,
                                                projname = :projname,
                                                unitofmeasure = :unitofmeasure,
                                                projObjective = :projObj,
                                                expectedresult = :expproj,
                                                programname = :programname,                                            
                                                datatype = :datatype,
                                                datestart = :datestart,
                                                dateend = :dateend,
                                                typhoon = :typhoon,
                                                ordering = :ordering,
                                                period = :period where projid = :projid  ');
       
   
       
    
        $statement->execute($arr);
       
        return $statement;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
        
       
          
            
    
       
     
    }
    
     function  updateTargets(projtargets $model){
         
   
             $arr =array(':projid'=> $model->getProjid(),
                        ':agencyid'=> $model->getAgencyid(),
                 ':q1Ptarget' => $model->getQ1PTraget(),
                 ':q1Ftarget'=> $model->getQ1FTraget(),
                     ':q1Mtarget'=> $model->getQ1MTraget(),
                 ':q1Wtarget'=> $model->getQ1WTraget(), 
                    ':q2Ptarget' => $model->getQ2PTraget(),
                    ':q2Ftarget' => $model->getQ2FTraget(),
                 ':q2Mtarget' => $model->getQ2MTraget(),
                 ':q2Wtarget'=> $model->getQ2WTraget(),
                    ':q3Ptarget' => $model->getQ3PTraget(),
                 ':q3Ftarget'  => $model->getQ3FTraget(),
                 ':q3Mtarget' => $model->getQ3MTraget(),
                 ':q3Wtarget'=> $model->getQ3WTraget(),
                    ':q4Ptarget' => $model->getQ4PTraget(),
                 ':q4Ftarget' => $model->getQ4FTraget(),
                 ':q4Mtarget'=> $model->getQ4MTraget(),
                 ':q4Wtarget'=> $model->getQ4WTraget());
       
     
       
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('Update  tblprojtargets set

agencyid = :agencyid ,
q1Ptarget = :q1Ptarget,
q1Ftarget = :q1Ftarget,
q1Mtarget = :q1Mtarget,
q1Wtarget = :q1Wtarget,
q2Ptarget = :q2Ptarget,
q2Ftarget = :q2Ftarget,
q2Mtarget = :q2Mtarget,
q2Wtarget = :q2Wtarget,
q3Ptarget = :q3Ptarget,
q3Ftarget = :q3Ftarget,
q3Mtarget = :q3Mtarget,
q3Wtarget = :q3Wtarget,
q4Ptarget = :q4Ptarget,
q4Ftarget = :q4Ftarget,
q4Mtarget = :q4Mtarget,
q4Wtarget = :q4Wtarget
where 
projid = :projid');
       
   

        $statement->execute($arr);
       
        return true;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
        
       
          
            
    
       
     
    }
     function  subProjectResult($id, $actual){ //  project result submission
         
   
     
       
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('Update  tblprojects set

actualresult = :actual 
where 

projid = :projid');
       
   

        $statement->bindParam(':projid',$id);
        $statement->bindParam(':actual',$actual);
        $statement->execute();
       
        return true;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
        
       
          
            
    
       
     
    }
     function  addTargets(projtargets $model){ //  adding targets
         
   
             $arr =array(':projid'=> $model->getProjid(),
                        ':agencyid'=> $model->getAgencyid(),
                 ':q1Ptarget' => $model->getQ1PTraget(),
                 ':q1Ftarget'=> $model->getQ1FTraget(),
                 ':q1Mtarget'=> $model->getQ1MTraget(),
                 ':q1Wtarget'=> $model->getQ1WTraget(), 
                 ':q2Ptarget' => $model->getQ2PTraget(),
                 ':q2Ftarget' => $model->getQ2FTraget(),
                 ':q2Mtarget' => $model->getQ2MTraget(),
                 ':q2Wtarget'=> $model->getQ2WTraget(),
                 ':q3Ptarget' => $model->getQ3PTraget(),
                 ':q3Ftarget'  => $model->getQ3FTraget(),
                 ':q3Mtarget' => $model->getQ3MTraget(),
                 ':q3Wtarget'=> $model->getQ3WTraget(),
                 ':q4Ptarget' => $model->getQ4PTraget(),
                 ':q4Ftarget' => $model->getQ4FTraget(),
                 ':q4Mtarget'=> $model->getQ4MTraget(),
                 ':q4Wtarget'=> $model->getQ4WTraget());
       
     
       
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblprojtargets (
`projid` ,
`agencyid` ,
`q1Ptarget` ,
`q1Ftarget` ,
`q1Mtarget` ,
`q1Wtarget` ,
`q2Ptarget` ,
`q2Ftarget` ,
`q2Mtarget` ,
`q2Wtarget` ,
`q3Ptarget` ,
`q3Ftarget` ,
`q3Mtarget` ,
`q3Wtarget` ,
`q4Ptarget` ,
`q4Ftarget` ,
`q4Mtarget` ,
`q4Wtarget` ,
`datesub`
)
VALUES (
:projid, :agencyid , :q1Ptarget , :q1Ftarget , :q1Mtarget , :q1Wtarget , 
                    :q2Ptarget , :q2Ftarget , :q2Mtarget , :q2Wtarget ,
                    :q3Ptarget , :q3Ftarget , :q3Mtarget , :q3Wtarget ,
                    :q4Ptarget , :q4Ftarget , :q4Mtarget , :q4Wtarget ,
                        now())');
       
   
       
    
        $statement->execute($arr);
       
        return 'true';
        }    
 catch (PDOException $e){
          
     
            return 'false';
       
 }
        
       
          
            
    
       
     
    }
    
    
       
    
  
    
    
    
     function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojects');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
    
    
    
    
   function countMyEntry($agencyId){
    
$db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('Select
*
FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
WHERE (tblagency.agencyid = :id)');
       
     $statement->bindParam(':id', $agencyId);
       
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
           
           
      
       
      
   
       return $statement->rowCount();
       
   }
   function getLastNoOfProj($agencyId){
    
$db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('Select
ordering
FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
WHERE (tblagency.agencyid = :id) order by ordering DESC');
       
     $statement->bindParam(':id', $agencyId);
       
        $statement->execute();
        
        $f =$statement->fetch(PDO::FETCH_OBJ,  PDO::FETCH_ORI_LAST);
        if($statement->rowCount()>0){
        return $f->ordering;
        }else{
        return 0;    
        }
        }    
 catch (PDOException $e){
        
    
 }
        
       

       
   }
}



?>
