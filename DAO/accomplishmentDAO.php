<?Php

class accomplishmentDAO{
    

    
    
     function addF8(frm8 $mode,$quarter){ // function to add a form 8 details
       
            $arr =array(
                ':projid'=> $mode->getProjid(),
                ':location'=> $mode->getLocation(),
                ':projname'=> $mode->getProjectname(),
                ':implementingAgency'=> $mode->getImplementingAgency(),
                ':dateOfPSS'=> $mode->getDateOfPSS(),
                ':concernedAgency'=> $mode->getConcernedAgency(),
                ':agreementsReached'=> $mode->getAgreementReached(),
                ':preparedBy'=> $mode->getPreparedBy(),
                ':nexSteps'=> $mode->getNextStep());
    
        $db = new database();
        
        if($quarter>=1||$quarter<=4){
        $statement = $db->getDb()->prepare('
UPDATE tblform8 SET 
    nameOfProject = :projname,
    location = :location,
    implementingAgency = :implementingAgency,
    preparedBy = :preparedBy,
    q'.$quarter.'dateOfPSS = :dateOfPSS,
    q'.$quarter.'concernedAgencies = :concernedAgency,
    q'.$quarter.'agreementsReached = :agreementsReached,
    q'.$quarter.'nextSteps = :nexSteps
        Where projid = :projid
');
     
        $statement->execute($arr);
    
        }
       
    

     return  $statement;
                
    }
     function addF7(frm7 $mode,$quarter){ //  function to add a form 7 details
       
            $arr =array(
                ':projid'=> $mode->getProjid(),
                ':location'=> $mode->getLocation(),
                ':projname'=> $mode->getProjectname(),
                ':implementingAgency'=> $mode->getImplementingAgency(),
                ':dateOfProjectInspection'=> $mode->getDateOfProjectInspection(),
                ':physicalStatus'=> $mode->getPhysicalStatus(),
                ':projectCost'=> $mode->getProjectCost(),
                ':preparedBy'=> $mode->getPreparedBy(),
                ':action'=> $mode->getActionTaken(),
                ':issues'=> $mode->getIssues());
    
        $db = new database();
        
        if($quarter>=1||$quarter<=4){
        $statement = $db->getDb()->prepare('
UPDATE tblform7 SET 
    nameOfProject = :projname,
    location = :location,
    implementingAgency = :implementingAgency,
    projectCost = :projectCost,
    q'.$quarter.'dateOfProjectInspection = :dateOfProjectInspection,
    q'.$quarter.'physicalStatus = :physicalStatus,
    q'.$quarter.'actionRecommendation = :action,
    q'.$quarter.'issues = :issues,
    preparedBy = :preparedBy
        Where projid = :projid
');
     
        $statement->execute($arr);
    
        }
       
    

     return  $statement;
                
    }
     function getProjWAcc($secid,$agencyid){ //listing the project for accomplishment. with sector id and agency id parameter 
       
         
    
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblprojects.projid

    , tblprojects.projname

FROM
    tblprojects
    
WHERE tblprojects.secid = :secid
AND tblprojects.agencyid = :agencyid
GROUP BY tblprojects.projid
');
      
        $statement->bindParam(':secid', $secid);
        $statement->bindParam(':agencyid', $agencyid);
        $statement->execute();
    

       
    

     return  $statement;
                
    }
     function getProvinceWAcc($fundid,$agencyid,$locid,$secid,$year){//listing the project for accomplishment. with fund source id , location id , year, sector id and agency id parameter 
       
         
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tbllocation.provincename

FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
      INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
     
WHERE tblprojects.secid = :secid
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'  

AND tblprojtargets.isApproved = 1 
GROUP BY tbllocation.provincename
');
      
        $statement->bindParam(':secid', $secid);

        $statement->execute();

 
     return  $statement;
                
    }
     function getSubsecWAcc($fundid,$agencyid,$locid,$secid,$year){ // getting subsector for accomplishments 
       
         
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblprojsubsector.subsecid

    , tblprojsubsector.subsecname

FROM
    tblprojects
    INNER JOIN tblprojsubsector 
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
      INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
     
WHERE tblprojects.secid = :secid
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'  

AND tblprojtargets.isApproved = 1 
GROUP BY tblprojsubsector.subsecid
');
    
        $statement->bindParam(':secid', $secid);

        $statement->execute();

 
     return  $statement;
                
    }
     function getAgencyWAccSllipage($quarter,$fundid,$agencyid,$locid,$secid,$year){ // getting list of solved accomplishments order by agency
       
      if($quarter == 1){
            $allocationC = '(tblprojtargets.q1Ftarget)';
         $obligationC = '(tblprojaccomplishment.q1Obligations )';
         $paccompC = '(tblprojaccomplishment.q1Paccomp)';
         $maccompC= '(tblprojaccomplishment.q1Maccomp)';
         $releasesC= '(tblprojaccomplishment.q1Releases)';
         $ftargetC= '(tblprojtargets.q1Ftarget)';
         $mtargetC= '(tblprojtargets.q1Mtarget)';
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
         $expenditureC= '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
      }
      else if($quarter == 2){
         $allocationC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q2Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q2Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q2Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q2Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)
END)';
          }
      else if($quarter == 3){
         $allocationC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q3Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q3Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q3Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q3Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)
END)';
       
      }
      else if($quarter == 4){
            $allocationC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q4Obligations>0 THEN tblprojaccomplishment.q4Obligations 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q4Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q4Maccomp>0 THEN tblprojaccomplishment.q4Maccomp 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q4Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q4Releases>0 THEN tblprojaccomplishment.q4Releases 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q4Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q4Mtarget>0 THEN tblprojtargets.q4Mtarget 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q4Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)>0 THEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable) 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)
END)';
         
      }
     
          if($quarter == 1){
       $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
      $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
   
      }
      else if($quarter == 2){
    $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
     
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
      
         }
      else if($quarter == 3){
   
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
  
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
             
      }
      else if($quarter == 4){
          
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
           
         $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
          
          }
    
    
          /*default or Maintained*/
      $ftargetTOTAL = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
      $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
 
          /*Cumulative*/
      $ftargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
      $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';

   
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblagency.agencyid

    , tblagency.agencycode
,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
      INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tblprojaccomplishment
            ON (tblprojaccomplishment.projid = tblprojects.projid)
     
WHERE 1=1
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'    '.$param5.'  

AND tblprojtargets.isApproved = 1 
GROUP BY tblagency.agencyid
ORDER BY agencycode
');
      
       
        $statement->execute();
    
error_log("form 6".$statement->queryString);
       
    

     return  $statement;
                
    }
     function getFrm7($quarter,$fundid,$agencyid,$locid,$secid,$year){ // getting the data from form 7 with a parameters
       
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
tblform7.projid,
tblform7.implementingAgency,
tblform7.location,
tblform7.nameOfProject as projname,
tblform7.q'.$quarter.'actionRecommendation as actionRecommendation,
tblform7.q'.$quarter.'dateOfProjectInspection as dateOfProjectInspection,
tblform7.q'.$quarter.'issues as issues,
tblform7.q'.$quarter.'physicalStatus as physicalStatus  


FROM
    tblprojects
    INNER JOIN tblform7
             ON (tblform7.projid = tblprojects.projid)
    INNER JOIN tblprojtargets
             ON (tblprojtargets.projid = tblprojects.projid)
   
WHERE tblform7.nameOfProject is not null 
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'    '.$param5.'  

AND tblprojtargets.isApproved = 1 
');
    
        $statement->execute();
    

       
    

     return  $statement;
                
    }
     function getFrm8($quarter,$fundid,$agencyid,$locid,$secid,$year){ // getting form 8 with parameters
       
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
tblform8.projid,

tblform8.nameOfProject as projname,
tblform8.implementingAgency,
tblform8.location,
tblform8.q'.$quarter.'dateOfPSS as dateOfPSS,
tblform8.q'.$quarter.'concernedAgencies as concernedAgencies,
tblform8.q'.$quarter.'agreementsReached as agreementsReached,
tblform8.q'.$quarter.'nextSteps as nexSteps


FROM
    tblprojects
    INNER JOIN tblform8
             ON (tblform8.projid = tblprojects.projid)
   
    INNER JOIN tblprojtargets
             ON (tblprojtargets.projid = tblprojects.projid)
   
WHERE tblform8.nameOfProject is not null 
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'    '.$param5.'  

AND tblprojtargets.isApproved = 1 
');
    
        $statement->execute();
    

       
    

     return  $statement;
                
    }
     function getAgencyWAcc($fundid,$agencyid,$locid,$secid,$year){
       
         
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblagency.agencyid

    , tblagency.agencycode

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
      INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
     
WHERE 1=1
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'    '.$param5.'  

AND tblprojtargets.isApproved = 1 
GROUP BY tblagency.agencyid
ORDER BY agencycode
');
      
        $statement->bindParam(':secid', $secid);
        $statement->execute();
    

       
    

     return  $statement;
                
    }
     function getAgencyWAcc2($fundid,$agencyid,$locid,$secid,$year,$subsec){
       
         
      
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
         if ($subsec == 0){
             $param6  = "";
         }
         else {
             $param6 = ' AND tblprojects.subsecid = '.$subsec;
         }
     
         
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblagency.agencyid

    , tblagency.agencycode

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
      INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
     
WHERE 1=1
'.$param1.'  '.$param2.' '.$param3.'    '.$param4.'    '.$param5.'   '.$param6.'   

AND tblprojtargets.isApproved = 1 
GROUP BY tblagency.agencyid
ORDER BY agencycode
');
      
        $statement->bindParam(':secid', $secid);
        $statement->execute();
    

       
    

     return  $statement;
                
    }
     function getFundWAcc($fundid,$agencyid,$locid,$secid,$year){
       
   
        
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
    
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblfundsrc.fundid

    , tblfundsrc.fundcode
    , tblfundsrc.funddesc

FROM
    tblprojects

    INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
WHERE 1=1 '.$param1.'  '.$param2.' '.$param3.'    '.$param4.'  '.$param5.'  
 
GROUP BY tblfundsrc.fundid
');
      
        
        $statement->execute();
    


     return  $statement;
                
    }
     function getSectorWAcc($fundid,$agencyid,$locid,$secid,$year){ // getting sector for accomplishments
       
   
        
         
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }
         if ($secid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.secid = '.$secid;
         }
    
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblprojsector.secid

    , tblprojsector.secname

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
WHERE 1=1 '.$param1.'  '.$param2.' '.$param3.'    '.$param4.'  '.$param5.'  
 
