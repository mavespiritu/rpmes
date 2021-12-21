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
       <li ><a style="color:red;"  href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } else{ ?>
     
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
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

      <li>
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=313ac9e8c502e16965b270d28ca93357489d14be" 
                                role="tab" >Project Result</a>
     </li>
      <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=0fa10bce2bb87c4f22be121e7e63df859d3eda75" 
                                role="tab" >Form 6</a>
     </li>
            <li class="active" >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=0f069b5b83dfc0c10744cab1d835b5b3d4188acc" 
                                role="tab" >Form 7</a>
     </li>
       <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=acbcb17b9d719e70ce79d7169a7f19bc2c2ccb2d" 
                                role="tab" >Form 8</a>
     </li>
  </ul>

<div class="title-footer-print">
    <!--<img style="float: left;" src="image/9225816_orig.jpg" width=70px" height="70px"/>-->
    <h1 style="font-size:12pt; padding: 0px; margin:0px;" align="center"><b>REGIONAL PROJECT MONITORING AND EVALUATION SYSTEM (RPMES)</b></h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Form 7: Project Inspection Report</h1>
   <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">As of <?Php echo $GLOBALS['asOfQuarter']; ?></h1>
   
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
        <div class=" form-group hide-print">
            <div class="col-sm-2 ">
        <select class="form-control" id="optYear">
         
         
            <?Php
            $current = $GLOBALS['year'];
            $yearGap =$current-2016;
            $i = 0; 
            while($i<=$yearGap){
                
            echo "<option value='".($current-$i)."'>".($current-$i)."</option>";
            
            $i++;
            
            }
            ?>
        </select>
        
    </div>
    </div>

 <div class="form-group hide-print ">
    <div class="col-sm-2">
              <select required="required" id="smryDrpDownQuarter"   name="smryDrpDownQuarter"
                     class="form-control">
              <option selected="selected" value="0">Select a quarter</option>
              <option value="1">1st Quarter</option>
              <option value="2">2nd Quarter</option>
              <option value="3">3rd Quarter</option>
              <option value="4">4th Quarter</option>
               
            </select>
    </div>
</div>

     
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
    <div class="form-group hide-print  ">
          <div class="col-sm-2">
               <?php
             $location = new locationDAO();
                $resultLocations =$location->getList(); 
                
                 echo '<select required="required" id="locations" name="location" class="form-control">';
                            echo '<option selected="selected" value="0">Select Location</option>';
                 while($row  = $resultLocations->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'"> '.$row[1].'  '.$row[3].' '.$row[2].'</option>';
                       }
              echo '</select>';
        ?>
            
    
            
            </div>
    </div>
    <div class="form-group hide-print  ">
          <div class="col-sm-2">
               <?php
               
          
                $sect = new sectorDAO();
              
                $resultSect =$sect->getList()   ;
              $resultSect->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
              
                 echo '<select required="required" id="smrySect"   name="smryD"
                     class="form-control ">';
            
               echo '<option selected="selected" value="0">Select Sector</option>';
                       while($row  = $resultSect->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
                       }
              echo '</select>';
        ?>
            
    
            
            </div>
    </div>
       <div class="form-group hide-print  ">
     <div class="col-sm-2">
        <?php
                $category = new fundsrcDAO();
                $resultCat =$category->getList(); 
                 echo '<select placeholder="Fund Source" required="required" id="optfundsrc"  class="form-control">';
  
                 echo '<option value="0">Select all</option>';
                       while($row  = $resultCat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
               // echo '<option value="'.$row[0].'"> '.$row[3].' ('.$row[2].')</option>';
                 echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select>';
        ?>
        
    </div>
    </div>

<br class="hide-print"/>
<br class="hide-print"/>
    <div>
      

       <div class="form-group hide-print  ">
     <div class="col-sm-2">
         <button type="button" value="Load"  class="form-control btn btn-success" id="loadDataACCReport">
             Load
             <span class="glyphicon glyphicon-send" ></span>
         </button>     
    </div>
    </div>
    </div>
    </div>
   

     <div class="form-group hide-print  ">
          <div class="col-sm-2 ">
              <button id="xlsfile" class="form-control btn btn-info "  value="download to excel" >
                Save as Excel File  <span class="glyphicon glyphicon-save-file"/>
              </button>
            
            </div>
    </div>



      
  

<div class="hide-print">  
<br/>
<br/>
<br/>
</div>




    <div id="tableex" class="scrollY">
<table id="tblOverFlow" class="tg accReport table saveExcel ">
 <thead>

  <tr>
    <th class="tg-amwm noBorderbottom" >Name Of Project</th>
    <th class="tg-amwm noBorderbottom" >Location</th>
    <th class="tg-amwm noBorderbottom" > Agency</th>
    <th class="tg-amwm noBorderbottom" >Date of Project Inspection</th>
    
    <th class="tg-amwm noBorderbottom">Physical Status</th>
    <th class="tg-amwm noBorderbottom">Issues</th>
    <th class="tg-amwm noBorderbottom">Action Taken</th>
    
 
  </tr>
  
  

    <tr>
      <th class="topHeader" align="center">(1)</th>
      <th class="topHeader" align="center">(2)</th>
      <th class="topHeader" align="center">(3)</th>
      <th class="topHeader" align="center">(4)</th>
      <th class="topHeader" align="center">(5)</th>
      <th class="topHeader" align="center">(6)</th>
      <th class="topHeader" align="center">(7)</th>

  </tr>
  
  </thead>
 <tbody class="tody">
      
  
      <?Php
      
      if(isset($_GET['Order'])){
          $order  = $_GET['Order'];
        
      }
      else{
          $order = 0 ;
      }
      if(isset($_GET['optfundsrc'])){
          $fundSrcOpt  = $_GET['optfundsrc'];
        
      }
      else{
          $fundSrcOpt = 0 ;
      }
      if(isset($_GET['smrySect'])){
          $smrySect  = $_GET['smrySect'];
        
      }
      else{
          $smrySect = 0 ;
      }
      
      if(isset($_GET['locations'])){
          $locationss  = $_GET['locations'];
        
      }
      else{
          $locationss = 0 ;
      }
      if(isset($_GET['agencysmrtbl'])){
          $agencysmrtbl  = $_GET['agencysmrtbl'];
        
      }
      else{
          $agencysmrtbl = 0 ;
      }
      if(isset($_GET['optyear'])){
          $yrenroll  = $_GET['optyear'];
        
      }
      else{
          $yrenroll= $GLOBALS['year'] ;
      }
      if(isset($_GET['quarter'])){
      if($_GET['quarter'] != 0){
              $quarterG = $_GET['quarter'];
      $acc = new accomplishmentDAO();
  
  
    
      $result = $acc->getFrm7($quarterG,$fundSrcOpt, $agencysmrtbl, $locationss, $smrySect, $yrenroll);
 $ctr=1;
      while($data =  $result->fetch(PDO::FETCH_OBJ)){
         
echo '<tr>
    <td class="tg-yw4l" >'.$ctr.".) ".$data->projname.'</td>
    <td class="tg-yw4l" >'.$data->location.'</td>
    <td class="tg-yw4l" >'.$data->implementingAgency.'</td>
    <td class="tg-yw4l" >'.$data->dateOfProjectInspection.'</td>
    <td class="tg-yw4l" >'.$data->physicalStatus.'</td>
    <td class="tg-yw4l" >'.$data->issues.'</td>
    <td class="tg-yw4l" >'.$data->actionRecommendation.'</td>
        </tr>
';

       $ctr++;
      }
      }
      }
      else{
          echo '   <td class="tg-yw4l" colspan="7" >Select a Quarter please</td>';
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

