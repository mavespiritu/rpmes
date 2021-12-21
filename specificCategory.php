<?php


if(isset($_GET['q'])){
 
   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $catid = $_GET['q']; 

 $statement = $db->prepare('SELECT
                                        tblprojsector.*
                                      FROM
                                          tblprojsector
                                          INNER JOIN tblprojcategory 
                                              ON (tblprojsector.catid = tblprojcategory.catid)
                                      WHERE (tblprojsector.catid= :catid)');
                                      $statement->bindParam(":catid", $catid);
                                      

    
        $statement->execute();

                  
                      
      echo '  <select   name="sector" class="form-control">';
      
              if($_GET['q']!=0) echo '  <option value="0"   >Select Sector</option>';
              
       while($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                   echo '<option class="sectorOpt" name="'.$row[1].'" value="'.$row[0].'">'.$row[2].'</option>';
                     }
            echo '</select>';
             
}
        
            
            
            
?>
