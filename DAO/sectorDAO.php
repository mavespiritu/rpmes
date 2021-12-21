<?php


class sectorDAO {
  
    function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblprojsector order by secid asc');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
    function  getAllList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
    tblprojsector.secid
    , tblprojcategory.catcode
    , tblprojsector.secname
    , tblprojcategory.catid
FROM
    tblprojsector
    INNER JOIN tblprojcategory 
        ON (tblprojsector.catid = tblprojcategory.catid);');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
    function  getListByCategory($catid){
            $db1 = new database();
    
        try{
            
    
   
       $statement1 = $db1->getDb()->prepare('SELECT
                                        tblprojsector.*
                                      FROM
                                          tblprojsector
                                          INNER JOIN tblprojcategory 
                                              ON (tblprojsector.catid = tblprojcategory.catid)
                                      WHERE (tblprojsector.catid= :catid)');
                                      $statement1->bindParam(":catid", $catid);
                                      

    
        $statement1->execute();
        return $statement1;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement1;
          
            
    
    
     
   
    
    }
    function  getListByCat($catid){
            $db1 = new database();
    
        try{
            
    
   
       $statement1 = $db1->getDb()->prepare('SELECT
                                        tblprojsector.*
                                      FROM
                                          tblprojsector
                                    
                                      WHERE tblprojsector.catid= :catid');
                                      $statement1->bindParam(":catid", $catid);
                                      

    
        $statement1->execute();
        return $statement1;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement1;
          
            
    
    
     
   
    
    }
    
    
    function  getJSONByCategory($catid){
            $db1 = new database();
    
        try{
            
    
   
       $statement1 = $db1->getDb()->prepare('SELECT
                                        tblprojsector.*
                                      FROM
                                          tblprojsector
                                          INNER JOIN tblprojcategory 
                                              ON (tblprojsector.catid = tblprojcategory.catid)
                                      WHERE (tblprojsector.catid= :catid)');
                                      $statement1->bindParam(":catid", $catid);
                                      

    
        $statement1->execute();
        return $statement1;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return json_encode($statement1);
          
            
    
    
     
   
    
    }
    
    function  update(projsector $model){
           echo "working";
         $arr = array(':secid' => $model->getSecid(),
               
                    ':secname' => $model->getSecname());
       
       
       $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('UPDATE  tblprojsector SET  
                    
                            secname=  :secname
                        WHERE  secid = :secid LIMIT 1 ');
 
       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
   }
    function  insert(projsector $model){
          
        $arr = array(':secid' => $model->getSecid(),
                  
                    ':secname' => $model->getSecname());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblprojsector(
`secid` ,

`secname`
)
VALUES (
:secid,   :secname)');

       
       
    
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
            echo "nagworkditoy";
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblprojsector` where `tblprojsector`.`secid` = :secid LIMIT 1');
        $statement->bindParam(':secid', $id);
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
