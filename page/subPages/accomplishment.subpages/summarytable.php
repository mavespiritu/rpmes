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
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=ee45c30326b750387589752c0f75e1dd87ddc7e4&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
                                role="tab" >Accomplishment Report</a>
     </li>
     <li class="active"  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=c63b15b1632850964e1dd31df64675acac00ce53&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
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
            <li  >
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
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Form 5: PHYSICAL AND FINANCIAL ACCOMPLISHMENT REPORT</h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">As of <?Php echo $GLOBALS['asOfQuarter']; ?></h1>
    <br/>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="left">Implementing Period _______________________</h1>
 
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
           
     <div class="col-sm-3">
     <div class=" input-group ">
   <span class="input-group-addon" >Order</span>
      <select required="required" id="smryDrpDownOrder"   name="smryDrpDownAgency"
                     class="form-control ">
                     <option value="0">Agency by Sector</option>
                     <option value="1">Sector by Agency</option>
                     <option value="4">Sector by Sub-Sector</option>
                     <option value="5">Sector by Sub-Sector by agency</option>
                     <option value="2">Fund Source by Agency</option>
                     <option value="3">Fund Source by Sector</option>
                 

                 </select>
        
    </div>
    </div>
    </div>

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


 <div class="form-group hide-print  ">
     <div class="checkbox">
  <label><input type="checkbox" id="showALl"  value="check">Show updated projects only.</label>
</div>
    </div>
      
  

    
<br class="hide-print"/>






    <div id="tableex" class="scrollY ">