GROUP BY tblprojsector.secid
');
        $statement->execute();
    


     return  $statement;
                
    }
    function getPROJECTData($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$agencyid ,$projid,$datatype){ // getting weighted project data 
                  
               $db = new database();
         $row = null;
         $ctr=0;
     $dataRet = array(
   
          "indicator"=>"",
          "projnum"=>0,
          "fundid"=>0,
          "agencyid"=>0,
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0,
         "financiallyCorrelated"=>0,
         "ftotal"=>0,
         "mtotal"=>0,
         "ptotal"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects WHERE tblprojects.secid = :secid AND agencyid =:agencyid');
    $statement->bindParam(':secid', $smrySect);
    $statement->bindParam(':agencyid', $agencysmrtbl);
  

        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                   

                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
if($row){
    $ctr++;//make the formula for weigted here
    
             $dataRet["projnum"] = $ctr;
             $dataRet["indicator"] = $row->unitofmeasure;
             $dataRet["agencyid"] = $agencyid;
             $dataRet["fundid"] = $optfundsrc;
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["ftotal"] +=$row->ftargetTOTAL;
         $dataRet["ptotal"] +=$row->ptargetTOTAL;
         $dataRet["mtotal"] +=$row->mtargetTOTAL;
         $dataRet["targetTodate"]+=($row->targetTodate*$row->ftargetTOTAL);
         $dataRet["actualTodate"]+=($row->actualTodate*$row->ftargetTOTAL);
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
  
              }
              
 }
 if($dataRet["releases"]!=0||$dataRet["ftotal"]!=0)
     $dataRet["fundsupport"] =($dataRet["releases"]/$dataRet["ftotal"])*100;
 if($dataRet["releases"]!=0||$dataRet["expenditure"]!=0)
 $dataRet["fundutilization"] =($dataRet["expenditure"]/$dataRet["releases"])*100;
 if($dataRet["targetTodate"]!=0||$dataRet["ftotal"]!=0)
 $dataRet["targetTodate"] = $dataRet["targetTodate"]/$dataRet["ftotal"];
 if($dataRet["actualTodate"]!=0||$dataRet["ftotal"]!=0)
 $dataRet["actualTodate"] = $dataRet["actualTodate"]/$dataRet["ftotal"];
  if($dataRet["actualTodate"]!=0||$dataRet["targetTodate"]!=0)
 $dataRet["sllipage"] = $dataRet["actualTodate"]-$dataRet["targetTodate"];
  if($dataRet["actualTodate"]!=0||$dataRet["targetTodate"]!=0)
 $dataRet["performance"] = ($dataRet["actualTodate"]/$dataRet["targetTodate"])*100;
  if($dataRet["performance"]!=0&&$dataRet["fundutilization"]!=0)
  $dataRet["financiallyCorrelated"] = ($dataRet["performance"]/$dataRet["fundutilization"])*100;

     return $dataRet;
 }
    function getAgencyWeightedData($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$agencyid ){ // getting weighted project data  order by agency
                  
               $db = new database();
         $row = null;
         $ctr=0;
     $dataRet = array(
   
          "indicator"=>"",
          "projnum"=>0,
          "fundid"=>0,
          "agencyid"=>0,
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0,
         "financiallyCorrelated"=>0,
         "ftotal"=>0,
         "mtotal"=>0,
         "ptotal"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects WHERE tblprojects.secid = :secid AND agencyid =:agencyid');
    $statement->bindParam(':secid', $smrySect);
    $statement->bindParam(':agencyid', $agencysmrtbl);
  

        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                   

                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
if($row){
    $ctr++;//make the formula for weigted here
    
             $dataRet["projnum"] = $ctr;
             $dataRet["indicator"] = $row->unitofmeasure;
             $dataRet["agencyid"] = $agencyid;
             $dataRet["fundid"] = $optfundsrc;
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["ftotal"] +=$row->ftargetTOTAL;
         $dataRet["ptotal"] +=$row->ptargetTOTAL;
         $dataRet["mtotal"] +=$row->mtargetTOTAL;
         $dataRet["targetTodate"]+=($row->targetTodate*$row->ftargetTOTAL);
         $dataRet["actualTodate"]+=($row->actualTodate*$row->ftargetTOTAL);
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
  
              }
              
 }
 try{
 if($dataRet["ftotal"]!=0)$dataRet["fundsupport"] =($dataRet["releases"]/$dataRet["ftotal"])*100;
else $dataRet["fundsupport"] ="N/A";
 
 if($dataRet["releases"]!=0)$dataRet["fundutilization"] =($dataRet["expenditure"]/$dataRet["releases"])*100;
 else $dataRet["fundutilization"] ="N/A";
 
 if($dataRet["ftotal"]!=0)$dataRet["targetTodate"] = $dataRet["targetTodate"]/$dataRet["ftotal"];
 else $dataRet["targetTodate"] = "N/A";
 
 
 if($dataRet["ftotal"]!=0)$dataRet["actualTodate"] = $dataRet["actualTodate"]/$dataRet["ftotal"];
 else $dataRet["actualTodate"] = "N/A";
 
  if($dataRet["actualTodate"]!=0||$dataRet["targetTodate"]!=0)
 $dataRet["sllipage"] = $dataRet["actualTodate"]-$dataRet["targetTodate"];
 
  
  if($dataRet["targetTodate"]!=0)$dataRet["performance"] = ($dataRet["actualTodate"]/$dataRet["targetTodate"])*100;
else  $dataRet["performance"] = "N/A";

  if($dataRet["fundutilization"]!=0)$dataRet["financiallyCorrelated"] = ($dataRet["performance"]/$dataRet["fundutilization"])*100;
  $dataRet["financiallyCorrelated"] = "N/A";
 }catch(Exception $e){
     
 }
 
 
  $dataRet["allocation"] = number_format($dataRet["allocation"]);
         $dataRet["obligation"] = number_format($dataRet["obligation"]);
         $dataRet["releases"] = number_format($dataRet["releases"]);
         $dataRet["expenditure"] = number_format($dataRet["expenditure"]);
         $dataRet["fundsupport"] = number_format($dataRet["fundsupport"],2);
         $dataRet["fundutilization"] = number_format($dataRet["fundutilization"],2);
         $dataRet["targetTodate"] = number_format($dataRet["targetTodate"],2);
         $dataRet["actualTodate"] = number_format($dataRet["actualTodate"],2);
         $dataRet["sllipage"] = number_format($dataRet["sllipage"],2);
         $dataRet["performance"] = number_format($dataRet["performance"],2);
         $dataRet["employmentGenerated"] = number_format($dataRet["employmentGenerated"],2);
         $dataRet["financiallyCorrelated"] = number_format($dataRet["financiallyCorrelated"],2);
         
 

 
 
 
 
     return $dataRet;
 }
    
    function getSectorWeightedData($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$agencyid ){ // getting weighted project order by sector
                  
               $db = new database();
         $row = null;
         $ctr=0;
     $dataRet = array(
   
          "indicator"=>"",
          "projnum"=>0,
          "fundid"=>0,
          "agencyid"=>0,
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0,
         "financiallyCorrelated"=>0,
         "ftotal"=>0,
         "mtotal"=>0,
         "ptotal"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects WHERE tblprojects.secid = :secid');
    $statement->bindParam(':secid', $smrySect);
  

        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                   

                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
if($row){
    $ctr++;//make the formula for weigted here
    
             $dataRet["projnum"] = $ctr;
             $dataRet["indicator"] = $row->unitofmeasure;
             $dataRet["agencyid"] = $agencyid;
             $dataRet["fundid"] = $optfundsrc;
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["ftotal"] +=$row->ftargetTOTAL;
         $dataRet["ptotal"] +=$row->ptargetTOTAL;
         $dataRet["mtotal"] +=$row->mtargetTOTAL;
         $dataRet["targetTodate"]+=($row->targetTodate*$row->ftargetTOTAL);
         $dataRet["actualTodate"]+=($row->actualTodate*$row->ftargetTOTAL);
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
  
              }
              
 }
 if($dataRet["releases"]!=0||$dataRet["ftotal"]!=0)
     $dataRet["fundsupport"] =($dataRet["releases"]/$dataRet["ftotal"])*100;
 if($dataRet["releases"]!=0||$dataRet["expenditure"]!=0)
 $dataRet["fundutilization"] =($dataRet["expenditure"]/$dataRet["releases"])*100;
 if($dataRet["targetTodate"]!=0||$dataRet["ftotal"]!=0)
 $dataRet["targetTodate"] = $dataRet["targetTodate"]/$dataRet["ftotal"];
 if($dataRet["actualTodate"]!=0||$dataRet["ftotal"]!=0)
 $dataRet["actualTodate"] = $dataRet["actualTodate"]/$dataRet["ftotal"];
  if($dataRet["actualTodate"]!=0||$dataRet["targetTodate"]!=0)
 $dataRet["sllipage"] = $dataRet["actualTodate"]-$dataRet["targetTodate"];
  if($dataRet["actualTodate"]!=0||$dataRet["targetTodate"]!=0)
 $dataRet["performance"] = ($dataRet["actualTodate"]/$dataRet["targetTodate"])*100;
  if($dataRet["performance"]!=0&&$dataRet["fundutilization"]!=0)
  $dataRet["financiallyCorrelated"] = ($dataRet["performance"]/$dataRet["fundutilization"])*100;

  
   
  $dataRet["allocation"] = number_format($dataRet["allocation"]);
         $dataRet["obligation"] = number_format($dataRet["obligation"]);
         $dataRet["releases"] = number_format($dataRet["releases"]);
         $dataRet["expenditure"] = number_format($dataRet["expenditure"]);
         $dataRet["fundsupport"] = number_format($dataRet["fundsupport"],2);
         $dataRet["fundutilization"] = number_format($dataRet["fundutilization"],2);
         $dataRet["targetTodate"] = number_format($dataRet["targetTodate"],2);
         $dataRet["actualTodate"] = number_format($dataRet["actualTodate"],2);
         $dataRet["sllipage"] = number_format($dataRet["sllipage"],2);
         $dataRet["performance"] = number_format($dataRet["performance"],2);
         $dataRet["employmentGenerated"] = number_format($dataRet["employmentGenerated"],2);
         $dataRet["financiallyCorrelated"] = number_format($dataRet["financiallyCorrelated"],2);
         
 
     return $dataRet;
 }
    
    
 function getAccompByFunds($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$fundid ){
                  
        $db = new database();
   $row = null;
     $dataRet = array(
   
         "fundid"=>0,
         
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects where  fundid = :fundid');
    

        $statement->bindParam(':fundid', $fundid);
        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                     

                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
if($row){
   
      
         $dataRet["fundid"] = $fundid;
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["fundsupport"] +=$row->fundsupport;
         $dataRet["fundutilization"] +=$row->fundutilizition;
         $dataRet["targetTodate"]+=$row->targetTodate;
         $dataRet["actualTodate"]+=$row->actualTodate;
         $dataRet["sllipage"]+=$row->sllipage;
         $dataRet["performance"] += $row->performance;
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
      

              }
              
 }
        
     
     return $dataRet;
 }
 function getAccompByAgencys($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$agencyid, $fundid ){
                  
               $db = new database();
         $row = null;
     $dataRet = array(
   
          "fundid"=>0,
          "agencyid"=>0,
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects where agencyid = :agencyid and fundid = :fundid');
    
  
        $statement->bindParam(':agencyid', $agencyid);

        $statement->bindParam(':fundid', $fundid);
        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                   

                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
if($row){
             $dataRet["agencyid"] = $agencyid;
             $dataRet["fundid"] = $fundid;
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["fundsupport"] +=$row->fundsupport;
         $dataRet["fundutilization"] +=$row->fundutilizition;
         $dataRet["targetTodate"]+=$row->targetTodate;
         $dataRet["actualTodate"]+=$row->actualTodate;
         $dataRet["sllipage"]+=$row->sllipage;
         $dataRet["performance"] += $row->performance;
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
      

              }
              
 }
        
     
     return $dataRet;
 }
 function getAccompBySector($year,$smrySect,$optfundsrc,$locationss,$agencysmrtbl,$quarter,$agencyid, $sectorid ){
                  
        $db = new database();

     $dataRet = array(         
         "allocation"=>0,
         "obligation"=>0,
         "releases"=>0,
         "expenditure"=>0,
         "fundsupport"=>0,
         "fundutilization"=>0,
         
         "targetTodate"=>0,
         "actualTodate"=>0,
         "sllipage"=>0,
         "performance"=>0,
         "employmentGenerated"=>0
         );
     
        
        $statement = $db->getDb()->prepare('SELECT projid,datatype from tblprojects where agencyid = :agencyid and secid = :secid and fundid = :fundid');
    
  
        $statement->bindParam(':agencyid', $agencyid);
        $statement->bindParam(':secid', $sectorid);
        $statement->bindParam(':fundid', $optfundsrc);
        
        
        $statement->execute();
    
       

                while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                    
                    
     
                    if($data->datatype == "Default"||$data->datatype == "default"){
                    $row = self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
                    }
                    else if($data->datatype == "Maintained"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
                    }
                    else if($data->datatype == "Cumulative"){
                    $row =  self::getAccomplishmentReport($optfundsrc,$year,$smrySect,$locationss,$agencysmrtbl,$quarter, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
                    }
            if($row){
     
         $dataRet["allocation"] += $row->allocation;
         $dataRet["obligation"]+=$row->obligation;
         $dataRet["releases"]+=$row->releases;
         $dataRet["expenditure"] +=$row->expenditure;
         $dataRet["fundsupport"] +=$row->fundsupport;
         $dataRet["fundutilization"] +=$row->fundutilizition;
         $dataRet["targetTodate"]+=$row->targetTodate;
         $dataRet["actualTodate"]+=$row->actualTodate;
         $dataRet["sllipage"]+=$row->sllipage;
         $dataRet["performance"] += $row->performance;
         $dataRet["employmentGenerated"] += $row->employmentGenerated;
                 
      

              }
              
 }
        
     
     return $dataRet;
 }
    
    
    
    
    
    
 public static function getAccomplishmentReport($fundSrcOpt,$year,$smrySect,$locationss,$agencysmrtbl,$quarter,$projid,$datatype){ // function that  get all project   with applying the equation

   /*start of filter*/
        $param1="";
         if ($fundSrcOpt == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundSrcOpt;
         }
        $param2="";
         if ($agencysmrtbl == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencysmrtbl;
         }
         $param3 = "";
         if ($locationss == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locationss;
         }
         $param4 = "";
         if ($smrySect == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.secid = '.$smrySect;
         }
         if ($year == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.yrenrolled = '.$year;
         }
         /*end of filter*/
         
   
         
         
         /*start allocation DCM*/ 
      if($quarter == 1){
         $allocationDCM = '(tblprojtargets.q1Ftarget)';
         $obligationDCM = '(tblprojaccomplishment.q1Obligations )';
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp)';
         $releasesDCM = '(tblprojaccomplishment.q1Releases)';
         $ftargetDCM = '(tblprojtargets.q1Ftarget)';
         $mtargetDCM = '(tblprojtargets.q1Mtarget)';
         $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
    
      }
      else if($quarter == 2){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp)';
         
          $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';

          $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget)';
          
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
          $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable))';
    
         }
      else if($quarter == 3){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp)';
         
           $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';

           $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget)';
         
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable))';
         
      }
      else if($quarter == 4){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations+tblprojaccomplishment.q4Obligations)';
        
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases+tblprojaccomplishment.q4Releases)';
          
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
          $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp+tblprojaccomplishment.q4Maccomp)';
          
         $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget+tblprojtargets.q4Mtarget)';
         
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
        $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)+(tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable))';
      }
    
      if($datatype==0||$datatype==1){
          /*default and Maintained*/
      $ftargetTOTAL = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
      $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
      $mtargetTOTAL = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget+tblprojtargets.q4Mtarget)';
         
      }else 
      if($datatype==2){
          /*Cumulative*/
      $ftargetTOTAL = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
      $ptargetTOTAL = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
 $mtargetTOTAL ='(CASE 
WHEN tblprojtargets.q4Mtarget>0 THEN tblprojtargets.q4Mtarget 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q4Mtarget
END)';
              }
      
         /*end allocation DCM*/ 
         
             
   
       $formulaDataReport[0] = '
            SELECT tblprojects.projname
