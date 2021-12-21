<?php

   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        
        
       
            
        if(isset($_GET['id'])){
            
            
            
          $statement=  $db->prepare('SELECT uname from tbluser where uname = :uname');
            $statement->bindParam(':uname', $_GET['id']);
            
            $statement->execute();
            
            if($statement->rowCount()>0){
                echo json_encode("true");
               
            }
            else{
                echo json_encode("false");
                
            }
            
            
            
        }
          else{
                  echo json_encode("false");
               
            }
?>
