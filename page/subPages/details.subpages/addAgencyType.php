
  <!-- Nav tabs -->
  <ul class="nav nav-tabs hide-print" id="detailTabs" role="tablist">
    
    <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=8fe67904f79fd063f0a1f066b7aece3f044fbf3f"  role="tab" >
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
      <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=6469ac84a89748bb67b923c833ed0c778a17aea3 "  role="tab" >
            Location</a>
    </li>
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=656360bd54b7039e7ee3872f285b5396047fac7c"  role="tab" >
            Due Dates</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=52c4c1e7bc8ec6d3e4763066967dc7e0a361072c"  role="tab" >
           Typhoon</a>
    </li>
    </ul>
&nbsp;
<form id="addAgencyType" class="form-horizontal hide-print">
 

  <div class="form-group">
       <div class="col-sm-2">
  <label for="AgencyCode" class="col-sm-12 control-label">Agency Code:</label>
  </div>
 
       <div class="col-sm-10">
      <input required="required" type="text" name="AgencyCode" class="form-control" id="AgencyCode" placeholder="Agency Code">
    </div>
  &nbsp;
   <div class="col-sm-2">
       <br/>
   <label for="AgencyName" class="col-sm-12 control-label">Agency Name:</label>
 </div>
       <div class="col-sm-10">
      <input required="required" type="text" name="AgencyName" class="form-control" id="AgencyName" placeholder="Agency Name">
    </div>
  
    </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>

  <div class="panel panel-default">
  
  <div class="panel-heading">All Agency Type</div>
  <div class="panel-body">
    
  </div>

        <table class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
            <th>Agency Code</th>
            <th>Agency Name</th>
          
      
            </thead>
            <tbody>
                
                
                <?PHP
              $cat = new agencytypeDAO();
$result = $cat->getList();
$ctr = 1;

                while($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowAGT'.$row[0].'">
                    <td>'.$ctr++.'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                   
                        


                    <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editAGTModal" 
      data-agtid="'.$row[0].'" 
      data-agtcode="'.$row[1].'" 
      data-agtname="'.$row[2].'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[2].'" type="button" class="btn btn-default deleteAGT" class="btn btn-primary"  >
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

<div class="modal fade" id="editAGTModal" tabindex="-1" role="dialog" aria-labelledby="Edit Agency Type">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Agency Type</h4>
      </div>
      <div class="modal-body">
     
          
          <form id="editAGTfrm" class="form-horizontal">
 
               <div class="form-group">
  
<div class="col-sm-10">
      <input style="display:none;"  required="required" name="AGTidE"
             id="AGTidE" visible="false">
    </div>
    </div>
  <div class="form-group">
  
    
  <label for="AgencyCodeE" class="col-sm-2 control-label">Agency Code</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="AgencyCodeE" class="form-control"
             id="AgencyCodeE" placeholder="Agency Code">
    </div>
    </div>
               <div class="form-group">
  
  <label for="AgencyNameE" class="col-sm-2 control-label">Agency Name</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="AgencyNameE" 
             class="form-control" id="AgencyNameE" placeholder="Agency Name">
    </div>
  
    </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>
        
      </div>
      
    </div>
  </div>
</div>