<table id="tblOverFlow" class="tg accReport table saveExcel">
 <thead >
      
  <tr >
    <th  class="tg-amwm noBorderbottom theadTopBorder " style="max-width:100px;text-align:left;word-break: break-all !important; ;padding-top: 50%;" rowspan="3">Name of Project</th>

    <th class="tg-amwm theadTopBorder" colspan="6">Financial Status to date </th>
    <th class="tg-amwm theadTopBorder" colspan="4">Physical Accomplishment to date</th>
    <th class="tg-amwm noBorderbottom theadTopBorder" rowspan="3" style="word-break: break-all !important;">Employment Generated</th>
    <th class="tg-amwm noBorderbottom  theadTopBorder" rowspan="3" style="word-break: break-all !important;">Financially Correlated</th>
    <th class="tg-amwm  theadTopBorder" colspan="5">Implementation Status</th>
   
  </tr>
  
  <tr>
      <th class="tg-amwm noBorderbottom" rowspan="2" style="width: 50px !important; word-break: break-all !important;">Allocation</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  style="width: 50px !important; word-break: break-all !important;">Obligations</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  style="width: 50px !important; word-break: break-all !important;">Releases</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  style="width: 50px !important; word-break: break-all !important;">Expenditures</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  >Funding Support (%)</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  >Fund Utilization (%)</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  >Target t</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  style="word-break: break-all !important;">Actual Accomplishment</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"  >Slippage</th>
    <th class="tg-amwm noBorderbottom" rowspan="2"   style="word-break: break-all !important;">Performance</th>
    <th class="tg-amwm noBorderbottom theadTopBorder" rowspan="2" >Completed</th>
    <th class="tg-amwm theadTopBorder" colspan="3"  >Ongoing</th>
    <th class="tg-amwm noBorderbottom theadTopBorder" rowspan="2" >Not-Yet Started</th>
  </tr>
  <tr>
     
  
    <th class="tg-amwm noBorderbottom" >Behind Sched.</th>
    <th class="tg-amwm noBorderbottom" >Ahead Sched.</th>
    <th class="tg-amwm noBorderbottom" >On-Time</th>
  </tr>
  
  
  

   <tr>
      <th class="topHeader" align="center">(1)</th>
      <th class="topHeader" align="center">(2)</th>
      <th class="topHeader" align="center">(3)</th>
      <th class="topHeader" align="center">(4)</th>
      <th class="topHeader" align="center">(5)</th>
      <th class="topHeader" align="center">(6)</th>
      <th class="topHeader" align="center">(7)</th>
      <th class="topHeader" align="center">(8)</th>
      <th class="topHeader" align="center">(9)</th>
      <th class="topHeader" align="center">(10)</th>
      <th class="topHeader" align="center">(11)</th>
      <th class="topHeader" align="center">(12)</th>
      <th class="topHeader" align="center">(13)</th>
      <th class="topHeader" align="center">(14)</th>
      <th class="topHeader" align="center">(15)</th>
      <th class="topHeader" align="center">(16)</th>
      <th class="topHeader" align="center">(17)</th>
      <th class="topHeader" align="center">(18)</th>
  </tr>
  
  </thead>
 <tbody  class="tody ">
      
  
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
      if(isset($_GET['showAll'])){
          $showUpdatedPro  = $_GET['showAll'];
        }
      else{
          $showUpdatedPro = 0 ;
      }
      
      if(isset($_GET['quarter'])){
      if($_GET['quarter'] != 0){
              $quarterG = $_GET['quarter'];
      $acc = new accomplishmentDAO();
  
  
    
    
       
   
       
       if($order == 0   ){
                         $result1 = $acc->getAgencyWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
                        while($data1 = $result1->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                 "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                            
                              $arrayAgency["name"] = $data1->agencycode;
                           //row fetching agency 
                            
                       $dataAcc1 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data1->agencyid,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
                       while($row1 = $dataAcc1->fetch(PDO::FETCH_OBJ)){
         
                            if($row1){
                      
                        $arrayAgency["allocation"] += $row1->allocation;
                        $arrayAgency["obligation"]+=$row1->obligation;
                        $arrayAgency["releases"]+=$row1->releases;
                        $arrayAgency["expenditure"] +=$row1->expenditure;
                        $arrayAgency["ftotal"] +=$row1->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row1->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row1->targetTodate*$row1->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row1->actualTodate*$row1->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row1->employmentGenerated;
                  if($row1->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row1->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else{
                        if($row1->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row1->sllipage>=(-15)&&$row1->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else{
                            $arrayAgency['ahead']++;
                        }
                 }
              
  
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                          else  $arrayAgency["sllipage"] = "N/A";

                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                              $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 0);
                        //row fetching agency  
                                    
                                                $result2 = $acc->getSectorWAcc($fundSrcOpt,$data1->agencyid,$locationss,$smrySect,$yrenroll);  
                                            
                                                while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                                                   $arraySec = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                                               "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                                               "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                                        "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                                               );
                                                    $arraySec["name"] = $data2->secname;
                                                  //row fetching sector 
                                              $dataAcc2 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data1->agencyid,$locationss,$data2->secid,$yrenroll,0,null,$showUpdatedPro);
                                              while($row2 = $dataAcc2->fetch(PDO::FETCH_OBJ)){

                                                   if($row2){
                                              
                                               $arraySec["allocation"] += $row2->allocation;
                                               $arraySec["obligation"]+=$row2->obligation;
                                               $arraySec["releases"]+=$row2->releases;
                                               $arraySec["expenditure"] +=$row2->expenditure;
                                               $arraySec["ftotal"] +=$row2->ftargetTOTAL;
                                               $arraySec["ptotal"] +=$row2->ptargetTOTAL;
                                               $arraySec["targetTodate"]+=($row2->targetTodate*$row2->ftargetTOTAL);
                                               $arraySec["actualTodate"]+=($row2->actualTodate*$row2->ftargetTOTAL);
                                               $arraySec["employmentGenerated"] += $row2->employmentGenerated;
                                         if($row2->projstatus == "completed"){
                                            $arraySec['completed'] ++;

                                        }
                                        else if($row2->projstatus == "not-yet started"){
                                            $arraySec["notyet"]++;
                                        }
                                        else {
                                               if($row2->sllipage<0){
                                                   $arraySec['behind']++;
                                               }
                                               else if($row2->sllipage>=(-15)&&$row2->sllipage<=(0)){
                                                   $arraySec['ontime']++;
                                               }
                                               else {
                                                   $arraySec['ahead']++;
                                               }
                                        }


                                                   }   
                                               }

                                               if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
                                              else $arraySec["fundsupport"] ="N/A";

                                               if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
                                               else $arraySec["fundutilization"] ="N/A";

                                               if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
                                               else $arraySec["targetTodate"] = "N/A";


                                               if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
                                               else $arraySec["actualTodate"] = "N/A";

                                                if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
                                               $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
                                                 else  $arraySec["sllipage"] = "N/A";

                                                if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
                                              else  $arraySec["performance"] = "N/A";

                                                if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
                                               else $arraySec["financiallyCorrelated"] = "N/A";

                                                                 $arraySec["allocation"] = number_format($arraySec["allocation"]);
                                                       $arraySec["obligation"] = number_format($arraySec["obligation"]);
                                                       $arraySec["releases"] = number_format($arraySec["releases"]);
                                                       $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
                                                   $arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
                                                          getTableRow($arraySec['name'], $arraySec, 1);
                                               //row fetching sector  





                                             }
                                      
                                       

                                         
                      }
      }
      else if($order == 1){
          
                                                
      $result11 = $acc->getSectorWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
    
      while($data11 =  $result11->fetch(PDO::FETCH_OBJ)){
         
          $arraySec = array("indicator"=>null,"name"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                     "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
         );
           $arraySec["name"] = $data11->secname;
           //row fetching sector
          
      $dataAcc11 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll,0,null,$showUpdatedPro);
    
      while($row11 = $dataAcc11->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row11){
  
 
        
         $arraySec["indicator"] = $row11->unitofmeasure;
         $arraySec["allocation"] += $row11->allocation;
         $arraySec["obligation"]+=$row11->obligation;
         $arraySec["releases"]+=$row11->releases;
         $arraySec["expenditure"] +=$row11->expenditure;
         $arraySec["ftotal"] +=$row11->ftargetTOTAL;
         $arraySec["ptotal"] +=$row11->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row11->targetTodate*$row11->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row11->actualTodate*$row11->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row11->employmentGenerated;
                   
         
         if($row11->projstatus == "completed"){
                     $arraySec['completed'] ++;
                     
                 }
                 else if($row11->projstatus == "not-yet started"){
                     $arraySec["notyet"]++;
                 }
                 else{
                        if($row11->sllipage<0){
                            $arraySec['behind']++;
                        }
                        else if($row11->sllipage>=(-15)&&$row11->sllipage<=(0)){
                            $arraySec['ontime']++;
                        }
                        else{
                            $arraySec['ahead']++;
                        }
                 }
  
              }
              
 }

       
 if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
 else $arraySec["fundsupport"] ="N/A";
 if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
 else $arraySec["fundutilization"] ="N/A";
 if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
 else $arraySec["targetTodate"] = "N/A";
 if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
 else $arraySec["actualTodate"] = "N/A";
 if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
 $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
  else  $arraySec["sllipage"] = "N/A";
 if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
$arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
       
                         $result2 = $acc->getAgencyWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll);  
                        while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("indicator"=>null,"name"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                       "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                            $arrayAgency["name"] = $data2->agencycode;
                           //row fetching agency 
                       $dataAcc12 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data2->agencyid,$locationss,$data11->secid,$yrenroll,0,null,$showUpdatedPro);
                       while($row12 = $dataAcc12->fetch(PDO::FETCH_OBJ)){
         
                            if($row12){
                        
                        $arrayAgency["indicator"] = $row12->unitofmeasure;
                        $arrayAgency["allocation"] += $row12->allocation;
                        $arrayAgency["obligation"]+=$row12->obligation;
                        $arrayAgency["releases"]+=$row12->releases;
                        $arrayAgency["expenditure"] +=$row12->expenditure;
                        $arrayAgency["ftotal"] +=$row12->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row12->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row12->targetTodate*$row12->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row12->actualTodate*$row12->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row12->employmentGenerated;
                 
                 if($row12->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row12->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else {
                        if($row12->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row12->sllipage>=(-15)&&$row12->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else {
                            $arrayAgency['ahead']++;
                        }
                 }
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                            else  $arrayAgency["sllipage"] = "N/A";

                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                             $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1);
                        //row fetching agency  
                                    
                                      
                                        
                                         
                      }
                   
       
              
              
       
       
       
           
       }
          
          
      }
       
      else if($order == 4){
          
                                                
      $result11 = $acc->getSectorWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
    
      while($data11 =  $result11->fetch(PDO::FETCH_OBJ)){
         
          $arraySec = array("indicator"=>null,"name"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                     "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
         );
           $arraySec["name"] = $data11->secname;
           //row fetching sector
      $dataAcc11 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll,0,null,$showUpdatedPro);
    
      while($row11 = $dataAcc11->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row11){
  
 
        
         $arraySec["indicator"] = $row11->unitofmeasure;
         $arraySec["allocation"] += $row11->allocation;
         $arraySec["obligation"]+=$row11->obligation;
         $arraySec["releases"]+=$row11->releases;
         $arraySec["expenditure"] +=$row11->expenditure;
         $arraySec["ftotal"] +=$row11->ftargetTOTAL;
         $arraySec["ptotal"] +=$row11->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row11->targetTodate*$row11->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row11->actualTodate*$row11->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row11->employmentGenerated;
                   
         
         if($row11->projstatus == "completed"){
                     $arraySec['completed'] ++;
                     
                 }
                 else if($row11->projstatus == "not-yet started"){
                     $arraySec["notyet"]++;
                 }
                 else {
                        if($row11->sllipage<0){
                            $arraySec['behind']++;
                        }
                        else if($row11->sllipage>=(-15)&&$row11->sllipage<=(0)){
                            $arraySec['ontime']++;
                        }
                        else {
                            $arraySec['ahead']++;
                        }
                 }
  
              }
              
 }

       
 if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
 else $arraySec["fundsupport"] ="N/A";
 if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
 else $arraySec["fundutilization"] ="N/A";
 if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
 else $arraySec["targetTodate"] = "N/A";
 if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
 else $arraySec["actualTodate"] = "N/A";
 if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
 $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
   else  $arraySec["sllipage"] = "N/A";
 if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
$arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
       
                       $result2 = $acc->getSubsecWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll);  
                            while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("indicator"=>null,"name"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                       "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                           //row fetching subsector 
                               $arrayAgency["name"] = $data2->subsecname;
                       $dataAcc12 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll,$data2->subsecid,null,$showUpdatedPro);
                       while($row12 = $dataAcc12->fetch(PDO::FETCH_OBJ)){
         
                            if($row12){
                     
                        $arrayAgency["indicator"] = $row12->unitofmeasure;
                        $arrayAgency["allocation"] += $row12->allocation;
                        $arrayAgency["obligation"]+=$row12->obligation;
                        $arrayAgency["releases"]+=$row12->releases;
                        $arrayAgency["expenditure"] +=$row12->expenditure;
                        $arrayAgency["ftotal"] +=$row12->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row12->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row12->targetTodate*$row12->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row12->actualTodate*$row12->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row12->employmentGenerated;
                 
  if($row12->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row12->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else {
                        if($row12->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row12->sllipage>=(-15)&&$row12->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else {
                            $arrayAgency['ahead']++;
                        }
                 }
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                          else  $arrayAgency["sllipage"] = "N/A";

                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                             $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1);
                        //row fetching agency  
                                    
                                      
                                        
                                         
                      }
                   
       
              
              
       
       
       
           
       }
          
          
      }
       
      else if($order == 5){
          
                                                
      $result11 = $acc->getSectorWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
    
      while($data11 =  $result11->fetch(PDO::FETCH_OBJ)){
         
          $arraySec = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                     "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
         );
            $arraySec["name"] = $data11->secname;
           //row fetching sector
      $dataAcc11 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll,0,null,$showUpdatedPro);
    
      while($row11 = $dataAcc11->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row11){
  
 
       
         $arraySec["indicator"] = $row11->unitofmeasure;
         $arraySec["allocation"] += $row11->allocation;
         $arraySec["obligation"]+=$row11->obligation;
         $arraySec["releases"]+=$row11->releases;
         $arraySec["expenditure"] +=$row11->expenditure;
         $arraySec["ftotal"] +=$row11->ftargetTOTAL;
         $arraySec["ptotal"] +=$row11->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row11->targetTodate*$row11->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row11->actualTodate*$row11->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row11->employmentGenerated;
                   
         
         if($row11->projstatus == "completed"){
                     $arraySec['completed'] ++;
                     
                 }
                 else if($row11->projstatus == "not-yet started"){
                     $arraySec["notyet"]++;
                 }
                 else {
                        if($row11->sllipage<0){
                            $arraySec['behind']++;
                        }
                        else if($row11->sllipage>=(-15)&&$row11->sllipage<=(0)){
                            $arraySec['ontime']++;
                        }
                        else {
                            $arraySec['ahead']++;
                        }
                 }
  
              }
              
 }

       
 if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
 else $arraySec["fundsupport"] ="N/A";
 if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
 else $arraySec["fundutilization"] ="N/A";
 if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
 else $arraySec["targetTodate"] = "N/A";
 if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
 else $arraySec["actualTodate"] = "N/A";
 if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
 $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
 else  $arraySec["sllipage"] = "N/A";
 if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
$arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
       
                       $result2 = $acc->getSubsecWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll);  
                            while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                       "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                             $arrayAgency["name"] = $data2->subsecname;
                           //row fetching subsector 
                       $dataAcc12 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data11->secid,$yrenroll,$data2->subsecid,null,$showUpdatedPro);
                       while($row12 = $dataAcc12->fetch(PDO::FETCH_OBJ)){
         
                            if($row12){
                       
                        $arrayAgency["indicator"] = $row12->unitofmeasure;
                        $arrayAgency["allocation"] += $row12->allocation;
                        $arrayAgency["obligation"]+=$row12->obligation;
                        $arrayAgency["releases"]+=$row12->releases;
                        $arrayAgency["expenditure"] +=$row12->expenditure;
                        $arrayAgency["ftotal"] +=$row12->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row12->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row12->targetTodate*$row12->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row12->actualTodate*$row12->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row12->employmentGenerated;
                 
  if($row12->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row12->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else {
                        if($row12->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row12->sllipage>=(-15)&&$row12->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else {
                            $arrayAgency['ahead']++;
                        }
                 }
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                         else  $arrayAgency["sllipage"] = "N/A";

                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                             $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1);
                        //row fetching subsector  
                                    
                                                          $result25 = $acc->getAgencyWAcc2($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll,$data2->subsecid);  
                                                           
                                                          while($data65 = $result25->fetch(PDO::FETCH_OBJ)){
                                                                    $arrayAgency = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                                                                "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                                                                "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                                                               "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                                                                );
                                                                        $arrayAgency["name"] = $data65->agencycode;
                                                                   //row fetching agency 
                                                               $dataAcc12 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data65->agencyid,$locationss,$smrySect,$yrenroll,$data2->subsecid,null,$showUpdatedPro);
                                                             
                                                               while($row123 = $dataAcc12->fetch(PDO::FETCH_OBJ)){

                                                                    if($row123){
                                                            
                                                                $arrayAgency["indicator"] = $row123->unitofmeasure;
                                                                $arrayAgency["allocation"] += $row123->allocation;
                                                                $arrayAgency["obligation"]+=$row123->obligation;
                                                                $arrayAgency["releases"]+=$row123->releases;
                                                                $arrayAgency["expenditure"] +=$row123->expenditure;
                                                                $arrayAgency["ftotal"] +=$row123->ftargetTOTAL;
                                                                $arrayAgency["ptotal"] +=$row123->ptargetTOTAL;
                                                                $arrayAgency["targetTodate"]+=($row123->targetTodate*$row123->ftargetTOTAL);
                                                                $arrayAgency["actualTodate"]+=($row123->actualTodate*$row123->ftargetTOTAL);
                                                                $arrayAgency["employmentGenerated"] += $row123->employmentGenerated;

                                                        if($row123->projstatus == "completed"){
                                                             $arrayAgency['completed'] ++;

                                                         }
                                                         else if($row123->projstatus == "not-yet started"){
                                                             $arrayAgency["notyet"]++;
                                                         }
                                                         else {
                                                                if($row123->sllipage<0){
                                                                    $arrayAgency['behind']++;
                                                                }
                                                                else if($row123->sllipage>=(-15)&&$row123->sllipage<=(0)){
                                                                    $arrayAgency['ontime']++;
                                                                }
                                                                else {
                                                                    $arrayAgency['ahead']++;
                                                                }
                                                         }
                                                                    }   
                                                                }

                                                                if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                                                               else $arrayAgency["fundsupport"] ="N/A";

                                                                if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                                                                else $arrayAgency["fundutilization"] ="N/A";

                                                                if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                                                                else $arrayAgency["targetTodate"] = "N/A";


                                                                if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                                                                else $arrayAgency["actualTodate"] = "N/A";

                                                                 if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                                                                $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                                                                else  $arrayAgency["sllipage"] = "N/A";

                                                                 if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                                                               else  $arrayAgency["performance"] = "N/A";

                                                                 if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                                                                else $arrayAgency["financiallyCorrelated"] = "N/A";

                                                                                  $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                                                        $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                                                        $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                                                        $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                                                                      $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                                                           getTableRow($arrayAgency['name'], $arrayAgency, 2);
                                                                //row fetching agency  




                                                                        }
                                        
                                         
                      }
                   
       
              
              
       
       
       
           
       }
          
          
      }
       
       
      else if($order == 2){
          
                                                
      $result11 = $acc->getFundWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
    
      while($data11 =  $result11->fetch(PDO::FETCH_OBJ)){
         
          $arraySec = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                     "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
         );
                  $arraySec["name"] = $data11->fundcode;
           //row fetching sector
      $dataAcc11 = $acc->getAllInArray($quarterG,$data11->fundid,$agencysmrtbl,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
    
      while($row11 = $dataAcc11->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row11){
  
 
 
         $arraySec["indicator"] = $row11->unitofmeasure;
         $arraySec["allocation"] += $row11->allocation;
         $arraySec["obligation"]+=$row11->obligation;
         $arraySec["releases"]+=$row11->releases;
         $arraySec["expenditure"] +=$row11->expenditure;
         $arraySec["ftotal"] +=$row11->ftargetTOTAL;
         $arraySec["ptotal"] +=$row11->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row11->targetTodate*$row11->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row11->actualTodate*$row11->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row11->employmentGenerated;
                   
         
         if($row11->projstatus == "completed"){
                     $arraySec['completed'] ++;
                     
                 }
                 else if($row11->projstatus == "not-yet started"){
                     $arraySec["notyet"]++;
                 }
                 else {
                        if($row11->sllipage<0){
                            $arraySec['behind']++;
                        }
                        else if($row11->sllipage>(-15)&&$row11->sllipage<=(0)){
                            $arraySec['ontime']++;
                        }
                        else {
                            $arraySec['ahead']++;
                        }
                 }
  
              }
              
 }

       
 if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
 else $arraySec["fundsupport"] ="N/A";
 if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
 else $arraySec["fundutilization"] ="N/A";
 if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
 else $arraySec["targetTodate"] = "N/A";
 if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
 else $arraySec["actualTodate"] = "N/A";
 if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
 $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
   else $arraySec["sllipage"] = "N/A";

 if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
  $arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
       
                         $result2 = $acc->getAgencyWAcc($data11->fundid,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
                        while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                       "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                             $arrayAgency["name"] = $data2->agencycode;
                           //row fetching agency 
                       $dataAcc12 = $acc->getAllInArray($quarterG,$data11->fundid,$data2->agencyid,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
                       while($row12 = $dataAcc12->fetch(PDO::FETCH_OBJ)){
         
                            if($row12){
                       
                        $arrayAgency["indicator"] = $row12->unitofmeasure;
                        $arrayAgency["allocation"] += $row12->allocation;
                        $arrayAgency["obligation"]+=$row12->obligation;
                        $arrayAgency["releases"]+=$row12->releases;
                        $arrayAgency["expenditure"] +=$row12->expenditure;
                        $arrayAgency["ftotal"] +=$row12->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row12->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row12->targetTodate*$row12->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row12->actualTodate*$row12->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row12->employmentGenerated;
                 
  if($row12->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row12->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else {
                        if($row12->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row12->sllipage>=(-15)&&$row12->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else{
                            $arrayAgency['ahead']++;
                        }
                 }
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                        else $arrayAgency["sllipage"] = "N/A";


                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                              $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1);
                        //row fetching agency  
                                    
                                      
                                        
                                         
                      }
                   
       
              
              
       
       
       
           
       }
          
          
      }
       
       
       
      else if($order == 3){
          
                                                
      $result11 = $acc->getFundWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
    
      while($data11 =  $result11->fetch(PDO::FETCH_OBJ)){
         
          $arraySec = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                     "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
         );
          $arraySec["name"] = $data11->fundcode;
           //row fetching sector
      $dataAcc11 = $acc->getAllInArray($quarterG,$data11->fundid,$agencysmrtbl,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
    
      while($row11 = $dataAcc11->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row11){
  
 
         
         $arraySec["indicator"] = $row11->unitofmeasure;
         $arraySec["allocation"] += $row11->allocation;
         $arraySec["obligation"]+=$row11->obligation;
         $arraySec["releases"]+=$row11->releases;
         $arraySec["expenditure"] +=$row11->expenditure;
         $arraySec["ftotal"] +=$row11->ftargetTOTAL;
         $arraySec["ptotal"] +=$row11->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row11->targetTodate*$row11->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row11->actualTodate*$row11->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row11->employmentGenerated;
                   
         
         if($row11->projstatus == "completed"){
                     $arraySec['completed'] ++;
                     
                 }
                 else if($row11->projstatus == "not-yet started"){
                     $arraySec["notyet"]++;
                 }
                 else {
                        if($row11->sllipage<0){
                            $arraySec['behind']++;
                        }
                        else if($row11->sllipage>=(-15)&&$row11->sllipage<=(0)){
                            $arraySec['ontime']++;
                        }
                        else {
                            $arraySec['ahead']++;
                        }
                 }
  
              }
              
 }

       
 if($arraySec["ftotal"]!=0)$arraySec["fundsupport"] =number_format(($arraySec["releases"]/$arraySec["ftotal"])*100,2);
 else $arraySec["fundsupport"] ="N/A";
 if($arraySec["releases"]!=0)$arraySec["fundutilization"] =number_format(($arraySec["expenditure"]/$arraySec["releases"])*100,2);
 else $arraySec["fundutilization"] ="N/A";
 if($arraySec["ftotal"]!=0)$arraySec["targetTodate"] = number_format($arraySec["targetTodate"]/$arraySec["ftotal"],2);
 else $arraySec["targetTodate"] = "N/A";
 if($arraySec["ftotal"]!=0)$arraySec["actualTodate"] = number_format($arraySec["actualTodate"]/$arraySec["ftotal"],2);
 else $arraySec["actualTodate"] = "N/A";
 if($arraySec["actualTodate"]!=0||$arraySec["targetTodate"]!=0)
 $arraySec["sllipage"] = number_format($arraySec["actualTodate"]-$arraySec["targetTodate"],2);
   else $arraySec["sllipage"] = "N/A";

 if($arraySec["targetTodate"]!=0)$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
  $arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
       
                         $result2 = $acc->getSectorWAcc($data11->fundid,$agencysmrtbl,$locationss,$smrySect,$yrenroll);  
                        while($data2 = $result2->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0,
                                       "completed"=>0,"behind"=>0,"ahead"=>0,"ontime"=>0,"notyet"=>0
                        );
                                  $arrayAgency["name"] = $data2->secname;
                           //row fetching agency 
                       $dataAcc12 = $acc->getAllInArray($quarterG,$data11->fundid,$agencysmrtbl,$locationss,$data2->secid,$yrenroll,0,null,$showUpdatedPro);
                       while($row12 = $dataAcc12->fetch(PDO::FETCH_OBJ)){
         
                            if($row12){
                  
                        $arrayAgency["indicator"] = $row12->unitofmeasure;
                        $arrayAgency["allocation"] += $row12->allocation;
                        $arrayAgency["obligation"]+=$row12->obligation;
                        $arrayAgency["releases"]+=$row12->releases;
                        $arrayAgency["expenditure"] +=$row12->expenditure;
                        $arrayAgency["ftotal"] +=$row12->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row12->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row12->targetTodate*$row12->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row12->actualTodate*$row12->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row12->employmentGenerated;
                 
  if($row12->projstatus == "completed"){
                     $arrayAgency['completed'] ++;
                     
                 }
                 else if($row12->projstatus == "not-yet started"){
                     $arrayAgency["notyet"]++;
                 }
                 else {
                        if($row12->sllipage<0){
                            $arrayAgency['behind']++;
                        }
                        else if($row12->sllipage>=(-15)&&$row12->sllipage<=(0)){
                            $arrayAgency['ontime']++;
                        }
                        else {
                            $arrayAgency['ahead']++;
                        }
                 }
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0)$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                        else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);
                        else $arrayAgency["sllipage"] = "N/A";

                         if($arrayAgency["targetTodate"]!=0)$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                       else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                             $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1);
                        //row fetching agency  
                                    
                                      
                                        
                                          
                      }
                   
       
              
              
       
       
       
           
       }
          
          
      }
       
       
       
         
         $totalWeighted =   $acc->getAllProjectTotalInWeighted($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
       getTableRow("Total",$totalWeighted,0);
           
          
      }
      else{
          echo ' <td colspan="27" align="center" class="tg-yw4l">please select a QUARTER to fetch data<br/>(no record)</td>';
      }
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

