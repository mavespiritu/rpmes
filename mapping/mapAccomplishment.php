<?php
if(isset($_GET['http'])&&isset($_GET['appId'])){ // this is one of the security of the system, it assigned an ID  to pass the transaction
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
  if($_SERVER['REQUEST_METHOD']=='POST'&&'frmacknowledge'==$_GET['action']){
      echo currentURL;
    
  }
  if($_SERVER['REQUEST_METHOD']=='POST'&&'form7Submit'==$_GET['action']){ // for 7 submission
 $f7DAO = new accomplishmentDAO();
 $f7MODEL = new frm7();
$quarter = "";
      if(isset($_POST['quarter']))
         $quarter = $_POST['quarter'];
      else{
          $quarter = 0;
      }
      
      if(isset($_POST['projid']))
         $f7MODEL->setProjid($_POST['projid']);
      else{
         $f7MODEL->setProjid(null);
      }
      if(isset($_POST['projectname']))
         $f7MODEL->setProjectname ($_POST['projectname']);
      else{
         $f7MODEL->setProjectname (null);
      }
      if(isset($_POST['location']))
         $f7MODEL->setLocation ($_POST['location']);
      else{
         $f7MODEL->setLocation (null);
      }
      
      if(isset($_POST['implementingAgency']))
         $f7MODEL->setImplementingAgency ($_POST['implementingAgency']);
      else{
         $f7MODEL->setImplementingAgency (null);
      }
      if(isset($_POST['issues']))
         $f7MODEL->setIssues ($_POST['issues']);
      else{
         $f7MODEL->setIssues (null);
      }
      if(isset($_POST['actionRecommendation']))
         $f7MODEL->setActionTaken ($_POST['actionRecommendation']);
      else{
          $f7MODEL->setActionTaken(null);
      }
      if(isset($_POST['projectcost']))
         $f7MODEL->setProjectCost($_POST['projectcost']);
      else{
          $f7MODEL->setProjectCost(null);
      }
      
      if(isset($_POST['physicalStatus']))
         $f7MODEL->setPhysicalStatus ($_POST['physicalStatus']);
      else{
          $f7MODEL->setPhysicalStatus(null);
      }
      if(isset($_POST['dateOfProjectInspection']))
         $f7MODEL->setDateOfProjectInspection ($_POST['dateOfProjectInspection']);
      else{
          $f7MODEL->setDateOfProjectInspection(null);
      }
      if(isset($_POST['preparedby']))
         $f7MODEL->setPreparedBy($_POST['preparedby']);
      else{
          $f7MODEL->setPreparedBy(null);
      }
      
    $isSuccess = $f7DAO->addF7($f7MODEL,$quarter);
           if($isSuccess){
             
              $auth->setStatus('success');
     
               
            
            }
            else{
                 $auth->setStatus('failed');
            }
    
  }
  if($_SERVER['REQUEST_METHOD']=='POST'&&'form8Submit'==$_GET['action']){ // form 8 submission
 $f8DAO = new accomplishmentDAO();
 $f8MODEL = new frm8();
$quarter = "";
      if(isset($_POST['quarter']))
         $quarter = $_POST['quarter'];
      else{
          $quarter = 0;
      }
      
      if(isset($_POST['projid']))
         $f8MODEL->setProjid($_POST['projid']);
      else{
         $f8MODEL->setProjid(null);
      }
      if(isset($_POST['projectname']))
         $f8MODEL->setProjectname ($_POST['projectname']);
      else{
         $f8MODEL->setProjectname (null);
      }
      if(isset($_POST['location']))
         $f8MODEL->setLocation ($_POST['location']);
      else{
         $f8MODEL->setLocation (null);
      }
      
      if(isset($_POST['implementingAgency']))
         $f8MODEL->setImplementingAgency ($_POST['implementingAgency']);
      else{
         $f8MODEL->setImplementingAgency (null);
      }
      if(isset($_POST['dateOfPSS']))
         $f8MODEL->setDateOfPSS ($_POST['dateOfPSS']);
      else{
         $f8MODEL->setDateOfPSS (null);
      }
      if(isset($_POST['concernedAgency']))
         $f8MODEL->setConcernedAgency($_POST['concernedAgency']);
      else{
         $f8MODEL->setConcernedAgency(null);
      }
      if(isset($_POST['agreementsReached']))
         $f8MODEL->setAgreementReached($_POST['agreementsReached']);
      else{
         $f8MODEL->setAgreementReached(null);
      }
      if(isset($_POST['nexSteps']))
         $f8MODEL->setNextStep($_POST['nexSteps']);
      else{
         $f8MODEL->setNextStep(null);
      }
      if(isset($_POST['preparedby']))
         $f8MODEL->setPreparedBy($_POST['preparedby']);
      else{
         $f8MODEL->setPreparedBy(null);
      }
      
      
    
      
    $isSuccess = $f8DAO->addF8($f8MODEL,$quarter); // caller to DAO adding form 8
           if($isSuccess){
             
              $auth->setStatus('success');
              
            }
            else{
                 $auth->setStatus('failed');
            }
    
  }
  if($_SERVER['REQUEST_METHOD']=='POST'&&'projexceptionSubmission'==$_GET['action']){ // submission of project exception
      

      $DAO = new accomplishmentDAO();
   $model = new projexception();
     $DAOaex = new acknowledgementDAO();

      $action = null;
      $quarter = 0;
 
$projid = null;
$reason= null;
$recomendation= null;

$submittor= null;
      $date = $GLOBALS['datetime'];
    
    
          if(isset($_POST['quarter'])){
              switch ($_POST['quarter']) {
                    case 1:
                        $quarter = 1;
                    break;
                    case 2:
                        $quarter = 2;
                    break;
                    case 3:
                        $quarter = 3;
                    break;
                    case 4:
                        $quarter = 4;
                    break;

                    default:
                      $quarter  = 0;
                    break;
              }
          }
         
          
          if(isset($_POST['projid'])){
              $projid = $_POST['projid'];
          }
          if(isset($_POST['reason'])){
              $reason = $_POST['reason'];
          }
          if(isset($_POST['recomendation'])){
              $recomendation = $_POST['recomendation'];
          }
          if(isset($_GET['subsave'])){
              $action = $_GET['subsave'];
          }
          if(isset($_POST['name'])||isset($_POST['desig'])){
              $submittor = $_POST['name'].", ".$_POST['desig'];
          }
        
          
              $length = sizeof($projid);
              
              
            for ($x = 0; $x < $length; $x++) {
    
                if($quarter==1){
            $model->setProjid($projid[$x]);
     
            $model->setQ1datesub($date);
            $model->setQ1datesave($date);
            $model->setQ1savior($submittor);
            $model->setQ1submitor($submittor);
            $model->setQ1reason($reason[$x]);
            $model->setQ1recomendation($recomendation[$x]);
    
                }
                elseif($quarter==2){
            $model->setProjid($projid[$x]);
   
            $model->setQ2datesub($date);
            $model->setQ2datesave($date);
            $model->setQ2savior($submittor);
            $model->setQ2submitor($submittor);
            $model->setQ2reason($reason[$x]);
            $model->setQ2recomendation($recomendation[$x]);
    
  
                }
                elseif($quarter==3){
            $model->setProjid($projid[$x]);
     
            $model->setQ3datesub($date);
            $model->setQ3datesave($date);
            $model->setQ3savior($submittor);
            $model->setQ3submitor($submittor);
            $model->setQ3reason($reason[$x]);
            $model->setQ3recomendation($recomendation[$x]);
    
      
            
                }
                elseif($quarter==4){
            $model->setProjid($projid[$x]);
    
            $model->setQ4datesub($date);
            $model->setQ4datesave($date);
            $model->setQ4savior($submittor);
            $model->setQ4submitor($submittor);
            $model->setQ4reason($reason[$x]);
            $model->setQ4recomendation($recomendation[$x]);
    
       
                }
            
        
            
            
           $isSuccess =  $DAO->submitProjException($quarter, $model,$action);
       
            }
            
           
            
            
            if(isset($_GET['optyear'])){
      $yeaRex = $_GET['optyear'];
}
else{
    $yeaRex = $GLOBALS['year'];
}
  $isContain =  $DAOaex->isContainEx($projid[0], $quarter);
    if($action=='submit'){
            if(!$isContain){
                      $DAOaex->initializeEx($projid[0], $quarter);
                     
            }

       }
         
            if($isSuccess){
             
              $auth->setStatus('success');
     
               
            
            }
            else{
                 $auth->setStatus('failed'); // setStatus is for the response for client side
                 
            }
          
  

        
            
            
     }
  if($_SERVER['REQUEST_METHOD']=='POST'&&'submitaccomplishment'==$_GET['action']){  // submission of accomplishment report
      
      $model =  new projaccomplishment();
      $DAO = new accomplishmentDAO();
      $DAOa = new acknowledgementDAO();
   
    
  
      $isSuccess = null;
      $action = null;
      $quarter = 0;
      $releases = null;
      $obligations = null;
      $expenditure = null;
      $cashdish= null;
      $accpay = null;
      $remarks = null;
      $physical = null;
      $mandays = null;
  
      $submittor = null;
      $date = $GLOBALS['datetime'];
      $projid = null;
    
          if(isset($_POST['quarter'])){
              switch ($_POST['quarter']) {
                    case 1:
                        $quarter = 1;
                    break;
                    case 2:
                        $quarter = 2;
                    break;
                    case 3:
                        $quarter = 3;
                    break;
                    case 4:
                        $quarter = 4;
                    break;

                    default:
                      $quarter  = 0;
                    break;
              }
          }
         
          
          /*
           * 
           * Transfering POST data in to variable
           * 
           */
          
          if(isset($_POST['projid'])){ 
              $projid = $_POST['projid'];
          }
          
       
   
          
          if(isset($_GET['subsave'])){
              $action = $_GET['subsave'];
          }
          
          
          
          if(isset($_POST['releases'])){
              $releases = $_POST['releases'];
          }
          
          
          if(isset($_POST['obligations'])){
              $obligations = $_POST['obligations'];
          }
          
          
          if(isset($_POST['cashdish'])){
              $cashdish = $_POST['cashdish'];
          }
          
          if(isset($_POST['accpay'])){
              $accpay = $_POST['accpay'];
          }
          
          if(isset($_POST['remarks'])){
              $remarks = $_POST['remarks'];
          }
          
          if(isset($_POST['physical'])){
              $physical = $_POST['physical'];
          }
          
          
          
          if(isset($_POST['mandays'])){
              $mandays = $_POST['mandays'];
          }
          
          
          
     
          if(isset($_POST['name'])||isset($_POST['desig'])){
              $submittor = $_POST['name'].", ".$_POST['desig'];
               
              
          }
    
          
              $length = sizeof($projid);
              
              
            for ($x = 0; $x < $length; $x++) {
       if(isset($_POST['check'.$projid[$x]])){ // get the detail if the  project is completed then set in the project to complete
             
              $isCompletes = "completed";
              
          }
          else{
              $isCompletes = "not-completed";
          
          }
          
          
          
          
      $expenditure = $cashdish[$x]+$accpay[$x]; // setting the  value of expenditure by adding the cash disbursment and account payable
      
      /*
       * seting the value of instance of a model PROJECT
       * 
       */
                if($quarter==1){
            $model->setProjid($projid[$x]);
            $model->setQ1datesub($date);
            $model->setQ1datesave($date);
            $model->setQ1savior($submittor);
            $model->setQ1submittor($submittor);
            $model->setQ1Paccomp($physical[$x]);
            $model->setQ1Maccomp($mandays[$x]);
            $model->setQ1Expenditure($expenditure);
            $model->setQ1Obligation($obligations[$x]);
            $model->setQ1Releases($releases[$x]);
            $model->setQ1AccPay($accpay[$x]);
            $model->setQ1CashDish($cashdish[$x]);
            $model->setQ1Remarks($remarks[$x]);
            
                }
                elseif($quarter==2){
            $model->setProjid($projid[$x]);
            $model->setQ2datesub($date);
            $model->setQ2datesave($date);
            $model->setQ2savior($submittor);
            $model->setQ2submittor($submittor);
            $model->setQ2Paccomp($physical[$x]);
            $model->setQ2Maccomp($mandays[$x]);
            $model->setQ2Expenditure($expenditure[$x]);
            $model->setQ2Obligation($obligations[$x]);
            $model->setQ2Releases($releases[$x]);
            $model->setQ2AccPay($accpay[$x]);
            $model->setQ2CashDish($cashdish[$x]);
            $model->setQ2Remarks($remarks[$x]);
                }
                elseif($quarter==3){
            $model->setProjid($projid[$x]);
            $model->setQ3datesub($date);
            $model->setQ3datesave($date);
            $model->setQ3savior($submittor);
            $model->setQ3submittor($submittor);
            $model->setQ3Paccomp($physical[$x]);
            $model->setQ3Maccomp($mandays[$x]);
            $model->setQ3Expenditure($expenditure[$x]);
            $model->setQ3Obligation($obligations[$x]);
            $model->setQ3Releases($releases[$x]);
            $model->setQ3AccPay($accpay[$x]);
            $model->setQ3CashDish($cashdish[$x]);
            $model->setQ3Remarks($remarks[$x]);
                }
                elseif($quarter==4){
            $model->setProjid($projid[$x]);
            $model->setQ4datesub($date);
            $model->setQ4datesave($date);
            $model->setQ4savior($submittor);
            $model->setQ4submittor($submittor);
            $model->setQ4Paccomp($physical[$x]);
            $model->setQ4Maccomp($mandays[$x]);
            $model->setQ4Expenditure($expenditure[$x]);
            $model->setQ4Obligation($obligations[$x]);
            $model->setQ4Releases($releases[$x]);
            $model->setQ4AccPay($accpay[$x]);
            $model->setQ4CashDish($cashdish[$x]);
            $model->setQ4Remarks($remarks[$x]);
                }
            
            
               
           $isSuccess =  $DAO->submitAccomplishment($quarter, $model,$action);  // submitting the accomplishment report with the parameter quarter, model , and action.
           
        
               $DAO->setToComplete($projid[$x], $isCompletes); // this is not actually setting the project in to complete, but this will set the status of the project if completed or not-completed. this action will trigger or act everytime it calls the submission of accomplishment
               
          
           
           
            $isCon =  $DAOa->isContainPE($projid[$x]); // this is to check if the project exception of project exception of a project is exist. return true or false . stored in a variable $isCon
           if($action=='submit'&&!$isCon){ // checking the  action if it is submit and if the project exception is exist .  then initialize project exception
                
            $DAOa->initializeExcep($projid[$x]); //  this will initialize project exception
          
            }
            }
  
if(isset($_GET['optyear'])){
      $yeaR = $_GET['optyear'];
}
else{
    $yeaR = $GLOBALS['year'];
}
  $isContain =  $DAOa->isContain($projid[0], $quarter);
    if($action=='submit'){
            if(!$isContain){
                      $DAOa->initialize($projid[0], $quarter); // this is to initialize the acknowledge report
                     
            }

       }
               
            if($isSuccess){
     
               
               $auth->setStatus('success'); 
     
               
            
            }
            
  

           
            
            
     }
}
}
?>
  
