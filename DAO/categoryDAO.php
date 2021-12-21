<?php


class categoryDAO {
   function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojcategory');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }

   function  update(projcategory $model){
        //   echo "working";
        $arr = array(  
                      ':catcode' =>$model->getCatcode(),
                    ':catname' => $model->getCatname(),
            ':catid' =>$model->getCatid());
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('UPDATE  tblprojcategory SET  
           catcode =  :catcode ,
                    catname =  :catname
                        WHERE  `tblprojcategory`.`catid` = :catid LIMIT 1 ');
 
       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
   function  insert(projcategory $model){
          
        $arr = array(':catid' => $model->getCatid(),
                    ':catcode' =>$model->getCatcode(),
                    ':catname' => $model->getCatname());
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblprojcategory (

`catid` ,
`catcode` ,
`catname`
)
VALUES (
:catid ,
:catcode ,
:catname
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
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblprojcategory` where `tblprojcategory`.`catid` = :catid LIMIT 1');
        $statement->bindParam(':catid', $id);
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
