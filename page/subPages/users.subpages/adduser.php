<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=a69105e6674259a60c9b40e3c1169f11ac6806da&users=fcb13654c5c3048ef5c4919c3aaf065a8c22cec6" role="tab" >
            Add Users</a></li>
    <li><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=a69105e6674259a60c9b40e3c1169f11ac6806da&users=ee5a2b01e4d177e64ae5097a5d1f05f58fe380c2"  role="tab" >
            All Users</a></li>
</ul>

<div role="tabpanel" class="tab-pane" id="tabAddUsers">
          
          <form id="addUser">
  <div class="form-group">
    <label for="email">E-Mail</label>
    <input autofocus oninvalid="setCustomValidity('The input Email was Invalid')" 
           onfocus="setCustomValidity('')"
           required type="email" name="email" maxlength="40" size="40" 
           class="form-control" id="email" placeholder="Email">
        <p class="help-block">note: Make Sure input email is correct!</p>
  </div>
  <div class="form-group">
      <div class="col-md-12">
    <label >Full Name</label>
    </div >
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input First Name was Invalid')" 
           onfocus="setCustomValidity('')"
            type="text" name="firstname" maxlength="40" size="40" 
           class="form-control " id="firstname" placeholder="First Name">
        </div>
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input Middle Name was Invalid')" 
           onfocus="setCustomValidity('')"
            type="text" name="middlename" maxlength="40" size="40" 
           class="form-control " id="middlename" placeholder="Middle Name">
    </div>
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input Middle Name was Invalid')" 
           onfocus="setCustomValidity('')"
            type="text" name="lastname" maxlength="40" size="40" 
           class="form-control " id="lastname" placeholder="Last Name">
    </div>
  </div>
  <div id="forUname" class="form-group">
    <label for="username">Username</label>
    <input  oninvalid="setCustomValidity('The input Username was Invalid')" 
            onfocus="setCustomValidity('')"
           pattern="^[a-zA-Z0-9_-]{1,20}$"  required type="text" name="username" maxlength="20" size="20" class="form-control" id="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input pattern="^[a-zA-Z0-9_-]{1,20}$" 
           oninvalid="setCustomValidity('The input Password was Invalid')" 
           onfocus="setCustomValidity('')"
           required type="password" name="password" maxlength="20" size="20" maxlength="20" size="20" class="form-control" id="password" placeholder="Password">
     
    
    <label for="passwordCfrm">Confirm Password</label>
      <input pattern="^[a-zA-Z0-9_-]{1,20}$" 
             oninvalid="setCustomValidity('The input Password was Invalid')" 
             onfocus="setCustomValidity('')"
             required type="password" class="form-control" id="passwordCfrm" 
             placeholder="Confirm Password"/>
      <div id="ismatch">
      </div>
      
   
  </div>
      
   
              <script>
                  $(document).ready(function(){
                           
                      $("#username").blur(function(){
                         
                         
                              
                              
            
                  
                           $.get("checkexist.php?id="+$(this).val(), function(data, status){
    a = jQuery.parseJSON(data);
    if(a=="true"){
                             $("#forUname").attr('class', 'has-error');
                        
                            $("#forUname").append("<p id='hel' class='help' >username exist</p>");
                            
                        }
                        else{
                              $("#forUname").attr('class', 'has-success');
                    $("#hel").html("");    
                    }
                      });
             
                             
                  });
                  });
                  </script>
              

        <div class="form-group">
    <label for="position">Position</label>
    <input oninvalid="setCustomValidity('The input Position was Invalid')" 
            type="text" name="position"
           maxlength="20" size="20"
           class="form-control"
           id="position" placeholder="Position">
  </div>
        <div class="form-group">
    <label for="division">Division</label>
    <input oninvalid="setCustomValidity('The input Division was Invalid')" 
            type="text" name="division"
           maxlength="20" size="20"
           class="form-control"
           id="division" placeholder="division">
  </div>
        <div class="form-group">
    <label for="title">Title</label>
    <input oninvalid="setCustomValidity('The input Title was Invalid')"   
            type="text" name="title"
           maxlength="20" size="20"
           class="form-control"
           id="division" placeholder="Title">
        <p class="help-block">note: Optional Only!</p>
  </div>
      
  
  <div class="form-group">
    <label for="exampleInputFile">Agency</label>
    
    
    
    
    <?Php
echo '<select required name="agency" class="form-control">';
    
    
    
  $agency =  new agencyDAO();
  $agncyResult = $agency->getList();
  
  
  while($row = $agncyResult->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
      
      
  echo '<option value="'.$row[0].'">'.$row[2].'</option>';
  
  
  }
    
    
  
  
  
  
echo '</select>';
    ?>
    <p class="help-block">Please Select Agency</p>
  </div>
  <div class="checkbox">
   <label class="radio-inline">
  <input required type="radio" name="rights" value="1"> Administrator
</label>
      <br/>
<label class="radio-inline">
  <input required type="radio" name="rights"  value="2"> Program User
</label>

  </div>
  <input type="submit" class="btn btn-default"></input>
</form>
       
          
  
          
      </div>