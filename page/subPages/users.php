

   <?PHp
     if(isset($_GET['users'])){
      
            $page  = $_GET['users'];
            switch ($page){

            
            
                case 'fcb13654c5c3048ef5c4919c3aaf065a8c22cec6':
                
                    if($auth->is_logged_in()=='true'){
                      
                     include_once self::PAGE_DIR.'subPages/users.subpages/adduser.php'; 
     
      
                    }
                      else{
        header('location:index.php');  
      }
        
                    break;
            
                case 'ee5a2b01e4d177e64ae5097a5d1f05f58fe380c2':
                
                    if($auth->is_logged_in()=='true'){
                      
                        include_once self::PAGE_DIR.'subPages/users.subpages/userList.php'; 
          
 
      
                    }  else{
        header('location:index.php');  
      }
        
                    break;
            
          
            
             
                        
                 
            }
        } 
        else{
           include_once self::PAGE_DIR.'subPages/users.subpages/menu.php';
         
        }
?>