,tblprojects.unitofmeasure
,tbllocation.provincename
,tbllocation.district
,tbllocation.city
,tblfundsrc.funddesc
,tblprojects.datestart
,tblprojects.dateend

,'.$allocationDCM.' as allocation

,('.$obligationDCM.') as obligation

,('.$releasesDCM.') as releases 

,('.$expenditureDCM.') as  expenditure

,('.$releasesDCM.'/'.$ftargetTOTAL.')*100 as fundsupport 

,('.$expenditureDCM.'/'.$releasesDCM.')*100 as fundutilizition 


,('.$ptargetDCM.' / '.$ptargetTOTAL.')*100 as targetTodate 

,('.$paccompDCM.'/'.$ptargetTOTAL.')*100 as actualTodate 

,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100 as sllipage 

,(('.$paccompDCM.' / ('.$ptargetDCM.'))*100)  as performance /* D.C.M. will apply*/

,('.$maccompDCM.'/'.$mtargetTOTAL.')*100 as employmentGenerated 

,(('.$paccompDCM.'/'.$ptargetDCM.')/
('.$expenditureDCM.'/'.$releasesDCM.'))*100 as financiallyCorrelated 

,'.$mtargetTOTAL.' as mtargetTOTAL
,'.$ftargetTOTAL.' as ftargetTOTAL
,'.$ptargetTOTAL.' as ptargetTOTAL

FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)
WHERE tblprojects.projid = 
   '.$projid.' '.$param1.' '.$param2.' '.$param3.' '.$param4 .' '.$param5;        
        
             
   
       $formulaDataReport[1] = '
            SELECT tblprojects.projname
,tblprojects.unitofmeasure
,tbllocation.provincename
,tbllocation.district
,tbllocation.city
,tblfundsrc.funddesc
,tblprojects.datestart
,tblprojects.dateend

,'.$allocationDCM.' as allocation

,('.$obligationDCM.') as obligation

,('.$releasesDCM.') as releases 

,('.$expenditureDCM.') as  expenditure

,('.$releasesDCM.'/'.$ftargetTOTAL.')*100 as fundsupport 

,('.$expenditureDCM.'/'.$releasesDCM.')*100 as fundutilizition 


,('.$ptargetDCM.' / '.$ptargetTOTAL.')*100 as targetTodate 

,('.$paccompDCM.'/'.$ptargetTOTAL.')*100 as actualTodate 

,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100 as sllipage 

,(('.$paccompDCM.' / ('.$ptargetDCM.'))*100)  as performance /* D.C.M. will apply*/

,('.$maccompDCM.'/'.$mtargetTOTAL.')*100 as employmentGenerated 

,(('.$paccompDCM.'/'.$ptargetDCM.')/
('.$expenditureDCM.'/'.$releasesDCM.'))*100 as financiallyCorrelated 

,'.$mtargetTOTAL.' as mtargetTOTAL
,'.$ftargetTOTAL.' as ftargetTOTAL
,'.$ptargetTOTAL.' as ptargetTOTAL
FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)
WHERE tblprojects.projid = 
   '.$projid.' '.$param1.' '.$param2.' '.$param3.' '.$param4 .' '.$param5;        
        
             
     
             
   
       $formulaDataReport[2] = '
            SELECT tblprojects.projname
,tblprojects.unitofmeasure
,tbllocation.provincename
,tbllocation.district
,tbllocation.city
,tblfundsrc.funddesc
,tblprojects.datestart
,tblprojects.dateend

,'.$ftargetC.' as allocation

,'.$obligationC.' as obligation

,'.$releasesC.' as releases 

,'.$expenditureC.' as  expenditure

,('.$releasesC.'/'.$ftargetTOTAL.')*100 as fundsupport 

,('.$expenditureC.'/'.$releasesC.')*100 as fundutilizition 


,('.$ptargetC.' / '.$ptargetTOTAL.')*100 as targetTodate 

,('.$paccompC.'/'.$ptargetTOTAL.')*100 as actualTodate 

,(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTAL.')*100 as sllipage 

,(('.$paccompC.' /'.$ptargetC.' )*100)  as performance 

,(tblprojtargets.q'.$quarter.'Mtarget/'.$mtargetTOTAL.')*100 as employmentGenerated 

,(('.$paccompC.'/'.$ptargetC.' )/
('.$expenditureC.'/'.$releasesC.'))*100 as financiallyCorrelated 

,'.$mtargetTOTAL.' as mtargetTOTAL
,'.$ftargetTOTAL.' as ftargetTOTAL
,'.$ptargetTOTAL.' as ptargetTOTAL
FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)
WHERE tblprojects.projid = 
   '.$projid.' '.$param1.' '.$param2.' '.$param3.' '.$param4 .' '.$param5;        
        
             
     
        
            
 
        
        $db = new database();
        

       $statement = $db->getDb()->prepare($formulaDataReport[$datatype]);




         $statement->execute();
             return $statement;

        
       
         
    }
    
    
    function getProjectForm6($quarter,$fundid,$agencyid,$locid,$secid,$year,$subsecid,$province){  // getting project for form 6
    
      
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }

        if ($subsecid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.subsecid = '.$subsecid;
         }
        if ($province == null){
             $param6  = "";
         }
         else {
             $param6 = ' AND tbllocation.provincename = "'.$province.'"';
         }
        if ($secid == 0){
             $param7  = "";
         }
         else {
             $param7 = ' AND tblprojects.secid = '.$secid;
         }
          
         
         
      if($quarter == 1){
            $allocationC = '(tblprojtargets.q1Ftarget)';
         $obligationC = '(tblprojaccomplishment.q1Obligations )';
         $paccompC = '(tblprojaccomplishment.q1Paccomp)';
         $maccompC= '(tblprojaccomplishment.q1Maccomp)';
         $releasesC= '(tblprojaccomplishment.q1Releases)';
         $ftargetC= '(tblprojtargets.q1Ftarget)';
         $mtargetC= '(tblprojtargets.q1Mtarget)';
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
         $expenditureC= '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
      }
      else if($quarter == 2){
         $allocationC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q2Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q2Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q2Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q2Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)
END)';
          }
      else if($quarter == 3){
         $allocationC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q3Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q3Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q3Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q3Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)
END)';
       
      }
      else if($quarter == 4){
            $allocationC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q4Obligations>0 THEN tblprojaccomplishment.q4Obligations 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q4Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q4Maccomp>0 THEN tblprojaccomplishment.q4Maccomp 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q4Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q4Releases>0 THEN tblprojaccomplishment.q4Releases 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q4Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q4Mtarget>0 THEN tblprojtargets.q4Mtarget 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q4Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)>0 THEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable) 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)
