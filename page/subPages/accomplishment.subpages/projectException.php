  <?Php
  $expCount= new accomplishmentDAO();
  $authExp= new authentication();
  if($authExp->is_admin()=="true"){
  $resultExpCount=$expCount->countNewException(0,$GLOBALS['year']);
  }
  else{
      $resultExpCount=$expCount->countNewException($authExp->userAgency(),$GLOBALS['year']);
  }
  
 
  ?>
<ul class="nav nav-tabs hide-print" role="tablist">

    <?Php if($resultExpCount>0){ ?>
       <li class="active" ><a style="color:red;"  href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } else { ?>
     
     <li class="active" ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } ?>
      
           <li    ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=e5e3a58d20612fd01f79b80b9cab37127e762a5c" 
                                role="tab" >Accomplishment Submission
               </a>
     </li>
     <li ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=ee45c30326b750387589752c0f75e1dd87ddc7e4&quarter=0&agencysmrtbl=0&locations=0&smrySect=0&category=0" 
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
            <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=0f069b5b83dfc0c10744cab1d835b5b3d4188acc" 
                                role="tab" >Form 7</a>
     </li>
       <li  >
        <a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=acbcb17b9d719e70ce79d7169a7f19bc2c2ccb2d" 
                                role="tab" >Form 8</a>
     </li>
  </ul>

