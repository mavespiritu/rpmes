<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?Php 
$ordering  = new projectDAO();
$ausss  = new authentication();
if(isset($_GET['agencyAdd'])){
$agss =  $_GET['agencyAdd'];
}else {
$agss = $ausss->userAgency();
}

$projNUm = $ordering->getLastNoOfProj($agss)+1;

?>


       <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
       <?Php $dues = new duedatesDAO();
    $remaining  = $dues->remainingDays(123456);
     $auth = new authentication();
     
    if($auth->is_admin()=="true"){
    echo ' <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
                                role="tab" >Add Project</a>';
        
    }else{
        
    
    
    if($remaining>=0){
          
    echo ' <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442" 
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
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=df6fa782e0f764e1f6218e852cecba2953f7c7cb" 
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


       &nbsp;
    
<form id="addProject"   class="form-horizontal">
       
          
     <div class="form-group">
         
          <?php
        if($auth->is_admin()=='true'){
            
        
       
                $agency = new agencyDAO();
                $result =$agency->getList(); 
                 echo '<label for="agencyAdd" class="col-sm-2 control-label">Agency</label>
   

                     <div class="col-sm-4">
                     <select required="required" id="agencyAdd" onfocus="setCustomValidity("")" name="agency" class="form-control">';
                       while($row  = $result->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select> 
                  </div>';
        
        }
              ?>    
         <label for="agency" class="col-sm-2 control-label">Project Number</label>
         <div class="col-sm-1">
             <input readonly value="<?Php echo $projNUm; ?>" type="text" 
                    name="ordering" 
                    id="ordering" 
                    class="form-control"/>
         </div>
         
     </div>
    
    
     <div class="form-group">
  
  <label for="projectname" class="col-sm-2 control-label">Project Name</label>
       <div class="col-sm-4">
      <input required="required" type="text" name="projectname" onfocus="setCustomValidity('')" class="form-control" id="projectname" placeholder="Project Name">
    </div>
  
  <label for="period" class="col-sm-2 control-label">Period</label>
       <div class="col-sm-4">
     
        <?php
                $period = new periodDAO();
                $resultPeriod=$period->getList(); 
                
                 echo '<select required="required" id="period" onfocus="setCustomValidity("")" name="period" class="form-control">';
                 
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
                
                
                 echo '<select  id="programnameCB" name="programnameCB" onfocus="setCustomValidity("")" class="form-control ">';
                   echo '<option value="no program">no program</option>';
                       while($row  = $prRes->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                       }
                          echo '<option value="other">Other(Specify)</option>';
                        
                       
              echo '</select>';
        ?>
     
            
      <input  type="text" disabled  name="programname" class=" form-control"
              onfocus="setCustomValidity('')"
             id="programname" placeholder="Program Name">
    </div>
  
          <label for="fundsrc" class="col-sm-2 control-label">Location</label>
    <div class="col-sm-4">
   
  
 

        <?php
                $location = new locationDAO();
                $resultLocation =$location->getList(); 
                
                 echo '<select required="required" id="location"
                     onfocus="setCustomValidity("")"
                    name="location" class="form-control">';
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
   
  
 
<select id="ssubsector" name="subsector" required="required" onfocus="setCustomValidity('')" class="form-control">';
                 
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
                       while($row  = $resultFundSrc->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT))
                        {
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
                echo '<select disabled id="typhoon" name="typhoon" onfocus="setCustomValidity("")" class="form-control">';
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
      <input required="required" onfocus="setCustomValidity('')"  type="text" name="unitofmeasure" class="form-control" id="unitofmeasure" placeholder="Unit of Measure">
    </div>
  

 
 
      <label for="startend" class="col-sm-2 control-label">Project Schedule (Optional)</label>
     
   <div class="col-sm-4">
             
           
             <div class="form-group col-sm-12">
  <label class=" control-label">Date to Start</label>
         
  <input type="month" 
         title="Month and year to start the project"
         onfocus="setCustomValidity('')"
         class="form-control col-sm-2" id="start" name="datestart" placeholder="Date Start" >
</div>
       <div class="col-sm-1"></div>
  <div class="form-group col-sm-12">
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
            <label for="projobj" class="col-sm-2 control-label">Project Result</label>
    <div class="col-sm-4">
      <?php 
        $objectives = array(
          'Accountability and Efficiency in Governance Measures Improved',
          'Public Access to Information Enhanced', 
          'Revenue Collections Enhanced', 
          'Responsiveness, Transparency and Accountability in the Administration of Justice Enhanced', 
          'Access to Justice Enhanced', 
          'Enhance Community Engagement by Instilling Values of Culture and Concept of Cultural Diversity', 
          'Stronger Regional Culture', 
          'Cultural Awareness of People Increased', 
          'Agri-based Enterprise Sustained', 
          'Farmers/Fisherfolks Income Sustained', 
          'Farmers/Fisherfolks Productivity Sustained',
          'Adaptation to Climate Risk and Disasters Increased',
          'Industry and Services Growth Sustained',
          'Access to Market Expanded',
          'Access to Financing Enhanced',
          'High Productivity Achieved',
          'Tourism Arrivals Sustained',
          'Access to Tourism-related Services Enhanced',
          'Access to Quality Health Services Improved',
          'Universal Quality Basic Education Achieved',
          'Access to Quality and Affordable Education Improved',
          'Access to Industry-driven Skills Training Improved',
          'Increased Levels of Opportunities for, and Access to Decent & Productive Work',
          'Social Insurance Coverage for the Poor, Vulnerable and Marginalized',
          'Access to Quality and Empowering Social Welfare and Safety Nets Improved',
          'Improved Access to Affordable, Disaster Resilient and Climate Change Adaptive Housing',
          'Improved Access to Adolescent Reproductive Health Service',
          'Responsive Family Planning and Reproductive Health Information and Services Achieved',
          'New Technologies/Innovation Adopted and Promoted',
          'Innovation Capacities Improved',
          'Low and Stable Inflation Maintained',
          'Unemployment and Underemployment Decreased',
          'Poverty Incidence Decreased',
          'Robust Economic Growth Sustained',
          'Export Receipts Increased',
          'Business Climate Enhanced',
          'Internal Stability and Public Safety Ensured',
          'Internal Security Ensured',
          'Travel Time Reduced/Transportation and Production Costs Reduced',
          'Access to Social Facilities Increased',
          'Access to Information Improved',
          'Productivity Increased',
          'Other Strategies',
          'Environment Quality Improved: Water Quality',
          'Environment Quality Improved: Air Quality',
          'Environment Quality Improved: Land Quality',
          'Biodiversity Protected',
          'Human Well-Being Ensured'
        );

        sort($objectives);
      ?>

        <select id="projobj" name="projobj" class="form-control">
          <option>Select Project Result</option>
          <?php foreach($objectives as $objective){ ?>
            <option value="<?php echo $objective ?>"><?php echo $objective ?></option>
          <?php } ?>
        </select>      
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
      <input required="required" step="0.001"   type="number" name="pq1" 
             onfocus="setCustomValidity('')"
             id="pq1" class="form-control" placeholder="Quarter 1"/>
    
       </div>
       <div class="col-sm-3">
      <input required="required"  step="0.001"
             onfocus="setCustomValidity('')"
             type="number" name="pq2" id="pq2" class="form-control" placeholder="Quarter 2"/>
     
       </div>
       <div class="col-sm-3">
      <input required="required" type="number"
              step="0.001"
             onfocus="setCustomValidity('')"
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
       <div class="col-sm-3">
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

