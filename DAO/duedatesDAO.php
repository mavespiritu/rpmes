<?php

class duedatesDAO {
    function remainingDays($id){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT DATEDIFF((SELECT duedate FROM tblduedates where duedateId =:id), date(now())) AS DiffDate');
       $statement->bindValue(':id', $id);

    
        $statement->execute();
        
        $result = $statement->fetchAll();
        
      
       

        return $result[0][0];

        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
      
        
        
    }
function  serverDateTime(){
    $db = new database();
        try{
            
    
   
       $statement = $db->getDb()->prepare('select now() as fulldatetime, year(now()) as yearonly, date(now()) as dateonly');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
}
function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblduedates');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
function  getDateFor($id){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblduedates where duedateId = '.$id);
       
    
        $statement->execute();
        $st = $statement->fetch(PDO::FETCH_OBJ);
        return $st->duedate;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
    
      function  update(duedate $model){
           
          $arr = array(':duedateId' => $model->getDudateId(),
                    ':duedate' =>$model->getDudate(),
                    ':name' =>$model->getName());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('UPDATE  tblduedates SET 
             `duedate` = :duedate,
             `name` = :name
             WHERE  `duedateId` = :duedateId LIMIT 1 ;');

       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
       
   }
    
    
    }
?>
