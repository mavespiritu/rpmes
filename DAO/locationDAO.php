<?php


class locationDAO {
     function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tbllocation');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    function update(location $model){
         $arr = array(  
                     
                   
            ':locid' =>$model->getLocid(),
            ':provincename' =>$model->getProvincename(), 
            ':district' => $model->getDistric(),
            ':city' =>$model->getCity(),
                 );
         try{
         
         
        $db = new database();
        
        $statement=$db->getDb()->prepare('update tbllocation set 
            provincename = :provincename , district = :district, city = :city
            where locid = :locid');
        $statement->execute($arr);
        
            return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
        
    }
    function insert(location $model){
         $arr = array(  
                     
                   
            ':locid' =>$model->getLocid(),
            ':provincename' =>$model->getProvincename(), 
            ':district' => $model->getDistric(),
            ':city' =>$model->getCity(),
                 );
         try{
         
         
        $db = new database();
        
        $statement=$db->getDb()->prepare('insert into tbllocation (locid,provincename,district,city) 
                values(:locid,:provincename,:district,:city)');
        $statement->execute($arr);
        
            return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
        
    }
    function  delete($id){
               $db = new database();
    
        try{
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tbllocation` where `tbllocation`.`locid` = :locid LIMIT 1');
        $statement->bindParam(':locid', $id);
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
