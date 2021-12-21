<?php


   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $agency = $_GET['agency']; 
       $year = $_GET['year']; 
   

   
       $statement = $db->prepare('SELECT
    tblprojects.projid,
  tblprojects.projname,
    tblprojects.projObjective,
    tblprojects.unitofmeasure as indicator,
      tblprojects.actualresult as observedresult    
FROM
     tblprojects  

WHERE  tblprojects.yrenrolled = :year  and tblprojects.iscompleted = "completed" 
and tblprojects.actualresult is NULL and  tblprojects.projObjective is not NULL  
and not tblprojects.projObjective ="" 
AND tblprojects.agencyid  = :agency');
    
       $statement->bindParam(':year', $year);
       $statement->bindParam(':agency', $agency);
    $statement->execute();   
    
    
  
        
            

        echo   json_encode($statement->fetchAll(PDO::FETCH_OBJ));

?>
