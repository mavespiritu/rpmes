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
      <li  class="active">
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
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Form 6: REPORT ON THE STATUS OF PROJECTS ENCOUNTERING IMPLEMENTATION PROBLEMS</h1>
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



<?Php
     $authExp= new authentication();
?>
    <div id="tableex" class="scrollY">
<table id="tblOverFlow" class="tg accReport table saveExcel">
 <thead>

  <tr>
    <th class="tg-amwm  noBorderbottom" style="text-align:left;" rowspan="2">Agency Name <br/>&nbsp&nbsp&nbsp &#x21B3; Name of Project</th>
    <th class="tg-amwm  noBorderbottom " rowspan="2">Location</th>
    <th class="tg-amwm   noBorderbottom" rowspan="2">Fund Utilization</th>
    <th class="tg-amwm   " colspan="3" >Physical Status (%)</th>
    <th class="tg-amwm   noBorderbottom" rowspan="2">Reasons/Issues/Causes</th>
    <th class="tg-amwm   noBorderbottom" rowspan="2">Action Taken/Recommendation</th>
       <?Php
    
  if($authExp->is_admin()=="true"){
    echo '<th class="tg-amwm  hide-print  " colspan="2">Form</th>';
  }
  ?>
  </tr>
  <tr>
    <th class="tg-amwm noBorderbottom">Target</th>
    <th class="tg-amwm noBorderbottom">Actual</th>
    <th class="tg-amwm noBorderbottom">Slippage</th>
        <?Php
    
  if($authExp->is_admin()=="true"){

echo '
    <th class="tg-amwm hide-print noBorderbottom">7</th>
    <th class="tg-amwm hide-print noBorderbottom">8</th>
    ';
  }
 ?>
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
         <?Php
    
  if($authExp->is_admin()=="true"){
      echo '<th class="topHeader hide-print" align="center"></th>
      <th class="topHeader hide-print" align="center"></th>';
  }
      ?>

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
  
  
    
      $result = $acc->getAgencyWAccSllipage($quarterG,$fundSrcOpt, $agencysmrtbl, $locationss, $smrySect, $yrenroll);
     
      while($data =  $result->fetch(PDO::FETCH_OBJ)){
         
$arrayRow = array("location"=>"",
    "fundutilization"=>"",
    "projid"=>"",
    "projname"=>"",
    "agencycode"=>"",
    "fulladdress"=>"",
    "target"=>"",
    "actual"=>"",
    "sllipage"=>"",
    "issues"=>"",
    "releases"=>"",
    "expenditure"=>"",
    "ftotal"=>"",
    "ptotal"=>"",
    "actiontaken"=>"",
    "info"=>""
    );
$trigertiger = true;



      $dataAcc = $acc->getProjectForm6($quarterG,$fundSrcOpt,$data->agencyid,$locationss,$smrySect,$yrenroll,0,null);
  
            while($dataP = $dataAcc->fetch(PDO::FETCH_OBJ)){
                 $ftotal = 0;     
                 
                 
                       if($dataP->iscompleted!="completed"){
                                                       if($dataP->datesub==""){
                                           $arrayRow["info"] = "not-updated";
                                                       }else{
                                           $arrayRow["info"] = "";                            
                                                       }
                                                   }else{
                                           $arrayRow["info"] = "";            
                                                   }
                 
                 
            if($dataP->datatype == "Default"||$dataP->datatype == "default"){
                $ftotal = $dataP->q1Ftarget+
                        $dataP->q2Ftarget +
                        $dataP->q3Ftarget+
                        $dataP->q4Ftarget;
                
             
                
                
            }
            if($dataP->datatype == "Maintained"){
                $ftotal = $dataP->q1Ftarget+
                        $dataP->q2Ftarget +
                        $dataP->q3Ftarget+
                        $dataP->q4Ftarget;
                
           
                
                
            }
            if($dataP->datatype == "Cumulative"){
            
             
                if($dataP->q1Ftarget!=0){
                $ftotal =  $dataP->q1Ftarget;    
                }
                if($dataP->q2Ftarget!=0){
                $ftotal =  $dataP->q2Ftarget;    
                }
                if($dataP->q3Ftarget!=0){
                $ftotal =  $dataP->q3Ftarget;
                }
                if($dataP->q4Ftarget!=0){
                $ftotal =  $dataP->q4Ftarget;
                }
               
                
      
                
                
                
            }
                $arrayRow['inditotal'] = $ftotal;
                $arrayRow['form8'] = $dataP->tblform8isempty;
                $arrayRow['form7'] =$dataP->tblform7isempty;
                $arrayRow['fulladdress'] = null;
                if($dataP->city!=""){
                $arrayRow["fulladdress"]=$dataP->city;
                $arrayRow["fulladdress"].=",".$dataP->provincename;
                }
                else{
                $arrayRow["fulladdress"].=$dataP->provincename;    
                }
                if($dataP->district!=""){
                $arrayRow["fulladdress"].=",".$dataP->district;
                }
                
                
                $arrayRow["projname"]=$dataP->projname;
                $arrayRow["projid"]=$dataP->projid;
                $arrayRow["agencycode"]=$dataP->agencycode;
                $arrayRow["location"]=$dataP->provincename;
                $arrayRow["issues"]=$dataP->issuess;
                $arrayRow["actiontaken"]=$dataP->actiontaken;
                    
                if($dataP->fundutilizition!=null)
                $arrayRow["fundutilization"]=number_format($dataP->fundutilizition,2);
                else
                    $arrayRow["fundutilization"]="N/A";
                if($dataP->targetTodate!=null)
                $arrayRow["target"]=number_format($dataP->targetTodate,2);
                else
                $arrayRow["target"]="N/A";
                
                if($dataP->actualTodate!=null)
                $arrayRow["actual"]=  number_format ($dataP->actualTodate,2);
                else
                $arrayRow["actual"]="N/A";
                
                if($dataP->sllipage!=null)
                $arrayRow["sllipage"]=  number_format ($dataP->sllipage,2);
                else
                $arrayRow["sllipage"]="N/A";
                
                if($dataP->sllipage<=(-15)){
                    if($trigertiger){
                        $trigertiger = false;
             getTableRow($data->agencycode, $arrayRow, 0);       
                    }
            getTableRow($dataP->projname, $arrayRow, 1);
                
            }
            }
       
        
              
       
       
       
           
       }
       /********************* this is the total row
             $dataTotal = $acc->getProjectForm6($quarterG,$fundSrcOpt,$agencysmrtbl,$locationss,$smrySect,$yrenroll,0,null);

if($dataTotal->rowCount()>0){
     
             while($rw = $dataTotal->fetch(PDO::FETCH_OBJ)){
               
                 
                 
    if($rw->sllipage<=(-15)){
      $arrayRow["releases"]+=$rw->releases;
      $arrayRow["expenditure"] +=$rw->expenditure;
      $arrayRow["fundutilization"]+=$rw->fundutilizition;
      $arrayRow["target"]+=($rw->targetTodate*$rw->ftargetTOTAL);
      $arrayRow["actual"]+=($rw->actualTodate*$rw->ftargetTOTAL);
      
                 $arrayRow["ftotal"] +=$rw->ftargetTOTAL;
         $arrayRow["ptotal"] +=$rw->ptargetTOTAL;
  
             }
  }
  
            
    $arrayRow["location"] = "";
      $arrayRow["issues"] = "";
      $arrayRow["actiontaken"] = "";
       if($arrayRow["releases"]!=0)$arrayRow["fundutilization"] =number_format(($arrayRow["expenditure"]/$arrayRow["releases"])*100,2);
        else $arrayRow["fundutilization"] ="N/A";
 
         if($arrayRow["ftotal"]!=0)$arrayRow["target"] = number_format($arrayRow["target"]/$arrayRow["ftotal"],2);
 else $arrayRow["targetTodate"] = "N/A";
 if($arrayRow["ftotal"]!=0)$arrayRow["actual"] = number_format($arrayRow["actual"]/$arrayRow["ftotal"],2);
 else $arrayRow["actual"] = "N/A";
 if($arrayRow["actual"]!=0||$arrayRow["target"]!=0)
 $arrayRow["sllipage"] = number_format($arrayRow["actual"]-$arrayRow["target"],2);


       getTableRow("Total",$arrayRow,0);
}
         */
      
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
   
    if($name == "Total"){
    echo '  <tr class="tgRow-1 bold "> 
       <td class="tg-yw4l" >'.$name.'</td>';
    }
    else if($order == 0){
    echo '  <tr class="tgRow-1 bold "> 
       <td class="tg-yw4l" >'.$name.'</td>
                  <td class="tg-yw4l" colspan="7">  </td>';
    }
    else if($order == 1){
    echo '  <tr class="tgRow-2 bold "> 
   
    
           <td class="tg-yw4l"><p style="margin-left:10px; max-width:120px;">'.$name.'</p><p style="color:red;">'.$row['info'].'</p></td>
                     ';  
    
    }
    else if($order == 2){
    echo '  <tr class="tgRow-3 "> 
   
    
           <td class="tg-yw4l"><p style="margin:0px;padding:0px;"  >'.$row['numbering'].'</p><p style="margin-left:25px;">'.$name.'</p></td>
                <td class="tg-yw4l">'.$row['indicator'].'  </td>';  
    
    }
