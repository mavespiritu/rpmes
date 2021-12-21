
    <?Php
    
    if(isset($_GET['summary'])){
      
            $page  = $_GET['summary'];
        
            switch ($page){

                
        
                case 'a4f62219498fe6a9e9eeea8c086f8b44e51f434d':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/summaryreport.subpages/summaryplan.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
            
                case '161aa04ea6be7933581cfd594cf4b9c78354a441':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/summaryreport.subpages/projecttypesummary.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
            
          
            
             
                        
                 
            }
        } 
        else{
           include_once self::PAGE_DIR.'subPages/summaryreport.subpages/menu.php';
         
        }
    
    
    
    
    
    
    
    
    ?>
    
      
    
    
    
    
    
    

