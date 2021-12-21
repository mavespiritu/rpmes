<?php

class fundsrcDAO {
function  getList(){
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblfundsrc');
       
    
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
    tblfundsrc.fundid
    , tblfundsrctype.funddesc
    , tblfundsrc.fundcode
    , tblfundsrc.funddesc
FROM
    tblfundsrc
    INNER JOIN tblfundsrctype 
        ON (tblfundsrc.fundtypeid = tblfundsrctype.fundtypeid);');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    
       function  update(fundsrc $model){
           
          $arr = array(':fundid' => $model->getFundid(),
                    ':fundtypeid' =>$model->getFundtypeid(),
                    ':fundcode' =>$model->getFundcode(),
                    ':funddesc' => $model->getFunddesc());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('UPDATE  tblfundsrc SET  
                        fundtypeid =  :fundtypeid, 
             `fundcode` = :fundcode,
             `funddesc` = :funddesc
             WHERE  `fundid` = :fundid LIMIT 1 ;');

       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
       
   }
       function  insert(fundsrc $model){
          
        $arr = array(':fundid' => $model->getFundid(),
                    ':fundtypeid' =>$model->getFundtypeid(),
                    ':fundcode' =>$model->getFundcode(),
                    ':funddesc' => $model->getFunddesc());
       
       $db = new database();
    
        try{
            
    echo "works here "
           ;
    print_r($arr);
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblfundsrc (
                                        `fundid` ,
                                        `fundtypeid` ,
                                        `fundcode` ,
                                        `funddesc` 
                                        )
                                        VALUES (
                    :fundid,  :fundtypeid,  :fundcode,  :funddesc)');

       
       
    
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
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblfundsrc` where 
            `tblfundsrc`.`fundid` = :fundid LIMIT 1');
        $statement->bindParam(':fundid', $id);
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
