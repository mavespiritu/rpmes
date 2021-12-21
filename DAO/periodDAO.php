<?php
class periodDAO{
function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblperiod order by periodId desc ');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    }
?>
