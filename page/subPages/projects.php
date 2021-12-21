

                 
 
          



   <?PHp
$dues = new duedatesDAO();
       
       
$remaining  = $dues->remainingDays(123456);


     if(isset($_GET['project'])){
      
            $page  = $_GET['project'];
            switch ($page){

                
        
                case 'b11a44780ae1554dd88ab4d3f07b4324f1d28442':
                
                    if($auth->is_admin()=='true'){
                        
                            include_once self::PAGE_DIR."subPages/project.subpages/addProject.php";
                    }
                    else{
                                                if($remaining>=0){
                      include_once self::PAGE_DIR."subPages/project.subpages/addProject.php";
                        }

                    }
        
                    break;
            
                case '6d7f200fac43f37f5b196bdc0152d9e56541c7f3':
                
                    if($auth->is_logged_in()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/project.subpages/monitoringplan.php'; 
     
      
                    }
        
                    break;
            
                case 'df6fa782e0f764e1f6218e852cecba2953f7c7cb':
                
                    if($auth->is_logged_in()=='true'){
                      
                        include_once self::PAGE_DIR.'subPages/project.subpages/myentries.php'; 
          
 
      
                    }
        
                    break;
            
                
                case '8300bb712ceff1bf753d23f8f6edb8c3f30318b7':
                
                    if($auth->is_logged_in()=='true'){
                      
                        include_once self::PAGE_DIR.'subPages/project.subpages/savedproject.php'; 
          
 
      
                    }
        
                    break;
                case '161aa04ea6be7933581cfd594cf4b9c78354a441':
                
                    if($auth->is_logged_in()=='true'){
                      
                        include_once self::PAGE_DIR.'subPages/project.subpages/summaryplan.php'; 
          
 
      
                    }
        
                    break;
              
            
          
                case '63a711c71609725e5c25334ad085d65ad431414a':
                
                    if($auth->is_logged_in()=='true'){
                      
                        include_once self::PAGE_DIR.'subPages/project.subpages/projecttypesummary.php'; 
          
 
      
                    }
        
                    break;
            
          
            
             
                        
                 
            }
        } 
        else{
           include_once self::PAGE_DIR.'subPages/project.subpages/menu.php';
         
        }
        
?>
