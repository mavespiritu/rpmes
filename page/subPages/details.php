
        
          
 





   <?PHp
     if(isset($_GET['details'])){
      
            $page  = $_GET['details'];
            switch ($page){

                case '42a5dad6c09a10b8852a436c0822fa887d754719':
                 if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addProjectType.php'; 

          
                    }
                 } else{
        header('location:index.php');  
      }
        
                    break;
                case '8fe67904f79fd063f0a1f066b7aece3f044fbf3f':
                 if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addAgencyType.php'; 
          
 
         
          
                    }   
                    } else{
        header('location:index.php');  
      }
        
                    break;
            
                case 'ef97e187942e970ec3d7280dc02202a1128f2672':
                 if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addAgency.php'; 
          

      
          
                    }   
                    } else{
        header('location:index.php');  
      }
        
                    break;
            
                case '5f9b0f45841dc9f9898149d28d5e3fa365656293':
                 if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addSector.php'; 
          
  
       
          
                    }   
                    
                    } else{
        header('location:index.php');  
      }
        
                    break;
            
                case '6469ac84a89748bb67b923c833ed0c778a17aea3':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addLocation.php'; 
          
                    }
                         } else{
        header('location:index.php');  
      }
        
            break;
                case '888ce5382dd9f8f9c308ede6b7cffe958a89e026':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/details.subpages/addSubSector.php'; 
          
   
       
          
                    }
                         } else{
        header('location:index.php');  
      }
        
                    break;
                case '55230ac37af7e9254ac0966f73337bee9433df95':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                  
          include_once self::PAGE_DIR.'subPages/details.subpages/addFundSource.php';
         
      
   
       
          
                    }
                         } else{
        header('location:index.php');  
      }
        
                    break;
            
                    break;
                case '656360bd54b7039e7ee3872f285b5396047fac7c':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                  
          include_once self::PAGE_DIR.'subPages/details.subpages/duedates.php';
         
      
   
       
          
                    }
                         } else{
        header('location:index.php');  
      }
        
                    break;
                case '52c4c1e7bc8ec6d3e4763066967dc7e0a361072c':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                      
                  
          include_once self::PAGE_DIR.'subPages/details.subpages/addtyphoon.php';
         
      
   
       
          
                    }
                         } else{
        header('location:index.php');  
      }
        
                    break;
            
             
                        
                 
            }
        } 
        else{
           include_once self::PAGE_DIR.'subPages/details.subpages/menu.php';
         
        }
?>


