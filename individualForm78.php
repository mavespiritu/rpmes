<?php

   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }

       $id = $_GET['q']; 
       $form = $_GET['form']; 
       $quarter= $_GET['quarter']; 
       
if($form==7){
 $statement = $db->prepare('
SELECT 
projid,

implementingAgency,
location,
nameOfProject,
projectCost,
q'.$quarter.'actionRecommendation as actionRecommendation,
q'.$quarter.'dateOfProjectInspection as dateOfProjectInspection,
q'.$quarter.'issues as issues,
q'.$quarter.'physicalStatus as physicalStatus  
FROM tblform7 where projid = :id; 
');
 
}
else if($form==8){
$statement = $db->prepare('
SELECT 
projid,
nameOfProject,
implementingAgency,
location,
q'.$quarter.'dateOfPSS as dateOfPSS,
q'.$quarter.'concernedAgencies as concernedAgencies,
q'.$quarter.'agreementsReached as agreementsReached,
q'.$quarter.'nextSteps as nexSteps
FROM tblform8 where projid = :id; 
');
     
}

$statement->bindParam(":id", $id);

                                      

    
        $statement->execute();

        $json =  json_encode($statement->fetch(PDO::FETCH_OBJ));
       echo $json;
?>
