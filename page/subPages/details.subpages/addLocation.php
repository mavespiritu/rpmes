
   <!-- Nav tabs -->
  <ul class="nav nav-tabs hide-print" id="detailTabs" role="tablist">
 
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=8fe67904f79fd063f0a1f066b7aece3f044fbf3f"  role="tab" >
            Agency Type</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=ef97e187942e970ec3d7280dc02202a1128f2672"  role="tab" >
            Agency </a>
    </li>
    <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=5f9b0f45841dc9f9898149d28d5e3fa365656293"  role="tab" >
            Sector</a>
    </li>
    <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=888ce5382dd9f8f9c308ede6b7cffe958a89e026"  role="tab" >
            Sub-Sector</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=55230ac37af7e9254ac0966f73337bee9433df95"  role="tab" >
            Fund Source</a>
    </li>
      <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=6469ac84a89748bb67b923c833ed0c778a17aea3 "  role="tab" >
            Location</a>
    </li>
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=656360bd54b7039e7ee3872f285b5396047fac7c"  role="tab" >
            Due Dates</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=52c4c1e7bc8ec6d3e4763066967dc7e0a361072c"  role="tab" >
           Typhoon</a>
    </li>
    </ul>&nbsp;
    
    
    <form id="addLocation" class="form-horizontal hide-print">
 

  
  
    
    
  <div class="form-group">
         <div class="col-sm-2">
    <label for="provincename" class="col-sm-12 control-label">Province Name:</label>
         </div>
       <div class="col-sm-10">
      <input required="required" type="text" name="provincename" class="form-control" 
             id="provincename" placeholder="Province Name">
    </div>
  </div>
    
    
  <div class="form-group">
      <div class="col-sm-2">
    <label for="district" class="col-sm-12 control-label">District:</label>
      </div>
       <div class="col-sm-5">
      <input  type="text" name="district" class="form-control" 
             id="district" placeholder="District">
    </div>
  </div>
  <div class="form-group">
      <div class="col-sm-2">
    <label for="city" class="col-sm-12 control-label">City:</label>
      </div>
       <div class="col-sm-5">
      <input  type="text" name="city" class="form-control" 
             id="city" placeholder="City">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>



  <div class="panel panel-default">
  
  <div class="panel-heading">All Location</div>
  <div class="panel-body">
    
  </div>

        <table class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
            
            <th>Province Name</th>
            <th>District</th>
            <th>City</th>
         
            </thead>
            <tbody>
                
                
                <?PHP
              $loc = new locationDAO();
$result66 = $loc->getList();
$ctr53 = 1;

                while($row = $result66->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowLOC'.$row[0].'">
                    <td>'.$ctr53++.'</td>
                    
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    
                        


                     <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editLocationModal" 
      data-id="'.$row[0].'" 
      data-pname="'.$row[1].'" 
      data-dname="'.$row[2].'" 
      data-cname="'.$row[3].'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[1].','.$row[2].','.$row[3].'" type="button"
      class="btn btn-default deleteLocation" class="btn btn-primary"  >
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
 




<div class="modal fade" id="editLocationModal" tabindex="-1" 
     role="dialog" aria-labelledby="Edit Fund Source Information">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Location </h4>
      </div>
      <div class="modal-body">
     
          <form id="editLocation" class="form-horizontal">
 
  <div class="form-group">
  
     <input required="required" readonly type="text" name="locidedit" class="form-control" 
             id="locidedit" >
  </div>
    
  <div class="form-group">
         <div class="col-sm-2">
    <label for="provincenameedit" class="col-sm-12 control-label">Province Name:</label>
         </div>
       <div class="col-sm-10">
      <input required="required" type="text" name="provincenameedit" class="form-control" 
             id="provincenameedit" placeholder="Province Name">
    </div>
  </div>
    
    
  <div class="form-group">
      <div class="col-sm-2">
    <label for="districtedit" class="col-sm-12 control-label">District:</label>
      </div>
       <div class="col-sm-5">
      <input  type="text" name="districtedit" class="form-control" 
             id="districtedit" placeholder="District">
    </div>
  </div>
  <div class="form-group">
      <div class="col-sm-2">
    <label for="cityedit" class="col-sm-12 control-label">City:</label>
      </div>
       <div class="col-sm-5">
      <input  type="text" name="cityedit" class="form-control" 
             id="cityedit" placeholder="City">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>   
              
</form>


         
        
      </div>
      
    </div>
  </div>
</div>
