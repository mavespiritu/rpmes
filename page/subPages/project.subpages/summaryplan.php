
       <!-- Nav tabs -->
  <ul class="nav nav-tabs hide-print" role="tablist">
       <?Php $dues = new duedatesDAO();
    $remaining  = $dues->remainingDays(123456);
       $auth = new authentication();
    if($auth->is_admin()=="true"){
    echo ' <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
                                role="tab" >Add Project</a>';
        
    }else{
        
    
    
    if($remaining>=0){
          
    echo ' <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
                                role="tab" >Add Project</a>';
      } 
      } 
      ?>
        <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=8300bb712ceff1bf753d23f8f6edb8c3f30318b7" 
                                role="tab" >Saved Project
            
                  <?Php
          $idid = new authentication();
          $planSaved = new monitoringplanDAO();
     
        $sNum =     $planSaved->getSavedProject($idid->userAgency());
        echo '
         
  <span class="label label-success" >'.$sNum ->rowCount().' saved project</span>';
        
         ?>
            </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" 
                                role="tab" >Monitoring Plan
         
        
         </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=df6fa782e0f764e1f6218e852cecba2953f7c7cb" 
                                role="tab" >My Entries
          <?Php
          $ididi = new authentication();
          $planEnt = new monitoringplanDAO();
     
        $entNum =     $planEnt->getMyEntry($ididi->userAgency()); // getting the list of project of agency
        echo '
         
  <span class="label label-success">'.$entNum ->rowCount().'</span>';
        
         ?>
         </a>
     </li>
   <li class="active"  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=161aa04ea6be7933581cfd594cf4b9c78354a441" 
                                role="tab" >Summary Plan 
            
         </a>
     </li>
   
  </ul>
    &nbsp; <!--spaces-->
    &nbsp;
    <form style =" margin-left: 20px;" class="form-inline">
    <div class="row hide-print">
        
     
        


  Year:
    
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
        

    Fund Source:
       
    
               <?php
                $category = new fundsrcDAO();
                $resultCat =$category->getList(); 
                 echo '<select placeholder="Fund Source" required="required" id="optfundsrc"  class="form-control ">';
            
                 echo '<option value="0">Select all</option>';
                       while($row  = $resultCat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                 echo '<option value="'.$row[0].'"> '.$row[3].' ('.$row[2].')</option>';
                       }
              echo '</select>';
        ?>



      Period:
               
                <select required="required" id="smryDrpDownPeriod"   name="smryDrpDownPeriod"
                     class="form-control ">
            
              <option value="0"> SELECT ALL</option>
              <option value="1"> Carry Over</option>
              <option value="2"> Current Year</option>
               
            </select>
      
    <br/>
    <br/>

    Order by:
                <select required="required" id="smryDrpDownOrder"   name="smryDrpDownAgency"
                     class="form-control ">
                     <option value="1">Agency by Sector</option>
                     <option value="2">Sector by Agency</option>

                 </select>
        
               
          
      
    
       

    <button type="button" value="Load"  class="btn btn-success" id="loadData">
            Load
             <span class="glyphicon glyphicon-send" ></span>
        
    </button>     

        
         
     
                

        
          
                 <button onclick="window.print()" class=" btn btn-success btn-sm " >
          <p class="glyphicon glyphicon-print"></p> Print</button> 
        
    
   

              <button id="xlsfile" class=" btn btn-info "  value="download to excel" >
                Save as Excel File  <span class="glyphicon glyphicon-save-file"/>
              </button>
                </div>
   
 

    </form>
            
    
     
  
<div class="title-header-print">
    <!--<img style="float: left;" src="image/9225816_orig.jpg" width=70px" height="70px"/>-->
    <h1 style="font-size:12pt; padding: 0px; margin:0px;" align="center"><b>REGIONAL PROJECT MONITORING AND EVALUATION SYSTEM (RPMES)</b></h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Summary of Form 1</h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">CY __________</h1>
    <br/>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="left">Implementing Period _______________________</h1>
 
</div>
    <br/>

