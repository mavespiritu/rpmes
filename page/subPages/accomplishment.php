

    <?Php
 
    if(isset($_GET['accomplish'])){
      
            $page  = $_GET['accomplish'];
        
            switch ($page){

                
        
                case '6697cc2bed9832fb26d191b905344b711c0b771b':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/projectException.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case 'c63b15b1632850964e1dd31df64675acac00ce53':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/summarytable.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case 'e5e3a58d20612fd01f79b80b9cab37127e762a5c':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/accomplishmentSubmision.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case 'ee45c30326b750387589752c0f75e1dd87ddc7e4':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/accomplishmentReport.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case 'c2a6b03f190dfb2b4aa91f8af8d477a9bc3401dc':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/accomplishmentOld.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case '313ac9e8c502e16965b270d28ca93357489d14be':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/projectResult.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case '0fa10bce2bb87c4f22be121e7e63df859d3eda75':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/form6.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case '0f069b5b83dfc0c10744cab1d835b5b3d4188acc':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/form7.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                case 'acbcb17b9d719e70ce79d7169a7f19bc2c2ccb2d':
                
                    if($auth->is_logged_in()=='true'){
                    include_once self::PAGE_DIR.'subPages/accomplishment.subpages/form8.php';
         
                     } else{
                       header('location:index.php');  
                     }

                    break;
                    default:
                        include_once self::PAGE_DIR.'404.php';
                        break;
             
            }
            
            
            
            
            
        } 
        else{
               include_once self::PAGE_DIR.'subPages/accomplishment.subpages/menu.php';
         
         
        }
    
    
    
    
    
    
    
    
    ?>
    
      
    
    
    
    
    
    

