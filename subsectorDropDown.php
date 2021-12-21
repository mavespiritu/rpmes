<?php


if(isset($_GET['q'])){
 
   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $secid = $_GET['q']; 

 $statement = $db->prepare('SELECT  tblprojsubsector.*
                                      FROM
                                          tblprojsubsector
                                        
                                      WHERE secid= :secid');
                                      $statement->bindParam(":secid", $secid);
                                      

    
        $statement->execute();

        
              if($_GET['q']!=0) echo '  <option value="" >No Sub Sector</option>';
                
       while($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                   echo '<option class="sectorOpt" name="'.$row[2].'" value="'.$row[0].'">'.$row[2].'</option>';
                    
                   }
                 
        
             
}
        
            
            
            
?>
