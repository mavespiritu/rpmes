

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
    <li  class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=888ce5382dd9f8f9c308ede6b7cffe958a89e026"  role="tab" >
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
<form id="addSubSector" class="form-horizontal hide-print">
 

  <div class="form-group">
  <label for="subsecmainid" class="col-sm-2 control-label">Select a Sector:</label>
       <div class="col-sm-10">
           <?Php
       $subsectorDD = new sectorDAO();
                $resultsubsectorDD =$subsectorDD->getList(); 
$resultsubsectorDD->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
                echo '

                    
                     <select required="required" id="subsecmainid" name="subsecidmain" class="form-control">';
                       while($row  = $resultsubsectorDD->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                       }
              echo '</select> 
                  
                  ';
           
           ?>
           
       </div>
 
  
    </div>
  
  <div class="form-group">
    <label for="subsectorname" class="col-sm-2 control-label">Sub Sector Name:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="subsectorname" class="form-control" 
             id="subsectorname" placeholder="Sub-Sector Name">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>


  <div class="panel panel-default">
  
  <div class="panel-heading">All Sub-Sector</div>
  <div class="panel-body">
    
  </div>

        <table class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
            
            <th>Sector Name</th>
            <th>Sub-Sector Name</th>
      
            </thead>
            <tbody>
                
                
                <?PHP
              $subsec = new subsectorDAO();
$result4 = $subsec->getListfoo();
$ctr4 = 1;

                while($row = $result4->fetch(PDO::FETCH_OBJ)){
                    
                echo '
                <tr id="rowSubsec'.$row->subsecid.'">
                    <td>'.$ctr4++.'</td>
                    <td>'.$row->secname.'</td>
                    <td>'.$row->subsecname.'</td>
                    
                        


                  <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editSUBSECTORModal" 
      data-subsecid="'.$row->subsecid.'" 
      data-subsecmain="'.$row->secid.'" 
      data-subsecname="'.$row->subsecname.'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row->subsecid.'" name="'.$row->subsecname.'" type="button" class="btn btn-default deleteSubSector" class="btn btn-primary"  >
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
 
<div class="modal fade" id="editSUBSECTORModal" tabindex="-1" 
     role="dialog" aria-labelledby="Edit Sub Sector Information">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Sub Sector Information</h4>
      </div>
      <div class="modal-body">
     
       
         <form id="editSubSector" class="form-horizontal">
 

               <div class="form-group">
  
<div class="col-sm-10">
      <input style="display:none;"  required="required" name="subsecidE"
             id="subsecidE" visible="false">
    </div>
    </div>
  <div class="form-group">
  <label for="subsecmainidE" class="col-sm-2 control-label">Select a Sector</label>
       <div class="col-sm-10">
           <?Php
       $subsectorDDE = new sectorDAO();
                $resultsubsectorDDE =$subsectorDDE->getList(); 
                echo '

                    
                     <select required="required" id="subsecmainidE" name="subsecidmainE" class="form-control">';
                       while($row  = $resultsubsectorDDE->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].' </option>';
                       }
              echo '</select> 
                  
                  ';
           
           ?>
           
       </div>
 
  
    </div>
  
  <div class="form-group">
    <label for="subsectornameE" class="col-sm-2 control-label">Sub Sector Name</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="subsectornameE" class="form-control" 
             id="subsectornameE" placeholder="Sub-Sector Name">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>

        
      </div>
      
    </div>
  </div>
</div>