END)';
         
      }
     
      if($quarter == 1){
         $allocationDCM = '(tblprojtargets.q1Ftarget)';
         $obligationDCM = '(tblprojaccomplishment.q1Obligations )';
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp)';
         $releasesDCM = '(tblprojaccomplishment.q1Releases)';
         $ftargetDCM = '(tblprojtargets.q1Ftarget)';
         $mtargetDCM = '(tblprojtargets.q1Mtarget)';
         $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
    
      }
      else if($quarter == 2){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp)';
         
          $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';

          $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget)';
          
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
          $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable))';
    
         }
      else if($quarter == 3){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp)';
         
           $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';

           $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget)';
         
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable))';
         
      }
      else if($quarter == 4){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations+tblprojaccomplishment.q4Obligations)';
        
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases+tblprojaccomplishment.q4Releases)';
          
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
          $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp+tblprojaccomplishment.q4Maccomp)';
          
         $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget+tblprojtargets.q4Mtarget)';
         
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
        $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)+(tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable))';
      }
    
    
          /*default or Maintained*/
      $ftargetTOTAL = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
      $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
 
          /*Cumulative*/
      $ftargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
      $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';

   
     
   
       $formulaDataReport = '
            SELECT 
tblprojects.projid
,tblprojects.projname
,tbllocation.provincename
,tbllocation.district
,tbllocation.city
,tblagency.agencycode
,tblprojects.datatype
,tblprojtargets.q1Ftarget
,tblprojtargets.q2Ftarget
,tblprojtargets.q3Ftarget
,tblprojtargets.q4Ftarget
,projectexception.q'.$quarter.'reason as issuess
,projectexception.q'.$quarter.'recomendation as actiontaken
,'.$expenditureDCM.' as expenditure
,'.$releasesDCM.' as releases

    
,if(tblprojects.datatype="Cumulative",('.$expenditureC.'/'.$releasesC.')*100,('.$expenditureDCM.'/'.$releasesDCM.')*100) as fundutilizition 

,if(tblprojects.datatype="Cumulative",('.$ptargetC.' / '.$ptargetTOTALCUM.')*100,('.$ptargetDCM.' / '.$ptargetTOTAL.')*100) as targetTodate 

,if(tblprojects.datatype="Cumulative",('.$paccompC.'/'.$ptargetTOTALCUM.')*100,('.$paccompDCM.'/'.$ptargetTOTAL.')*100) as actualTodate 

,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' - '.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

,if(tblprojects.datatype="Cumulative",'.$ftargetTOTALCUM.','.$ftargetTOTAL.') as ftargetTOTAL
    
,if(tblprojects.datatype="Cumulative",'.$ptargetTOTALCUM.','.$ptargetTOTAL.') as ptargetTOTAL
,tblprojaccomplishment.q'.$quarter.'datesub as datesub 
,tblprojects.iscompleted as iscompleted 

,if(tblform7.nameOfProject is null, "true" , "false") as tblform7isempty 
,if(tblform8.nameOfProject is null, "true" , "false") as tblform8isempty 

FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tblform7
ON (tblform7.projid = tblprojects.projid)

INNER JOIN tblform8
ON (tblform8.projid = tblprojects.projid)

INNER JOIN projectexception 
ON (projectexception.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblagency 
ON (tblagency.agencyid = tblprojects.agencyid)


WHERE (if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) )<=(-15) AND tblprojtargets.isApproved = 1  '.$param1.'  '.$param2.' '.$param3.'  '.$param4.'  '.$param5.'  '.$param6.'  '.$param7.'
';     
        

                
        
             
     
        
            
 
        
        $db = new database();
        

       $statement = $db->getDb()->prepare($formulaDataReport);


       error_log($formulaDataReport);

       
         $statement->execute();
         
         
             return $statement;

        
        
    }
    function getAllInArray($quarter,$fundid,$agencyid,$locid,$secid,$year,$subsecid,$province,$showUpdate){
   
  /*
   * this function is for retrieving data depends on the parameter
   * 
   */
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }

        if ($subsecid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.subsecid = '.$subsecid;
         }
        if ($province == null){
             $param6  = "";
         }
         else {
             $param6 = ' AND tbllocation.provincename = "'.$province.'"';
         }
        if ($secid == 0){
             $param7  = "";
         }
         else {
             $param7 = ' AND tblprojects.secid = '.$secid;
         }
         
        if ($showUpdate === 0){
              
 
             $param8 = "";
         }
         else{
            $param8 = ' AND tblprojaccomplishment.q'.$quarter.'datesub is not NULL';
         }
       
    /*
     * this first IF ELSE SET of conditions are the cumulative set of computations
     */  
      if($quarter == 1){
            $allocationC = '(tblprojtargets.q1Ftarget)';
         $obligationC = '(tblprojaccomplishment.q1Obligations )';
         $paccompC = '(tblprojaccomplishment.q1Paccomp)';
         $maccompC= '(tblprojaccomplishment.q1Maccomp)';
         $releasesC= '(tblprojaccomplishment.q1Releases)';
         $ftargetC= '(tblprojtargets.q1Ftarget)';
         $mtargetC= '(tblprojtargets.q1Mtarget)';
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
         $expenditureC= '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
      }
      else if($quarter == 2){
         $allocationC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q2Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q2Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q2Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q2Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)
END)';
          }
      else if($quarter == 3){
         $allocationC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q3Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q3Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q3Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q3Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)
END)';
       
      }
      else if($quarter == 4){
            $allocationC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q4Obligations>0 THEN tblprojaccomplishment.q4Obligations 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q4Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q4Maccomp>0 THEN tblprojaccomplishment.q4Maccomp 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q4Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q4Releases>0 THEN tblprojaccomplishment.q4Releases 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q4Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q4Mtarget>0 THEN tblprojtargets.q4Mtarget 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q4Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)>0 THEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable) 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)
END)';
         
      }
      
      
      
      /*start of DEFAULT and M*/
      
    /*
     * this 2nd IF ELSE SET of conditions are the default or mentained set of computations
     */
      if($quarter == 1){
         $allocationDCM = '(tblprojtargets.q1Ftarget)';
         $obligationDCM = '(tblprojaccomplishment.q1Obligations )';
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp)';
         $releasesDCM = '(tblprojaccomplishment.q1Releases)';
         $ftargetDCM = '(tblprojtargets.q1Ftarget)';
         $mtargetDCM = '(tblprojtargets.q1Mtarget)';
         $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
    
      }
      else if($quarter == 2){
          $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';
         
          $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations)';
         
          $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases)';
         
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
          $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp)';
         
          $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';

          $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget)';
          
          $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
          $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable))';
    
         }
      else if($quarter == 3){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp)';
         
           $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';

           $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget)';
         
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable))';
         
      }
      else if($quarter == 4){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations+tblprojaccomplishment.q4Obligations)';
        
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases+tblprojaccomplishment.q4Releases)';
          
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
          $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp+tblprojaccomplishment.q4Maccomp)';
          
         $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget+tblprojtargets.q4Mtarget)';
         
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
        $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)+(tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable))';
      }
    
    
      
      
          /*default or Maintained

           * this is for the total of the default or mentained
           *            */
      $ftargetTOTAL = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
      $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
 
          /*Cumulative
           * 
           * this is the total for cumulative
           */
      $ftargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
      $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';

   
     
   /*
    * 
    * $formulaDataReport variable is the variable who carries the query string to be executed
    */
       $formulaDataReport = '
            SELECT 
 tblprojsector.secname
 ,tblprojects.secid
 
,tblagency.agencycode
,tblprojects.agencyid

,tblprojsubsector.subsecname
,tblprojects.subsecid

,tblprojects.locid


,tblprojects.projname
,tblprojects.unitofmeasure
,tbllocation.provincename
,tbllocation.district
,tbllocation.city
,tblfundsrc.funddesc
,tblfundsrc.fundcode
,tblprojects.datestart
,tblprojects.dateend
,tblprojects.iscompleted
,tblprojaccomplishment.q'.$quarter.'datesub as datesub

,if(tblprojects.datatype="Cumulative",'.$allocationC.','.$allocationDCM.') as allocation

,if(tblprojects.datatype="Cumulative",'.$obligationC.','.$obligationDCM.') as obligation

,if(tblprojects.datatype="Cumulative",'.$releasesC.','.$releasesDCM.') as releases 

,if(tblprojects.datatype="Cumulative",'.$expenditureC.','.$expenditureDCM.') as  expenditure

,if(tblprojects.datatype="Cumulative",('.$releasesC.'/'.$ftargetTOTALCUM.')*100,('.$releasesDCM.'/'.$ftargetTOTAL.')*100) as fundsupport 

,if(tblprojects.datatype="Cumulative",('.$expenditureC.'/'.$releasesC.')*100,('.$expenditureDCM.'/'.$releasesDCM.')*100) as fundutilizition 

,if(tblprojects.datatype="Cumulative",('.$ptargetC.' / '.$ptargetTOTALCUM.')*100,('.$ptargetDCM.' / '.$ptargetTOTAL.')*100) as targetTodate 

,if(tblprojects.datatype="Cumulative",('.$paccompC.'/'.$ptargetTOTALCUM.')*100,('.$paccompDCM.'/'.$ptargetTOTAL.')*100) as actualTodate 

,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

,if(tblprojects.datatype="Cumulative",('.$paccompC.' / ('.$ptargetC.') )*100,('.$paccompDCM.' / ('.$ptargetDCM.'))*100)  as performance 

, if(tblprojects.datatype="Cumulative",'.$mtargetC.','.$mtargetDCM.') as employmentGenerated 

,if(tblprojects.datatype="Cumulative",
(('.$paccompC.'/'.$ptargetC.')/('.$expenditureC.'/'.$releasesC.'))*100
    ,(('.$paccompDCM.'/'.$ptargetDCM.')/('.$expenditureDCM.'/'.$releasesDCM.'))*100) as financiallyCorrelated 


,if(tblprojects.datatype="Cumulative",'.$ftargetTOTALCUM.','.$ftargetTOTAL.') as ftargetTOTAL
    
,if(tblprojects.datatype="Cumulative",'.$ptargetTOTALCUM.','.$ptargetTOTAL.') as ptargetTOTAL
   ,
   if(tblprojects.datatype="Cumulative",
if(tblprojects.iscompleted = "completed","completed", 
	if('.$ptargetC.'=0 and '.$paccompC.' = 0,"not-yet started",
		"on-going"
	)
),
if(tblprojects.iscompleted = "completed","completed", 
	if('.$ptargetDCM.'=0 and '.$paccompDCM.' = 0,"not-yet started",
		"on-going"
	)
)

)   

as projstatus


FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblagency 
ON (tblagency.agencyid = tblprojects.agencyid)

INNER JOIN tblprojsector 
ON (tblprojsector.secid = tblprojects.secid)


INNER JOIN tblprojsubsector 
ON (tblprojsubsector.subsecid = tblprojects.subsecid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)
WHERE 1=1 
'.$param1.' 
    '.$param2.'
        '.$param3.'
            '.$param4.'
                '.$param5.'
                    '.$param6.'
                        '.$param7.'
                            '.$param8.'
                                
    ORDER BY tblprojects.ordering
