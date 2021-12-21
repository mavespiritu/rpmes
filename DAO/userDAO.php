<?php



    
class userDAO {
   
   public function isUNExisting($param) {
            $db = new database();
    
        
   
        $statement = $db->getDb()->prepare('select * from tbluser where uname = :uname');
       
        $statement->bindParam(':uname', $param);
       return $statement->execute();
        
         
       
   }
   public function login($username,$password){ 
        $db = new database();
    
        
   
        $statement = $db->getDb()->prepare('select * from tbluser where uname = :uname and pword = :pword');
       
        $statement->bindParam(':uname', $username);
        $statement->bindParam(':pword', $password);
        
        $statement->execute();
        
       return $statement;
            
        }
       
   
   public function update(user $user){
       $auth =  new authentication();
   if($auth->is_admin()=='true'){
       $arrP = array(':rightid'=>$user->getRightid(),
                    ':agencyid'=>$user->getAgencyIid(),
                    ':pword'=>  sha1($user->getPword()),
                    ':userid'=>$user->getUserid(),
                    ':position'=>$user->getPosition(),
                    ':lastname'=>$user->getLastname(),
                    ':middlename'=>$user->getMiddlename(),
                    ':firstname'=>$user->getFirstname(),
                    ':division'=>$user->getDivision(),
                    ':title'=>$user->getTitle(),
                    ':email'=>$user->getEmail());
   }else{
       $arrP = array(':pword'=>  sha1($user->getPword()),
                    ':userid'=>$user->getUserid(),
                    ':lastname'=>$user->getLastname(),
                    ':middlename'=>$user->getMiddlename(),
                    ':firstname'=>$user->getFirstname(),
                    ':email'=>$user->getEmail());
       
   }
       $db = new database();
    try{
   if($auth->is_admin()=='true'){
        $statement = $db->getDb()->prepare('UPDATE  tbluser 
                        SET  rightid =  :rightid , 
                        agencyid =  :agencyid ,
                        pword = :pword ,
                        email = :email ,
                        position = :position,
                        lastname = :lastname,
                        middlename = :middlename,
                        firstname = :firstname,
                        division = :division,
                        title = :title
                        WHERE  tbluser.userid = :userid LIMIT 1 ');
   }else{
       
   
        $statement = $db->getDb()->prepare('UPDATE  tbluser 
                        SET   
                        pword = :pword ,
                        email = :email ,
                        lastname = :lastname,
                        middlename = :middlename,
                        firstname = :firstname
                        WHERE  tbluser.userid = :userid LIMIT 1 ');
   }   
        $statement->execute($arrP);
        
           return $statement;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
       
        return $statement;
    }
    
   public function insert(user $user){ // adding new user
      $arr = array(':userid'=>$user->getUserid(),
                    ':agencyid'=>$user->getAgencyIid(),
                    ':uname'=>$user->getUname(),
                    ':pword'=>  sha1($user->getPword()),
                    ':rightid'=>$user->getRightid(),
                    ':position'=>$user->getPosition(),
                    ':lastname'=>$user->getLastname(),
                    ':middlename'=>$user->getMiddlename(),
                    ':firstname'=>$user->getFirstname(),
                    ':division'=>$user->getDivision(),
                    ':title'=>$user->getTitle(),
                    ':email'=>$user->getEmail());
       
       $db = new database();
    
   
        $statement = $db->getDb()->prepare('INSERT INTO  tbluser (
                                                `userid` ,
                                                `agencyid` ,
                                                `uname` ,
                                                `pword` ,
                                                `rightid`,
                                                `position`,
                                                `lastname`,
                                                `middlename`,
                                                `firstname`,
                                                `division`,
                                                `title`,
                                                `email`
                                                )
                                                VALUES (
                                                :userid,  
                                                :agencyid, 
                                                :uname,  
                                                :pword, 
                                                :rightid, 
                                                :position, 
                                                :lastname, 
                                                :middlename, 
                                                :firstname, 
                                                :division, 
                                                :title, 
                                                :email
                                                )');
      
        $statement->execute($arr);
          return $statement;
    }
    
     public function ifUidExist($id){ // checking if user id exist
     
       
       $db = new database();
    
   
        $statement = $db->getDb()->prepare('SELECT userid from tbluser where userid = :userid');
        $statement->bindParam(':userid', $id);
        $statement->execute();
        
        
          if($statement->rowCount()>0){
              return true;
          }else{
              return false;
          }
       
     
    }
     public function delete($id){
     
       
       $db = new database();
    
   
        $statement = $db->getDb()->prepare('DELETE FROM `tbluser` where `tbluser`.`userid` = :userid LIMIT 1');
        $statement->bindParam(':userid', $id);
        $statement->execute();
        
        
          return $statement;
       
     
    }
       
       
   function  myDetails($id){ // getting the personal user details 
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
    tbluser.userid
    , tblagency.agencycode
    , tbluser.uname
    , tbluserrights.rightdesc
    , tblagency.agencyid
    , tbluserrights.rightid
    , tbluser.email
    , tbluser.position
    , tbluser.lastname
    , tbluser.firstname
    , tbluser.middlename
    , tbluser.division
    , tbluser.title
    , tblagency.agencycode
    ,tbluserrights.rightdesc
FROM
    tbluser
    INNER JOIN tblagency 
        ON (tbluser.agencyid = tblagency.agencyid)
    INNER JOIN tbluserrights 
        ON (tbluser.rightid = tbluserrights.rightid) where userid= :id');
       
    $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement;
        }    
 catch (PDOException $e){
        
       echo $e->getMessage(); 
       
 }
        
       
           return $statement;
          
            
    
       
     
    }
   function  getList(){  // getting the list of  all users
            $db = new database();
    
        try{
            
    
   
       $statement = $db->getDb()->prepare('SELECT
 tbluser.userid    
,tblagency.agencycode
    
    , tbluser.uname
    , tbluserrights.rightdesc
    ,tblagency.agencyid
    ,tbluserrights.rightid
    ,tbluser.email
    ,tbluser.position
    ,tbluser.lastname
    ,tbluser.middlename
    ,tbluser.firstname
    ,tbluser.division
    ,tbluser.title
FROM
    tbluser
    INNER JOIN tbluserrights 
        ON (tbluser.rightid = tbluserrights.rightid)
    INNER JOIN tblagency 
        ON (tbluser.agencyid = tblagency.agencyid) WHERE tbluser.userid != 361716966  ORDER BY  tblagency.agencycode ;');
       
    
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
