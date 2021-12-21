<?php
   $config =  parse_ini_file('../../Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }

 $statement = $db->prepare('SELECT tblprojects.programname FROM tblprojects');
         
    
        $statement->execute();
      

        
        
        
 $res = $statement->fetchAll(PDO::FETCH_NUM);    

 

 echo json_encode($res)    ;

?>
