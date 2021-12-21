

    <!-- Nav tabs -->
  <ul class="nav nav-tabs hide-print" id="detailTabs" role="tablist">
  
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=8fe67904f79fd063f0a1f066b7aece3f044fbf3f"  role="tab" >
            Agency Type</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=ef97e187942e970ec3d7280dc02202a1128f2672"  role="tab" >
            Agency </a>
    </li>
    <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=5f9b0f45841dc9f9898149d28d5e3fa365656293"  role="tab" >
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
    </ul>&nbsp;
<form id="addSector" class="form-horizontal hide-print">
 


  
  <div class="form-group">
    <label for="sectorname" class="col-sm-2 control-label">Input Sector Name:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="sectorname" class="form-control" 
             id="sectorname" placeholder="Sector Name">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>

  <div class="panel panel-default">
  
  <div class="panel-heading">All Sector</div>
  <div class="panel-body">
    
  </div>

        <table class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
   
            <th>Sector Name</th>
      
            </thead>
            <tbody>
                
                
                <?PHP
              $sec = new sectorDAO();
$result3 = $sec->getList();
$ctr3 = 1;
$result3->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT);
                while($row = $result3->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowSec'.$row[0].'">
                    <td>'.$ctr3++.'</td>
                    <td>'.$row[1].'</td>
               
                        


                    <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editSECTORModal" 
      data-secid="'.$row[0].'" 

      data-secname="'.$row[1].'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[1].'" type="button" class="btn btn-default deleteSector" class="btn btn-primary"  >
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
 
<div class="modal fade" id="editSECTORModal" tabindex="-1" 
     role="dialog" aria-labelledby="Edit Sector Information">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Sector Information</h4>
      </div>
      <div class="modal-body">
     
          <form id="editSector" class="form-horizontal">
   <div class="form-group">
    <label for="sectoridE" class="col-sm-2 control-label">Sector Id</label>
       <div class="col-sm-10">
      <input readonly="readonly" required="required" type="text" name="sectoridE" class="form-control" 
             id="sectoridE" placeholder="Sector ID">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="sectornameE" class="col-sm-2 control-label">Input Sector Name</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="sectornameE" class="form-control" 
             id="sectornameE" placeholder="Sector Name">
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