<div id="tableex" class="scrollY ">
<table  id="tblOverFlow" class="tg accReport table saveExcel ">
    <thead>
       
  <tr>
    <th class="tg-wide noBorderbottom theadTopBorder" colspan="5" rowspan="3">Project Category</th>
    <th class="tg-nhqr theadTopBorder" colspan="5">Financial Requirements (P 000)</th>
    <th class="tg-nhqr theadTopBorder" colspan="5">Number of Projects</th>
    
    <th class="tg-nhqr theadTopBorder" colspan="5">Man-Days Requirements</th>
  </tr>
  <tr>
        <th class="tg-nhqr" colspan="4">Implementation Schedule</th>
    <th class="tg-acrz noBorderbottom" rowspan="2"><br>Total</th>
    <th class="tg-nhqr" colspan="4">Implementation Period</th>
    <th class="tg-acrz noBorderbottom" rowspan="2"><br>Total</th>
  
    <th class="tg-nhqr" colspan="4">Job-Generation Schedule</th>
    <th class="tg-acrz noBorderbottom" rowspan="2"><br>Total</th>
  </tr>
  <tr>
    <th class="tg-acrz noBorderbottom">Q1</th>
    <th class="tg-acrz noBorderbottom">Q2</th>
    <th class="tg-acrz noBorderbottom">Q3</th>
    <th class="tg-acrz noBorderbottom">Q4</th>
    <th class="tg-acrz noBorderbottom">Q1</th>
    <th class="tg-acrz noBorderbottom">Q2</th>
    <th class="tg-acrz noBorderbottom">Q3</th>
    <th class="tg-acrz noBorderbottom">Q4</th>
    <th class="tg-acrz noBorderbottom">Q1</th>
    <th class="tg-acrz noBorderbottom">Q2</th>
    <th class="tg-acrz noBorderbottom">Q3</th>
    <th class="tg-acrz noBorderbottom">Q4</th>
  </tr>
   <tr>
      <th class="topHeader" colspan="5"  align="center">(1)</th>
      <th class="topHeader" align="center">(2)</th>
      <th class="topHeader" align="center">(3)</th>
      <th class="topHeader" align="center">(4)</th>
      <th class="topHeader" align="center">(5)</th>
      <th class="topHeader" align="center">(6)</th>
      <th class="topHeader" align="center">(7)</th>
      <th class="topHeader" align="center">(8)</th>
      <th class="topHeader" align="center">(9)</th>
      <th class="topHeader" align="center">(11)</th>
      <th class="topHeader" align="center">(10)</th>
      <th class="topHeader" align="center">(12)</th>
      <th class="topHeader" align="center">(13)</th>
      <th class="topHeader" align="center">(14)</th>
      <th class="topHeader" align="center">(15)</th>
      <th class="topHeader" align="center">(16)</th>
      
  </tr>
    </thead>
    <tbody class="tody">
        <?Php

            $project = new monitoringplanDAO();
      

        
$fundsrc = 0;
global $implementingPeriod;
$implementingPeriod =0;
global $Order;
$Order = 0;
global $total;

$total = array( 'mq1'=>0,
                'mq2'=>0,
                'mq3'=>0,
                'mq4'=>0,
                'wq1'=>0,
                'wq2'=>0,
                'wq3'=>0,
                'wq4'=>0,
                'fq1'=>0,
                'fq2'=>0,
                'fq3'=>0,
                'fq4'=>0,
                'pq1'=>0,
                'pq2'=>0,
                'pq3'=>0,
                'pq4'=>0);
if(isset($_GET['optfundsrc'])){
    $fundsrc = $_GET['optfundsrc'];
}
if(isset($_GET['iPeriod'])){
    $implementingPeriod = $_GET['iPeriod'];
}
if(isset($_GET['Order'])){
    $Order = $_GET['Order'];
}
if(isset($_GET['optyear'])){
    $optyear = $_GET['optyear'];
}
else{
        $optyear = $GLOBALS['year'];
}