<br/>

<br/>

<?php 
     
function getTableRow($name,$row,$order){
   
    if($name != ""){
    if($order == 0){
    echo '  <tr class="tgRow-1 bold "> 
       <td class="tg-yw4l" style="min-width:200px;">'.$name.'</td>';
    }
    else if($order == 1){
    echo '  <tr class="tgRow-2 bold "> 
   
    
           <td class="tg-yw4l"><p style="margin-left:10px;">'.$name.'</p></td>';  
    
    }
    else if($order == 2){
    echo '  <tr class="tgRow-3 "> 
   
    
           <td class="tg-yw4l"><p style="margin-left:25px;">'.$name.'</p></td>';  
    
    }
    
echo '
 

   
   
     <td class="tg-yw4l" style="width: 70px !important;">'.$row['allocation'].'  </td>
        
    <td class="tg-yw4l" style="width: 70px !important;">'.$row["obligation"].'  </td>
        
    <td class="tg-yw4l" style="width: 70px !important;">'.$row["releases"].'  </td>
        
    <td class="tg-yw4l" style="width: 70px !important;">'.$row["expenditure"].'  </td>        
        
    <td class="tg-yw4l" style="width: 50px !important;">'.$row["fundsupport"].'  </td>
        
    <td class="tg-yw4l" style="width: 50px !important;">'.$row["fundutilization"].'  </td>
        
        
    <td class="tg-yw4l">'.$row["targetTodate"].'  </td>
        
    <td class="tg-yw4l" style="width: 145px !important;">'.$row["actualTodate"].'  </td>
        
    <td class="tg-yw4l">'.$row["sllipage"] .'  </td>
        
    <td class="tg-yw4l" style="width: 90px !important;">'.$row["performance"].'  </td>
        
    <td class="tg-yw4l" style="width: 90px !important;">'.$row["employmentGenerated"].'  </td>
        
    <td class="tg-yw4l">'.$row["financiallyCorrelated"].'  </td>
        
    <td class="tg-yw4l">'.$row["completed"].'  </td>
    <td class="tg-yw4l">'.$row["behind"].'  </td>
    <td class="tg-yw4l">'.$row["ahead"].'  </td>
    <td class="tg-yw4l">'.$row["ontime"].'  </td>
    <td class="tg-yw4l">'.$row["notyet"].'  </td>
  

                           ';
                
                echo '
</tr>
      ';
}
}
?>