';     
        

                

        
            
 
        
        $db = new database(); // calling the database connection
        

       $statement = $db->getDb()->prepare($formulaDataReport); // preparing the query string  be ready to execute




       
         $statement->execute(); // the query string will be executed
         
         
             return $statement; // this will return the result of the queried  data

        
        
    }
    function getAllProjectTotalInWeighted($quarter,$fundid,$agencyid,$locid,$secid,$year,$subsecid,$province,$showUpdate){ // function of getting the overall total  outside loop
    
      
         if ($fundid == 0){
             $param1  = "";
         }
         else {
             $param1 = ' AND tblprojects.fundid = '.$fundid;
         }
        
         if ($agencyid == 0){
             $param2  = "";
         }
         else {
             $param2 = ' AND tblprojects.agencyid = '.$agencyid;
         }
        
         if ($locid == 0){
             $param3  = "";
         }
         else {
             $param3 = ' AND tblprojects.locid = '.$locid;
         }
        
     
         if ($year == 0){
             $param4  = "";
         }
         else {
             $param4 = ' AND tblprojects.yrenrolled = '.$year;
         }

        if ($subsecid == 0){
             $param5  = "";
         }
         else {
             $param5 = ' AND tblprojects.subsecid = '.$subsecid;
         }
        if ($province == null){
             $param6  = "";
         }
         else {
             $param6 = ' AND tbllocation.provincename = "'.$province.'"';
         }
        if ($secid == 0){
             $param7  = "";
         }
         else {
             $param7 = ' AND tblprojects.secid = '.$secid;
         }
          if ($showUpdate === 0){
             $param8 = "";
             
             
         }
         else{
             $param8 = ' AND tblprojaccomplishment.q'.$quarter.'datesub is not NULL';
         }
         
      if($quarter == 1){
            $allocationC = '(tblprojtargets.q1Ftarget)';
         $obligationC = '(tblprojaccomplishment.q1Obligations )';
         $paccompC = '(tblprojaccomplishment.q1Paccomp)';
         $maccompC= '(tblprojaccomplishment.q1Maccomp)';
         $releasesC= '(tblprojaccomplishment.q1Releases)';
         $ftargetC= '(tblprojtargets.q1Ftarget)';
         $mtargetC= '(tblprojtargets.q1Mtarget)';
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
         $expenditureC= '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
      }
      else if($quarter == 2){
         $allocationC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q2Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q2Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q2Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q2Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q2Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)
END)';
          }
      else if($quarter == 3){
         $allocationC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q3Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q3Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q3Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q3Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q3Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)
END)';
       
      }
      else if($quarter == 4){
            $allocationC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $obligationC = '(CASE 
WHEN tblprojaccomplishment.q4Obligations>0 THEN tblprojaccomplishment.q4Obligations 
WHEN tblprojaccomplishment.q3Obligations>0 THEN tblprojaccomplishment.q3Obligations 
WHEN tblprojaccomplishment.q2Obligations>0 THEN tblprojaccomplishment.q2Obligations 
WHEN tblprojaccomplishment.q1Obligations>0 THEN tblprojaccomplishment.q1Obligations 
ELSE tblprojaccomplishment.q4Obligations
END)';
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $maccompC =  '(CASE 
WHEN tblprojaccomplishment.q4Maccomp>0 THEN tblprojaccomplishment.q4Maccomp 
WHEN tblprojaccomplishment.q3Maccomp>0 THEN tblprojaccomplishment.q3Maccomp 
WHEN tblprojaccomplishment.q2Maccomp>0 THEN tblprojaccomplishment.q2Maccomp 
WHEN tblprojaccomplishment.q1Maccomp>0 THEN tblprojaccomplishment.q1Maccomp 
ELSE tblprojaccomplishment.q4Maccomp
END)';
         $releasesC = '(CASE 
WHEN tblprojaccomplishment.q4Releases>0 THEN tblprojaccomplishment.q4Releases 
WHEN tblprojaccomplishment.q3Releases>0 THEN tblprojaccomplishment.q3Releases 
WHEN tblprojaccomplishment.q2Releases>0 THEN tblprojaccomplishment.q2Releases 
WHEN tblprojaccomplishment.q1Releases>0 THEN tblprojaccomplishment.q1Releases 
ELSE tblprojaccomplishment.q4Releases
END)';
         $ftargetC = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
         $mtargetC = '(CASE 
WHEN tblprojtargets.q4Mtarget>0 THEN tblprojtargets.q4Mtarget 
WHEN tblprojtargets.q3Mtarget>0 THEN tblprojtargets.q3Mtarget 
WHEN tblprojtargets.q2Mtarget>0 THEN tblprojtargets.q2Mtarget 
WHEN tblprojtargets.q1Mtarget>0 THEN tblprojtargets.q1Mtarget 
ELSE tblprojtargets.q4Mtarget
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
         $expenditureC = '(CASE 
WHEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)>0 THEN (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable) 
WHEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)>0 THEN (tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable) 
WHEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)>0 THEN (tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable) 
WHEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)>0 THEN (tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable) 
ELSE (tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable)
END)';
         
      }
         /*start allocation DCM*/ 
      if($quarter == 1){
         $allocationDCM = '(tblprojtargets.q1Ftarget)';
         $obligationDCM = '(tblprojaccomplishment.q1Obligations )';
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp)';
         $releasesDCM = '(tblprojaccomplishment.q1Releases)';
         $ftargetDCM = '(tblprojtargets.q1Ftarget)';
         $mtargetDCM = '(tblprojtargets.q1Mtarget)';
         $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable))';
    
      }
      else if($quarter == 2){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp)';
         
          $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget)';

          $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget)';
          
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
          $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable))';
    
         }
      else if($quarter == 3){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';
         
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations)';
         
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases)';
         
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
         $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp)';
         
           $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget)';

           $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget)';
         
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
         $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable))';
         
      }
      else if($quarter == 4){
         $allocationDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $obligationDCM = '(tblprojaccomplishment.q1Obligations+tblprojaccomplishment.q2Obligations+tblprojaccomplishment.q3Obligations+tblprojaccomplishment.q4Obligations)';
        
         $releasesDCM = '(tblprojaccomplishment.q1Releases+tblprojaccomplishment.q2Releases+tblprojaccomplishment.q3Releases+tblprojaccomplishment.q4Releases)';
          
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
          $maccompDCM = '(tblprojaccomplishment.q1Maccomp+tblprojaccomplishment.q2Maccomp+tblprojaccomplishment.q3Maccomp+tblprojaccomplishment.q4Maccomp)';
          
         $ftargetDCM = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
        
         $mtargetDCM = '(tblprojtargets.q1Mtarget+tblprojtargets.q2Mtarget+tblprojtargets.q3Mtarget+tblprojtargets.q4Mtarget)';
         
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
        $expenditureDCM = '((tblprojaccomplishment.q1CashDis+tblprojaccomplishment.q1AccPayable)+(tblprojaccomplishment.q2CashDis+tblprojaccomplishment.q2AccPayable)+(tblprojaccomplishment.q3CashDis+tblprojaccomplishment.q3AccPayable)+(tblprojaccomplishment.q4CashDis+tblprojaccomplishment.q4AccPayable))';
      }
    
    
          /*default or Maintained*/
      $ftargetTOTAL = '(tblprojtargets.q1Ftarget+tblprojtargets.q2Ftarget+tblprojtargets.q3Ftarget+tblprojtargets.q4Ftarget)';
      $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
 
          /*Cumulative*/
      $ftargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ftarget>0 THEN tblprojtargets.q4Ftarget 
WHEN tblprojtargets.q3Ftarget>0 THEN tblprojtargets.q3Ftarget 
WHEN tblprojtargets.q2Ftarget>0 THEN tblprojtargets.q2Ftarget 
WHEN tblprojtargets.q1Ftarget>0 THEN tblprojtargets.q1Ftarget 
ELSE tblprojtargets.q4Ftarget
END)';
      $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';

   
     
   
       $formulaDataReport = '
            SELECT 


if(tblprojects.datatype="Cumulative",'.$ftargetC.','.$allocationDCM.') as allocation

,if(tblprojects.datatype="Cumulative",'.$obligationC.','.$obligationDCM.') as obligation

,if(tblprojects.datatype="Cumulative",'.$releasesC.','.$releasesDCM.') as releases 

,if(tblprojects.datatype="Cumulative",'.$expenditureC.','.$expenditureDCM.') as  expenditure

,if(tblprojects.datatype="Cumulative",('.$releasesC.'/'.$ftargetTOTALCUM.')*100,('.$releasesDCM.'/'.$ftargetTOTAL.')*100) as fundsupport 

,if(tblprojects.datatype="Cumulative",('.$expenditureC.'/'.$releasesC.')*100,('.$expenditureDCM.'/'.$releasesDCM.')*100) as fundutilizition 

,if(tblprojects.datatype="Cumulative",('.$ptargetC.' / '.$ptargetTOTALCUM.')*100,('.$ptargetDCM.' / '.$ptargetTOTAL.')*100) as targetTodate 

,if(tblprojects.datatype="Cumulative",('.$paccompC.'/'.$ptargetTOTALCUM.')*100,('.$paccompDCM.'/'.$ptargetTOTAL.')*100) as actualTodate 

,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

,if(tblprojects.datatype="Cumulative",('.$paccompC.' /'.$ptargetC.' )*100,('.$paccompDCM.' / ('.$ptargetDCM.'))*100)  as performance 

, if(tblprojects.datatype="Cumulative",'.$mtargetC.','.$mtargetDCM.') as employmentGenerated 

,if(tblprojects.datatype="Cumulative",(('.$paccompC.'/'.$ptargetC.' )/
('.$expenditureC.'/'.$releasesC.'))*100,(('.$paccompDCM.'/'.$ptargetDCM.')/('.$expenditureDCM.'/'.$releasesDCM.'))*100) as financiallyCorrelated 


,if(tblprojects.datatype="Cumulative",'.$ftargetTOTALCUM.','.$ftargetTOTAL.') as ftargetTOTAL
    
,if(tblprojects.datatype="Cumulative",'.$ptargetTOTALCUM.','.$ptargetTOTAL.') as ptargetTOTAL
   ,
   if(tblprojects.datatype="Cumulative",
if(tblprojects.iscompleted = "completed","completed", 
	if('.$ptargetC.'=0 and '.$paccompC.' = 0,"not-yet started",
		"on-going"
	)
),
if(tblprojects.iscompleted = "completed","completed", 
	if('.$ptargetDCM.'=0 and '.$paccompDCM.' = 0,"not-yet started",
		"on-going"
	)
)

)   

as projstatus


FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)

