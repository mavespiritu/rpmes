       <!-- Nav tabs -->
  <ul class="hide-print nav nav-tabs" role="tablist">
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
         
  <span class="label label-success">'.$sNum ->rowCount().' saved project</span>';
        
         ?>
            </a>
     </li>
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" 
                                role="tab" >Monitoring Plan</a>
     </li>
     <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=df6fa782e0f764e1f6218e852cecba2953f7c7cb" 
                                role="tab" >My Entries
         <?Php
          $ididi = new authentication();
          $planEnt = new monitoringplanDAO();
     
        $entNum =     $planEnt->getMyEntry($ididi->userAgency());
        echo '
         
  <span class="label label-success">'.$entNum ->rowCount().'</span>';
        
         ?>
         
         </a>
     </li>
     
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=161aa04ea6be7933581cfd594cf4b9c78354a441" 
                                role="tab" >Summary Plan
            
         </a>
     </li>
    
   
  </ul>

<br class="hide-print" />



<div class="title-header-print">
    <!--<img style="float: left;" src="image/9225816_orig.jpg" width=70px" height="70px"/>-->
    <h1 style="font-size:12pt; padding: 0px; margin:0px;" align="center"><b>REGIONAL PROJECT MONITORING AND EVALUATION SYSTEM (RPMES)</b></h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">RPMES Form 1: INITIAL PROJECT REPORT (Physical and Financial Targets for Ongoing Programs and Projects)</h1>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="center">CY __________</h1>
    <br/>
    <h1 style="font-size:11pt; padding: 0px; margin:0px;" align="left">Implementing Period _______________________</h1>
 
</div>

<div>
     <?Php $aauth = new authentication();
      if($aauth->is_admin()=="true"){
          ?>
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
      <div class="hide-print">
          <button type="button" value="Load"  class="col-sm-1 btn btn-success" id="loadData">       Load
             <span class="glyphicon glyphicon-send" ></span>
              </button>
    </div>
    <br class="hide-print" />
    <br class="hide-print"/>
    <br class="hide-print"/>
<?Php } ?>
    
    <script type="text/javascript" src="./API/javascript/jquery.quicksearch.js"></script>

<div class="form-group">
   
    <form class="form-horizontal" action="#">
			
	<input type="text" name="search" value="" class="form-control hide-print" id="id_search" placeholder="Search" autofocus />
			
		</form>
</div>
</div>


<div class="form-group">
<?php


$main1 = new myentries();
    $main1->init();
