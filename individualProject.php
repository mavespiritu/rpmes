<?php

   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }

       $id = $_GET['q']; 

 $statement = $db->prepare('SELECT
tblprojects.*,
tblprojtargets.*,
tblprojsubsector.subsecname,

tblprojsector.*,
tblperiod.*,
tbllocation.*,
tblfundsrc.*,
tblfundsrctype.*,
tblagency.*
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
    INNER JOIN tblprojsubsector 
        ON (tblprojsubsector.subsecid = tblprojects.subsecid) 
 
    INNER JOIN tblperiod 
        ON (tblprojects.period = tblperiod.periodId)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN  tblfundsrc
    INNER JOIN tblfundsrctype 
        ON  (tblprojects.fundid = tblfundsrc.fundid)
     INNER JOIN  tblagency
 ON (tblprojects.agencyid = tblagency.agencyid)
 WHERE tblprojects.projid = :id
GROUP BY tblprojects.projid
 
');
$statement->bindParam(":id", $id);
                                      

    
        $statement->execute();

        $json =  json_encode($statement->fetch(PDO::FETCH_OBJ));
       echo $json;
?>