INNER JOIN tbllocation 
ON (tbllocation.locid = tblprojects.locid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblagency 
ON (tblagency.agencyid = tblprojects.agencyid)

INNER JOIN tblprojsector 
ON (tblprojsector.secid = tblprojects.secid)


INNER JOIN tblprojsubsector 
ON (tblprojsubsector.subsecid = tblprojects.subsecid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)
WHERE 1=1 '.$param1.'  
                '.$param2.'
                    '.$param3.'
                        '.$param4.' 
                            '.$param5.'  
                                '.$param6.' 
                                    '.$param7.'
                                        '.$param8.'
';     
        

                
        
             
     
        
            
 
        
        $db = new database();
        

       $statement = $db->getDb()->prepare($formulaDataReport);



 
         $statement->execute();
         
         
  

             $arrayFund = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
              "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0);
             
                
                 
                   
               while($row = $statement->fetch(PDO::FETCH_OBJ)){  
                      if($row){
  
 
     
         $arrayFund["allocation"] += $row->allocation;
         $arrayFund["obligation"]+=$row->obligation;
         $arrayFund["releases"]+=$row->releases;
         $arrayFund["expenditure"] +=$row->expenditure;
         $arrayFund["ftotal"] +=$row->ftargetTOTAL;
         $arrayFund["ptotal"] +=$row->ptargetTOTAL;
         $arrayFund["targetTodate"]+=($row->targetTodate*$row->ftargetTOTAL);
         $arrayFund["actualTodate"]+=($row->actualTodate*$row->ftargetTOTAL);
         $arrayFund["employmentGenerated"] += $row->employmentGenerated;
     
                 if($row->projstatus == "completed"){
                     $arrayFund['completed'] ++;
                     
                 }
                 else if($row->projstatus == "not-yet started"){
                     $arrayFund["notyet"]++;
                 }
                 else if($row->projstatus == "on-going"){
                        if($row->sllipage<=(-15)){
                            $arrayFund['behind']++;
                        }
                        else if($row->sllipage>(-15)&&$row->sllipage<=(0)){
                            $arrayFund['ontime']++;
                        }
                        else if($row->sllipage>(0)){
                            $arrayFund['ahead']++;
                        }
                 }
              
  
              }
              
 }

       
 if($arrayFund["ftotal"]!=0)$arrayFund["fundsupport"] =number_format(($arrayFund["releases"]/$arrayFund["ftotal"])*100,2);
 else $arrayFund["fundsupport"] ="N/A";
 if($arrayFund["releases"]!=0)$arrayFund["fundutilization"] =number_format(($arrayFund["expenditure"]/$arrayFund["releases"])*100,2);
 else $arrayFund["fundutilization"] ="N/A";
 if($arrayFund["ftotal"]!=0)$arrayFund["targetTodate"] = number_format($arrayFund["targetTodate"]/$arrayFund["ftotal"],2);
 else $arrayFund["targetTodate"] = "N/A";
 if($arrayFund["ftotal"]!=0)$arrayFund["actualTodate"] = number_format($arrayFund["actualTodate"]/$arrayFund["ftotal"],2);
 else $arrayFund["actualTodate"] = "N/A";
 if($arrayFund["actualTodate"]!=0||$arrayFund["targetTodate"]!=0)
 $arrayFund["sllipage"] = number_format($arrayFund["actualTodate"]-$arrayFund["targetTodate"],2);
 if($arrayFund["targetTodate"]!=0)$arrayFund["performance"] = number_format(($arrayFund["actualTodate"]/$arrayFund["targetTodate"])*100,2);
else  $arrayFund["performance"] = "N/A";
  if($arrayFund["fundutilization"]!=0)$arrayFund["financiallyCorrelated"] = number_format(($arrayFund["performance"]/$arrayFund["fundutilization"])*100,2);
 else $arrayFund["financiallyCorrelated"] = "N/A";

 
 
 $arrayFund["allocation"] = number_format($arrayFund["allocation"]);
  $arrayFund["obligation"] = number_format($arrayFund["obligation"]);
  $arrayFund["releases"] = number_format($arrayFund["releases"]);
  $arrayFund["expenditure"]  = number_format($arrayFund["expenditure"]);

  $arrayFund["employmentGenerated"] =number_format($arrayFund["employmentGenerated"]);
 return $arrayFund;
        
    }
    
    function getFundAcc($year,$agency,$optfundsrc,$smrySect,$locationss){ 
        
            $param6="";
         if ($optfundsrc == 0){
             $param6  = "";
         }
         else {
             $param6 = 'WHERE tblprojects.fundid= '.$optfundsrc;
         }
            $param1="";
         if ($agency == 0){
             $param1  = "";
         }
         else {
             $param1 = 'WHERE tblprojects.agencyid = '.$agency;
         }
      
            $param3="";
         if ($smrySect == 0){
             $param3  = "";
         }
         else {
             $param3 = 'AND tblprojects.secid = '.$smrySect;
         }
            $param4="";
         if ($locationss == 0){
             $param4  = "";
         }
         else {
             $param4 = 'AND tblprojects.locid = '.$locationss;
         }
            $param5="";
         if ($year == 0){
             $param5  = "";
         }
         else {
             $param5 = 'AND tblprojects.yrenrolled = '.$year;
         }
                
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
   tblfundsrc.fundid,
tblfundsrc.fundcode
FROM
tblprojects
  INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
  
        
'.$param1.'  '.$param3.' '.$param4.' '.$param5.' '.$param6.'
group by tblfundsrc.fundid
;');
        
        
        $statement->execute();
    

       
    

     return  $statement;
                
    }
    function getAgencyAcc($year,$agency,$smrySect,$locationss,$fundid){ // getting agency list for accomplishment
        
            $param1="";
         if ($agency == 0){
             $param1  = "";
         }
         else {
             $param1 = 'WHERE tblagency.agencyid = '.$agency;
         }
        
            $param3="";
         if ($smrySect == 0){
             $param3  = "";
         }
         else {
             $param3 = 'AND tblprojects.secid = '.$smrySect;
         }
            $param4="";
         if ($locationss == 0){
             $param4  = "";
         }
         else {
             $param4 = 'AND tblprojects.locid = '.$locationss;
         }
                
            $param5="";
         if ($fundid == 0){
             $param5  = "";
         }
         else {
             $param5 = 'AND tblprojects.fundid = '.$fundid;
         }
            $param6="";
         if ($year == 0){
             $param6  = "";
         }
         else {
             $param6 = 'AND tblprojects.yrenrolled = '.$year;
         }
                
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
   tblagency.agencyid,
tblagency.agencycode
FROM
tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.agencyid = tblagency.agencyid)
        
'.$param1.' '.$param3.' '.$param4.' '.$param5.' '.$param6.'
group by tblagency.agencyid
;');
        
        
        $statement->execute();
    

       
    

     return  $statement;
                
    }
   
    function getSectorAcc($year,$agency,$smrySect,$locationss,$fundid){ // getting sector list for accomplishment
       
         
                $param2="";
         if ($smrySect == 0){
             $param2  = "";
         }
         else {
             $param2 = 'AND tblprojects.secid = '.$smrySect;
         }
         
            $param3="";
         if ($locationss == 0){
             $param3  = "";
         }
         else {
             $param3 = 'AND tblprojects.locid = '.$locationss;
         }
            $param4="";
         if ($fundid == 0){
             $param4  = "";
         }
         else {
             $param4 = 'AND tblprojects.fundid = '.$fundid;
         }
            $param5="";
         if ($year == 0){
             $param5  = "";
         }
         else {
             $param5 = 'AND tblprojects.yrenrolled = '.$year;
         }
    
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT
    tblprojsector.secid

    , tblprojsector.secname

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
where tblagency.agencyid = :agency  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
GROUP BY tblprojsector.secid
');
        $statement->bindParam(':agency', $agency);
        
        $statement->execute();
    

       
    

     return  $statement;
                
    }
    function getAccReport($sec,$agency){ // getting the project id and datatype of all project
        
        
                
        $db = new database();
        
        
        $statement = $db->getDb()->prepare('SELECT tblprojects.projid,datatype from tblprojects 
            INNER JOIN tblprojtargets
            ON (tblprojtargets.projid = tblprojects.projid)
            WHERE tblprojtargets.isApproved = 1 
            AND tblprojects.secid = :id
            AND tblprojects.agencyid = :agency
                                          
                                ');
        $statement->bindParam(':id', $sec);
        $statement->bindParam(':agency', $agency);
        
        
        $statement->execute();
    

       
    

     return  $statement;
                
    }
    
    
    function getCountMyForm4($id){
        
        $db = new database();
        $statement = $db->getDb()->prepare('select projid  from tblprojects where iscompleted = "completed" and actualresult is NULL 
            and  tblprojects.projObjective is not NULL and not tblprojects.projObjective ="" 
 and agencyid = :id');
    
        $statement->bindParam(':id', $id);
        $statement->execute();
    
    $r = $statement->rowCount();
         return $r;
       
         
    }
    function getAccomplishmentBy($id){
        
        $db = new database();
        $statement = $db->getDb()->prepare('SELECT * FROM tblprojaccomplishment WHERE projid = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
    
         return $statement;
       
         
    }
    function getAll($agencyId,$year,$fundsrc){
        
           $db = new database();
           
           if($agencyId==0){
               $agencyQue = "";
           }
           else{
               $agencyQue = " and tblprojects.agencyid = ".$agencyId;
           }
           
           if($fundsrc==0){
        $statement = $db->getDb()->prepare('SELECT
    tblagency.*
    , tblprojaccomplishment.*   
     
    , tblprojtargets.*
    , tblprojects.*
FROM
    tblprojaccomplishment
	INNER JOIN tblprojects 
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojtargets
       ON (tblprojects.projid = tblprojtargets.projid) 
       where  tblprojtargets.isApproved = 1
       and tblprojects.yrenrolled =:year '.$agencyQue.'

GROUP BY tblprojects.agencyid       
');
        
       $statement->bindParam(':year', $year);

       
           }else{
                  
        $statement = $db->getDb()->prepare('SELECT
    tblagency.*
    , tblprojaccomplishment.*   
     
    , tblprojtargets.*
    , tblprojects.*
FROM
    tblprojaccomplishment
	INNER JOIN tblprojects 
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojtargets
       ON (tblprojects.projid = tblprojtargets.projid) 
       where  tblprojtargets.isApproved = 1
       and tblprojects.yrenrolled =:year
        and tblprojects.fundid =:fundsrc
GROUP BY tblprojects.agencyid       
');
        
       $statement->bindParam(':year', $year);
        $statement->bindParam(':fundsrc', $fundsrc);
           }
       
       
       
       
       
        $statement->execute();
    
         return $statement;
       
        
        
        
    }
    function getAllex($year,$fundsrcI){  //getting all project exception with  -15 sllippage
        
           $db = new database();
           
           if($fundsrcI==0)
               
               {
        $statement1 = $db->getDb()->prepare('(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q1Paccomp - tblprojtargets.q1Ptarget)/tblprojtargets.q1Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
GROUP BY tblprojects.agencyid)
UNION
(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q2Paccomp - tblprojtargets.q2Ptarget)/tblprojtargets.q2Ptarget)*100) < (-15))
  AND tblprojects.yrenrolled = :year
GROUP BY tblprojects.agencyid)
UNION
(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q3Paccomp - tblprojtargets.q3Ptarget)/tblprojtargets.q3Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
GROUP BY tblprojects.agencyid)
UNION
(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q4Paccomp - tblprojtargets.q4Ptarget)/tblprojtargets.q4Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
GROUP BY tblprojects.agencyid)
');
        
        
        
        
        
       $statement1->bindParam(':year', $year);
    

       
           }
           else{
                  
        $statement1 = $db->getDb()->prepare('(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q1Paccomp - tblprojtargets.q1Ptarget)/tblprojtargets.q1Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
        and tblprojects.fundid =:fundsrcI
      GROUP BY tblprojects.agencyid)
UNION(SELECT
    tblagency.*
    , projectexception.*   
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q2Paccomp - tblprojtargets.q2Ptarget)/tblprojtargets.q2Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
        and tblprojects.fundid =:fundsrcI
      GROUP BY tblprojects.agencyid)
UNION(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q3Paccomp - tblprojtargets.q3Ptarget)/tblprojtargets.q3Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
        and tblprojects.fundid =:fundsrcI
      GROUP BY tblprojects.agencyid)
UNION(SELECT
    tblagency.*
    , projectexception.*  
     
 
    , tblprojects.*
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  (((tblprojaccomplishment.q4Paccomp - tblprojtargets.q4Ptarget)/tblprojtargets.q4Ptarget)*100) < (-15)
  AND tblprojects.yrenrolled = :year
        and tblprojects.fundid =:fundsrcI
      GROUP BY tblprojects.agencyid)
