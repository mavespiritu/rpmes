<?php



if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
     if($_SERVER['REQUEST_METHOD']=='POST'&&'loggingIn'==$_GET['action']){
           $userDAO =    new userDAO();
         
             
                 $uname  = $_POST['inputUsername'];
        $pword = sha1($_POST['inputPassword']);
          

              
             $statement= $userDAO->login($uname,$pword);
             
            if($statement->rowCount()>0){
                 
                while($row = $statement->fetch(PDO::FETCH_OBJ)){
                
                $auth->addToSession("userid", $row->userid);
                $auth->addToSession("useragency", $row->agencyid);
                $auth->addToSession("username", $row->uname);
                $auth->addToSession("userrights", $row->rightid);
                $auth->addToSession("position", $row->position);
                $auth->addToSession("fullname", ($row->firstname." ".$row->middlename." ".$row->lastname));

               
                    
                }
                   
                      
                        $auth->setStatus('success');
                              
                        $auth->setToActive();
      
                        }
                        else{
                               $auth->setStatus('failed');
                              
                        }
            
               
                
                
              }
}}
              
              ?>
