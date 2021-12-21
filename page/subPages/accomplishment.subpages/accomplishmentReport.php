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
     <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=ee45c30326b750387589752c0f75e1dd87ddc7e4&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
                                role="tab" >Accomplishment Report</a>
     </li>
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=c63b15b1632850964e1dd31df64675acac00ce53&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
                                role="tab" >Summary table</a>
     </li>

      <li>
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=313ac9e8c502e16965b270d28ca93357489d14be" 
                                role="tab" >Project Result</a>
     </li>
      <li>
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
   <h1 style="font-size:12pt; padding: 0px; margin:0px;" align="center"><b>REGIONAL PROJECT MONITORING AND EVALUATION SYSTEM (RPMES)</b></h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Form 5: PHYSICAL AND FINANCIAL ACCOMPLISHMENT REPORT</h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">As of <?Php 
    if(isset($_GET['optyear']))
    {
    echo $_GET['optyear']; 
    }
    else
    {
    echo $GLOBALS['asOfQuarter'];     
    }
    ?></h1>
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
   <span class="input-group-addon" >Sector by</span>
      <select required="required" id="smryDrpDownOrder"   name="smryDrpDownAgency"
                     class="form-control ">
                     <option value="0">Agency</option>
                     <option value="1">Sub-Sector</option>
                     <option value="2">Province</option>

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


 

<div class="hide-print">  
<br/>

</div>




    <div id="tableex" class="scrollY ">
