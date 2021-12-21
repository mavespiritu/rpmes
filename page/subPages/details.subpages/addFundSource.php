
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
    <li class="active"><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=55230ac37af7e9254ac0966f73337bee9433df95"  role="tab" >
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
<form id="addFundSrc" class="form-horizontal hide-print">
 

  <div class="form-group">
      <div class="col-sm-2">
          <br/>
          
     <label  class="col-sm-12 control-label">Fund Type:</label>
       </div>
     <div class="col-sm-10">
                     
          <div class="checkbox">
   <label class="radio-inline">
  <input required type="radio" name="fndsrctype" value="1"> Local Funds
</label>
      <br/>
<label class="radio-inline">
  <input required type="radio" name="fndsrctype"  value="2"> Foreign Assistance
</label>

  </div>
       
       
       </div>
 
  
    </div>
  
    
    
  <div class="form-group">
         <div class="col-sm-2">
    <label for="fundcode" class="col-sm-12 control-label">Fund Code:</label>
         </div>
       <div class="col-sm-10">
      <input required="required" type="text" name="fundcode" class="form-control" 
             id="fundcode" placeholder="Fund Code">
    </div>
  </div>
    
    
  <div class="form-group">
      <div class="col-sm-2">
    <label for="funddesc" class="col-sm-12 control-label">Fund Description:</label>
      </div>
       <div class="col-sm-5">
      <textarea required="required" type="text" name="funddesc" class="form-control" 
             id="funddesc" placeholder="Fund Description"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>



  <div class="panel panel-default">
  
  <div class="panel-heading">All Fund Source</div>
  <div class="panel-body">
    
  </div>

        <table class="table table-striped table-hover">
  
            <thead>
            <th>#</th>
            
            <th>Fund Code</th>
            <th>Fund Description</th>
      
            </thead>
            <tbody>
                
                
                <?PHP
              $fndsrc = new fundsrcDAO();
$result5 = $fndsrc->getList();
$ctr5 = 1;

                while($row = $result5->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                    
                echo '
                <tr id="rowFundSrc'.$row[0].'">
                    <td>'.$ctr5++.'</td>
                    
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    
                        


                     <td>
                    <div class="btn-group btn-group-xs" role="group" aria-label="Action">
  <a type="button" class="btn btn-default"
  data-toggle="modal" 
      data-target="#editFUNDSRCModal" 
      data-fsid="'.$row[0].'" 
      data-fstype="'.$row[1].'" 
      data-fscode="'.$row[2].'" 
      data-fsdesc="'.$row[3].'"  >
  <span class="glyphicon glyphicon-pencil"></span>
  
</a>
  <a id="'.$row[0].'" name="'.$row[2].'" type="button" class="btn btn-default deleteFundSource" class="btn btn-primary"  >
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
 




<div class="modal fade" id="editFUNDSRCModal" tabindex="-1" 
     role="dialog" aria-labelledby="Edit Fund Source Information">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Fund Source Information</h4>
      </div>
      <div class="modal-body">
     
          <form id="editFundSrc" class="form-horizontal">
   <div class="form-group">
    <label for="editfundid" class="col-sm-2 control-label">Fund Source Id</label>
       <div class="col-sm-10">
      <input readonly="readonly" required="required" type="text" name="editfundid" class="form-control" 
             id="editfundid" placeholder="Fund Source ID">
    </div>
  </div>


  <div class="form-group">
      <div class="col-sm-2">    
  <label for="fndsrctypeE"  class="col-sm-12 control-label">Fund Type</label>
      </div>
  <div class="col-sm-10">
             
        <select name="fndsrctypeE" id="fndsrctypeE" class="form-control">
  <option   value="1"> Local Funds</option>

  <option   value="2"> Foreign Assistance</option>

       </select>
       </div>
 
  
    </div>
  
    
    
  <div class="form-group">
    <label for="fundcodeE" class="col-sm-2 control-label">Fund Code</label>
       <div class="col-sm-10">
      <input required="required" type="text" name="fundcodeE" class="form-control" 
             id="fundcodeE" placeholder="Fund Code">
    </div>
  </div>
    
    
  <div class="form-group">
    <label for="funddescE" class="col-sm-2 control-label">Fund Description</label>
       <div class="col-sm-5">
      <input required="required" type="text" name="funddescE" class="form-control" 
             id="funddescE" placeholder="Fund Description">
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