class myentries {
   
    
    function init(){
        $aaa = new authentication();
     
       
     
     
        if($aaa->is_admin()=="true"){
            if(isset($_GET['agencysmrtbl'])){
                $aidd = $_GET['agencysmrtbl'];
            }
            else{
                $aidd= 0;
            }
            
            
        $this->displayMyEntryInTable($aidd);
        
        }else{
        $this->displayMyEntryInTable($aaa->userAgency());
        }
        }
    function displayMyEntryInTable($id){
        $plan = new monitoringplanDAO();
            $dues = new duedatesDAO();
    $remaining  = $dues->remainingDays(123456);
      
        $result =     $plan->getMyEntry($id);
        
        
    
        echo '<div id="tableex" class="  table-striped scrollY" >
                <table id="monitoringDatatable" class="tg table  table-hover saveExcel  ">
               
                <thead>
                <tr>
                    
                    <th  class="tg-acrz"   rowspan="2"  >#</th>   
                    <th  class="tg-acrz"  width="200px" style="text-align:left;" rowspan="2">
                    (a)Name of Project<br/>
                    (b)Location<br/>
                    (c)Sector/Sub-Sector<br/>
                    (d)Funding Source<br/>
                    (e)Mode of Implementation<br/>
                    (f)Project Schedule<br/>
                    </th>   
            
                   <th  class="tg-acrz"  width="60px" rowspan="2">Unit Of Measure</th>  
                   
        <th  class="tg-acrz"  colspan="5" >Financial Requirements</th>   
                   <th  class="tg-acrz"  colspan="5">Physical Targets</th>   
           
                   <th  class="tg-acrz"  id="reduceSpan" colspan="10">Employment Generated</th> 
                </tr>
                
 <tr>
                <th  class="tg-acrz" >Q1</th>
                <th  class="tg-acrz" >Q2</th>
                <th  class="tg-acrz" >Q3</th>
                <th  class="tg-acrz" >Q4</th>
                <th  class="tg-acrz" >Total</th>
                
                <th  class="tg-acrz" >Q1</th>
                <th  class="tg-acrz" >Q2</th>
                <th  class="tg-acrz" >Q3</th>
                <th  class="tg-acrz" >Q4</th>
                <th  class="tg-acrz" >Total</th>
                
                <th class="tg-acrz">Q1 Male</th>
                <th class="tg-acrz">Q1 Female</th>
                <th class="tg-acrz">Q2 Male</th>
                <th class="tg-acrz">Q2 Female</th>
                <th class="tg-acrz">Q3 Male</th>
                <th class="tg-acrz">Q3 Female</th>
                <th class="tg-acrz">Q4 Male</th>
                <th class="tg-acrz">Q4 Female</th>
                <th class="tg-acrz">Total</th>
                
              
                
            
                <th class="hide-print"></th>
               
                
              
                   </tr>
                </thead>
                <tbody>
                ';
           $auth = new authentication();
           $ctr = 1;
        while($row  = $result->fetch(PDO::FETCH_OBJ)){
            
            $loc=  $row->provincename;
            if($row->district != null){
                $loc.= ", ".$row->district;
            }
            if($row->city != null){
                $loc.= ", ".$row->city;
            }
            
            $secorsubsec = "";
            if($row->secid!=0){
                $secorsubsec = $row->secname;
            }
            if($row->subsecid!=0){
                $secorsubsec .= "(".$row->subsecname.")";
            }
            
            
         if($row->datatype == "Default"||$row->datatype == "default"){
                $ftotal = $row->q1Ftarget+
                        $row->q2Ftarget +
                        $row->q3Ftarget+
                        $row->q4Ftarget;
                
                $ptotal = $row->q1Ptarget+
                        $row->q2Ptarget +
                        $row->q3Ptarget+
                        $row->q4Ptarget;
                
                $mtotal = $row->q1Mtarget+
                        $row->q1Wtarget+
                        $row->q2Mtarget +
                        $row->q2Wtarget+
                        $row->q3Mtarget+
                        $row->q3Wtarget+
                        $row->q4Mtarget+
                        $row->q4Wtarget;
                
                
            }
            if($row->datatype == "Maintained"){
                $ftotal = $row->q1Ftarget+
                        $row->q2Ftarget +
                        $row->q3Ftarget+
                        $row->q4Ftarget;
                
                $ptotal = $row->q1Ptarget;
                
                $mtotal = $row->q1Mtarget+
                        $row->q1Wtarget+
                        $row->q2Mtarget +
                        $row->q2Wtarget+
                        $row->q3Mtarget+
                        $row->q3Wtarget+
                        $row->q4Mtarget+
                        $row->q4Wtarget;
                
                
            }
          if($row->datatype == "Cumulative"){
                $ftotal = 0;
                $mtotal = 0;
                $ptotal = 0;
                if($row->q1Ftarget!=0){
                $ftotal =  $row->q1Ftarget;    
                }
                if($row->q2Ftarget!=0){
                $ftotal =  $row->q2Ftarget;    
                }
                if($row->q3Ftarget!=0){
                $ftotal =  $row->q3Ftarget;
                }
                if($row->q4Ftarget!=0){
                $ftotal =  $row->q4Ftarget;
                }
               
                
                if($row->q1Ptarget!=0){
                $ptotal =  $row->q1Ptarget;    
                }
                if($row->q2Ptarget!=0){
                $ptotal =  $row->q2Ptarget;    
                }
                if($row->q3Ptarget!=0){
                $ptotal =  $row->q3Ptarget;
                }
                if($row->q4Ptarget!=0){
                $ptotal =  $row->q4Ptarget;
                }
             
                
                if($row->q1Mtarget!=0){
                $mtotal =  $row->q1Mtarget;    
                }
                if($row->q1Wtarget!=0){
                $mtotal =  $row->q1Wtarget;    
                }
                if($row->q2Mtarget!=0){
                $mtotal =  $row->q2Mtarget;    
                }
                if($row->q2Wtarget!=0){
                $mtotal =  $row->q2Wtarget;    
                }
                if($row->q3Mtarget!=0){
                $mtotal =  $row->q3Mtarget;
                }
                if($row->q3Wtarget!=0){
                $mtotal =  $row->q3Wtarget;    
                }
                if($row->q4Mtarget!=0){
                $mtotal =  $row->q4Mtarget;
                }
                if($row->q4Wtarget!=0){
                $mtotal =  $row->q4Wtarget;    
                }
             
                
                
            }
            
                   if($row->programname!=null){
                $pname = "<br/>(".$row->programname.")";
            }
            else{
                $pname = "";
            }
            
            echo ' 
                     <tr id="rowProj'.$row->projid.'"  >
                       
                    <td >'.$ctr++.'</td>
                    <td >
                    (a)'.$row->projname.$pname.
                    '<br/>(b)'.$loc.
                    '<br/>(c)'.$secorsubsec.
                    '<br/>(d)'.$row->fundcode.
                    '<br/>(e)'.$row->periodname.
                    '<br/>(f)'.$row->datestart." - ".$row->dateend.
                    
                    
                    '</td>
                        <td>'.$row->unitofmeasure.'<br/>('.$row->datatype.')</td>
                        <td>'.number_format($row->q1Ftarget).'</td>
                        <td>'.number_format($row->q2Ftarget).'</td>
                        <td>'.number_format($row->q3Ftarget).'</td>
                        <td>'.number_format($row->q4Ftarget).'</td>
                        <td>'.number_format($ftotal).'</td>
                        
                        <td>'.$row->q1Ptarget.'</td>
                        <td>'.$row->q2Ptarget.'</td>
                        <td>'.$row->q3Ptarget.'</td>
                        <td>'.$row->q4Ptarget.'</td>
                        <td>'.$ptotal.'</td>
                        
                       
                        <td class="tg-yw4l">'.number_format($row->q1Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q1Wtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q2Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q2Wtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q3Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q3Wtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q4Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q4Wtarget).'</td>
                        <td class="tg-yw4l">'.number_format($mtotal).'</td>
';
            if($auth->is_admin()=="true"){
           echo ' <td class=" hide-print" >
               <div class=" btn-group-xs btn-group-vertical" aria-label="Action">
                    <button data-backdrop="static" 
                    title="Click to view whole information of the project" 
                    class="btn btn-info viewc"  
                    data-toggle="modal" 
      data-target="#viewModal" 
      data-idd="'.$row->projid.'" 
          data-titled="'.$row->projname.'"  ><span class="glyphicon glyphicon-search"></span></button>
         
          
          <button class="btn btn-primary editc" data-backdrop="static" 
          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#editProjModal" data-idd="'.$row->projid.'" data-titled="'.$row->projname.'"   ><span class="glyphicon glyphicon-pencil"></span></button>
         
          
          <button class="btn btn-danger delc " data-backdrop="static" 
          title="Click to Delete this Project"  data-toggle="modal" 
      data-target="#deleteModal" data-idd="'.$row->projid.'" data-titled="'.$row->projname.'"  ><span class="glyphicon glyphicon-trash"></span></button>

</div></td>
        
';     
}
else{
    
    if($remaining>=0){
        
           echo ' <td class="hide-print" >
               <div class=" btn-group-xs btn-group-vertical" aria-label="Action">
                    <button 
                    title="Click to view whole information of the project" 
                    class="btn btn-info viewc"  
                    data-toggle="modal" 
      data-target="#viewModal" 
      data-idd="'.$row->projid.'" 
          data-titled="'.$row->projname.'"  ><span class="glyphicon glyphicon-search"></span></button>
         
          
          <button class="btn btn-primary editc" 
          title="Click  to Edit Specific Project Information"  data-toggle="modal" 
      data-target="#editProjModal" data-idd="'.$row->projid.'" data-titled="'.$row->projname.'"   ><span class="glyphicon glyphicon-pencil"></span></button>
         
          
          <button class="btn btn-danger delc " 
          title="Click to Delete this Project"  data-toggle="modal" 
      data-target="#deleteModal" data-idd="'.$row->projid.'" data-titled="'.$row->projname.'"  ><span class="glyphicon glyphicon-trash"></span></button>

</div></td>
        
';      
    }else{
    echo '<td class="hide-print" ></td>';
    }
    
}
            
            
            
echo '
            </tr>
                    ';
                
                
                
        }
        echo '
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
         
          




';
        
     
    }
  
    
    
    
    
    
    
    
}

