<?php

if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
        //SECTOR down here
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addSector'==$_GET['action']){
     
         $sectorDAO =  new sectorDAO();
         $sectorModel = new projsector();
         
   
          
            $sectorid = rand();
          

          $sectorname  = $_POST['sectorname'];
      
             $sectorModel->setSecid($sectorid);
      
             $sectorModel->setSecname($sectorname);
            
                
             $isSuccess= $sectorDAO->insert($sectorModel);
            
            
              if($isSuccess){
      
               $auth->setStatus('success');   
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteSector'==$_GET['action']){
     
         $secDao =    new sectorDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $secDao->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editSector'==$_GET['action']){
     
        
         $sectorDAO =  new sectorDAO();
         $sectorModel = new projsector();
         
   
          
            $sectorid = $_POST['sectoridE'];
      
          $sectorname  = $_POST['sectornameE'];
          
             echo "works here";
             $sectorModel->setSecid($sectorid);
        
             $sectorModel->setSecname($sectorname);
            
                
             $isSuccess= $sectorDAO->update($sectorModel);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }

     //Sub sector down here
     
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addSubSector'==$_GET['action']){
     
         $subsectorDAO =  new subsectorDAO();
         $subsectorModel = new projsubsector();
         
   
          
            $subsectorid = rand();
          
          $subsectormain  = $_POST['subsecidmain'];
          $subsectorname  = $_POST['subsectorname'];
          
             echo "works here";
             $subsectorModel->setSubsecid($subsectorid);
             $subsectorModel->setSecid($subsectormain);
             $subsectorModel->setSubsecname($subsectorname);
            
                
             $isSuccess= $subsectorDAO->insert($subsectorModel);
          
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteSubSector'==$_GET['action']){
     
         $subsecDao =    new subsectorDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $subsecDao->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editSubSector'==$_GET['action']){
     
       $subsectorDAO =  new subsectorDAO();
         $subsectorModel = new projsubsector();
         
   
            $subsectorid = $_POST['subsecidE'];
          $subsectormain  = $_POST['subsecidmainE'];
          $subsectorname  = $_POST['subsectornameE'];
             $subsectorModel->setSubsecid($subsectorid);
             $subsectorModel->setSecid($subsectormain);
             $subsectorModel->setSubsecname($subsectorname);
            
                
             $isSuccess= $subsectorDAO->update($subsectorModel);
            
            
              if($isSuccess){
         
                  $auth->setStatus('success');
              }
     }

}

}
?>
