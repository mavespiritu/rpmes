


    
    
    <div class="divGlass">
      
          
                <?PHP
                $user =new userDAO();
            
                $userResult = $user->myDetails($auth->userID());
               $row = $userResult->fetchAll(PDO::FETCH_ASSOC);
           
                
                echo '
           <h3>User ID: <small> '.
                       $row[0]['userid']
                        
                        .'</small></h3>
           <h3>Full Name: <small> '.
                       $row[0]['title']. ' '.
                       $row[0]['firstname']. ' '.
                       $row[0]['middlename']. ' '.
                       $row[0]['lastname']
                        .'</small></h3>
           <h3>Position: <small> '.
                       $row[0]['position']
                        
                        .'</small></h3>
           <h3>Division: <small> '.
                       $row[0]['division']
                        
                        .'</small></h3>
           <h3>User Name: <small> '.
                       $row[0]['uname']
                        
                        .'</small></h3>
           <h3>Priviledge: <small> '.
                       $row[0]['rightdesc']
                        
                        .'</small></h3>
           <h3>Email Address: <small> '.
                       $row[0]['email']
                        
                        .'</small></h3>
           <h3>Agency: <small>
           '.
                       $row[0]['agencycode']
                        
                        .'

</small></h3>
                   
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editUserModal" 
      data-userid="'.$row[0]['userid'].'" 
      data-name="'.$row[0]['uname'].'" 
      data-rights="'.$row[0]['rightid'].'" 
      data-email="'.$row[0]['email'].'" 
      data-agency="'.$row[0]['agencyid'].'" 
      data-position="'.$row[0]['position'].'" 
      data-lastname="'.$row[0]['lastname'].'" 
      data-firstname="'.$row[0]['firstname'].'" 
      data-middlename="'.$row[0]['middlename'].'" 
      data-division="'.$row[0]['division'].'" 
      data-title="'.$row[0]['title'].'" 
          >
          UPDATE ACCOUNT
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  
  
           
                    ';
             
                    
                ?>
         
    </div>



<!--modal-->

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="Edit User">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <form id="frmEditUser">
       
         
          
         
  

        <input readonly="readonly" type="text" class="form-control" name="userId" onfocus="setCustomValidity('')" id="userId"/>
          <div class="form-group">
    <label for="email">E-Mail</label>
    <input oninvalid="setCustomValidity('The input Email was Invalid')" onfocus="setCustomValidity('')"
            
           required type="email" name="email" maxlength="40" size="40" 
           class="form-control" id="email" placeholder="Email">
        <p class="help-block">note: Make Sure input email is correct!</p>
  </div>
  <div class="form-group">
      <div class="col-md-12">
    <label >Full Name</label>
    </div >
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input First Name was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="firstname" maxlength="40" size="40" 
           class="form-control " id="firstname" placeholder="First Name">
        </div>
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input Middle Name was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="middlename" maxlength="40" size="40" 
           class="form-control " id="middlename" placeholder="Middle Name">
    </div>
    <div class="col-sm-4">
    <input oninvalid="setCustomValidity('The input Middle Name was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="lastname" maxlength="40" size="40" 
           class="form-control " id="lastname" placeholder="Last Name">
    </div>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input pattern="^[a-zA-Z0-9_-]{1,20}$" 
           oninvalid="setCustomValidity('The input Password was Invalid')" onfocus="setCustomValidity('')"
           required type="password" name="password" maxlength="20" size="20" 
           maxlength="20" size="20" class="form-control" id="password" placeholder="Password">
     
    
    <label for="passwordCfrmE">Confirm Password</label>
      <input pattern="^[a-zA-Z0-9_-]{1,20}$" 
             oninvalid="setCustomValidity('The input Password was Invalid')" onfocus="setCustomValidity('')"
             required type="password" class="form-control" id="passwordCfrmE" 
             placeholder="Confirm Password"/>
      <div id="ismatch">
      </div>
      
   
  
  
  </div>
      
   
 <?PHP 
 if($auth->is_admin()=='true'){
 ?>
              

        <div class="form-group">
    <label for="position">Position</label>
    <input oninvalid="setCustomValidity('The input Position was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="position"
           maxlength="20" size="20"
           class="form-control"
           id="position" placeholder="Position">
  </div>
        <div class="form-group">
    <label for="division">Division</label>
    <input oninvalid="setCustomValidity('The input Division was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="division"
           maxlength="20" size="20"
           class="form-control"
           id="division" placeholder="division">
  </div>
        <div class="form-group">
    <label for="title">Title</label>
    <input oninvalid="setCustomValidity('The input Title was Invalid')" onfocus="setCustomValidity('')"
            type="text" name="title"
           maxlength="20" size="20"
           class="form-control"
           id="title" placeholder="Title">
        <p class="help-block">note: Optional Only!</p>
  </div>
      
   
  
  
   
   
 
              
  <div class="form-group">
    <label for="agencyEditE">Agency</label>
    
    
    
    
    <?Php
echo '<select id="agencyEdit" required name="agencyE" class="form-control">';
    
    
    
  $agencyE =  new agencyDAO();
  $agncyResultE = $agencyE->getList();
  
  
  while($row = $agncyResultE->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
      
      
  echo '<option value="'.$row[0].'">'.$row[2].'</option>';
  
  
  }
    
    
  
  
  
  
echo '</select>';
    ?>
    <p class="help-block">Please Select Agency</p>
  </div>
  <div class="form-group">
      <select required="required" class="form-control" name="rightsE" id="rightsEdit">
           <option value="1">Administrator</option>';
           <option value="2">Program User</option>';
      </select>
  </div>
              
<?PHP 
 }
 ?>
      
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>        

</form>
       
          
          
        
      </div>
      
    </div>
  </div>
</div>

