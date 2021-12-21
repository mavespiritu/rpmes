

  <!-- Nav tabs -->
  <ul class="nav nav-tabs hide-print" id="detailTabs" role="tablist">

    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=8fe67904f79fd063f0a1f066b7aece3f044fbf3f"  role="tab" >
            Agency Type</a>
    </li>
    <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=ef97e187942e970ec3d7280dc02202a1128f2672"  role="tab" >
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
    </ul>&nbsp;
<form id="addAgency" class="form-horizontal hide-print">
 

  <div class="form-group hide-print">
  <label for="agencynametype" class="col-sm-2 control-label">Agency Type:</label>
       <div class="col-sm-10">
           <?Php
       $agencyType = new agencytypeDAO();
                $resultagen =$agencyType->getList(); 
                 echo '

                    
                     <select required="required" id="agencynametype" name="agencynametype" class="form-control">';
                       while($row  = $resultagen->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].' ('.$row[2].')</option>';
                       }
              echo '</select> 
                  
                  ';
           
           ?>
           
           
         
    
       
       
       
       
       
       
       
       </div>
 
  
    </div>
  
  <div class="form-group hide-print">
    <label for="agencycodemain" class="col-sm-2 control-label">Agency Code:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencycodemain" class="form-control" 
             id="agencycodemain" placeholder="Agency Code">
    </div>
  </div>
  <div class="form-group hide-print">
    <label for="agencyname" class="col-sm-2 control-label">Agency Name:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencyname" class="form-control" 
             id="agencyname" placeholder="Agency Name">
    </div>
  </div>
  <div class="form-group hide-print">
    <label for="agencyheadmain" class="col-sm-2 control-label">Agency Head:</label>
       <div class="col-sm-5">
      <input required="required" type="text" name="agencyheadmain" class="form-control" 
             id="agencyheadmain" placeholder="Agency Head">
    </div>
      <div class="col-sm-5">
      <input required="required" type="text" name="agencydesignationmain" class="form-control" 
             id="agencydesignationmain" placeholder="Head Designation">
    </div>
  </div>
  <div class="form-group hide-print">
    <label for="agencyname" class="col-sm-2 control-label">Address:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencyloc" class="form-control" 
             id="agencyloc" placeholder="Agency Location">
    </div>
  </div>
  <div class="form-group hide-print">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>


  <div class="panel panel-default">
  
  <div class="panel-heading">All Agencies</div>
  <div class="panel-body">
    
  </div>

        <table id="tblAgency"  class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
            <th>Agency Type</th>
            <th>Agency Code</th>
            <th>Agency Head</th>
            <th>Designation</th>
            <th>Agency Name</th>
            <th>Address</th>
      
            </thead>
            <tbody>
                
                
                <?PHP
              $agc = new agencyDAO();
$result1 = $agc->getAllList();
$ctr1 = 1;

                while($row = $result1->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowAG'.$row[0].'">
                    <td>'.$ctr1++.'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[5].'</td>
                    <td>'.$row[6].'</td>
                   
                        


                      <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editAGENCYModal" 
      data-agid="'.$row[0].'" 
      data-agtype="'.$row[1].'" 
      data-agcode="'.$row[2].'" 
      data-aghead="'.$row[3].'" 
      data-agname="'.$row[5].'" 
      data-agloc="'.$row[6].'" 
      data-agdesignation="'.$row[4].'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[2].'" type="button" class="btn btn-default deleteAgency" class="btn btn-primary"  >
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
 
<div class="modal fade" id="editAGENCYModal" tabindex="-1" 
     role="dialog" aria-labelledby="Edit Agency Information">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Agency Information</h4>
      </div>
      <div class="modal-body">
     
          <form id="editAgency" class="form-horizontal">
   <div class="form-group">
    <label for="agencycode" class="col-sm-2 control-label">Agency Id</label>
       <div class="col-sm-10">
      <input readonly="readonly" required="required" type="text" name="agencyID" class="form-control" 
             id="agencyID" placeholder="Agency ID">
    </div>
  </div>
              

  <div class="form-group">
  <label for="agencynametypeE" class="col-sm-2 control-label">What type of agency?</label>
       <div class="col-sm-10">
           <?Php
       $agencyTypeE = new agencytypeDAO();
                $resultagenE =$agencyTypeE->getList(); 
                 echo '

                    
                     <select required="required" id="agencynametypeE" name="agencynametypeE" class="form-control">';
                       while($row  = $resultagenE->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].' ('.$row[2].')</option>';
                       }
              echo '</select> 
                  
                  ';
           
           ?>
           
       
       </div>
 
  
    </div>
  
  <div class="form-group">
    <label for="agencycodemainE" class="col-sm-2 control-label">Agency Code</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencycodemainE" class="form-control" 
             id="agencycodemainE" placeholder="Agency Code">
    </div>
  </div>
  <div class="form-group">
    <label for="agencyheadmainE" class="col-sm-2 control-label">Agency Head</label>
       <div class="col-sm-5">
      <input required="required" type="text" name="agencyheadmainE" class="form-control" 
             id="agencyheadmainE" placeholder="Agency Head">
    </div>
    
      <div class="col-sm-5">
      <input required="required" type="text" name="agencydesignationmainE" class="form-control" 
             id="agencydesignationmainE" placeholder="Head Designation">
    </div>
  </div>
  <div class="form-group">
    <label for="agencynameE" class="col-sm-2 control-label">Agency Name:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencynameE" class="form-control" 
             id="agencynameE" placeholder="Agency Name">
    </div>
  </div>
               <div class="form-group hide-print">
    <label for="agencyname" class="col-sm-2 control-label">Address:</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="agencylocE" class="form-control" 
             id="agencylocE" placeholder="Agency Location">
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
