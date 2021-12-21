<?php

class database {
  
       public function getDb() {
       
        $config = Config::getConfig("db"); // calling the final configuration class  
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']); // fetching the connection string  from th config.ini file 
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $db;
    }
    
}

?>
