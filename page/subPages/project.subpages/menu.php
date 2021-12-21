       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
      
      <?Php $dues = new duedatesDAO();
    $remaining  = $dues->remainingDays(123456);
     
    $auth = new authentication();
   if($auth->is_admin()=="true"){
    echo ' <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
                                role="tab" >Add Project</a>';
        
    }else{
        
    
    
    if($remaining>=0){
          
    echo ' <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
                                role="tab" >Add Project</a>';
      } 
      } 
      
      
      
      ?>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=8300bb712ceff1bf753d23f8f6edb8c3f30318b7" 
                                role="tab" >Saved Project
         
                <?Php
          $idid = new authentication();
          $planSaved = new monitoringplanDAO();
     
        $sNum =     $planSaved->getSavedProject($idid->userAgency());
        echo '
         
  <span class="label label-success">'.$sNum ->rowCount().' saved project</span>';
        
         ?>
         </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" 
                                role="tab" >Monitoring Plan</a>
     </li>
    
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=df6fa782e0f764e1f6218e852cecba2953f7c7cb" 
                                role="tab" >My Entries
              <?Php
          $ididi = new authentication();
          $planEnt = new monitoringplanDAO();
     
        $entNum =     $planEnt->getMyEntry($ididi->userAgency());
        echo '
         
  <span class="label label-success">'.$entNum ->rowCount().'</span>';
        
         ?>
         </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=161aa04ea6be7933581cfd594cf4b9c78354a441" 
                                role="tab" >Summary Plan
            
         </a>
     </li>

     
   
  </ul>
  <?Php // echo '<h1>Welcome '.$_SESSION['username'].', have a nice day</h1>'; 

    
  ?>
  