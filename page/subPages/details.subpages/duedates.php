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
      <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=6469ac84a89748bb67b923c833ed0c778a17aea3 "  role="tab" >
            Location</a>
    </li>
     <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=656360bd54b7039e7ee3872f285b5396047fac7c"  role="tab" >
            Due Dates</a>
    </li>
    <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=ddb25a2769c7269b8c8dea9ebd8d978683af9eb0&details=52c4c1e7bc8ec6d3e4763066967dc7e0a361072c"  role="tab" >
           Typhoon</a>
    </li>
    </ul>&nbsp;
<form method="POST" id="updateDueDates">
    <div class="container">
        
        
        <?Php
        $dues = new duedatesDAO();
        $result = $dues->getList();
       
        while($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
        echo '
    <div class="row">
        
        <div class="col-sm-2">
     <input class="form-control" style="display:none;" name="duedateId[]" readonly value ="'.$row[0].' "/>
        </div>
        <div class="col-sm-4">
     <input class="form-control" name="duedatename[]" readonly value ="'.$row[2].'"/>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                
                    <input type="date"  name="duedate[]" value="'.$row[1].'" class="form-control" />
               
            </div>
        </div>
        
        
    </div>
        ';
        }
        ?>
    
     
        
        
        <div class="form-group col-sm-7 col-sm-offset-2">
            <input type="submit"  class="form-control btn-info " value="Update" />
        </div>
</div>
</form>
