<?php


 
  
if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){ 
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addTyphoon'==$_GET['action']){
     
         $typhoonDAO =  new typhoonDAO();
         $typhoonModel = new typhoon();
         
   
          
            $typhoonID= rand();
          
          $typhoonname  = $_POST['typhoonname'];
          $typhoonyear  = $_POST['typhoonyear'];
          
       
             $typhoonModel->setTyphoonid($typhoonID);
             $typhoonModel->setTyphoonname($typhoonname);
             $typhoonModel->setYear($typhoonyear);
           
                
             $isSuccess= $typhoonDAO->insert($typhoonModel);
          echo $typhoonID;
          echo $typhoonname;
          echo $typhoonyear;
              if($isSuccess){
        
                  
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteTyphoon'==$_GET['action']){
     
         $subsecDao =    new typhoonDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $subsecDao->delete($id);
            
            
              if($isSuccess){
       
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editTyphoon'==$_GET['action']){
     
       $etyphoonDAO =  new typhoonDAO();
         $etyphoonModel = new typhoon();
         
   
          
            $etyphoonid = $_POST['typhoonidE'];
          $etyphoonname  = $_POST['typhoonnameE'];
          $etyphoonyear  = $_POST['typhoonyearE'];
          
             $etyphoonModel->setTyphoonid($etyphoonid);
             $etyphoonModel->setTyphoonname($etyphoonname);
             $etyphoonModel->setYear($etyphoonyear);
            
                
             $isSuccess= $etyphoonDAO->update($etyphoonModel);
            
            
              if($isSuccess){                
                  $auth->setStatus('success');
              }
     }

}

}
?>

