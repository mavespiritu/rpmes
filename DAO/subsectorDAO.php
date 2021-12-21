<?php

class subsectorDAO {
        function  getListById($id){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojsubsector where  secid = :id');
       
    
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
        function  getListfoo(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojsubsector 
           INNER JOIN tblprojsector ON (tblprojsector.secid = tblprojsubsector.secid) ');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
        function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojsubsector ');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
    
    
        
    function  update(projsubsector $model){
        $arrm = array(':subsecid' => $model->getSubsecid(),
                    ':secid' =>$model->getSecid(),
                    ':subsecname' => $model->getSubsecname());
       
       $db = new database();
    
        try{
            
    echo "works heres pre";
    print_r($arrm);
   
       $statement = $db->getDb()->prepare('UPDATE  tblprojsubsector SET  
           `secid` =  :secid,
`subsecname` =  :subsecname 
    WHERE  `tblprojsubsector`.`subsecid` =:subsecid LIMIT 1 ');

       
       
    
        $statement->execute($arrm);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
    function  insert(projsubsector $model){
          
        $arrm = array(':subsecid' => $model->getSubsecid(),
                    ':secid' =>$model->getSecid(),
                    ':subsecname' => $model->getSubsecname());
       
       $db = new database();
    
        try{
            
  
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblprojsubsector(
                                                    `subsecid` ,
                                                    `secid` ,
                                                    `subsecname`
                                                    )
                                                    VALUES (
                                                    :subsecid,  :secid,  :subsecname)');

       
       
    
        $statement->execute($arrm);
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
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblprojsubsector` where `tblprojsubsector`.`subsecid` = :subsecid LIMIT 1');
        $statement->bindParam(':subsecid', $id);
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
