

<div  class="center-block" >


      <form id="login" method="POST" class="form-horizontal">
 <div  align="center" class="form-group">
          <img src="./image/RPMES.jpg" height="150px" width="150px" alt="logo" class="img-circle">

  </div>
  <div class="form-group">
    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-12">
      <input required="required" autofocus type="text"  
           pattern="^[a-zA-Z0-9_-]{1,20}$" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username">
    </div>
  </div>


  <div class="form-group">
    <label for="inputPassword"  pattern="^[a-zA-Z0-9_-]{1,20}$"  class="col-sm-2 control-label">Password</label>
    <div class="col-sm-12">
      <input required="required" type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-6 col-md-12">
      <button type="submit" name="submit"class="btn btn-primary">Sign in</button>
    </div>
  </div>
          
</form> 

    </div>
