<?php

class agencytypeDAO {
    function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblagencytype');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
       function  update(agencytype $model){
           echo "working";
        $arr = array(  
                      ':agencytypecode' =>$model->getAgencytypecode(),
                      ':agencytypedesc' =>$model->getAgencytypedesc(),
                      ':agencytypeid' =>$model->getAgencytypeid(),
                    
            );
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('UPDATE  tblagencytype SET  
                            agencytypecode =  :agencytypecode ,
                                     agencytypedesc =  :agencytypedesc
                        WHERE  agencytypeid = :agencytypeid LIMIT 1 ');
 
       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
       function  insert(agencytype $model){
          
        $arr = array(':agencytypeid' => $model->getAgencytypeid(),
                    ':agencytypecode' =>$model->getAgencytypecode(),
                    ':agencytypedesc' => $model->getAgencytypedesc());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblagencytype ( 
           `agencytypeid` ,
                `agencytypecode` ,
                `agencytypedesc`
                )  VALUES (:agencytypeid , :agencytypecode , :agencytypedesc )');

       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
  
    function  delete($id){
          
       $db = new database();
    
        try{
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblagencytype` where `tblagencytype`.`agencytypeid` = :agencytypeid LIMIT 1');
        $statement->bindParam(':agencytypeid', $id);
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
