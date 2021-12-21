<?php

class authentication {
public function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
    public  function console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('".$data."');</script>");
	}
}
    public  function setStatus($value){
         setcookie("status", $value, time() + (8), "/");
    }
    public  function addCookie($name,$value){
         setcookie($name, $value, time() + (8), "/");
    }
   public function is_logged_in(){
        
        if(isset($_SESSION['isActive'])=='active'){
            return 'true';
        }
        else{
            
        return 'false';
        
        }
        
    }
    public function getPhpSession(){
        if(isset($_COOKIE['PHPSESSID'])) {
       return $_COOKIE['PHPSESSID'];
        }
    }
   public function is_admin(){
        
        if(isset($_SESSION['userrights'])){
        if($_SESSION['userrights']==1){
            
            return 'true';
        }
        else{
            
        return 'false';
        }
        
        }
        
    }
    public function userAgency(){
        
        if(isset($_SESSION['useragency'])){
           
            return $_SESSION['useragency'];
        }
        else{
            
        return NULL;
        }
        
        
        
    }
    public function getCredentials($credential){
        
        if(isset($_SESSION[$credential])){
           
            return $_SESSION[$credential];
        }
        else{
            
        return NULL;
        }
        
        
        
    }
    public function userID(){
        
        if(isset($_SESSION['userid'])){
           
            return $_SESSION['userid'];
        }
        else{
            
        return NULL;
        }
        
        
        
    }
   public function setToActive(){
        
        $_SESSION['isActive'] = 'active';
    
        
    }
       function logout(){   
           
           header("location:index.php");
          
           session_destroy();
     ob_end_flush();
    
     }
    
    public function addToSession($sesName,$sesValue){
        
        if(!isset($_SESSION[$sesName])){
            
        
         $_SESSION[$sesName] = $sesValue;
        }
        
        
    }
    
    
}

?>