<table  id="tblOverFlow" class="tg accReport table saveExcel ">
 <thead>

  <tr>
    <th class="tg-amwm  noBorderbottom theadTopBorder" style="text-align:left; " colspan="2" rowspan="2">(a) Name of Project <br>(b) Funding Source<br>(c) Project Schedule <br/>(d)Location</th>
    <th class="tg-amwm  noBorderbottom theadTopBorder" style="word-break: normal;" rowspan="2">Output Indicator</th>
    <th class="tg-amwm theadTopBorder" colspan="6">Financial Status to date </th>
    <th class="tg-amwm theadTopBorder" colspan="4"  >Physical Accomplishment to date </th>
    <th class="tg-amwm   noBorderbottom theadTopBorder" style=" word-break: break-all ;" rowspan="2">Employment Generated</th>
    <th class="tg-amwm   noBorderbottom theadTopBorder" style=" word-break: break-all ;" rowspan="2">Financially Correlated</th>
  </tr>
  <tr>
    <th class="tg-amwm noBorderbottom" >Allocation</th>
    <th class="tg-amwm noBorderbottom" >Obligations</th>
    <th class="tg-amwm noBorderbottom" >Releases</th>
    <th class="tg-amwm noBorderbottom" >Expenditures</th>
    <th class="tg-amwm noBorderbottom" >Funding Support (%)</th>
    <th class="tg-amwm noBorderbottom" >Fund Utilization (%)</th>
    <th class="tg-amwm noBorderbottom" >Target</th>
    <th class="tg-amwm noBorderbottom" >Actual</th>
    <th class="tg-amwm noBorderbottom" >Slippage</th>
    <th class="tg-amwm noBorderbottom"  style=" word-break: break-all ;">Performance</th>
  </tr>
  
  
  
    <tr>
      <th class="topHeader" colspan="2" align="center">(1)</th>
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
  </tr>
  
  </thead>
 <tbody class="tody">
      
  
      <?Php
      
      // start of getting parameters 
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
      
      
      // end of getting data on parameters
      
      
      if(isset($_GET['quarter'])){ // checking if the parameter "quarter" is exist
      if($_GET['quarter'] != 0){ //  if the parameter is exist, then it check if the parameter "quarter"  is not zero
              $quarterG = $_GET['quarter']; // if the 2 conditions are pass, the value of the parameter "quarter" will transfer into variable $quarterG
      $acc = new accomplishmentDAO(); // instantiation of class accomplishmentDAO()
  
  
    
      $result = $acc->getSectorWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll);   // querying  the parent row, "SECTOR" this returns the sector name and sector id
     
      while($data =  $result->fetch(PDO::FETCH_OBJ)){ // PDO statement of fetching the result of the data retrieved
         
          
          /*
           * declaration of array set to fetch
           */
          $arraySec = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,"expenditure"=>0,
         "fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,"sllipage"=>0,"performance"=>0,
         "employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
         );
           /*
            * start of fetching rows of sector
            * sector is the main parent
            * process of fetching sector is from line 362 to 425
            */
      $dataAcc = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll,0,null,$showUpdatedPro); // this line is to retrieve the data from the fetched data on sector .. this returns the computed data 

      while($row = $dataAcc->fetch(PDO::FETCH_OBJ)){
                 
                   
              
                      if($row){
  /*
   * this is to populate the  array on loop.
   * the reason of  why did I initializing array , is to increament the data to get the total without call back of the function on the database.
   * using the (+=)
   */
 
         $arraySec["name"] = $row->secname;
         $arraySec["indicator"] = $row->unitofmeasure;
         $arraySec["allocation"] += $row->allocation;
         $arraySec["obligation"]+=$row->obligation;
         $arraySec["releases"]+=$row->releases;
         $arraySec["expenditure"] +=$row->expenditure;
         $arraySec["ftotal"] +=$row->ftargetTOTAL;
         $arraySec["ptotal"] +=$row->ptargetTOTAL;
         $arraySec["targetTodate"]+=($row->targetTodate*$row->ftargetTOTAL);
         $arraySec["actualTodate"]+=($row->actualTodate*$row->ftargetTOTAL);
         $arraySec["employmentGenerated"] += $row->employmentGenerated;
                 //echo $row->actualTodate."*".$row->ftargetTOTAL;
                //echo $arraySec["ftotal"] . "<br>";
              }
              //echo $row->targetTodate ." * ". $row->ftargetTOTAL . "<br>"; 
                //echo $row->actualTodate. '*' .$row->ftargetTOTAL . "<br>";
 }

       
 /*
  * the following lines, are the total computations. 
  * actually there two computations event. computation of individual project , that is from the retrived data before this actions. and 2nd are these . for the total computaions 
  * as you see for example the array named $arraySec is the storage of the fetched data. then after it concatinate the data this will compute by using the provided formula.
  * 
  * t
  */
  //echo $arraySec["expenditure"] . " / " . $arraySec["releases"] . " * 100 = ";
    //echo $arraySec["actualTodate"] . " / " . $arraySec["ftotal"];
    //echo $arraySec["actualTodate"] . " - " . $arraySec["targetTodate"];
   // echo $arraySec["actualTodate"] ." - ". $arraySec["targetTodate"];
   //echo $arraySec["expenditure"]."/".$arraySec["releases"] . "* 100 = " . ($arraySec["expenditure"]/$arraySec["releases"])*100;
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
 if($arraySec["targetTodate"]!=0){$arraySec["performance"] = number_format(($arraySec["actualTodate"]/$arraySec["targetTodate"])*100,2);
 //echo $arraySec["actualTodate"] . "/" . $arraySec["targetTodate"] . " * 100";
 }