if($order!=0||$name == "Total"){    
echo '
 

   
   
     <td class="tg-yw4l">'.$row['location'].'  </td>
        
    <td class="tg-yw4l">'.$row["fundutilization"].'  </td>
        
    <td class="tg-yw4l">'.$row["target"].'  </td>
        
    <td class="tg-yw4l">'.$row["actual"].'  </td>        
        
    <td class="tg-yw4l">'.$row["sllipage"].'  </td>
        
    <td class="tg-yw4l" style="max-width:200px;">'.$row["issues"].'  </td>
        
        
    <td class="tg-yw4l" style="max-width:200px;">'.$row["actiontaken"].'  </td>
   
  

                           ';
}
   $authExp= new authentication();
   if($authExp->is_admin()=="true"){
  if(isset($_GET['quarter'])){
      $quart = $_GET['quarter'];
  }
if($order!=0){ 
    
    
echo '
 

   <td align="center" class="tg-yw4l hide-print" style="max-width:80px;padding:0px;">
  <br/>
  <br/>
<div class=" btn-group-xs btn-group-vertical" aria-label="Action">
         
          <button class="btn
          '; 
if($row['form7']=="true") echo 'btn-primary';
else echo 'btn-success';
          echo '
    editc" data-backdrop="static" 
          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#editForm7" 
     
                    data-projid="'.$row["projid"].'" 
                    data-projname="'.$row["projname"].'" 
                    data-location="'.$row["fulladdress"].'" 
                    data-agencycode="'.$row["agencycode"].'" 
                    data-projcost="'.$row["inditotal"].'" 
                        data-quarter="'.$quart.'" 
                    data-titled="Form 7"  
      
><span class="glyphicon glyphicon-pencil"></span> Edit</button>

          <button class="btn btn-primary
       
editc" data-backdrop="static" 
'; 
if($row['form7']=="true") echo 'disabled';
else echo '';
          echo '   

          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#deleteModal7" 
     
                    data-idd="'.$row["projid"].'" 
             data-quarter="'.$quart.'" 
          
      
><span class="glyphicon glyphicon-trash"></span> Clear</button>

          <button class="btn btn-primary
       
editc" data-backdrop="static" 
'; 
if($row['form7']=="true") echo 'disabled';
else echo '';
          echo '   

          title="Individual Report of Project Inspection"  data-toggle="modal" 
      data-target="#individualform7" 
     
                    data-idd="'.$row["projid"].'" 
             data-quarter="'.$quart.'" 
          
      
><span class="glyphicon glyphicon-print"></span> Print</button>
    
</div>


 <td align="center" class="hide-print"> 
 <br/>
  <br/>
 <div class=" btn-group-xs btn-group-vertical" aria-label="Action">
                 
         
          
          <button class="btn 
'; 
if($row['form8']=="true") echo 'btn-primary';
else echo 'btn-success';
          echo '          
editc" data-backdrop="static" 
          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#editForm8" 
     
                    data-projid="'.$row["projid"].'" 
                    data-projname="'.$row["projname"].'" 
                    data-location="'.$row["fulladdress"].'" 
                    data-agencycode="'.$row["agencycode"].'" 
                        data-quarter="'.$quart.'" 
                    data-titled="Form 8"  
      
><span class="glyphicon glyphicon-pencil"></span> Edit</button>
           
          <button class="btn btn-primary
       
editc" data-backdrop="static" 
'; 
if($row['form8']=="true") echo 'disabled';
else echo '';
          echo '   

          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#deleteModal8" 
     
                    data-idd="'.$row["projid"].'" 
             data-quarter="'.$quart.'" 
          
      
><span class="glyphicon glyphicon-trash"></span> Clear</button>
            <button class="btn btn-primary
       
editc" data-backdrop="static" 
'; 
if($row['form8']=="true") echo 'disabled';
else echo '';
          echo '   

          title="Individual Report of PSS"  data-toggle="modal" 
      data-target="#individualform8" 
     
                    data-idd="'.$row["projid"].'" 
             data-quarter="'.$quart.'" 
          
      
><span class="glyphicon glyphicon-print"></span> Print</button>
    
   
    
</div>
 </td> ';
}else if($name=="Total"){
    
    echo '<td class="tg-yw4l" style="max-width:80px;padding:0px;">';
    echo '<td class="tg-yw4l" style="max-width:80px;padding:0px;">';    
}
}




                echo '
                    

