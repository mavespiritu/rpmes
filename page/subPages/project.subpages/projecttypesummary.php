
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
<br/>

&nbsp;
    &nbsp;
<div class="row hide-print">
     <div class="form-group col-sm-12 ">
<div class="col-sm-4">
    <div class="input-group ">
      <div class="input-group-addon">By :</div>
      <select required="required" id="smryChoiceBy"   name="smryChoiceBy"
                     class="form-control ">
                  
                     <option value="2"> Location</option>
                     <option value="3"> Funding Source</option>
                     <option value="4"> Implementing Period</option>
                     <option value="5"> Agency</option>
                     <option value="6"> Sector</option>
                   

                 </select>
   
    </div>
         </div>
         <div class="col-sm-2" >
         <button onclick="window.print()"  class=" btn btn-success btn-sm  hide-print" >
          <p class="glyphicon glyphicon-print"></p> Print Content</button>
        </div>
  </div>
</div>
      
 
    <div class="table-responsive scrollY">
        <?Php

            $project = new monitoringplanDAO();
            if(isset($_GET['ChoiceBy'])){
                switch ($_GET['ChoiceBy']){
          
                case 2:
                
                $result = $project->getOverallLocation();
                break;
                case 3:
                
                $result = $project->getOverallFunding();
                break;
             
                
                case 4:
                
                $result = $project->getOverallImplementing();
                break;
                case 5:
                
                $result = $project->getOverallAgency();
                break;
                case 6:
                
                $result = $project->getOverallSector();
                break;
             
                }
            }
            else{
                $result = $project->getOverallProjectType(); 
            }

echo '

<table class="tg table saveExcel">
    <thead>
        <tr>
      <td class="topHeader" colspan="5"  align="center">(1)</td>
      <td class="topHeader" align="center">(2)</td>
      <td class="topHeader" align="center">(3)</td>
      <td class="topHeader" align="center">(4)</td>
      <td class="topHeader" align="center">(5)</td>
      <td class="topHeader" align="center">(6)</td>
      <td class="topHeader" align="center">(7)</td>
      <td class="topHeader" align="center">(8)</td>
      <td class="topHeader" align="center">(9)</td>
      <td class="topHeader" align="center">(10)</td>
      <td class="topHeader" align="center">(12)</td>
      <td class="topHeader" align="center">(13)</td>
      <td class="topHeader" align="center">(14)</td>
      <td class="topHeader" align="center">(15)</td>
      <td class="topHeader" align="center">(16)</td>
      <td class="topHeader" align="center">(17)</td>
 
  </tr>
  <tr>
    <th class="tg-wide" colspan="5" rowspan="3">Project Category</th>
    <th class="tg-nhqr" colspan="5">Financial Requirements (P 000)</th>
    <th class="tg-nhqr" colspan="5">Number of Projects</th>
    
    <th class="tg-nhqr" colspan="5">Man-Days Requirements</th>
  </tr>
  <tr>
        <th class="tg-nhqr" colspan="4">Implementation Schedule</th>
    <th class="tg-acrz" rowspan="2"><br>Total</th>
    <th class="tg-nhqr" colspan="4">Implementation Period</th>
    <th class="tg-acrz" rowspan="2"><br>Total</th>
  
    <th class="tg-nhqr" colspan="4">Job-Generation Schedule</th>
    <th class="tg-acrz" rowspan="2"><br>Total</th>
  </tr>
  <tr>
    <th class="tg-acrz">Q1</th>
    <th class="tg-acrz">Q2</th>
    <th class="tg-acrz">Q3</th>
    <th class="tg-acrz">Q4</th>
    <th class="tg-acrz">Q1</th>
    <th class="tg-acrz">Q2</th>
    <th class="tg-acrz">Q3</th>
    <th class="tg-acrz">Q4</th>
    <th class="tg-acrz">Q1</th>
    <th class="tg-acrz">Q2</th>
    <th class="tg-acrz">Q3</th>
    <th class="tg-acrz">Q4</th>
  </tr>
    </thead>
    <tbody class="tody">
  
        ';

$i=0;
foreach ($result as $val)  {
    if(sizeof($result)==++$i){

echo '       <tr class="bold">


<td colspan="5" class="tg-yw4l ">'.$val['name'].'</td>
';


}
else{
    echo '       <tr>
    

<td colspan="5" class="tg-yw4l">'.$val['name'].'</td>
';

}


echo '
        


        <td class="tg-yw4l">'.number_format($val['fq1']/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val['fq2']/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val['fq3']/1000,2).'</td>
        <td class="tg-yw4l">'.number_format($val['fq4']/1000,2).'</td>


        <td class="tg-yw4l">'.number_format(($val['fq1']+$val['fq1']+$val['fq1']+$val['fq1'])/1000,2).'</td>

            

        <td class="tg-yw4l">'.$val['pq1'].'</td>
        <td class="tg-yw4l">'.$val['pq2'].'</td>
        <td class="tg-yw4l">'.$val['pq3'].'</td>
        <td class="tg-yw4l">'.$val['pq4'].'</td>

        <td class="tg-yw4l">'.($val['pq1']+$val['pq2']+$val['pq3']+$val['pq4']).'</td>
        

        <td class="tg-yw4l">'.$val['mq1'].'</td>
        <td class="tg-yw4l">'.$val['mq2'].'</td>
        <td class="tg-yw4l">'.$val['mq3'].'</td>
        <td class="tg-yw4l">'.$val['mq4'].'</td>

        <td class="tg-yw4l">'.($val['mq1']+$val['mq2']+$val['mq3']+$val['mq4']).'</td>

      </tr>
    ';
      

    
}
    
    
    ?></div>
    
  
     