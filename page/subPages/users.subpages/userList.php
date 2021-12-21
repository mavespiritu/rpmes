<ul class="nav nav-tabs" role="tablist">
    <li><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=a69105e6674259a60c9b40e3c1169f11ac6806da&users=fcb13654c5c3048ef5c4919c3aaf065a8c22cec6" role="tab" >
            Add Users</a></li>
    <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=a69105e6674259a60c9b40e3c1169f11ac6806da&users=ee5a2b01e4d177e64ae5097a5d1f05f58fe380c2"  role="tab" >
            All Users</a></li>
</ul>

<div role="tabpanel" class="tab-pane active" id="tabListOfUsers">
        <table class="table table-hover">
  
            <thead>
            <th>AGENCY</th>
            <th>USERNAME</th>
            <th>PRIVILEGE</th>
            <th>EMAIL</th>
            <th>ACTION</th>
            </thead>
            <tbody>
                
                
                <?PHP
                $user =new userDAO();
                $userResult = $user->getList();
               
                while($row = $userResult->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowUser'.$row[0].'">
                    
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[6].'</td>
                    <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editUserModal" 
      data-userid="'.$row[0].'" 
      data-name="'.$row[2].'" 
      data-rights="'.$row[5].'" 
      data-email="'.$row[6].'" 
      data-agency="'.$row[4].'" 
            data-position="'.$row[7].'"
      data-lastname="'.$row[8].'"
      data-middlename="'.$row[9].'"
      data-firstname="'.$row[10].'"
      data-division="'.$row[11].'"
      data-title="'.$row[12].'">
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[2].'" type="button" class="btn btn-default deleteUser" class="btn btn-primary"  >
<span class="glyphicon glyphicon-trash" ></span>  
</a>
  
</div>

                    </td>
                </tr>
                    ';
                }
                    
                ?>
            </tbody>
        </table>
    </div>


<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="Edit User">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <form id="frmEditUser">
       
         
          
         
  

        <input readonly="readonly" type="text" class="form-control" name="userId" id="userId"/>
          <div class="form-group">
    <label for="email">E-Mail</label>
    <input oninvalid="setCustomValidity('The input Email was Invalid')" 
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
    <input pattern="^[a-zA-Z0-9_-]{6,20}$" 
           oninvalid="setCustomValidity('The input Password was Invalid')" onfocus="setCustomValidity('')"
           required type="password" name="password" maxlength="20" size="20" 
           maxlength="20" size="20" class="form-control" id="password" placeholder="Password">
     
    
    <label for="passwordCfrmE">Confirm Password</label>
      <input pattern="^[a-zA-Z0-9_-]{6,20}$" 
             oninvalid="setCustomValidity('The input Password was Invalid')" onfocus="setCustomValidity('')"
             required type="password" class="form-control" id="passwordCfrmE" 
             placeholder="Confirm Password"/>
      <div id="ismatch">
      </div>
      
   
  
  
  </div>
      
   
 
              

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
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>        

</form>
       
          
          
        
      </div>
      
    </div>
  </div>
</div>