</tr>
      ';
}
?>


<div class="modal fade " id="editForm7" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg " >
    <div class="modal-content" role="document">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
          
          <form id="frm7"  class="form-horizontal">
       
      

    
<input  name="quarter" id="quarter" class="form-control hideElement " readonly />
<input  name="projid" id="projid" class="form-control hideElement " readonly />
<input  name="implementingAgency" id="implementingAgency" class="form-control hideElement " readonly />
<div class="form-group">
    
<div class="col-sm-2">
    Project Name:
</div>
<div class="col-sm-10">
    
    
      <input  type="text" onfocus="setCustomValidity('')" name="projectname" class="form-control" id="projectname" placeholder="Project Name"/>
      </div>
      </div>
<div class="form-group">
      <div class="col-sm-2">
          Location:
      </div>
      <div class="col-sm-10">
      <input  type="text" onfocus="setCustomValidity('')" name="location" class="form-control" id="location" placeholder="Location"/>
      </div>
      </div>
<div class="form-group">
    <div class="col-sm-2">
    Project Cost:
    </div>
    <div class="col-sm-10">
    <input  type="text"  onfocus="setCustomValidity('')" name="projectcost" class="form-control" id="projectcost" placeholder="Project Cost"/>
     
</div>
</div>
<div class="form-group">
    <div class="col-sm-2">
    Date of Project Inspection:
    </div>
    <div class="col-sm-10">
    
    
      <input  type="date"  onfocus="setCustomValidity('')" name="dateOfProjectInspection" class="form-control" id="dateOfProjectInspection" placeholder="Action Recommendation"/>
      </div>
