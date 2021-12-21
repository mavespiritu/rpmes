<?php

if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
  if($_SERVER['REQUEST_METHOD']=='POST'&&'updateDueDates'==$_GET['action']){
     $duedatesDAO =new duedatesDAO();
     $duedateModel =new duedate();
   
        
          
          $dudateId = $_POST['duedateId'];
          $dudate  = $_POST['duedate'];
          $name  = $_POST['duedatename'];
          
          
          
              $length = sizeof($dudate);
for ($x = 0; $x < $length; $x++) {
    
            $duedateModel->setDudateId($dudateId[$x]); 
                $duedateModel->setDudate($dudate[$x]);
               $duedateModel->setName($name[$x]);
               
             $isSuccess= $duedatesDAO->update($duedateModel);
      if($isSuccess){
            echo "success";      
                 $auth->setStatus('success'); 
              }
    
} 

           
            
            
     }
     }
     }
?>
