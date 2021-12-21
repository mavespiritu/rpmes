  <?Php
  $expCount= new accomplishmentDAO();
  $authExp= new authentication();
  if($authExp->is_admin()=="true"){
  $resultExpCount=$expCount->countNewException(0,$GLOBALS['year']);
  }
  else{
      $resultExpCount=$expCount->countNewException($authExp->userAgency(),2016);
  }
  
 
  ?>
<ul class="nav nav-tabs hide-print" role="tablist">

    <?Php if($resultExpCount>0){ ?>
       <li  ><a style="color:red;"  href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } else{ ?>
     
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } ?>
           <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=e5e3a58d20612fd01f79b80b9cab37127e762a5c" 
                                role="tab" >Accomplishment Submission
               </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=ee45c30326b750387589752c0f75e1dd87ddc7e4&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
                                role="tab" >Accomplishment Report</a>
     </li>
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=c63b15b1632850964e1dd31df64675acac00ce53&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
                                role="tab" >Summary table</a>
     </li>
   <li class="active">
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=313ac9e8c502e16965b270d28ca93357489d14be" 
                                role="tab" >Project Result</a>
     </li>
       <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=0fa10bce2bb87c4f22be121e7e63df859d3eda75" 
                                role="tab" >Form 6</a>
     </li>
       <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=0f069b5b83dfc0c10744cab1d835b5b3d4188acc" 
                                role="tab" >Form 7</a>
     </li>
       <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=acbcb17b9d719e70ce79d7169a7f19bc2c2ccb2d" 
                                role="tab" >Form 8</a>
     </li>
   
  </ul>

<div class="title-header-print">
    <img style="float: left;" src="image/9225816_orig.jpg" width=70px" height="70px"/>
    <h1 style="float: left;">Accomplishment Report</h1>
  <br/>  
</div>
<style>
    .accReport .tg-amwm{
        font-size:11px;
    }
    .accReport .tg-yw4l{
        font-size:11px;
    }
    .accReport .left{
        text-align: left;
    }
    
</style>
<br/>
<div>
        <div class="col-sm-2 hide-print">
        <select class="form-control" id="optYear">
         
         
            <?Php
            $current = $GLOBALS['year'];
            $yearGap =$current-2012;
            $i = 0; 
            while($i<=$yearGap){
                
            echo "<option value='".($current-$i)."'>".($current-$i)."</option>";
            
            $i++;
            
            }
            ?>
        </select>
        
    </div>
    <?Php if($auth->is_admin()=="true"){ ?>
    <div class="form-group hide-print  ">
          <div class="col-sm-2">
               <?php
             $agency = new agencyDAO();
                $resultagn =$agency->getList(); 
                 echo '
                     <select required="required" id="agencysmrtbl" name="agency" class="form-control">';
                   echo '<option selected="selected" value="0">Select Agency</option>';
                       while($row  = $resultagn->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select> ';
        ?>
            
    
            
            </div>
    </div>
    <?Php } ?>

    <div class="form-group hide-print  ">
          <div class="col-sm-2">
              <button id="xlsfile" class="form-control btn btn-info "  value="download to excel" >
                Save as Excel File  <span class="glyphicon glyphicon-save-file"/>
              </button>
            
            </div>
    </div>
     <div class="form-group hide-print  ">
     <div class="col-sm-2">
   <button type="button" value="Load"  class="form-control btn btn-success" id="loadData"> load
<span class="   glyphicon glyphicon-send
"/>
   </button>
    </div>
    </div>
    </div>
<div class="hide-print">
<br/>
<br/>
</div>
    <div id="tableex" class="scrollY">
<table class="tg saveExcel">
    <thead>
  <tr>
    <th class="tg-amwm">Name of Project</th>
    <th class="tg-amwm">Project Result</th>
    <th class="tg-amwm">Output Indicator</th>
    <th class="tg-amwm">Observed Result</th>
  
  </tr>
  </thead>
  <tbody>
      
      
      <?Php
      
       $acc = new projectDAO();
  if(isset($_GET['optyear'])){
      $year = $_GET['optyear'];
  
  if($_GET['optyear']!=0){
      $year = $_GET['optyear'];
  }else{
      $year = $GLOBALS['year'];
  }
  
  
  }
  else{
      $year = $GLOBALS['year'];
  }
  
  if(isset($_GET['agencysmrtbl'])){
      $aggg = $_GET['agencysmrtbl'];
  }
  else{
      $aggg = 0;
  }
  $auth = new authentication();
  if($auth->is_admin()=="true"){
      $agency = $aggg;
  }else{
      $agency = $auth->userAgency();
  }
      $result = $acc->getProjectResult($year,$agency);
      

      while($row = $result->fetch(PDO::FETCH_OBJ)){
      echo '
  <tr>
    <td class="tg-yw4l">'.$row->projname.'</td>
    <td class="tg-yw4l">'.$row->projObjective.'</td>
    <td class="tg-yw4l">'.$row->indicator.'</td>
    <td class="tg-yw4l">'.number_format($row->observedresult,2).'</td>

  </tr>';
      }
  ?>
  
  
  </tbody>
</table>
        <div class="title-footer-print">
    <div align="center" style="margin: 20px;">
     <table id="footr">
    <tr>
        <td align="left">
            
            This is a system generated report.
            
        </td>
        
    
        <td align="right">
               <b>e-RPMES, NEDA RO1</b>
          
        </td>
        
    </tr>
</table>
</div>
</div>
    </div>