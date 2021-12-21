<?php
  
if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
   if($_SERVER['REQUEST_METHOD']=='POST'&&'frmacknowledgemoni'==$_GET['action']){
 $DAO = new acknowledgementDAO();
      
 if(isset($_POST['findings']))$findings = $_POST['findings'];
 if(isset($_POST['actiontaken']))$action = $_POST['actiontaken'];
 if(isset($_POST['agencyid']))$agency = $_POST['agencyid'];
 if(isset($_POST['year']))$year = $_POST['year'];
     
  
       
       $isSuccess = $DAO->acknowledgemoni($findings, $action, $agency,  $year);
       if($isSuccess){
            $auth->setStatus('success'); 
       }
  
  }
   if($_SERVER['REQUEST_METHOD']=='POST'&&'frmacknowledgeexc'==$_GET['action']){
 $DAO = new acknowledgementDAO();
      
 if(isset($_POST['findings']))$findings = $_POST['findings'];
 if(isset($_POST['actiontaken']))$action = $_POST['actiontaken'];
 if(isset($_POST['agencyid']))$agency = $_POST['agencyid'];
 if(isset($_POST['quarter']))$quarter = $_POST['quarter'];
 if(isset($_POST['year']))$year = $_POST['year'];
     
  
       
       $isSuccess = $DAO->acknowledgeexc($findings, $action, $agency, $quarter, $year);
       if($isSuccess){
            $auth->setStatus('success'); 
       }
  
  }
   if($_SERVER['REQUEST_METHOD']=='POST'&&'frmacknowledge'==$_GET['action']){
 $DAO = new acknowledgementDAO();
      
 if(isset($_POST['findings']))$findings = $_POST['findings'];
 if(isset($_POST['actiontaken']))$action = $_POST['actiontaken'];
 if(isset($_POST['agencyid']))$agency = $_POST['agencyid'];
 if(isset($_POST['quarter']))$quarter = $_POST['quarter'];
 if(isset($_POST['year']))$year = $_POST['year'];
     
  
       
       $isSuccess = $DAO->acknowledge($findings, $action, $agency, $quarter, $year);
       if($isSuccess){
            $auth->setStatus('success'); 
       }
  
  }
     
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editProjectType'==$_GET['action']){
     
        $categoryDAO =    new categoryDAO();
     $categoryModel =    new projcategory();
   
          
            $catid = $_POST['PJTidE'];
          
          $catcode  = $_POST['CategoryCodeE'];
          $catname  = $_POST['CategoryNameE'];
          
             
              
                $categoryModel->setCatid($catid);
                $categoryModel->setCatcode($catcode);
                $categoryModel->setCatname($catname);
                
                
             $isSuccess= $categoryDAO->update($categoryModel);
            
            
              if($isSuccess){
                  echo "success";      
                  $auth->setStatus('success');
              }
            
     }

     
     if($_SERVER['REQUEST_METHOD']=='POST'&&'projectResultSubmission'==$_GET['action']){
     
         $projectDAO =    new projectDAO();
   

          
          $projres  = $_POST['projectResult'];
          $projid  = $_POST['projid'];
      
         // error_log($projres);          
         // error_log($projid);          
   $isSuccess= $projectDAO->subProjectResult($projid,$projres);
            
            
          if($isSuccess){
            //  error_log($isSuccess);
             $auth->setStatus('success');  
          }
            
     }

     
     
     if($_SERVER['REQUEST_METHOD']=='POST'&&'subproject'==$_GET['action']){
     
         $projectDAO =    new projectDAO();
         $accomplishDAO =    new accomplishmentDAO();
     $projectModel =    new projects();
     $projtargetsModel =    new projtargets();
             
                
                 if($auth->is_admin()=="true"){
             
                       $pagency = $_POST['agency']; 
                 }else{
                $pagency = $auth->userAgency();
                     
                 }
                  if(isset($_POST['subsector'])){
                $psubsector = $_POST['subsector'];
                }
                else{
                    $psubsector = 0;
                }
                  if(isset($_POST['programnameCB'])){
                    
                    if($_POST['programnameCB']=='other'){
                    $program =$_POST['programname'];
                    }
                    else{
                    $program =$_POST['programnameCB'];    
                    }
                
                
                }
                
                if(isset($_POST['typhoon'])){
                    $typhoon =$_POST['typhoon'];
                
                }
                else{
                    $typhoon ='';
                
                }
                
                if(isset($_POST['projobj'])){
                    $projobj =$_POST['projobj'];
                
                }
                else{
                    $projobj ='';
                
                }
                if(isset($_POST['expprojresult'])){
                    $expprojresult =$_POST['expprojresult'];
                
                }
                else{
                    $expprojresult ='';
                
                }
                
                
                
                $pname  = $_POST['projectname'];
                $pfunsrc = $_POST['fundsrc'];
                $plocation = $_POST['location'];
                $psector =$_POST['sector'];
                $period =$_POST['period'];
                $ordering =$_POST['ordering'];

              
                
                
                $start=$_POST['datestart'];
                $end =$_POST['dateend'];
                
                if(isset($_POST['datatype'])){
                $datatype =  $_POST['datatype'];
                }else{
                    $datatype = "default";
                }
                
                $enrolledby = $auth->userID();
              
                
                
                
               $puniofmeasure =$_POST['unitofmeasure'];
               
       
                $pq1 = $_POST['pq1'];
                $pq2 = $_POST['pq2'];
                $pq3 = $_POST['pq3'];
                $pq4 = $_POST['pq4'];
               
                $fq1 = $_POST['fq1'];
                $fq2 = $_POST['fq2'];
                $fq3 = $_POST['fq3'];
                $fq4 = $_POST['fq4'];
               
                $mdq1 = $_POST['mdq1'];
                $mdq2 = $_POST['mdq2'];
                $mdq3 = $_POST['mdq3'];
                $mdq4 = $_POST['mdq4'];

                $wdq1 = $_POST['wdq1'];
                $wdq2 = $_POST['wdq2'];
                $wdq3 = $_POST['wdq3'];
                $wdq4 = $_POST['wdq4'];
              
       
               
     $pyear = $GLOBALS['year'];
     $projId = $projectDAO->generateNewID();
     
     
     
                $projectModel->setProjid($projId);
              $projectModel->setAgencyid($pagency);
              $projectModel->setOrdering($ordering);
       
              $projectModel->setLocid($plocation);
           
              $projectModel->setSecid($psector);
              $projectModel->setSubsecid($psubsector);
              $projectModel->setUnitofmeasure($puniofmeasure);
              $projectModel->setYrenrolled($pyear);
              $projectModel->setProjname($pname);
              $projectModel->setFundid($pfunsrc);
              $projectModel->setEnrolledby($enrolledby);
              $projectModel->setPeriod($period);
              $projectModel->setProgramname($program);
              $projectModel->setDatatype($datatype);
                $projectModel->setStart($start);
                $projectModel->setEnd($end);
                $projectModel->setTyphoon($typhoon);
                $projectModel->setExpectedResult($expprojresult);
                $projectModel->setProjObjective($projobj);
                
                
              $projtargetsModel->setAgencyid($pagency);
              $projtargetsModel->setProjid($projId);
              
              $projtargetsModel->setQ1FTraget($fq1);
              $projtargetsModel->setQ1PTraget($pq1);
              $projtargetsModel->setQ1MTraget($mdq1);
              $projtargetsModel->setQ1WTraget($wdq1);
              
              $projtargetsModel->setQ2FTraget($fq2);
              $projtargetsModel->setQ2PTraget($pq2);
              $projtargetsModel->setQ2MTraget($mdq2);
              $projtargetsModel->setQ2WTraget($wdq2);
              
              $projtargetsModel->setQ3FTraget($fq3);
              $projtargetsModel->setQ3PTraget($pq3);
              $projtargetsModel->setQ3MTraget($mdq3);
              $projtargetsModel->setQ3WTraget($wdq3);
              
              $projtargetsModel->setQ4FTraget($fq4);
              $projtargetsModel->setQ4PTraget($pq4);
              $projtargetsModel->setQ4MTraget($mdq4);
              $projtargetsModel->setQ4WTraget($wdq4);
              $projtargetsModel->setDatesub($GLOBALS['datetime']);
              
            
              
             $isSuccess= $projectDAO->addProject($projectModel);
            
              if($isSuccess){
                   $projectDAO->addTargets($projtargetsModel);
                  $accomplishDAO->InitializeAcc($projId,$pagency);
                   $auth->setStatus('success');
                 
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'updateproject'==$_GET['action']){
     
         $projectDAO =    new projectDAO();
     $projectModel =    new projects();
     $projtargetsModel =    new projtargets();
      
             $projId = $_POST['projid'];
                 if($auth->is_admin()=="true"){
             
                       $pagency = $_POST['agency']; 
                 }else{
                $pagency = $auth->userAgency();
                     
                 }
                  if(isset($_POST['subsector'])){
                $psubsector = $_POST['subsector'];
                }
                else{
                    $psubsector = 0;
                }
                  if(isset($_POST['programnameCB'])){
                    
                    if($_POST['programnameCB']=='other'){
                    $program =$_POST['programname'];
                    }
                    else{
                    $program =$_POST['programnameCB'];    
                    }
                
                
                }
                
                if(isset($_POST['typhoon'])){
                    $typhoon =$_POST['typhoon'];
                
                }
                else{
                    $typhoon ='';
                
                }
                
                if(isset($_POST['projobj'])){
                    $projobj =$_POST['projobj'];
                
                }
                else{
                    $projobj ='';
                
                }
                if(isset($_POST['expprojresult'])){
                    $expprojresult =$_POST['expprojresult'];
                
                }
                else{
                    $expprojresult ='';
                
                }
                
                
                
                $pname  = $_POST['projectname'];
                $pfunsrc = $_POST['fundsrc'];
                $plocation = $_POST['location'];
                $psector =$_POST['sector'];
                $period =$_POST['period'];
                $ordering =$_POST['ordering'];
              
                
                
                $start=$_POST['datestart'];
                $end =$_POST['dateend'];
                
                if(isset($_POST['datatype'])){
                $datatype =  $_POST['datatype'];
                }else{
                    $datatype = "default";
                }
                
                $enrolledby = $auth->userID();
              
                
                
                
               $puniofmeasure =$_POST['unitofmeasure'];
               
       
                $pq1 = $_POST['pq1'];
                $pq2 = $_POST['pq2'];
                $pq3 = $_POST['pq3'];
                $pq4 = $_POST['pq4'];
               
                $fq1 = $_POST['fq1'];
                $fq2 = $_POST['fq2'];
                $fq3 = $_POST['fq3'];
                $fq4 = $_POST['fq4'];
               
                $mdq1 = $_POST['mdq1'];
                $mdq2 = $_POST['mdq2'];
                $mdq3 = $_POST['mdq3'];
                $mdq4 = $_POST['mdq4'];

                $wdq1 = $_POST['wdq1'];
                $wdq2 = $_POST['wdq2'];
                $wdq3 = $_POST['wdq3'];
                $wdq4 = $_POST['wdq4'];
              
       
               
     $pyear = $GLOBALS['year'];
   
     
     
     
                $projectModel->setProjid($projId);
              $projectModel->setAgencyid($pagency);
       
              $projectModel->setLocid($plocation);
           
              $projectModel->setSecid($psector);
              $projectModel->setSubsecid($psubsector);
              $projectModel->setUnitofmeasure($puniofmeasure);
              $projectModel->setYrenrolled($pyear);
              $projectModel->setProjname($pname);
              $projectModel->setFundid($pfunsrc);
              $projectModel->setEnrolledby($enrolledby);
              $projectModel->setPeriod($period);
              $projectModel->setProgramname($program);
              $projectModel->setDatatype($datatype);
                $projectModel->setStart($start);
                $projectModel->setEnd($end);
                $projectModel->setTyphoon($typhoon);
                $projectModel->setExpectedResult($expprojresult);
                $projectModel->setProjObjective($projobj);
                $projectModel->setOrdering($ordering);
                
                
              $projtargetsModel->setAgencyid($pagency);
              $projtargetsModel->setProjid($projId);
              
              $projtargetsModel->setQ1FTraget($fq1);
              $projtargetsModel->setQ1PTraget($pq1);
              $projtargetsModel->setQ1MTraget($mdq1);
              $projtargetsModel->setQ1WTraget($wdq1);
              
              $projtargetsModel->setQ2FTraget($fq2);
              $projtargetsModel->setQ2PTraget($pq2);
              $projtargetsModel->setQ2MTraget($mdq2);
              $projtargetsModel->setQ2WTraget($wdq2);
              
              $projtargetsModel->setQ3FTraget($fq3);
              $projtargetsModel->setQ3PTraget($pq3);
              $projtargetsModel->setQ3MTraget($mdq3);
              $projtargetsModel->setQ3WTraget($wdq3);
              
              $projtargetsModel->setQ4FTraget($fq4);
              $projtargetsModel->setQ4PTraget($pq4);
              $projtargetsModel->setQ4MTraget($mdq4);
              $projtargetsModel->setQ4WTraget($wdq4);
              $projtargetsModel->setDatesub($GLOBALS['datetime']);
              
            
              
              
          
              
             $isSuccess= $projectDAO->updateProject($projectModel);
            
            
              if($isSuccess){
                  $projectDAO->updateTargets($projtargetsModel);
                   $auth->setStatus('success');
                 
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'submitproject'==$_GET['action']){
     
         $projectDAO =    new projectDAO();
         $DAOack =    new acknowledgementDAO();
    
         $auth =    new authentication();
         
         $yearack =  $GLOBALS['year'];
         $submittor = $_POST['aprname'] . ", " .$_POST['aprdesg'];
         if($auth->is_admin()=="true"){
             $id = $_GET['agencysmrtbl'];
         }else{
         $id = $auth->userAgency();
         }
       
     
       
             $isSuccess1=   $projectDAO->approve($id, $submittor);
           
               $iscont = $DAOack->isContainMon($id);
               
                   if(!$iscont){
                       
                       $DAOack->initializeMon($id);
                      
                   }
                 
           
              if($isSuccess1){
               
                   $auth->setStatus('success');
                 
              }
              else{
                   $auth->setStatus('failed');
              }
            
     }

     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteproject'==$_GET['action']){
       $projectDAO =    new projectDAO();
         
             
                 $id  = $_POST['delete'];
                 
               $projectDAO->delete($id);
             
                 
                  $auth->setStatus('success');
       
   }

     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteprojectFrm8'==$_GET['action']){
     $projectDAO =    new projectDAO();
         
             
                 $id  = $_POST['delete'];
                 $quarter  = $_GET['quarter'];
        
               $projectDAO->deleteFrm8($id,$quarter);
           
              
                 $auth->setStatus('success');
       
   }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteprojectFrm7'==$_GET['action']){
       $projectDAO =    new projectDAO();
         
             
                 $id  = $_POST['delete'];
                 $quarter  = $_GET['quarter'];
               $projectDAO->deleteFrm7($id,$quarter);
           
                 
                  $auth->setStatus('success');
       
   }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteProjectType'==$_GET['action']){
       $categoryDAO =    new categoryDAO();
         
             
                 $id  = $_POST['delete'];
                 
                 $categoryDAO->delete($id);
                 
                  $auth->setStatus('success');
       
   }
     
   
}

}
     
     
     
     ?>