<br/>
    <?Php $aauth = new authentication();
      if($aauth->is_admin()=="true"){
          ?>

          <div class="col-sm-2 hide-print ">
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
   
 
<?Php } ?>
  <div class="col-sm-2 hide-print">
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
 <div class="col-sm-4 hide-print">
        <?php
                $category = new fundsrcDAO();
                $resultCat =$category->getList(); 
                 echo '<select placeholder="Fund Source" required="required" id="optfundsrc"  class="form-control">';
 
                 echo '<option value="0">Select all</option>';
                       while($row  = $resultCat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                 echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select>';
        ?>
        
    </div>
 <div class="form-group hide-print  ">
     <div class="col-sm-2">
         <button type="button" value="Load"  class="form-control btn btn-success" id="loadData">
                 Load
             <span class="glyphicon glyphicon-send" ></span>
             
         </button>     
    </div>
    </div>
<br/>

<br/>
<br/>
<br/>

<div class="hide-print scrollY" >
  

<?Php 

$acc = new accomplishmentDAO();
$auth = new authentication();
$ack = new acknowledgementDAO();
 $position = $auth->getCredentials('position');
 $fullname = $auth->getCredentials('fullname');
if(isset($_GET['optyear'])){
if($_GET['optyear']!=0){
$year = $_GET['optyear'];
}
else{
$year=$GLOBALS['year'];
}
}
else{
    $year=$GLOBALS['year'];
}
if(isset($_GET['optfundsrc'])){
$fundsrcI = $_GET['optfundsrc'];
}
else{
$fundsrcI=0;
}
if(isset($_GET['agencysmrtbl'])){
$agencysmrtbl = $_GET['agencysmrtbl'];
}
else{
$agencysmrtbl=0;
}
echo '
    
<table class="tg" id="accomplishmentTableDash">
  <thead>
     <tr>
     ';
if($auth->is_admin()=='true'){
echo '<th class="tg-e3zv">Agency</th>';
}

echo '<th  class="tg-e3zv">Status</th>
    <th class="tg-e3zv">Project Exception</th>
  </tr>
  </thead>
  <tbody>
  <tr>
';



if($auth->is_admin()=='true'){
$result=$acc->getMyProjex($agencysmrtbl,$year,$fundsrcI);

}else{
$result=$acc->getMyProjex($auth->userAgency(),$year,$fundsrcI);    
}



$dues = new duedatesDAO();
    $q1dateremaining  = $dues->remainingDays(867423);
    $q2dateremaining  = $dues->remainingDays(875858);
    $q3dateremaining  = $dues->remainingDays(899079);
    $q4dateremaining  = $dues->remainingDays(987898);

  
$checkDuplicate = array(0=>null);
$ctr = 0;
    function isDuplicate($value,$key){
    $rt=true;   
        
        foreach($value as $row){
          
            if($row==$key){
           
                $rt = false;
          break; 
        }
          
            
        }
        return $rt;
    }
    $ctrAll = 0;
foreach($result as $row){

         $countSllipage=$expCount->countExcep($row['agencyid'],$year);
if($countSllipage>0){
       
    if(isDuplicate($checkDuplicate,$row['agencyid'])){
        $checkDuplicate[$ctr] = $row['agencyid'];
         $ctrAll++;
  $ctr++;
    if($auth->is_admin()=='true'){
echo '<td class="tg-yw4l" id="agencyCode"> <h2 align="center"><br/>'.$row['agencycode'].'</h2> </td>';   
    }

echo ' 
 <td class="tg-yw4l">
 


 <div class="list-group">
';
 if($row['q1datesub']==NULL){
    if($q1dateremaining<=0){
        if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                    data-quarter="1"
                       data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                    data-year='.$year.'
                    data-fundsrc='.$fundsrcI.'
                    >Quarter 1 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 1 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
        }
          
          
    }else{
        
        if($row['q1datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                     data-fundsrc='.$fundsrcI.'
                         
                     >Quarter 1 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q1datesave'].' | Saved by: '.$row['q1savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                         
                     >Quarter 1 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }                  
          }
}
 else {
     
     if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"     
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 1 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q1datesub'].' | Submit by: '.$row['q1submittor'].')</a>';
     
  
     }else{  
      if($q1dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 1 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q1datesub'].' | Submit by: '.$row['q1submittor'].')</a>';
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                    data-quarter="1"    
                       data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                    data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 1 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q1datesub'].' | Submit by: '.$row['q1submittor'].')</a>';
     
          }
  }
 }
 if($row['q2datesub']==NULL){
    if($q2dateremaining<0){
          if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                >Quarter 2 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 2 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
        }
        
        
        }else{
               if($row['q2datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 2 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q2datesave'].' | Saved by: '.$row['q2savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 2 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    } 
}
 else {

          if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q2datesub'].' | Submit by: '.$row['q2submittor'].')</a>';
     
  
     }else{      
         if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2" 
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q2datesub'].' | Submit by: '.$row['q2submittor'].')</a>';
     
  
     }else{  
     if($q2dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 2 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q2datesub'].' | Submit by: '.$row['q2submittor'].')</a>';
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"  
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q2datesub'].' | Submit by: '.$row['q2submittor'].')</a>';
     
          }
  }
  }
     
     
     
     }
 if($row['q3datesub']==NULL){
    if($q3dateremaining<0){
          if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                >Quarter 3 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 3 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
        }
        
        
        }else{
               if($row['q3datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 3 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q3datesave'].' | Saved by: '.$row['q3savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 3 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    } 
}
 else {

          if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"   
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 3 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q3datesub'].' | Submit by: '.$row['q3submittor'].')</a>';
     
  
     }else{      
         if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3" 
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 3 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q3datesub'].' | Submit by: '.$row['q3submittor'].')</a>';
     
  
     }else{  
     if($q3dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 3 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q3datesub'].' | Submit by: '.$row['q3submittor'].')</a>';
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"  
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q3datesub'].' | Submit by: '.$row['q3submittor'].')</a>';
     
          }
  }
  }
     
     
     
     }

 if($row['q4datesub']==NULL){
    if($q4dateremaining<0){
         if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter=4
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                >Quarter 4 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 4 <span class="glyphicon glyphicon-remove"></span> Close for Submission</a>';
        }
        }else{
                 if($row['q4datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 4 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q4datesave'].' | Saved by: '.$row['q4savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
                     >Quarter 4 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    }

  
}
 else {
 
          if($auth->is_admin()=='true'){
              
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                        data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year='.$year.'
                         data-fundsrc='.$fundsrcI.'
>
      Quarter 4 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q4datesub'].' | Submit by: '.$row['q4submittor'].')</a>';
     
  
     }else{  
         
          if($q4dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 4 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q4datesub'].' | Submit by: '.$row['q4submittor'].')</a>
          
';
  
  
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal"  data-backdrop="static" 
                    data-target="#submitExceptionModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                    data-quarter="4"  
                       data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                    data-year='.$year.'
                    data-fundsrc='.$fundsrcI.'
>
      Quarter 4 <span class="glyphicon glyphicon-ok"></span> Submitted (Date Submitted: '.$row['q4datesub'].' | Submit by: '.$row['q4submittor'].')</a>';
     
          }
  }
     
     
     }

echo '

</div>


';




echo '



</td>
    
 <td class="tg-yw4l" align="center" style="width:50px;">
 
<div  class="btn-group-vertical " >