if($implementingPeriod==0){

  
 
  if($Order==1){
$PDO_sector = $project->getSummaryAgencyBySector($fundsrc,0,$optyear);//agency row      
  }else{
$PDO_sector = $project->getSummarySectorByAgency($fundsrc,0,$optyear);//sector row  
  }
  

 while($rowSector =$PDO_sector->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
     if($Order==1){
         $projectNumber2nd = $project->summaryAgencyBySector($fundsrc,0,$rowSector[9],$optyear);//rowAgency PN    
     }else{
     
     $projectNumber2nd = $project->summarySector($fundsrc,0,$rowSector[9],$optyear);//rowSector PN
     }
     if($implementingPeriod==0||$implementingPeriod==0)
getRow(1,$rowSector, $projectNumber2nd);
       
 if($Order==1){      
$PDO_subsector = $project->getSummarySectorBySubSector($fundsrc,0,$rowSector[9],$optyear);//sector row
 }else{
 $PDO_subsector = $project->getSummarySubSector($fundsrc,0,$rowSector[9],$optyear); //sub-sector row
 }
 

 while($rowSubSector =$PDO_subsector->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
      if($Order==1){   
          $projectNumber3rd = $project->summarySectorBySubSector($fundsrc,0,$rowSector[9],$rowSubSector[9],$optyear);          

      }else{
$projectNumber3rd = $project->summarySubSector($fundsrc,0,$rowSector[9],$rowSubSector[9],$optyear);
      }
      if($implementingPeriod==0||$implementingPeriod==0)
getRow(2,$rowSubSector, $projectNumber3rd); 
                                   
 if($Order==1){
$PDO_agency = $project->getSummarySubSectorBy($fundsrc,0,$rowSector[9],$rowSubSector[9],$optyear);//sub-sector row row   
}else{
$PDO_agency = $project->getSummaryAgency($fundsrc,0,$rowSector[9],$rowSubSector[9],$optyear);//agency row   
}


    while($rowAgency =$PDO_agency->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
     if($Order==1){
     $projectNumber4th = $project->summarySubSectorBy($fundsrc,0,$rowSubSector[9], $rowAgency[9],$rowSector[9],$optyear);
     }
     else{
     $projectNumber4th = $project->summaryAgency($fundsrc,0,$rowSector[9],$rowSubSector[9], $rowAgency[9],$optyear);
     }
     if($implementingPeriod==0||$implementingPeriod==0)
     getRow(3,$rowAgency,$projectNumber4th); 


}
                              
}
              
}
    
    
}
else{

$PDO_period = $project->getSummaryPeriod($fundsrc,$optyear);//Period Row

while($rowPeriod =$PDO_period->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
  


 
 
 
  if($Order==1){
$PDO_sector = $project->getSummaryAgencyBySector($fundsrc,$rowPeriod[9],$optyear);//agency row      
  }else{
$PDO_sector = $project->getSummarySectorByAgency($fundsrc,$rowPeriod[9],$optyear);//sector row  
  }
  

 while($rowSector =$PDO_sector->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
     if($Order==1){
         $projectNumber2nd = $project->summaryAgencyBySector($fundsrc,$rowPeriod[9],$rowSector[9],$optyear);//rowAgency PN    
     }else{
     
     $projectNumber2nd = $project->summarySector($fundsrc,$rowPeriod[9],$rowSector[9],$optyear);//rowSector PN
     }
     if($implementingPeriod==0||$implementingPeriod==$rowPeriod[9])
getRow(1,$rowSector, $projectNumber2nd);
       
 if($Order==1){      
$PDO_subsector = $project->getSummarySectorBySubSector($fundsrc,$rowPeriod[9],$rowSector[9],$optyear);//sector row
 }else{
 $PDO_subsector = $project->getSummarySubSector($fundsrc,$rowPeriod[9],$rowSector[9],$optyear); //sub-sector row
 }
 

 while($rowSubSector =$PDO_subsector->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
      if($Order==1){   
          $projectNumber3rd = $project->summarySectorBySubSector($fundsrc,$rowPeriod[9],$rowSector[9],$rowSubSector[9],$optyear);          

      }else{
$projectNumber3rd = $project->summarySubSector($fundsrc,$rowPeriod[9],$rowSector[9],$rowSubSector[9],$optyear);
      }
      if($implementingPeriod==0||$implementingPeriod==$rowPeriod[9])
getRow(2,$rowSubSector, $projectNumber3rd); 
                                   
 if($Order==1){
$PDO_agency = $project->getSummarySubSectorBy($fundsrc,$rowPeriod[9],$rowSector[9],$rowSubSector[9],$optyear);//sub-sector row row   
}else{
$PDO_agency = $project->getSummaryAgency($fundsrc,$rowPeriod[9],$rowSector[9],$rowSubSector[9],$optyear);//agency row   
}


    while($rowAgency =$PDO_agency->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
     if($Order==1){
     $projectNumber4th = $project->summarySubSectorBy($fundsrc,$rowPeriod[9],$rowSubSector[9], $rowAgency[9],$rowSector[9],$optyear);
     }
     else{
     $projectNumber4th = $project->summaryAgency($fundsrc,$rowPeriod[9],$rowSector[9],$rowSubSector[9], $rowAgency[9],$optyear);
     }
     if($implementingPeriod==0||$implementingPeriod==$rowPeriod[9])
     getRow(3,$rowAgency,$projectNumber4th); 


}
                              
}
              
}
                    
}
}