?>
  </div>  


<div class="form-group hide-print col-md-offset-8 ">
          <div class="col-sm-4">
              <button id="xlsfile" class="form-control btn btn-info "  value="download to excel" >
                Save as Excel File  <span class="glyphicon glyphicon-save-file"/>
              </button>
            
            </div>
            <div class="col-sm-2">
                 <button onclick="window.print()" class=" btn btn-success btn-sm " >
          <p class="glyphicon glyphicon-print  "></p> Print Content</button>
            </div>
    <br/>
  
   
    </div>
     
           
  
<div class="modal fade " id="editProjModal" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog  modal-lg " >
    <div class="modal-content" role="document">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
          
          <form id="updateProject"  class="form-horizontal">
 

    
<input  name="projid" id="projid" class="form-control hideElement" readonly />
      
         
       
          
     <div class="form-group">
         
          <?php
        if($auth->is_admin()=='true'){
            
        
       
                $agency = new agencyDAO();
                $result =$agency->getList(); 
                 echo '<label for="agency" class="col-sm-2 control-label">Agency</label>
   

                     <div class="col-sm-4">
                     <select required="required" id="agency" onfocus="setCustomValidity("")"  name="agency" class="form-control">';
                       while($row  = $result->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select> 
                  </div>';
        
        }
              ?>     
         <label for="agency" class="col-sm-2 control-label">Project Number</label>
         <div class="col-sm-1">
             <input   type="number" step="0.001"
                    name="ordering" 
                    id="ordering" 
                    class="form-control"/>
         </div>
         
     </div>
    
    
     <div class="form-group">
  
  <label for="projectname" class="col-sm-2 control-label">Project Name</label>
       <div class="col-sm-4">
      <input required="required" type="text" name="projectname" onfocus="setCustomValidity('')"  class="form-control" id="projectname" placeholder="Project Name">
    </div>
  
  <label for="period" class="col-sm-2 control-label">Period</label>
       <div class="col-sm-4">
     
        <?php
                $period = new periodDAO();
                $resultPeriod=$period->getList(); 
                
                 echo '<select required="required" onfocus="setCustomValidity("")" id="period" name="period" class="form-control">';
                 
                       while($row  = $resultPeriod->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                       }
              echo '</select>';
        ?>
       </div>
  

  </div>
     <div class="form-group">
        <label for="programname" class="col-sm-2 control-label">Program Name</label>
  
        <div class="col-sm-4 ">
       
              <?php
                $pr = new projectDAO();
                $prRes=$pr->getPrograms(); 
                
                
                 echo '<select  id="programnameCB" onfocus="setCustomValidity("")" name="programnameCB" class="form-control ">';
                   echo '<option value="no program">no program</option>';
                       while($row  = $prRes->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                       }
                          echo '<option value="other">Other(Specify)</option>';
                        
                       
              echo '</select>';
        ?>
     
            
      <input  type="text" disabled onfocus="setCustomValidity('')" name="programname" class=" form-control"
             id="programname" placeholder="Program Name">
    </div>
  
          <label for="fundsrc" class="col-sm-2 control-label">Location</label>
    <div class="col-sm-4">
   
  
 

        <?php
                $location = new locationDAO();
                $resultLocation =$location->getList(); 
                
                 echo '<select required="required" onfocus="setCustomValidity("")" id="location" name="location" class="form-control">';
                       while($row  = $resultLocation->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'"> '.$row[1].'  '.$row[3].' '.$row[2].'</option>';
                       }
              echo '</select>';
        ?>
    
    </div>
</div>
     <div class="form-group">
           
   <label for="ssector" class="col-sm-2 control-label">Sector</label>
    <div id="sector"   class="col-sm-4">
   

                
              
                 <select required="required" id="ssector" onfocus="setCustomValidity('')"  name="sector" class="form-control">
        <?php
                $sector = new sectorDAO();
                $resultSec =$sector->getList(); 
               
                       while($row  = $resultSec->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           
                        if($row[0]==0){
                           echo '<option class="trigerOpt"   value=""> '.$row[1].'</option>';
                           }else{
                           echo '<option class="trigerOpt"   value="'.$row[0].'"> '.$row[1].'</option>';
                                }
                           }
         
        ?>
                </select>
    
    
    </div>
   
  
 <label for="ssubsector" class="col-sm-2 control-label">Sub-Sector</label>
   

 <div  class="col-sm-4">
   
  
 
<select  id="ssubsector"  onfocus="setCustomValidity('')" name="subsector" class="form-control">';
                 
                 <option value="">No Sub Sector</option>
                
     </select>
       
    
    </div>


    
  </div>
    
                 

        
    
      
  <div class="form-group">



  
    

     <label for="fundsrc" class="col-sm-2 control-label">Fund Source</label>
    <div class="col-sm-4">
   
  
 

        <?php
                $fundsrc = new fundsrcDAO();
                $resultFundSrc =$fundsrc->getList(); 
                 echo '<select required="required" onfocus="setCustomValidity("")" id="fundsrc" name="fundsrc" class="form-control">';
                       while($row  = $resultFundSrc->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[3].' <b>('.$row[2].')</b></option>';
                       }
              echo '</select>';
        ?>
    
    </div>
     <label for="fundsrc" class="col-sm-2 control-label">Typhoon</label>
    <div class="col-sm-4">
   
  
 

        <?php
               $typhoon = new typhoonDAO();
                $resultTyphoon =$typhoon->getList(); 
                echo '<select disabled id="typhoon" onfocus="setCustomValidity("")"  name="typhoon" class="form-control">';
                echo '<option value="0">No Typhoon</option>';
                $resultTyphoon->fetch();
                      while($row  = $resultTyphoon->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                      }
              echo '</select>';
        ?>
    

   
    
    </div>
 
     
     
     
     </div>
 
 
           
  


  
  <div class="form-group">
  <label for="unitofmeasure" class="col-sm-2 control-label">Unit of Measure</label>
       <div class="col-sm-4">
      <input required="required"  onfocus="setCustomValidity('')"  type="text" name="unitofmeasure" class="form-control" id="unitofmeasure" placeholder="Unit of Measure">
    </div>
  

 
 
      <label for="startend" class="col-sm-2 control-label">Project Schedule (Optional)</label>
     
   <div class="col-sm-4">
             
           
             <div class="form-group col-sm-6">
  <label class=" control-label">Date to Start</label>
         
  <input type="month" 
         onfocus="setCustomValidity('')" 
         title="Month and year to start the project"
         class="form-control col-sm-2" id="start" name="datestart" placeholder="Date Start" >
</div>
       <div class="col-sm-1"></div>
  <div class="form-group col-sm-6">
  <label class=" control-label">Completion date</label>

  <input type="month"
         onfocus="setCustomValidity('')" 
         title="Target Month and Date to comply the project"
         class="form-control col-sm-2" id="end" name="dateend"  placeholder="Date End" >

    </div>
    </div>
</div>
    <div class="form-group">
            <div align="center">
      <div class="progress" style="width: 96%;" id="progressbar">
  </div>
</div>
            <label for="projobj" class="col-sm-2 control-label">Project Objective</label>
    <div class="col-sm-4">
   
  
        <textarea maxlength="200"
                  onfocus="setCustomValidity('')" 
                  class="form-control" id="projobj" style="max-width: 100%;" name="projobj" placeholder="Project Objective (200 characters)" ></textarea>
        <p id="charnum"></p>
      
    
    </div>
            
            
    </div>
      
     

  <div align="center" class="form-group">
          <div align="center">
      <div class="progress" style="width: 96%;" id="progressbar">
  </div>
</div>
    <label>
      <input class="datatype" id="maintained" name="datatype"
              type="radio"
              onfocus="setCustomValidity('')" 
              title="Click this if this project is maintained.(This is to identify the formula to be use.LEAVE THIS TO USE THE DEFAULT)"
             value="Maintained"/> Maintained Targets
    </label>
   
      <label>
      <input class="datatype" id="cumulative" name="datatype"
              type="radio"
              onfocus="setCustomValidity('')" 
              title="Click this if this project is maintained.(This is to identify the formula to be use.LEAVE THIS TO USE THE DEFAULT)"
             value="Cumulative"/>  Cumulative Targets
    </label>
      <button type="button" id="deselect"  class="btn btn-primary  btn-xs">Default</button>
      
      
  </div>
  <div class="form-group">
      <div align="center">
      <div class="progress" style="width: 96%;" id="progressbar">
  </div>
</div>

  <label  class="col-sm-2 control-label">Physical Targets</label>
       
   <div class="col-sm-10">
  <div class="col-sm-3">
      <input required="required"  step="0.001"    type="number" name="pq1" 
             onfocus="setCustomValidity('')" 
             id="pq1" class="form-control" placeholder="Quarter 1"/>
    
       </div>
       <div class="col-sm-3">
      <input required="required"   step="0.001" 
             onfocus="setCustomValidity('')" 
             type="number" name="pq2" id="pq2" class="form-control" placeholder="Quarter 2"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"
             onfocus="setCustomValidity('')" 
               step="0.001" 
             name="pq3" id="pq3" class="form-control" placeholder="Quarter 3"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="pq4" id="pq4" class="form-control"  placeholder="Quarter 4"/>
     
       </div>
  
    
  
    </div>
    </div>
  <div class="form-group">
        
  <label  class="col-sm-2 control-label">Financial Requirements</label>
       
  <div class="col-sm-10">
      <div class="col-sm-3">
      <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="fq1" id="fq1" class="form-control" placeholder="Quarter 1"/>
     
       </div>
      
       <div class="col-sm-3">
      <input required="required" type="number" 
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="fq2" id="fq2" class="form-control" placeholder="Quarter 2"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"  step="0.001" 
             onfocus="setCustomValidity('')" 
              name="fq3" id="fq3" class="form-control" placeholder="Quarter 3"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"  step="0.001" 
             onfocus="setCustomValidity('')" 
              name="fq4" id="fq4" class="form-control"  placeholder="Quarter 4"/>
     
       </div>
      
   </div>
  
    
  
    </div>
  <div class="form-group">
        
  <label  class="col-sm-2 control-label">Employment Generated</label>
        <div class="col-sm-10">
  <div class="col-sm-3">
      <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="mdq1" id="mdq1" class="form-control" placeholder="Q1 Male"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number" 
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="mdq2" id="mdq2" class="form-control" placeholder="Q2 Male"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="mdq3" id="mdq3" class="form-control" placeholder="Q3 Male"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number" 
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="mdq4" id="mdq4" class="form-control"  placeholder="Q4 Male"/>
     
       </div>
  <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="wdq1" id="wdq1" class="form-control" placeholder="Q1 Female"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number" 
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="wdq2" id="wdq2" class="form-control" placeholder="Q2 Female"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="wdq3" id="wdq3" class="form-control" placeholder="Q3 Female"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number" 
               step="0.001" 
             onfocus="setCustomValidity('')" 
             name="wdq4" id="wdq4" class="form-control"  placeholder="Q4 Female"/>
     
       </div>
    
  
    </div>
    </div>
    
    
    
  <div class="form-group">
     
        
      <div class="col-sm-2"></div>
  

    <div class=" col-sm-5">
      <input id="btnSubPro" type="submit" 
             title="Before you submit, Please Double check all the data field"
             class="btn btn-primary btn-sm" value="SAVE"/>
   
  
  </div>
  </div>
</form>

          
      </div>
      
    </div>
  </div>
</div>


<!--VIEW-->
<div class="modal fade " id="viewModal" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog " >
    <div class="modal-content" role="document">
      <div class="modal-header">
    
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" >
         
           
           
           
          
                <h5 id="aid"></h5>
    
                <h5 id="aperiod"></h5>
         
                <h5 id="afs"></h5>
  
                <h5 id="pname"></h5>
         
                <h5 id="ploc"></h5>
           
                <h5 id="psec"></h5>
            
                <h5 id="psubsec"></h5>
            
                <h5 id="ptyphoon"></h5>
                <h5 id="pstart"></h5>
                <h5 id="pend"></h5>
          
             
                <h5 id="puom"></h5>
                     <h5 id="dtmv"></h5>
 
          <div class="form-group">
              
              <div class="row">
                  <div class="col-sm-1"></div>
                  
                  <div class="col-sm-3"><b>Physical Targets</b></div>
                  <div class="col-sm-3"><b>Financial Requirements</b></div>
                  <div class="col-sm-3"><b>Man-Days Requirements</b></div>
              </div>
              <div class="row">
                  <div class="col-sm-1"><b>Q1</b></div>
                  <div class="col-sm-3"> <h5 id="tpq1"></h5></div>
                  <div class="col-sm-3"> <h5 id="tfq1"></h5></div>
                  <div class="col-sm-3"> <h5 id="tmdq1"></h5></div>
              
              </div>
              <div class="row">
                  <div class="col-sm-1"><b>Q2</b></div>
                  <div class="col-sm-3"> <h5 id="tpq2"></h5></div>
                  <div class="col-sm-3"> <h5 id="tfq2"></h5></div>
                  <div class="col-sm-3"> <h5 id="tmdq2"></h5></div>
              
              </div>
              <div class="row">
                  <div class="col-sm-1"><b>Q3</b></div>
                  <div class="col-sm-3"> <h5 id="tpq3"></h5></div>
                  <div class="col-sm-3"> <h5 id="tfq3"></h5></div>
                  <div class="col-sm-3"> <h5 id="tmdq3"></h5></div>
              
              </div>
              <div class="row">
                  <div class="col-sm-1"><b>Q4</b></div>
                  <div class="col-sm-3"> <h5 id="tpq4"></h5></div>
                  <div class="col-sm-3"> <h5 id="tfq4"></h5></div>
                  <div class="col-sm-3"> <h5 id="tmdq4"></h5></div>
              
              </div>
          </div>
        
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm " id="deleteModal" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-sm " >
    <div class="modal-content" role="document">
      <div class="modal-header">
    
        <h5 class="modal-title" >Title Here</h5> 
      </div>
      <div class="modal-body" align="center">
         
           
          <button class="btn btn-success" data-dismiss="modal" id="deleteProj" >YES</button>
          <button class="btn btn-danger " data-dismiss="modal" >NO</button>
           
          
            
              </div>
          </div>
        
      </div>
      
    </div>

<div class="modal fade bs-example-modal-lg hide-print" id="pdfModal" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog  modal-lg" >
    <div class="modal-content" role="document">
   
      <div class="modal-body" align="center">
          <div id="pdfShow">
    
            
              </div>
          </div>
        
      </div>
      
    </div>
  </div>
