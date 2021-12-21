 
<div class="divGlass ">

   <?PHp
   
    if($auth->is_logged_in()=='true'){
    
 
 
    if($auth->is_logged_in()=='true'){
        
  if(isset($_GET['Panel'])){
            $page  = $_GET['Panel'];
            switch ($page){

                case 'a69105e6674259a60c9b40e3c1169f11ac6806da':
                  if($auth->is_logged_in()=="true"){
                    if($auth->is_admin()=='true'){
                      
                    include_once self::PAGE_DIR."subPages/users.php";
                    
                    }
                    
                  }
                 else{
        header('location:index.php');  
      }
        
                    break;
                case 'ddb25a2769c7269b8c8dea9ebd8d978683af9eb0':
                   if($auth->is_logged_in()=='true'){
              if($auth->is_admin()=='true'){
                     include_once self::PAGE_DIR."subPages/details.php";
                    
              }
                    }else{
        header('location:index.php');  
      }
                    break;
                case '4ea9fa7240ef926ed7106723775a2ed1edd66fad':
                  if($auth->is_logged_in()=='true'){
                     include_once self::PAGE_DIR."subPages/projects.php";
                    
                      
                        }else{
        header('location:index.php');  
      }
                 
                    break;
                
                case 'a38af8d3e6886e6fbc84a1a535b9ce13c8e0c4f5':
                  if($auth->is_logged_in()=='true'){
                     include_once self::PAGE_DIR."subPages/summary.php";
                    
                      
                        }else{
        header('location:index.php');  
      }
                 
                    break;
                
                case 'b0495f6e0571f5427f7a35c8c1162944f2b496e9':
                  if($auth->is_logged_in()=='true'){
                     include_once self::PAGE_DIR."subPages/accomplishment.php";
                    
                      
                        }else{
        header('location:index.php');  
      }
                 
                    break;
                case 'f9f7917226ec6e9fbadd4fe52c35f233baccd628':
                  if($auth->is_logged_in()=='true'){
                     include_once self::PAGE_DIR."subPages/ack.php";
                    
                      
                        }else{
        header('location:index.php');  
      }
                 
                    break;
                case '12c891d306f76efa45d52fe79a9fd7daa2247d3b':
                  if($auth->is_logged_in()=='true'){
                     include_once self::PAGE_DIR."subPages/graphs.php";
                    
                      
                        }else{
        header('location:index.php');  
      }
                 
                    break;
                
              
                        
                 
            }
        } 
        
        else{
            
       if($auth->is_logged_in()=='true'){
                   if($auth->is_admin()=='true'){
         
                  //  echo "<h1>HELLO ".$_SESSION['username']."<small> Welcome to Administrator Panel</small></h1>";
                    
                        }
                        else{
                        // echo "<h1>HELLO ".$_SESSION['username']."<small> Welcome to Your Panel</small></h1>";
                        }
                        
                          }else{
        header('location:index.php');  
      }
            
        }
        
        }
        
    }
?>

</div>