echo '
        <tr class="bold">

        
        <td colspan="5" class="tg-yw4l bold">OVERALL TOTAL</td>
        <td class="tg-yw4l">'.number_format(($total['fq1']/1000),2).'</td>
        <td class="tg-yw4l">'.number_format(($total['fq2']/1000),2).'</td>
        <td class="tg-yw4l">'.number_format(($total['fq3']/1000),2).'</td>
        <td class="tg-yw4l">'.number_format(($total['fq4']/1000),2).'</td>


        <td class="tg-yw4l">'.number_format(($total['fq1']+$total['fq2']+$total['fq3']+$total['fq4'])/1000,2).'</td>

            

          <td class="tg-yw4l">'.$total['pq1'].'</td>
          <td class="tg-yw4l">'.$total['pq2'].'</td>
          <td class="tg-yw4l">'.$total['pq3'].'</td>
          <td class="tg-yw4l">'.$total['pq4'].'</td>
        <td class="tg-yw4l">'.($total['pq1']+$total['pq2']+$total['pq3']+$total['pq4']).'</td>
     

        <td class="tg-yw4l">'.$total['mq1'].'</td>
        <td class="tg-yw4l">'.$total['mq2'].'</td>
        <td class="tg-yw4l">'.$total['mq3'].'</td>
        <td class="tg-yw4l">'.$total['mq4'].'</td>

        <td class="tg-yw4l">'.$total['wq1'].'</td>
        <td class="tg-yw4l">'.$total['wq2'].'</td>
        <td class="tg-yw4l">'.$total['wq3'].'</td>
        <td class="tg-yw4l">'.$total['wq4'].'</td>

        <td class="tg-yw4l">'.($total['mq1']+$total['mq2']+$total['mq3']+$total['mq4']).'</td>
        <td class="tg-yw4l">'.($total['wq1']+$total['wq2']+$total['wq3']+$total['wq4']).'</td>
      </tr>
       ';
        

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
       



    
    
    
    <?Php
    
    function getRow($param,array $val,array $projNum){
       
         
        $total = $GLOBALS['total'];
        
                   if($param==1){
                       
                        $total['pq1'] += $projNum['q1'];          
                        $total['pq2'] += $projNum['q2'];          
                        $total['pq3'] += $projNum['q3'];
                        $total['pq4'] += $projNum['q4'];

                        $total['fq1'] += $val[0];
                        $total['fq2'] += $val[1];
                        $total['fq3'] += $val[2];
                        $total['fq4'] += $val[3];

                        $total['mq1'] += $val[4];
                        $total['mq2'] += $val[5];
                        $total['mq3'] += $val[6];
                        $total['mq4'] += $val[7];

                        $total['wq1'] += $val[8];
                        $total['wq2'] += $val[9];
                        $total['wq3'] += $val[10];
                        $total['wq4'] += $val[11];
                }
          $GLOBALS['total'] =$total ;
        
       if(!($param==2&&$val[9]==0)){
                
            
           
if($param==0){
 echo '       <tr class="tgRow-0 bold">
<td colspan="5" class="tg-yw4l">'.$val[8].'</td>
';
}
else if($param==1){
 echo '       <tr class="tgRow-1 bold">
<td colspan="5" class="tg-yw4l">&nbsp&nbsp&nbsp&nbsp'.$val[8].'</td>
';
}
else if($param==2){
 echo '       <tr class="tgRow-2">
<td colspan="5" class="tg-yw4l">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$val[8].'</td>
';
}
else if($param==3){
 echo '       <tr class="tgRow-3">
<td colspan="5" class="tg-yw4l">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$val[8].'</td>
';
}

 echo '
        
        


<td class="tg-yw4l">'.number_format($val[0]/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val[1]/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val[2]/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val[3]/1000,2).'</td>


        <td class="tg-yw4l">'.number_format(($val[0]+$val[1]+$val[2]+$val[3])/1000,2).'</td>

            

          <td class="tg-yw4l">'.$projNum['q1'].'</td>
         <td class="tg-yw4l">'.$projNum['q2'].'</td>
         <td class="tg-yw4l">'.$projNum['q3'].'</td>
         <td class="tg-yw4l">'.$projNum['q4'].'</td>
        <td class="tg-yw4l">'.($projNum['q1']+$projNum['q2']+$projNum['q3']+$projNum['q4']).'</td>
     

        <td class="tg-yw4l">'.number_format($val[4]).'</td>
        <td class="tg-yw4l">'.number_format($val[5]).'</td>
        <td class="tg-yw4l">'.number_format($val[6]).'</td>
        <td class="tg-yw4l">'.number_format($val[7]).'</td>

        <td class="tg-yw4l">'.number_format(($val[4]+$val[5]+$val[6]+$val[7])).'</td>

      </tr>
    ';
      }
  // }
    
   
    }
    
    ?>