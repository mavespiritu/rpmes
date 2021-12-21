



<?php


class notificationCatcher {
   
    function popSuccess($m){
        
   return self::pop("alrtSUCCESS",$m);
                 
    }
    function popWarning($m){
        
   return self::pop("alrtWARNING",$m);
                 
    }
    function popDanger($m){
        
   return self::pop("alrtDANGER",$m);
                 
    }
    function popInfo($m){
        
   return self::pop("alrtINFO",$m);
                 
    }
    
    
   
  
   private function pop($type,$msg){
             echo '
    
 <div  id="AlertC" class="'.$type.'">


          <div class="row">
              <h1 align="center">
'.$msg.'
</h1>
          </div>
          <div align="center" class="row">
              
               <input type="submit" id="modalBTN" class="btn btn-primary" value="OK!"></input>
         
          </div>
       
         
</div>  ';   
    
}
    
}

?>

 
