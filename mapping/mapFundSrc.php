<?php


if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
    //agency down here
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addFundSrc'==$_GET['action']){
     $fundsrcDAO =new fundsrcDAO();
     $fundsrcModel =new fundsrc();
   
          
            $fundid = rand();
          
          $fundtypeid  = $_POST['fndsrctype'];
          $fundcode  = $_POST['fundcode'];
          $funddesc  = $_POST['funddesc'];
          
          
          
             echo "works here";
              
             $fundsrcModel->setFundid($fundid);
             $fundsrcModel->setFundtypeid($fundtypeid);
             $fundsrcModel->setFundcode($fundcode);
             $fundsrcModel->setFunddesc($funddesc);
             
                
             $isSuccess= $fundsrcDAO->insert($fundsrcModel);
            
            
              if($isSuccess){
            echo "success";      
                 $auth->setStatus('success'); 
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteFundSource'==$_GET['action']){
     
       $fundsrcDAO =new fundsrcDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $fundsrcDAO->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editFundSrc'==$_GET['action']){
     
         $fundsrcDAO =new fundsrcDAO();
     $fundsrcModel =new fundsrc();
   
          
            $fundid =$_POST['editfundid'];
          
          $fundtypeid  = $_POST['fndsrctypeE'];
          $fundcode  = $_POST['fundcodeE'];
          $funddesc  = $_POST['funddescE'];
          
          
          
             echo "works here";
      
              
             $fundsrcModel->setFundid($fundid);
             $fundsrcModel->setFundtypeid($fundtypeid);
             $fundsrcModel->setFundcode($fundcode);
             $fundsrcModel->setFunddesc($funddesc);
             
                
             $isSuccess= $fundsrcDAO->update($fundsrcModel);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
}
}
?>
