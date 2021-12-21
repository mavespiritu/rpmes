<?php

if(isset($_GET['http'])&&isset($_GET['appId'])){
    $strAppId = $_GET['appId'];
    $strAppId = substr($strAppId, 3,8);
if($_SERVER['SERVER_NAME']==$_GET['http']&&$strAppId=="21505451"){
    //agency down here
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addAgency'==$_GET['action']){
     
         $agencyDAO =    new agencyDAO();
     $agencyModel =    new agency();
   
         
          $agencyid =  $agencyDAO->generateNewID();
          
          
          
          
          $agencycode  = $_POST['agencycodemain'];
          $agencyname  = $_POST['agencyname'];
          $agencytype  = $_POST['agencynametype'];
          $agencyhead  = $_POST['agencyheadmain'];
          $agencydesignation  = $_POST['agencydesignationmain'];
          $agencyloc  = $_POST['agencyloc'];
          
          
             echo "works here";
              
             $agencyModel->setAgencyid($agencyid);
             $agencyModel->setAgencyhead($agencyhead);
             $agencyModel->setAgencytype($agencytype);
             $agencyModel->setDesignation($agencydesignation);
             $agencyModel->setAgencycode($agencycode);
             $agencyModel->setAgencyname($agencyname);
             $agencyModel->setAgencyloc($agencyloc);
             
             
                
             $isSuccess= $agencyDAO->insert($agencyModel);
            
            
              if($isSuccess){
            echo "success";      
               $auth->setStatus('success');   
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteAgency'==$_GET['action']){
     
         $agencyDAO =    new agencyDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $agencyDAO->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editAgency'==$_GET['action']){
     
         $agencyDAO =    new agencyDAO();
     $agencyModel =    new agency();
   
          
            $agencyid = $_POST['agencyID'];
          
          $agencycode  = $_POST['agencycodemainE'];
          $agencyname  = $_POST['agencynameE'];
          $agencytype  = $_POST['agencynametypeE'];
          $agencyhead  = $_POST['agencyheadmainE'];
          $agencydesignation  = $_POST['agencydesignationmainE'];
          $agencyloc  = $_POST['agencylocE'];
          
          
             echo "works here";
              
             $agencyModel->setAgencyid($agencyid);
             $agencyModel->setAgencyhead($agencyhead);
             $agencyModel->setAgencytype($agencytype);
             $agencyModel->setDesignation($agencydesignation);
             $agencyModel->setAgencycode($agencycode);
             $agencyModel->setAgencyname($agencyname);
             $agencyModel->setAgencyloc($agencyloc);
             
             
                
             $isSuccess= $agencyDAO->update($agencyModel);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }

    //agency type down here
     if($_SERVER['REQUEST_METHOD']=='POST'&&'addAgencyType'==$_GET['action']){
     
         $agencytypeDAO =    new agencytypeDAO();
     $agencyTypeModel =    new agencytype();
   
          
            $agencytypeid = rand();
          
          $agencytypecode  = $_POST['AgencyCode'];
          $agencytypedesc  = $_POST['AgencyName'];
          
             echo "works here";
              
                
                $agencyTypeModel->setAgencytypecode($agencytypecode);
                $agencyTypeModel->setAgencytypeid($agencytypeid);
                $agencyTypeModel->setAgencytypedesc($agencytypedesc);
                
                
             $isSuccess= $agencytypeDAO->insert($agencyTypeModel);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'deleteAgencyType'==$_GET['action']){
     
         $agencyDAO =    new agencytypeDAO();

             $id = $_POST['delete'];
                
                
             $isSuccess= $agencyDAO->delete($id);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }
     if($_SERVER['REQUEST_METHOD']=='POST'&&'editAgencyType'==$_GET['action']){
     
         $agencyDAO =    new agencytypeDAO();
     $agencyTypeModel =    new agencytype();
   
          
            $agencytypeid = $_POST['AGTidE'];
          
          $agencytypecode  = $_POST['AgencyCodeE'];
          $agencytypedesc  = $_POST['AgencyNameE'];
          
             
              
                
                $agencyTypeModel->setAgencytypecode($agencytypecode);
                $agencyTypeModel->setAgencytypeid($agencytypeid);
                $agencyTypeModel->setAgencytypedesc($agencytypedesc);
                
                
             $isSuccess= $agencyDAO->update($agencyTypeModel);
            
            
              if($isSuccess){
            echo "success";      
                  $auth->setStatus('success');
              }
            
     }

  }
  }
?>
