<?php
   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        
           $statement = $db->prepare('select now() as fulldatetime, year(now()) as yearonly, date(now()) as dateonly');
       
    
        $statement->execute();
        
        $result = $statement->fetch(PDO::FETCH_OBJ);
        
        if(isset($_GET['q'])){
            $q = $_GET['q'];
            switch($q){
                case 'mm-dd-yyyy':
                    echo $result->dateonly;
                    break;
                case 'mm-dd-yyyy hh-mm-ss':
                    echo $result->fulldatetime;
                    break;
                case 'yyyy':
                    echo $result->yearonly;
                    break;
            }
            
            
        }
        

?>

