<?php

if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId,3,8);
  setcookie('appID', $strAppId, time() + (8), "/");
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
             if($_SERVER['REQUEST_METHOD']=='POST'&&'adduser'==$_GET['action']){
                $userDAO = new userDAO();
                $user = new user();     
                
                
                
             $usrID = rand();
           
             
             while($userDAO->ifUidExist($usrID)){
              
                 $usrID = rand();
                 
                 
                  
             }
             
           
             
             
             
             
         $email = $_POST['email'];
         $agency = $_POST['agency'];
         $usrname = $_POST['username'];
         $usrpassword = $_POST['password'];
         $usrrights = $_POST['rights'];
         $position = $_POST['position'];
         $lastname = $_POST['lastname'];
         $middlename = $_POST['middlename'];
         $firstname = $_POST['firstname'];
         $division = $_POST['division'];
         $title = $_POST['title'];
      

         
            
        
         
         $user->setEmail($email);
         $user->setAgencyIid($agency);
         $user->setUserid($usrID);
         $user->setUname($usrname);
         $user->setPword($usrpassword);
         $user->setRightid($usrrights);
         $user->setPosition($position);
         $user->setLastname($lastname);
         $user->setMiddlename($middlename);    
         $user->setFirstname($firstname);
         $user->setDivision($division);
         $user->setTitle($title);
         
  
              
         
         $isSuccess= $userDAO->insert($user);
         
         
             if($isSuccess){
           $auth->setStatus("success");
         $auth->setStatus('success');
             }
     }

     
             if($_SERVER['REQUEST_METHOD']=='POST'&&'edituser'==$_GET['action']){
                $userDAO = new userDAO();
                $user = new user();   
                         $email = $_POST['email'];

        
         $position = $_POST['position'];
         $lastname = $_POST['lastname'];
         $middlename = $_POST['middlename'];
         $firstname = $_POST['firstname'];
         $division = $_POST['division'];
         $title = $_POST['title'];
                $usrID =$_POST['userId']; 
             
         $agency = $_POST['agencyE'];
         
         $usrpassword = $_POST['password'];
         $usrrights = $_POST['rightsE'];
         
     
           $user->setEmail($email);
         $user->setAgencyIid($agency);
         $user->setUserid($usrID);
         $user->setPword($usrpassword);
         $user->setRightid($usrrights);
         $user->setPosition($position);
         $user->setLastname($lastname);
         $user->setMiddlename($middlename);    
         $user->setFirstname($firstname);
         $user->setDivision($division);
         $user->setTitle($title);
  
              
         $isSuccess= $userDAO->update($user);
          if($isSuccess){
             $auth->setStatus("success");
         $auth->setStatus('success');
          }
     }

     
   if($_SERVER['REQUEST_METHOD']=='POST'&&'sendEmail'==$_GET['action']){
if(empty($_POST['username'])  		||
   empty($_POST['email']) 		||
   empty($_POST['password']) 		||
   empty($_POST['rights'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Email is invalid!";
	return false;
   }
	
$username = $_POST['username'];
$password = $_POST['password'];
$priviledge = $_POST['rights'];
$email_address = $_POST['email'];

echo $username .'\n'.
$password .'\n'.
$priviledge .'\n'.
$email_address ;

	

$to = $email_address; 
$email_subject = "RPMES Registration";
$email_body = "
    Welcome $username
    Your Account information: 
    Username : $username 
    Password : $password
    Priviledge : $priviledge ";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers = "From: region1neda@gmail.com";

mail($to,$email_subject,$email_body,$headers);
return true;			

   }
     
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteUser'==$_GET['action']){
       $userDAO =    new userDAO();
         
             
                 $id  = $_POST['delete'];
                 
                 $userDAO->delete($id);
                 
                  $auth->setStatus('success');
       
   }
}

} 
   
   ?>
