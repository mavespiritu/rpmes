<?php

class agencyDAO {
    
    function  generateNewID(){ // this is to generate a new ID... purpose of this is to avoid the conflict of ID
        
    
            $db = new database();
    
    
    $id = rand();
   
       $statement = $db->getDb()->prepare(' SELECT if(count(agencyid)>0,"true", "false") as isExist  FROM tblagency WHERE tblagency.agencyid = '.$id);
       
    
        $statement->execute();
       
        
       $result = $statement->fetch(PDO::FETCH_OBJ);
       
       

      if($result->isExist == "false")
          
      {
          return $id;
      }
      else
      {
        $this->generateNewID(); 
      }
     
          
            
    
        
    }
    function  getAgencyWithMon($id){
        if($id==0){
            $param1 = "";
        }else{
            $param1 = " where tblagency.agencyid = ".$id;
        }
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblagency INNER JOIN tblprojects ON (tblprojects.agencyid = tblagency.agencyid) 
                                                '.$param1.' GROUP by tblprojects.agencyid ORDER BY agencycode ');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
    function  getAgency($id){
        if($id==0){
            $param1 = "";
        }else{
            $param1 = " where agencyid = ".$id;
        }
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('select * from tblagency '.$param1.' ORDER BY agencycode');
       
    
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
            
    
   
       $statement = $db->getDb()->prepare('select * from tblagency ORDER BY agencycode');
       
    
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
    tblagency.agencyid
    , tblagencytype.agencytypecode
    , tblagency.agencycode
    , tblagency.agencyhead
    , tblagency.designation
    , tblagency.agencyname
    , tblagency.agencyloc
FROM
    tblagency
    INNER JOIN tblagencytype 
        ON (tblagency.agencytype = tblagencytype.agencytypeid);');
       
    
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       

   
}
     function  update(agency $model){
           
        $arr = array(':agencyid' => $model->getAgencyid(),
                    ':agencytype' =>$model->getAgencytype(),
                    ':agencycode' =>$model->getAgencycode(),
                    ':agencyhead' => $model->getAgencyhead(),
                    ':agencyname' => $model->getAgencyname(),
                    ':location' => $model->getAgencyloc(),
                    ':designation' => $model->getDesignation());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('UPDATE  tblagency SET  
           `agencytype` =  :agencytype,
`agencycode` =  :agencycode,
`agencyhead` = :agencyhead ,
`agencyname` = :agencyname ,
`agencyloc` = :location ,
`designation` =  :designation WHERE  `tblagency`.`agencyid` = :agencyid LIMIT 1 ;');

       
       
    
        $statement->execute($arr);
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
       
   }
       function  insert(agency $model){
          
        $arr = array(':agencyid' => $model->getAgencyid(),
                    ':agencytype' =>$model->getAgencytype(),
                    ':agencycode' =>$model->getAgencycode(),
                    ':agencyhead' => $model->getAgencyhead(),
                    ':agencyname' => $model->getAgencyname(),
                    ':location' => $model->getAgencyloc(),
                    ':designation' => $model->getDesignation());
       
       $db = new database();
    
        try{
            
    echo "works here";
   
       $statement = $db->getDb()->prepare('INSERT INTO  tblagency (
                                        `agencyid` ,
                                        `agencytype` ,
                                        `agencycode` ,
                                        `agencyhead` ,
                                        `designation`,
                                        `agencyname` ,
                                        `agencyloc`
                                        )
                                        VALUES (
:agencyid,  :agencytype,  :agencycode,  :agencyhead,  :designation, :agencyname, :location
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
            
       
        $statement = $db->getDb()->prepare('DELETE FROM `tblagency` where 
            `tblagency`.`agencyid` = :agencyid LIMIT 1');
        $statement->bindParam(':agencyid', $id);
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