');
        
        
        
       $statement1->bindParam(':year', $year);
        $statement1->bindParam(':fundsrcI', $fundsrcI);

           }
       
       
       
       
       
        $statement1->execute();
    
    
    
      
       $ar1 = $statement1->fetchAll();
  
        
        return $ar1;
        
    }
    
    function getMyProjex($agency,$year,$fundsrcI){
        
        if($agency!=0){
            $param = " AND tblprojects.agencyid = ".$agency;
        }
        else{
            $param = "";
        }
        
        
           $db = new database();
           
           if($fundsrcI==0){
        $statement1 = $db->getDb()->prepare('(SELECT
   tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE 
       if(tblprojects.datatype="Cumulative",((tblprojaccomplishment.q1Paccomp -tblprojtargets.q1Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp)-(tblprojtargets.q1Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
  AND tblprojects.yrenrolled = :year
  '.$param.'


  )
  UNION
(SELECT
   tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE 
      if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q2Paccomp -tblprojtargets.q2Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
  AND tblprojects.yrenrolled = :year
  '.$param.'


)
UNION
(
SELECT
 tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE 
      if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q3Paccomp -tblprojtargets.q3Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
  AND tblprojects.yrenrolled = :year
  '.$param.'

)
UNION
(SELECT
tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  
       if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q4Paccomp -tblprojtargets.q4Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
  AND tblprojects.yrenrolled = :year
  '.$param.'

)
  Order by q1datesub DESC,q2datesub DESC,q3datesub DESC,q4datesub DESC
');
       $statement1->bindParam(':agency', $agency);
       $statement1->bindParam(':year', $year);
   

           }
           else{
                $statement1 = $db->getDb()->prepare('(SELECT
 tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

   WHERE  
    if(tblprojects.datatype="Cumulative",((tblprojaccomplishment.q1Paccomp -tblprojtargets.q1Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp)-(tblprojtargets.q1Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
      AND tblprojects.yrenrolled = :year
  '.$param.'
       and tblprojects.fundid = :fundsrcI
 )
   UNION
   (SELECT
tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

  WHERE  if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q2Paccomp -tblprojtargets.q2Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
      AND tblprojects.yrenrolled = :year
  '.$param.'
       and tblprojects.fundid = :fundsrcI
   )
   UNION
   (SELECT
tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,


projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

 WHERE    if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q3Paccomp -tblprojtargets.q3Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND tblprojects.yrenrolled = :year
  '.$param.'
       and tblprojects.fundid = :fundsrcI
 )

UNION
(SELECT
  tblagency.agencyid,
tblagency.agencycode,
tblprojects.yrenrolled,

projectexception.q1datesave,
projectexception.q1datesub,
projectexception.q1submittor,
projectexception.q1savior,

projectexception.q2datesave,
projectexception.q2datesub,
projectexception.q2submittor,
projectexception.q2savior,

projectexception.q3datesave,
projectexception.q3datesub,
projectexception.q3submittor,
projectexception.q3savior,

projectexception.q4datesave,
projectexception.q4datesub,
projectexception.q4submittor,
projectexception.q4savior
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

 WHERE  if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q4Paccomp -tblprojtargets.q4Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
      
AND tblprojects.yrenrolled = :year
 '.$param.'
       and tblprojects.fundid = :fundsrcI
  )
  Order by q1datesub DESC,q2datesub DESC,q3datesub DESC,q4datesub DESC
');
       $statement1->bindParam(':agency', $agency);
       $statement1->bindParam(':year', $year);
       $statement1->bindParam(':fundsrcI', $fundsrcI);
           
  
           
       
       
           }
        
        
        $statement1->execute();
   
    
      $ar1 = $statement1->fetchAll();
      
   
        
        return  $ar1;
        
    }
    function countNewException($agency,$year){
        
           $db = new database();
           
         if($agency==0)
             {
        $statement1 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  
      if(tblprojects.datatype="Cumulative",((tblprojaccomplishment.q1Paccomp -tblprojtargets.q1Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp)-(tblprojtargets.q1Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND projectexception.q1reason is  null  
AND tblprojaccomplishment.q1datesub is not null 

AND tblprojects.yrenrolled = year(now())
  
  
GROUP BY tblprojects.projid
  
');
        $statement2 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q2Paccomp -tblprojtargets.q2Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q2reason is  null  
AND tblprojaccomplishment.q2datesub is not null 

AND tblprojects.yrenrolled =year(now())
  

GROUP BY tblprojects.projid
  
');
        $statement3 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  
      if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q3Paccomp -tblprojtargets.q3Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND projectexception.q3reason is  null  
AND tblprojaccomplishment.q3datesub is not null 
AND tblprojects.yrenrolled = year(now())

GROUP BY tblprojects.projid
');
        $statement4 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  
      if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q4Paccomp -tblprojtargets.q4Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q4reason is  null  
AND tblprojaccomplishment.q4datesub is not null 
AND tblprojects.yrenrolled = year(now())

GROUP BY tblprojects.projid
  
');
  
   
         }
         else{
        $statement1 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE    if(tblprojects.datatype="Cumulative",((tblprojaccomplishment.q1Paccomp -tblprojtargets.q1Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp)-(tblprojtargets.q1Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q1reason is  null  
AND tblprojaccomplishment.q1datesub is not null 
AND tblprojects.yrenrolled = year(now())
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
        $statement2 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q2Paccomp -tblprojtargets.q2Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q2reason is  null  
AND tblprojects.yrenrolled = year(now())
  AND tblprojaccomplishment.q2datesub is not null 
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
        $statement3 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE   if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q3Paccomp -tblprojtargets.q3Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q3reason is  null  
AND tblprojaccomplishment.q3datesub is not null 
AND tblprojects.yrenrolled = year(now())
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
');
        $statement4 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE   if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q4Paccomp -tblprojtargets.q4Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 
AND projectexception.q4reason is  null  
AND tblprojaccomplishment.q4datesub is not null  
AND tblprojects.yrenrolled = year(now())
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
  
       $statement1->bindParam(':agency', $agency);
  
          
       $statement2->bindParam(':agency', $agency);
    
       $statement3->bindParam(':agency', $agency);
       
       $statement4->bindParam(':agency', $agency);
      
  
         }
       
       
           
        
        
        $statement1->execute();
        $statement2->execute();
        $statement3->execute();
        $statement4->execute();
    
     
          $ar1 = $statement1->rowCount();
          $ar2 = $statement2->rowCount();
          $ar3 = $statement3->rowCount();
          $ar4 = $statement4->rowCount();
        
        return ($ar1+$ar2+$ar3+$ar4);
        
    }
    function countExcep($agency,$year){ // counting the number of project exception
        
           $db = new database();
           
      
        $statement1 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE    if(tblprojects.datatype="Cumulative",((tblprojaccomplishment.q1Paccomp -tblprojtargets.q1Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp)-(tblprojtargets.q1Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND tblprojaccomplishment.q1datesub is not null 
AND tblprojects.yrenrolled = :year
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
        $statement2 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE  if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q2Paccomp -tblprojtargets.q2Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND tblprojects.yrenrolled = :year
  AND tblprojaccomplishment.q2datesub is not null 
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
        $statement3 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE   if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q3Paccomp -tblprojtargets.q3Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND tblprojaccomplishment.q3datesub is not null 
AND tblprojects.yrenrolled = :year
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
');
        $statement4 = $db->getDb()->prepare('SELECT
  
     tblprojects.projid
FROM
    projectexception
	INNER JOIN tblprojects 
       ON (projectexception.projid = tblprojects.projid)
	
	INNER JOIN tblprojaccomplishment
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblprojtargets	
       ON (tblprojtargets.projid = tblprojects.projid)

      WHERE   if(tblprojects.datatype="Cumulative",
      ((tblprojaccomplishment.q4Paccomp -tblprojtargets.q4Ptarget) /
(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END))*100
,
(((tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)-
  (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)) /
(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget))*100)
<(-15) 

AND tblprojaccomplishment.q4datesub is not null  
AND tblprojects.yrenrolled = :year
  
  AND tblprojects.agencyid = :agency

GROUP BY tblprojects.projid
  
');
  
       $statement1->bindParam(':agency', $agency);
       $statement1->bindParam(':year', $year);
          
       $statement2->bindParam(':agency', $agency);
       $statement2->bindParam(':year', $year);
           
       $statement3->bindParam(':agency', $agency);
       $statement3->bindParam(':year', $year);
           
       $statement4->bindParam(':agency', $agency);
       $statement4->bindParam(':year', $year);
  
         
       
       
           
        
        
        $statement1->execute();
        $statement2->execute();
        $statement3->execute();
        $statement4->execute();
    
     
          $ar1 = $statement1->rowCount();
          $ar2 = $statement2->rowCount();
          $ar3 = $statement3->rowCount();
          $ar4 = $statement4->rowCount();
        
        return ($ar1+$ar2+$ar3+$ar4);
        
    }
    function getMyProj($agency,$year,$fundsrc){  //getting projects enrolled by agency
        
           $db = new database();
           
           if($fundsrc==0){
        $statement = $db->getDb()->prepare('SELECT
    tblagency.*
    , tblprojaccomplishment.*   
     
    , tblprojtargets.*
    , tblprojects.*
    
FROM
    tblprojaccomplishment
	INNER JOIN tblprojects 
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojtargets
       ON (tblprojects.projid = tblprojtargets.projid)
       where  tblprojtargets.isApproved = 1 
       and tblprojects.agencyid = :agency
       and tblprojects.yrenrolled = :year

GROUP BY tblprojects.agencyid       
');
       $statement->bindParam(':agency', $agency);
       $statement->bindParam(':year', $year);

           }
           else{
                $statement = $db->getDb()->prepare('SELECT
    tblagency.*
    , tblprojaccomplishment.*   
     
    , tblprojtargets.*
    , tblprojects.*
FROM
    tblprojaccomplishment
	INNER JOIN tblprojects 
       ON (tblprojaccomplishment.projid = tblprojects.projid)
	INNER JOIN tblagency 
       ON (tblprojects.agencyid = tblagency.agencyid)
	INNER JOIN tblprojtargets
       ON (tblprojects.projid = tblprojtargets.projid)
       where  tblprojtargets.isApproved = 1 
       and tblprojects.agencyid = :agency
       and tblprojects.yrenrolled = :year
       and tblprojects.fundid = :fundid
GROUP BY tblprojects.agencyid       
');
       $statement->bindParam(':agency', $agency);
       $statement->bindParam(':year', $year);
       $statement->bindParam(':fundid', $fundsrc);
           }
        
        
        $statement->execute();
    
         return $statement;
        
    }
    
    
    
         
   function InitializeAcc($projid,$agencyid){ // initialize accomplishment.. on fresh enrolled
       
       
       
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('INSERT INTO  `tblprojaccomplishment` (
`projid` ,
`agencyid` ,
`q1Paccomp` ,
`q1Faccomp` ,
`q1Maccomp` ,
`q1datesub` ,
`q1Expenditure` ,
`q1Releases` ,
`q1Obligations` ,

`q2Paccomp` ,
`q2Faccomp` ,
`q2Maccomp` ,
`q2datesub` ,
`q2Expenditure` ,
`q2Releases` ,
`q2Obligations` ,

`q3Paccomp` ,
`q3Faccomp` ,
`q3Maccomp` ,
`q3datesub` ,
`q3Expenditure` ,
`q3Releases` ,
`q3Obligations` ,

`q4Paccomp` ,
`q4Faccomp` ,
`q4Maccomp` ,
`q4datesub`,
`q4Expenditure` ,
`q4Releases` ,
`q4Obligations` 
)
VALUES (
:projid, :agencyid , 0 , 0 , 0 , null , 0 , 0 , 0 ,
0 , 0 , 0 ,null , 0 , 0 , 0 , 
0 , 0 , 0 , null , 0 , 0 , 0 , 
0 , 0 , 0 ,null ,0 , 0 , 0 
)');
       
   
       
    $statement->bindParam(':projid', $projid);
    $statement->bindParam(':agencyid', $agencyid);
    $statement->execute();
       
        return $statement;
        }    
 catch (PDOException $e){
          
     
            return false;
       
 }
        
       
          
            
    
       
     
    }
    
    function submitAccomplishment($quarter, projaccomplishment $model,$action ){ // submission of accomplishment 
        $db = new database();
       
        try{
        if($action=="submit"){
            
         
        if($quarter ==1){
          
        $data = array(":projid"=>$model->getProjid(),
           
       
            ":physical"=>$model->getQ1Paccomp(),
            ":mandays"=>$model->getQ1Maccomp(),
            ":submittor"=>$model->getQ1submittor(),
            ":expenditure"=>$model->getQ1Expenditure(),
            ":obligation"=>$model->getQ1Obligation(),
            ":releases"=>$model->getQ1Releases(),
             ":accpay"=>$model->getQ1AccPay(),
            ":cashdis"=>$model->getQ1CashDish(),
            ":remarks"=>$model->getQ1Remarks()
         
            
            );
        }elseif($quarter ==2){
        $data = array(":projid"=>$model->getProjid(),
           
            ":physical"=>$model->getQ2Paccomp(),
            ":mandays"=>$model->getQ2Maccomp(),
            ":submittor"=>$model->getQ2submittor(),
            ":expenditure"=>$model->getQ2Expenditure(),
            ":obligation"=>$model->getQ2Obligation(),
            ":releases"=>$model->getQ2Releases(),
                 ":accpay"=>$model->getQ2AccPay(),
            ":cashdis"=>$model->getQ2CashDish(),
            ":remarks"=>$model->getQ2Remarks()
         
         
            );
        }elseif($quarter ==3){
        $data = array(":projid"=>$model->getProjid(),
           
            
            ":physical"=>$model->getQ3Paccomp(),
            ":mandays"=>$model->getQ3Maccomp(),
            ":submittor"=>$model->getQ3submittor(),
            ":expenditure"=>$model->getQ3Expenditure(),
            ":obligation"=>$model->getQ3Obligation(),
            ":releases"=>$model->getQ3Releases(),
             ":accpay"=>$model->getQ3AccPay(),
            ":cashdis"=>$model->getQ3CashDish(),
            ":remarks"=>$model->getQ3Remarks()
         
            
            );
        }elseif($quarter ==4){
        $data = array(":projid"=>$model->getProjid(),
          
            ":physical"=>$model->getQ4Paccomp(),
            ":mandays"=>$model->getQ4Maccomp(),
            ":submittor"=>$model->getQ4submittor(),
            ":expenditure"=>$model->getQ4Expenditure(),
            ":obligation"=>$model->getQ4Obligation(),
            ":releases"=>$model->getQ4Releases(),
             ":accpay"=>$model->getQ4AccPay(),
            ":cashdis"=>$model->getQ4CashDish(),
            ":remarks"=>$model->getQ4Remarks()
         
            
            );
        }
        
        
        }
        
       else if($action=="save"){
          
        
        if($quarter ==1){
        $data = array(":projid"=>$model->getProjid(),
          
            ":physical"=>$model->getQ1Paccomp(),
            ":mandays"=>$model->getQ1Maccomp(),
            ":submittor"=>$model->getQ1savior(),
            ":expenditure"=>$model->getQ1Expenditure(),
            ":obligation"=>$model->getQ1Obligation(),
            ":releases"=>$model->getQ1Releases(),
             ":accpay"=>$model->getQ1AccPay(),
            ":cashdis"=>$model->getQ1CashDish(),
            ":remarks"=>$model->getQ1Remarks()
         
            
            );
        }
        if($quarter ==2){
        $data = array(":projid"=>$model->getProjid(),
          
            ":physical"=>$model->getQ2Paccomp(),
            ":mandays"=>$model->getQ2Maccomp(),
            ":submittor"=>$model->getQ2savior(),
  
            ":expenditure"=>$model->getQ2Expenditure(),
            ":obligation"=>$model->getQ2Obligation(),
            ":releases"=>$model->getQ2Releases(),
             ":accpay"=>$model->getQ2AccPay(),
            ":cashdis"=>$model->getQ2CashDish(),
            ":remarks"=>$model->getQ2Remarks()
         
            
         
            
            );
        }
        if($quarter ==3){
        $data = array(":projid"=>$model->getProjid(),
    
            ":physical"=>$model->getQ3Paccomp(),
            ":mandays"=>$model->getQ3Maccomp(),
            ":submittor"=>$model->getQ3savior(),
     
            ":expenditure"=>$model->getQ3Expenditure(),
            ":obligation"=>$model->getQ3Obligation(),
            ":releases"=>$model->getQ3Releases(),
             ":accpay"=>$model->getQ3AccPay(),
            ":cashdis"=>$model->getQ3CashDish(),
            ":remarks"=>$model->getQ3Remarks()
         
            
            );
        }
        if($quarter ==4){
        $data = array(":projid"=>$model->getProjid(),
          
            ":physical"=>$model->getQ4Paccomp(),
            ":mandays"=>$model->getQ4Maccomp(),
            ":submittor"=>$model->getQ4savior(),
                    ":expenditure"=>$model->getQ4Expenditure(),
            ":obligation"=>$model->getQ4Obligation(),
            ":releases"=>$model->getQ4Releases(),
             ":accpay"=>$model->getQ4AccPay(),
            ":cashdis"=>$model->getQ4CashDish(),
            ":remarks"=>$model->getQ4Remarks()
         
            
         
            
            );
        }
        
        
        }
        
        
        
        if($action == "save"){

            
            
            
        $statement = $db->getDb()->prepare('UPDATE tblprojaccomplishment    SET 
            q'.$quarter.'Paccomp = :physical,
            q'.$quarter.'Obligations = :obligation,
            q'.$quarter.'Maccomp = :mandays, 
            q'.$quarter.'datesave = now()  ,
            q'.$quarter.'savior = :submittor ,
            q'.$quarter.'Releases = :releases , 
            q'.$quarter.'Expenditure = :expenditure,  
            q'.$quarter.'AccPayable = :accpay, 
            q'.$quarter.'CashDis = :cashdis,  
            q'.$quarter.'Remarks = :remarks  
            
                
            where projid = :projid;
           
            ');
      
            
        } elseif($action == "submit"){
        $statement = $db->getDb()->prepare('UPDATE tblprojaccomplishment  SET 
            q'.$quarter.'Paccomp = :physical,
            q'.$quarter.'Obligations = :obligation,
            q'.$quarter.'Maccomp = :mandays, 
            q'.$quarter.'datesub = now()  ,
            q'.$quarter.'submittor = :submittor,
            q'.$quarter.'Releases = :releases , 
            q'.$quarter.'Expenditure = :expenditure,
            q'.$quarter.'AccPayable = :accpay, 
            q'.$quarter.'CashDis = :cashdis,  
            q'.$quarter.'Remarks = :remarks  
            where projid = :projid;'
           );
        
   
            
        }
        
          $statement->execute($data);
        
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
        return $statement;
        
    }
    
    function setToComplete($id,$com){ //setting project in to complete
        $db = new database();
        
      if($com == "completed"){
               $statement2 = $db->getDb()->prepare('
            UPDATE tblprojects  SET  iscompleted = "'.$com.'"  where projid = '.$id);
      }else if($com == "not-completed"){
       
              $statement2 = $db->getDb()->prepare('
            UPDATE tblprojects  SET  iscompleted = "not-completed", actualresult = NULL  where projid = '.$id);
      }
   
               
        $statement2->execute();
        return $statement2;
        
    }

    function submitProjException($quarter, projexception $model,$action ){ // submission of project exception
        $db = new database();
        
        
        if($action=="submit"){
        if($quarter ==1){
        $data = array(
            ":projid"=>$model->getProjid(),        
            ":submittor"=>$model->getQ1submitor(),
         
            ":reason"=>$model->getQ1reason(),
            ":recomendation"=>$model->getQ1recomendation()
            );
        }elseif($quarter ==2){
        $data = array(":projid"=>$model->getProjid(),
            ":submittor"=>$model->getQ2Submitor(),
         
            ":reason"=>$model->getQ2reason(),
            ":recomendation"=>$model->getQ2recomendation()
            
         
            );
        }elseif($quarter ==3){
        $data = array(":projid"=>$model->getProjid(),
            ":submittor"=>$model->getQ3Submitor(),
        
            ":reason"=>$model->getQ3reason(),
            ":recomendation"=>$model->getQ3recomendation()
            
         
            );
        }elseif($quarter ==4){
        $data = array(":projid"=>$model->getProjid(),
            ":submittor"=>$model->getQ4Submitor(),
     
            ":reason"=>$model->getQ4reason(),
            ":recomendation"=>$model->getQ4recomendation()
            
         
            
            );
        }
        
        
        }
        
       else if($action=="save"){
            
        
        if($quarter ==1){
        $data = array(":projid"=>$model->getProjid(),
            ":savior"=>$model->getQ1savior(),
        
            ":reason"=>$model->getQ1reason(),
            ":recomendation"=>$model->getQ1recomendation()
         
            
            );
        }
        if($quarter ==2){
        $data = array(":projid"=>$model->getProjid(),
            ":savior"=>$model->getQ2savior(),
         
            ":reason"=>$model->getQ2reason(),
            ":recomendation"=>$model->getQ2recomendation()
         
            
            );
        }
        if($quarter ==3){
        $data = array(":projid"=>$model->getProjid(),
            ":savior"=>$model->getQ3savior(),
     
            ":reason"=>$model->getQ3reason(),
            ":recomendation"=>$model->getQ3recomendation()
         
            );
        }
        if($quarter ==4){
        $data = array(":projid"=>$model->getProjid(),
            ":savior"=>$model->getQ4savior(),
     
            ":reason"=>$model->getQ4reason(),
            ":recomendation"=>$model->getQ4recomendation()
            
            );
        }
        
        
        }
        
        
        
        if($action == "save"){

            
            
            
        $statement = $db->getDb()->prepare('UPDATE projectexception    SET 
         
            q'.$quarter.'datesave = now()  ,
            q'.$quarter.'savior = :savior ,
            q'.$quarter.'reason = :reason, 
            q'.$quarter.'recomendation = :recomendation
            where projid = :projid');
        $statement->execute($data);
            
        } 
        elseif($action == "submit"){
        $statement = $db->getDb()->prepare('UPDATE projectexception  SET 
            q'.$quarter.'datesub = now() ,
            q'.$quarter.'submittor = :submittor   ,
            q'.$quarter.'reason = :reason , 
            q'.$quarter.'recomendation = :recomendation
          
            where projid = :projid');
        $statement->execute($data);
            
        }
        
        return $statement;
        
    }
    
}



?>