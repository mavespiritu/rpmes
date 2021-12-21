

                 
 
        



   <?PHp
      
       
     if(isset($_GET['ack'])){
      
            $page  = $_GET['ack'];
            switch ($page){

                
        
                case '6d7f200fac43f37f5b196bdc0152d9e56541c7f3':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                        
                            include_once self::PAGE_DIR."subPages/acknowledgement.subpages/mon.php";
                    }
                    else{
                                               
                      include_once self::PAGE_DIR."index.php";
                        

                    }
                    }
        
                    break;
                case 'b0495f6e0571f5427f7a35c8c1162944f2b496e9':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                        
                            include_once self::PAGE_DIR."subPages/acknowledgement.subpages/acc.php";
                    }
                    else{
                                               
                      include_once self::PAGE_DIR."index.php";
                        

                    }
                    }
        
                    break;
                case 'd7fc60fa1ba1c37c5e4f2dae65e7a9a3b2c79eba':
                if($auth->is_logged_in()=='true'){
                    if($auth->is_admin()=='true'){
                        
                            include_once self::PAGE_DIR."subPages/acknowledgement.subpages/exc.php";
                    }
                    else{
                                               
                      include_once self::PAGE_DIR."index.php";
                        

                    }
                    }
        
                    break;
            
                      
                 
            }
        } 
        else{
           include_once self::PAGE_DIR.'subPages/acknowledgement.subpages/menu.php';
         
        }
        
?>