else  $arraySec["performance"] = "N/A";
  if($arraySec["fundutilization"]!=0)$arraySec["financiallyCorrelated"] = number_format(($arraySec["performance"]/$arraySec["fundutilization"])*100,2);
 else $arraySec["financiallyCorrelated"] = "N/A";
 $arraySec["allocation"] = number_format($arraySec["allocation"]);
  $arraySec["obligation"] = number_format($arraySec["obligation"]);
  $arraySec["releases"] = number_format($arraySec["releases"]);
  $arraySec["expenditure"]  = number_format($arraySec["expenditure"]);
  $arraySec["employmentGenerated"] =number_format($arraySec["employmentGenerated"]);
  
  
  /* after fetching the content  the data accumulated will be displayed, using the function getTableRow with the parameter 
   * first parameter is the first collumn w/c is the title or the name
   * 2nd parameter is the set of array. or data accumulated
   * 3rd is the level of row. 0 value means the parent ROW
   */
  
   getTableRow($arraySec['name'], $arraySec, 0);
       
       //row fetching sector
       
       
          
   /*
    * follwing lines is to fetch the sub rows
    * variable $order is the choice of changing the subrows. the feature example is "SECTOR BY AGENCY, SECTOR BY PROVINCE, etc..."
    * values are depends on the order of the dropdown menu
    */
   
   
             if($order == 0){  // $order 0 value means it is selected the agency , so it will apear on the subrows are the list of sector by agency by projects
               
                         $result1 = $acc->getAgencyWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll);  // querying  the Sub row, "AGENCY" this returns the Agency name and agency id
                        while($data1 = $result1->fetch(PDO::FETCH_OBJ)){ // this will fetch the data return from the variable $result1
                            
                            
                            $arrayAgency = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,//declaration of the storage for subrow agency
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                        );
                           
                       $dataAcc1 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data1->agencyid,$locationss,$data->secid,$yrenroll,0,null,$showUpdatedPro); // getting the computed data ,
                       while($row1 = $dataAcc1->fetch(PDO::FETCH_OBJ)){// fetching the computed data and stored in a array
         
                            if($row1){
                        $arrayAgency["name"] = $row1->agencycode;
                        $arrayAgency["indicator"] = $row1->unitofmeasure;
                        $arrayAgency["allocation"] += $row1->allocation;
                        $arrayAgency["obligation"]+=$row1->obligation;
                        $arrayAgency["releases"]+=$row1->releases;
                        $arrayAgency["expenditure"] +=$row1->expenditure;
                        $arrayAgency["ftotal"] +=$row1->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row1->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row1->targetTodate*$row1->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row1->actualTodate*$row1->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row1->employmentGenerated;
                 
  
                            }   
                        }
                        
                        if($arrayAgency["ftotal"]!=0)$arrayAgency["fundsupport"] =number_format(($arrayAgency["releases"]/$arrayAgency["ftotal"])*100,2);
                       else $arrayAgency["fundsupport"] ="N/A";

                        if($arrayAgency["releases"]!=0){$arrayAgency["fundutilization"] =number_format(($arrayAgency["expenditure"]/$arrayAgency["releases"])*100,2);
                           //echo $arrayAgency["expenditure"]."/".$arrayAgency["releases"]." * 100 =" . ($arrayAgency["expenditure"]/$arrayAgency["releases"]) * 100;
                        }else $arrayAgency["fundutilization"] ="N/A";

                        if($arrayAgency["ftotal"]!=0)$arrayAgency["targetTodate"] = number_format($arrayAgency["targetTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["targetTodate"] = "N/A";


                        if($arrayAgency["ftotal"]!=0)$arrayAgency["actualTodate"] = number_format($arrayAgency["actualTodate"]/$arrayAgency["ftotal"],2);
                        else $arrayAgency["actualTodate"] = "N/A";

                         if($arrayAgency["actualTodate"]!=0||$arrayAgency["targetTodate"]!=0)
                        $arrayAgency["sllipage"] = number_format($arrayAgency["actualTodate"]-$arrayAgency["targetTodate"],2);


                         if($arrayAgency["targetTodate"]!=0){$arrayAgency["performance"] = number_format(($arrayAgency["actualTodate"]/$arrayAgency["targetTodate"])*100,2);
                         //echo $arrayAgency["actualTodate"] . " / " . $arrayAgency["targetTodate"];
                       }else  $arrayAgency["performance"] = "N/A";

                         if($arrayAgency["fundutilization"]!=0)$arrayAgency["financiallyCorrelated"] = number_format(($arrayAgency["performance"]/$arrayAgency["fundutilization"])*100,2);
                        else $arrayAgency["financiallyCorrelated"] = "N/A";

                                          $arrayAgency["allocation"] = number_format($arrayAgency["allocation"]);
                                $arrayAgency["obligation"] = number_format($arrayAgency["obligation"]);
                                $arrayAgency["releases"] = number_format($arrayAgency["releases"]);
                                $arrayAgency["expenditure"]  = number_format($arrayAgency["expenditure"]);
                                $arrayAgency["employmentGenerated"] =number_format($arrayAgency["employmentGenerated"]);
                                   getTableRow($arrayAgency['name'], $arrayAgency, 1); // displaying da computed data
                        //row fetching agency  
                                    
                                      
                                   
                                   
                                               $arrayProject = array("numbering"=>0,"name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,// this is the initialization of array storage for project
                                           "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                                           "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                                           );
                                              //row fetching Project 
                                          $dataAcc2 = $acc->getAllInArray($quarterG,$fundSrcOpt,$data1->agencyid,$locationss,$data->secid,$yrenroll,0,null,$showUpdatedPro); // getting the computed data by project individual
                                     
                                          $ctr=1;
                                          while($row2 = $dataAcc2->fetch(PDO::FETCH_OBJ)){ // fetching the computed data of a individual project
                                                $locationStr = $row2->provincename;
                                                if($row2->district!=""){
                                                $locationStr .=",". $row2->district;    
                                                }
                                                if($row2->city!=""){
                                                $locationStr .=",". $row2->city;    
                                                }
                                               if($row2){
                                                      if($row2->iscompleted!="completed"){
                                                       if($row2->datesub==""){
                                           $arrayProject["info"] = "not-updated";
                                                       }else{
                                           $arrayProject["info"] = "";                            
                                                       }
                                                   }else{
                                           $arrayProject["info"] = "";            
                                                   }
                                                       $arrayProject["numbering"] = $ctr++;
                                        $arrayProject["name"] = "<b>(a)</b> ".$row2->projname.
                                                   "<br/><b>(b)</b> ".$row2->fundcode.
                                                   "<br/><b>(c)</b> ".$row2->datestart."-".$row2->dateend.
                                                   "<br/><b>(d)</b> ".$locationStr;
                                           $arrayProject["indicator"] = $row2->unitofmeasure;
                                           $arrayProject["allocation"] = number_format($row2->allocation);
                                           $arrayProject["obligation"]= number_format($row2->obligation);
                                           $arrayProject["releases"]= number_format($row2->releases);
                                           $arrayProject["expenditure"] = number_format($row2->expenditure);
                                     
                                          
                                           if($row2->fundsupport=="")
                                           $arrayProject["fundsupport"] = "N/A";
                                           else
                                           $arrayProject["fundsupport"] = number_format($row2->fundsupport,2);
                                           
                                           if($row2->fundutilizition=="")
                                           $arrayProject["fundutilization"] ="N/A";
                                           else
                                           $arrayProject["fundutilization"] = number_format($row2->fundutilizition,2);
                                           
                                           if($row2->targetTodate=="")
                                           $arrayProject["targetTodate"]="N/A";
                                           else
                                           $arrayProject["targetTodate"]=number_format($row2->targetTodate,2);
                                           
                                           if($row2->actualTodate=="")
                                           $arrayProject["actualTodate"]="N/A";
                                           else
                                           $arrayProject["actualTodate"]=number_format($row2->actualTodate,2);
                                           
                                           if($row2->sllipage=="")
                                           $arrayProject["sllipage"] = "N/A";
                                           else
                                           $arrayProject["sllipage"] = number_format($row2->sllipage,2);
                                           
                                           if($row2->performance=="")
                                           $arrayProject["performance"] = "N/A";
                                           else
                                           $arrayProject["performance"] = number_format($row2->performance,2);
                                           
                                           $arrayProject["employmentGenerated"] = number_format($row2->employmentGenerated);
                                           
                                           if($row2->financiallyCorrelated=="")
                                           $arrayProject["financiallyCorrelated"] = "N/A";
                                           else
                                           $arrayProject["financiallyCorrelated"] = number_format($row2->financiallyCorrelated,2);


                                               }
                                                getTableRow($arrayProject['name'], $arrayProject, 2); // this is to display the row of the child or subrow project .. 
                                
                                           }

                                           //row fetching Project  

                                         
                                           
                                           /**
                                            * 
                                            * ****************************************
                                            * the process of $order 0 is thesame on the following  order.. the difference is the parameter , name of variables.
                                            * as you notice the function getAllInArray() are the same on any order..  this will return depends on the parameter , youve been passed. visit the page of getAllInArray() under accomplishmentDAO.php 
                                            */
                      }
                   }
             else if($order ==1){
                 /*
                  * line 582 to 738
                  * is to fetch sub-sector
                  * 
                  */
                         $result1 = $acc->getSubsecWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll);  
                         
    
       
                         while($data1 = $result1->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                        );
                           //row fetching subsector 
                       $dataAcc1 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll,$data1->subsecid,null,$showUpdatedPro);
                       while($row1 = $dataAcc1->fetch(PDO::FETCH_OBJ)){
         
                            if($row1){
                        $arrayAgency["name"] = $row1->subsecname;
                        $arrayAgency["indicator"] = $row1->unitofmeasure;
                        $arrayAgency["allocation"] += $row1->allocation;
                        $arrayAgency["obligation"]+=$row1->obligation;
                        $arrayAgency["releases"]+=$row1->releases;
                        $arrayAgency["expenditure"] +=$row1->expenditure;
                        $arrayAgency["ftotal"] +=$row1->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row1->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row1->targetTodate*$row1->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row1->actualTodate*$row1->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row1->employmentGenerated;
                 
  
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
                                    
                                      
                                               $arrayProject = array("numbering"=>0,"name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                                           "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                                           "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                                           );
                                              //row fetching Project 
                                          $dataAcc2 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll,$data1->subsecid,null,$showUpdatedPro);
                     $ctr = 1;
                                          
                                          while($row2 = $dataAcc2->fetch(PDO::FETCH_OBJ)){
                                              $locationStr = $row2->provincename;
                                                if($row2->district!=""){
                                                $locationStr .=",". $row2->district;    
                                                }
                                                if($row2->city!=""){
                                                $locationStr .=",". $row2->city;    
                                                }
                                               if($row2){
                                                      if($row2->iscompleted!="completed"){
                                                       if($row2->datesub==""){
                                           $arrayProject["info"] = "not-updated";
                                                       }else{
                                           $arrayProject["info"] = "";                            
                                                       }
                                                   }else{
                                           $arrayProject["info"] = "";            
                                                   }
                                                   
                                                       $arrayProject["numbering"] = $ctr++;
                                          $arrayProject["name"] = "<b>(a)</b> ".$row2->projname.
                                                   "<br/><b>(b)</b> ".$row2->fundcode.
                                                   "<br/><b>(c)</b> ".$row2->datestart."-".$row2->dateend.
                                                   "<br/><b>(d)</b> ".$locationStr;
                                           $arrayProject["indicator"] = $row2->unitofmeasure;
                                           $arrayProject["allocation"] = number_format($row2->allocation);
                                           $arrayProject["obligation"]= number_format($row2->obligation);
                                           $arrayProject["releases"]= number_format($row2->releases);
                                           $arrayProject["expenditure"] = number_format($row2->expenditure);
                                     
                                         
                                           if($row2->fundsupport=="")
                                           $arrayProject["fundsupport"] = "N/A";
                                           else
                                           $arrayProject["fundsupport"] = number_format($row2->fundsupport,2);
                                           
                                           if($row2->fundutilizition=="")
                                           $arrayProject["fundutilization"] ="N/A";
                                           else
                                           $arrayProject["fundutilization"] = number_format($row2->fundutilizition,2);
                                           
                                           if($row2->targetTodate=="")
                                           $arrayProject["targetTodate"]="N/A";
                                           else
                                           $arrayProject["targetTodate"]=number_format($row2->targetTodate,2);
                                           
                                           if($row2->actualTodate=="")
                                           $arrayProject["actualTodate"]="N/A";
                                           else
                                           $arrayProject["actualTodate"]=number_format($row2->actualTodate,2);
                                           
                                           if($row2->sllipage=="")
                                           $arrayProject["sllipage"] = "N/A";
                                           else
                                           $arrayProject["sllipage"] = number_format($row2->sllipage,2);
                                           
                                           if($row2->performance=="")
                                           $arrayProject["performance"] = "N/A";
                                           else
                                           $arrayProject["performance"] = number_format($row2->performance,2);
                                           
                                           $arrayProject["employmentGenerated"] = number_format($row2->employmentGenerated);
                                           
                                           if($row2->financiallyCorrelated=="")
                                           $arrayProject["financiallyCorrelated"] = "N/A";
                                           else
                                           $arrayProject["financiallyCorrelated"] = number_format($row2->financiallyCorrelated,2);

                                               }
                                                getTableRow($arrayProject['name'], $arrayProject, 2);
                                
                                           }

                                           //row fetching Project  

                                         
                      }
                   }
             else if($order == 2){
                 
                 /* fetching province from 739 to 896
                  * province row
                  */
                         $result1 = $acc->getProvinceWAcc($fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll);  
                    
               
       
                         while($data1 = $result1->fetch(PDO::FETCH_OBJ)){
                            $arrayAgency = array("name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                        "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                        "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                        );
                           //row fetching province 
                       $dataAcc1 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll,0,$data1->provincename,$showUpdatedPro);
                       while($row1 = $dataAcc1->fetch(PDO::FETCH_OBJ)){
         
                            if($row1){
                        $arrayAgency["name"] = $row1->provincename;
                        $arrayAgency["indicator"] = $row1->unitofmeasure;
                        $arrayAgency["allocation"] += $row1->allocation;
                        $arrayAgency["obligation"]+=$row1->obligation;
                        $arrayAgency["releases"]+=$row1->releases;
                        $arrayAgency["expenditure"] +=$row1->expenditure;
                        $arrayAgency["ftotal"] +=$row1->ftargetTOTAL;
                        $arrayAgency["ptotal"] +=$row1->ptargetTOTAL;
                        $arrayAgency["targetTodate"]+=($row1->targetTodate*$row1->ftargetTOTAL);
                        $arrayAgency["actualTodate"]+=($row1->actualTodate*$row1->ftargetTOTAL);
                        $arrayAgency["employmentGenerated"] += $row1->employmentGenerated;
                 
  
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
                        //row fetching province  
                                    
                                      
                                               $arrayProject = array("info"=>null,"numbering"=>0,"name"=>null,"indicator"=>null,"allocation"=>0,"obligation"=>0,"releases"=>0,
                                           "expenditure"=>0,"fundsupport"=>0,"fundutilization"=>0,"targetTodate"=>0,"actualTodate"=>0,
                                           "sllipage"=>0,"performance"=>0,"employmentGenerated"=>0,"financiallyCorrelated"=>0,"ftotal"=>0,"ptotal"=>0
                                           );
                                              //row fetching Project 
                                          $dataAcc2 = $acc->getAllInArray($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$data->secid,$yrenroll,0,$data1->provincename,$showUpdatedPro);
                    $ctr =1;
                                          
                                   
                                          
                                          while($row2 = $dataAcc2->fetch(PDO::FETCH_OBJ)){
                                                        $locationStr = $row2->provincename;
                                                if($row2->district!=""){
                                                $locationStr .=",". $row2->district;    
                                                }
                                                if($row2->city!=""){
                                                $locationStr .=",". $row2->city;    
                                                }
                                               if($row2){
                                                   
                                                   if($row2->iscompleted!="completed"){
                                                       if($row2->datesub==""){
                                           $arrayProject["info"] = "not-updated";
                                                       }else{
                                           $arrayProject["info"] = "";                            
                                                       }
                                                   }else{
                                           $arrayProject["info"] = "";            
                                                   }
                                                   
                                                   
                                           $arrayProject["numbering"] = $ctr++;
                                           $arrayProject["name"] = "<b>(a)</b> ".$row2->projname.
                                                   "<br/><b>(b)</b> ".$row2->fundcode.
                                                   "<br/><b>(c)</b> ".$row2->datestart."-".$row2->dateend.
                                                   "<br/><b>(d)</b> ".$locationStr;
                                           $arrayProject["indicator"] = $row2->unitofmeasure;
                                           $arrayProject["allocation"] = number_format($row2->allocation);
                                           $arrayProject["obligation"]= number_format($row2->obligation);
                                           $arrayProject["releases"]= number_format($row2->releases);
                                           $arrayProject["expenditure"] = number_format($row2->expenditure);
                                           
                                           if($row2->fundsupport=="")
                                           $arrayProject["fundsupport"] = "N/A";
                                           else
                                           $arrayProject["fundsupport"] = number_format($row2->fundsupport,2);
                                           
                                           if($row2->fundutilizition=="")
                                           $arrayProject["fundutilization"] ="N/A";
                                           else
                                           $arrayProject["fundutilization"] = number_format($row2->fundutilizition,2);
                                           
                                           if($row2->targetTodate=="")
                                           $arrayProject["targetTodate"]="N/A";
                                           else
                                           $arrayProject["targetTodate"]=number_format($row2->targetTodate,2);
                                           
                                           if($row2->actualTodate=="")
                                           $arrayProject["actualTodate"]="N/A";
                                           else
                                           $arrayProject["actualTodate"]=number_format($row2->actualTodate,2);
                                           
                                           if($row2->sllipage=="")
                                           $arrayProject["sllipage"] = "N/A";
                                           else
                                           $arrayProject["sllipage"] = number_format($row2->sllipage,2);
                                           
                                           if($row2->performance=="")
                                           $arrayProject["performance"] = "N/A";
                                           else
                                           $arrayProject["performance"] = number_format($row2->performance,2);
                                           
                                           $arrayProject["employmentGenerated"] = number_format($row2->employmentGenerated);
                                           
                                           if($row2->financiallyCorrelated=="")
                                           $arrayProject["financiallyCorrelated"] = "N/A";
                                           else
                                           $arrayProject["financiallyCorrelated"] = number_format($row2->financiallyCorrelated,2);


                                               }
                                                getTableRow($arrayProject['name'], $arrayProject, 2);
                                
                                           }

                                           //row fetching Project  

                                         
                      }
                   }
             
              
              
       
       
       
           
       }
       
            $totalWeighted =   $acc->getAllProjectTotalInWeighted($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll,0,null,$showUpdatedPro);
      
            getTableRow("Total",$totalWeighted,0);
           
         
      
      }
      else{
          echo ' <td colspan="15" align="center" class="tg-yw4l">please select a QUARTER to fetch data<br/>(no record)</td>';
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





      
<?php 
     
function getTableRow($name,$row,$order){ // called to display the data on client
   
    if($name != ""){
    if($order == 0){
    echo '  <tr class="tgRow-1 bold " > 
       <td colspan="2" class="tg-yw4l" style="min-width:260px ;">'.$name.'</td>
                  <td class="tg-yw4l">  </td>';
    }
    else if($order == 1){
    echo '  <tr class="tgRow-2 bold "> 
   
    
           <td colspan="2" class="tg-yw4l"><p style="margin-left:10px;">'.$name.'</p></td>
                      <td class="tg-yw4l">  </td>';  
    
    }
    else if($order == 2){
    echo '  <tr class="tgRow-3 "> 
        
           <td class="tg-yw4l" style="word-break: normal; "> 
            <b style="color:black" >'.$row['numbering']. '</b>           
            </td>
           <td class="tg-yw4l" style="word-break: normal; "> 
               <p style="margin-left:25px; margin-bottom:0px;">'.$name.'</p>
               
          </td>
                <td class="tg-yw4l" style="word-break: break-all; width: 120px ; min-width:100px ;">'.$row['indicator'].' <p style="color:red; margin-bottom:0px;">'.$row['info'].'</p> </td>';  
    
    }
    
echo '<td class="tg-yw4l">'.$row['allocation'].'  </td>
    <td class="tg-yw4l">'.$row["obligation"].'  </td>
    <td class="tg-yw4l">'.$row["releases"].'  </td>
    <td class="tg-yw4l">'.$row["expenditure"].'  </td>        
    <td class="tg-yw4l" >'.$row["fundsupport"].'  </td>
    <td class="tg-yw4l" >'.$row["fundutilization"].'  </td>
    <td class="tg-yw4l" >'.$row["targetTodate"].'  </td>
    <td class="tg-yw4l"  >'.$row["actualTodate"].'  </td>
    <td class="tg-yw4l" >'.$row["sllipage"] .'  </td>
    <td class="tg-yw4l" >'.$row["performance"].'  </td>
    <td class="tg-yw4l" >'.$row["employmentGenerated"].'  </td>
    <td class="tg-yw4l">'.$row["financiallyCorrelated"].'  </td>
</tr>
      ';
}
}
?>
