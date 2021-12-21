<?php


   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $agencyId = $_GET['agency']; 
       $year = $_GET['year']; 
       $fundsrc = $_GET['fundsrc']; 
          $quarter= $_GET['quarter'];
          
          
            
      if($quarter == 1){
       $paccompC = '(tblprojaccomplishment.q1Paccomp)';
       
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
     }
      else if($quarter == 2){
    
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
          }
      else if($quarter == 3){
       
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
      }
      else if($quarter == 4){
          
         $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
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
     
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
    }
    
   

      
       

    

    if($fundsrc == 0){
 $statement = $db->prepare('
SELECT
tblprojects.projid,
tblprojects.projname,
tblprojects.datatype,

IF(tblprojects.datatype = "Cumulative",
((('.$paccompC.'-'.$ptargetC.')/
      (CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)
      )*100)  ,
((('.$paccompDCM.'-'.$ptargetDCM.')
/   (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)
      )*100)  )

 as sllipage,

projectexception.q'.$quarter.'reason as reason,

projectexception.q'.$quarter.'recomendation as recomendation

FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN tblprojaccomplishment
        ON (tblprojects.projid = tblprojaccomplishment.projid)
     INNER JOIN projectexception
        ON (tblprojects.projid = projectexception.projid)
    
 WHERE tblprojects.agencyid = :agencyid
AND tblprojects.yrenrolled = :year
AND tblprojaccomplishment.q'.$quarter.'datesub IS NOT NULL

 GROUP By tblprojects.projid ;

 
');
 
}else {
 $statement = $db->prepare('
SELECT
tblprojects.projid,
tblprojects.projname,

IF(tblprojects.datatype = "Cumulative",
(((tblprojaccomplishment.q'.$quarter.'Paccomp-tblprojtargets.q'.$quarter.'Ptarget)/
      (CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)
      )*100)  ,
(((
'.$paccompDCM.'
-
'.$ptargetDCM.'
)
/
      (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget) /*ptargetTOTAL*/
      )*100)  )

 as sllipage,

projectexception.q'.$quarter.'reason as reason,

projectexception.q'.$quarter.'recomendation as recomendation

FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN tblprojaccomplishment
        ON (tblprojects.projid = tblprojaccomplishment.projid)
     INNER JOIN projectexception
        ON (tblprojects.projid = projectexception.projid)
    
 WHERE tblprojects.agencyid = :agencyid
AND tblprojects.yrenrolled = :year
AND tblprojects.fundid = :fundsrc
AND tblprojaccomplishment.q'.$quarter.'datesub IS NOT NULL

 GROUP By tblprojects.projid ;

 
');
          $statement->bindParam(':fundsrc', $fundsrc);             
 }                             
                                  
                                     
                                      $statement->bindParam(':agencyid', $agencyId);
                                      
                                     $statement->bindParam(':year', $year);
                                
                           error_log($statement->queryString);


    
        $statement->execute();

        $json =  json_encode($statement->fetchAll(PDO::FETCH_OBJ));
   
        echo $json;
?>