</div>
<div class="form-group">
    
<div class="col-sm-2">
    Physical Status:
</div>
<div class="col-sm-10">
    
    
      <textarea  type="text"  onfocus="setCustomValidity('')" name="physicalStatus" class="form-control" id="physicalStatus" placeholder="Physical Status"></textarea>
      </div>
    
     
</div>
<div class="form-group">
    <div class="col-sm-2">
        Issues:
    </div>
    <div class="col-sm-10">
    
    
      <textarea   onfocus="setCustomValidity('')" name="issues" class="form-control" id="issues" placeholder="Issues"></textarea>
      </div>
      </div>
<div class="form-group">
    
<div class="col-sm-2">
    Actions Taken/Recommendation
</div>
<div class="col-sm-10">
    
    
      <textarea   onfocus="setCustomValidity('')" name="actionRecommendation" class="form-control" id="actionRecommendation" placeholder="Actions Taken/Recommendation"></textarea>
      </div>

     
      </div>


<div class="form-group">
    <div class="col-sm-2">
   *Prepared by:
    </div>
    <div class="col-sm-10">
    <input  type="text" readonly value="<?Php
   echo $authExp->getCredentials('fullname').", ".$authExp->getCredentials('position').", NEDA Region 1, ".$GLOBALS['Fulldate'];
    ?>"  onfocus="setCustomValidity('')" name="preparedby" class="form-control" id="preparedby" placeholder="Prepared by"/>
     
</div>
    
</div>
    
<div class="form-group">
    <div class="col-sm-3 col-sm-offset-9"> *note: data displayed are system
    </div>
    <div  class="col-sm-3 col-sm-offset-9">
      <input  type="submit"  onfocus="setCustomValidity('')" name="submit" value ="Submit" class="form-control btn btn-success" />
      </div>
  </div>
      

         </form>

          
      </div>
      
    </div>
  </div>
