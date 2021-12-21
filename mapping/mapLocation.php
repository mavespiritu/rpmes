<?php
//

if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editLocation'==$_GET['action']){
     
         $locationDAO =    new locationDAO();
     $locationModel =    new location();
   
          
            $locid = $_POST['locidedit'];
          
          $provincename  = $_POST['provincenameedit'];
          $district  = $_POST['districtedit'];
          $city  = $_POST['cityedit'];
          
          echo  $provincename . $district . $city;
          
             $locationModel->setLocid($locid);
             $locationModel->setProvincename($provincename);
             $locationModel->setDistric($district);
             $locationModel->setCity($city);
             
             
                
             $isSuccess= $locationDAO->update($locationModel);
            
            
              if($isSuccess){
            echo "success";      
               $auth->setStatus('success');   
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addLocation'==$_GET['action']){
     
         $locationDAO =    new locationDAO();
     $locationModel =    new location();
   
          
            $locid = rand();
          
          $provincename  = $_POST['provincename'];
          $district  = $_POST['district'];
          $city  = $_POST['city'];
          
          
          
             $locationModel->setLocid($locid);
             $locationModel->setProvincename($provincename);
             $locationModel->setDistric($district);
             $locationModel->setCity($city);
             
             
                
             $isSuccess= $locationDAO->insert($locationModel);
            
            
              if($isSuccess){
            echo "success";      
               $auth->setStatus('success');   
              }
            
     }
          if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteLocation'==$_GET['action']){
     
         $locationDAO =    new locationDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $locationDAO->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
}

}
     ?>
