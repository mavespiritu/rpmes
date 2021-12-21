<?php

   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }

           
        
        $statement = $db->prepare('SELECT projid from tblprojaccomplishment
WHERE tblprojaccomplishment.q1datesub is not null;');
      
       
        $statement->execute();
   
        while($id = $statement->fetch(PDO::FETCH_OBJ)){
      
        $statement1 = $db->prepare('INSERT INTO tblform7 (projid) values('.$id->projid.');');
        $statement2=$db->prepare('INSERT INTO tblform8 (projid) values('.$id->projid.');');

         $statement1->execute();
         $statement2->execute();
        }
echo "<pre>". json_encode(print_r($statement))."</pre>";
?>