';
$ackn = $ack->getByAgencyforExp($row['yrenrolled'], $row['agencyid']);
$q1Tri=true;
$q2Tri=true;
$q3Tri=true;
$q4Tri=true;
 while($row = $ackn->fetch(PDO::FETCH_ASSOC)){
     
     if($q1Tri&&$row['q1datesub']!=""){
         $q1Tri =false;
echo '
<button class="btn btn-info " 
 data-toggle="modal"  data-backdrop="static" 
                    data-target="#exceptionOut" 
                    data-idd="'.$row['agencyid'].'" 
                 
             
                    data-quarter="1"
                    data-year='.$row['yrenrolled'].'
title="Print Report for ">
    <span class="glyphicon glyphicon-print"></span> Q1</button>
';


 }
     if($q2Tri&&$row['q2datesub']!=""){
          $q2Tri =false;
echo '
<button class="btn btn-info " 
 data-toggle="modal"  data-backdrop="static" 
                    data-target="#exceptionOut" 
                     data-idd="'.$row['agencyid'].'" 
            
             
                    data-quarter="2"
                      data-year='.$row['yrenrolled'].'
title="Print Report for ">
    <span class="glyphicon glyphicon-print"></span> Q2</button>
';


 }
     if($q3Tri&&$row['q3datesub']!=""){
          $q3Tri =false;
echo '
<button class="btn btn-info " 
 data-toggle="modal"  data-backdrop="static" 
                    data-target="#exceptionOut" 
                   data-idd="'.$row['agencyid'].'" 
  
             
                    data-quarter="3"
                      data-year='.$row['yrenrolled'].'
title="Print Report for ">
    <span class="glyphicon glyphicon-print"></span> Q3</button>
';


 }
     if($q4Tri&&$row['q4datesub']!=""){
          $q4Tri =false;
echo '
<button class="btn btn-info " 
 data-toggle="modal"  data-backdrop="static" 
                    data-target="#exceptionOut" 
                    data-idd="'.$row['agencyid'].'" 
             
                    data-quarter="4"
                     data-year='.$row['yrenrolled'].'
title="Print Report for ">
    <span class="glyphicon glyphicon-print"></span> Q4</button>
';


 }

 }
echo '

</div>


</td>
    
  </tr>
  ';
}

}
}

echo'
  </tbody>
</table>
<br/>
<br/>
        ';
       
        ?>
        

      
</div>
<br/>

<?Php echo        $ctrAll ." Participating Entities for ".$year; ?>
<div class="modal fade bs-example-modal-lg" id="exceptionOut" tabindex="-1" 
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



<div class="modal fade bs-example-modal-lg" id="submitExceptionModal" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
  
        <h5 class="modal-title" >Title Here</h5> 
        
   
        
      </div>
      <div class="modal-body" >
          
          <div id="forsample"></div>
          
          
              <form id="projexceptionSubmission"  class="form-horizontal">
          <?Php
          echo '
                  <div class ="scrollY">   
          <table class="tg tblAccom">
          <thead>
  <tr>
   
    <th class="tg-amwm" ><br>Project</th>
    <th class="tg-amwm" ><br>Findings</th>
    <th class="tg-amwm" ><br>Possible Reason/Cause</th>
    <th class="tg-amwm" ><br>Recomendation</th>

  
  </tr>

  </thead>
  <tbody>
          ';
  
        
  
          echo '
          </tbody>
</table>
 </div>
          ';
        
  ?>        
                  <br/>       
           
                  <div class="form-group  ">
               
             <div class="well">
               <div class="checkbox" id="term">  
                
                 
                </div>
               </div> 
                      <div class="col-md-offset-4   ">  
                <div class="col-sm-5">
                <input class="form-control  " required id="name" name="name" placeholder="NAME"/>
                </div>
                <div class="col-sm-4">
                <input class="form-control " required id="desig" name="desig" placeholder="Designation"/>
                </div>
                 <div class=" btn-group " aria-label="Action">
                <input type="submit" 
                    
                       name="submit" id="submitAcc"  class=" btn btn-primary btn-md" value="Submit" />
               
           
               
                <input type="submit"  name="save" id="saveAcc" class=" btn btn-info btn-md" value="Save"/>
            </div>
                      </div>
                      
             
        </div>
                  
                  <input name="quarter" style="width: 0px;height: 0px;padding: 0;margin: 0;" id="quarter"/>
            </form>
   
      
         
      </div>
      
    </div>
  </div>
</div>




<br/>

<br/>