</div>




<div class="modal fade " id="editForm8" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg " >
    <div class="modal-content" role="document">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
          
          <form id="frm8"  class="form-horizontal">
       
      

    
<input  name="quarter" id="quarter" class="form-control hideElement " readonly />
<input  name="projid" id="projid" class="form-control hideElement " readonly />
<input  name="implementingAgency" id="implementingAgency" class="form-control hideElement " readonly />
<div class="form-group">
<div class="col-sm-2">
    Project Name: 
    </div>
<div class="col-sm-10">
    
    
      <input  type="text" onfocus="setCustomValidity('')" name="projectname" class="form-control" id="projectname" placeholder="Project Name"/>
      </div>
      </div>
<div class="form-group">
      <div class="col-sm-2">
          Location:
      </div>
      <div class="col-sm-10">
      <input  type="text" onfocus="setCustomValidity('')" name="location" class="form-control" id="location" placeholder="Location"/>
      </div>
      </div>
<div class="form-group">
    
<div class="col-sm-2">
    Agreement Reached:
</div>
<div class="col-sm-10">
    
    
      <textarea   onfocus="setCustomValidity('')" name="agreementsReached" class="form-control" id="agreementsReached" placeholder="Agreements Reached"></textarea>
      </div>
      </div>
<div class="form-group">
<div class="col-sm-2">
    Next Steps:
</div>
<div class="col-sm-10">
    
    
      <textarea   onfocus="setCustomValidity('')" name="nexSteps" class="form-control" id="nexSteps" placeholder="Next Steps"></textarea>
      </div>
     
      </div>
<div class="form-group">
    
<div class="col-sm-2">
    Concerned Agency:
</div>
<div class="col-sm-10">
   
    <textarea id="concernedAgency" onfocus="setCustomValidity('')" placeholder="Agency1,Agency2,Agency3,etc..... (Concerned Entities)"  name="concernedAgency" class="form-control col-sm-3"></textarea> 
</div>
</div>

<div class="form-group">
    <div class="col-sm-2">
    Date of PSS
    </div>
    <div class="col-sm-10">
      <input  type="date"  onfocus="setCustomValidity('')" name="dateOfPSS" class="form-control" id="dateOfPSS" placeholder="Date of Problem Solving Session(PSS)"/>
      </div>
      </div>
     

    <div class="form-group">
    <div class="col-sm-2">
  *Prepared by:
    </div>
    <div class="col-sm-10">
    <input  type="text" readonly value="<?Php
   echo $authExp->getCredentials('fullname').", ".$authExp->getCredentials('position').", NEDA Region 1, ".$GLOBALS['Fulldate'];
    ?>"  onfocus="setCustomValidity('')" name="preparedby" class="form-control" id="preparedby" placeholder="Prepared by"/>
     
</div>
    
</div>
<div class="form-group">
    <div  class="col-sm-3 col-sm-offset-9">
  *note: data displayed are system
      </div>
    <div  class="col-sm-3 col-sm-offset-9">
      <input  type="submit"  onfocus="setCustomValidity('')" id="frmSubmit" name="submit" value ="Submit" class="form-control btn btn-success" />
      </div>
  </div>

      

         </form>

          
      </div>
      </div>
      
    </div>
  </div>



<div class="modal fade bs-example-modal-sm " id="deleteModal7" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-sm " >
    <div class="modal-content" role="document">
      <div class="modal-header">
    
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
         
           
          <button class="btn btn-success" data-dismiss="modal" id="deleteProj7" >YES</button>
          <button class="btn btn-danger " data-dismiss="modal" >NO</button>
           
          
            
              </div>
          </div>
        
      </div>
      
    </div>
<div class="modal fade bs-example-modal-sm " id="deleteModal8" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-sm " >
    <div class="modal-content" role="document">
      <div class="modal-header">
    
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
         
           
          <button class="btn btn-success" data-dismiss="modal" id="deleteProj8" >YES</button>
          <button class="btn btn-danger " data-dismiss="modal" >NO</button>
           
          
            
              </div>
          </div>
        
      </div>
      
    </div>

<div class="modal fade bs-example-modal-lg" id="individualform7" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body" >
          
     
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="individualform8" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body" >
          
     
      </div>
      
    </div>
  </div>
</div>