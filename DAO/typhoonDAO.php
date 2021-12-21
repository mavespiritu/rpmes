<?php


class typhoonDAO {
   function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from typhoon');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }

   function  update(typhoon $model){
 
        $arr = array(  
                      ':typhoonname' =>$model->getTyphoonname(),
                    ':year' => $model->getYear(),
            ':typhoonid' =>$model->getTyphoonid());
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('UPDATE  typhoon SET  
           typhoonName =  :typhoonname,
                    year=  :year
                        WHERE  typhoonid = :typhoonid LIMIT 1 ');
 
       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
   function  insert(typhoon $model){
          
        $arr = array(':typhoonid' => $model->getTyphoonid(),
                    ':typhoonname' =>$model->getTyphoonname(),
                    ':year' => $model->getYear());
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('INSERT INTO  typhoon (

`typhoonid` ,
`typhoonName` ,
`year`
)
VALUES (
:typhoonid ,
:typhoonname ,
:year
)');
 
       
       
    
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
            
       
        $statement = $db->getDb()->prepare('DELETE FROM typhoon where typhoonid = :id LIMIT 1');
        $statement->bindParam(':id', $id);
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
