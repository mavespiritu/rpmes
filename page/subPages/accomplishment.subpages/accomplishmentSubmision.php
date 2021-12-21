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
     
     <li  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=6697cc2bed9832fb26d191b905344b711c0b771b" 
                                role="tab" >Project Exception
               </a>
     </li>
     <?Php } ?>
           <li  class="active"  ><a href="?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=b0495f6e0571f5427f7a35c8c1162944f2b496e9&accomplish=e5e3a58d20612fd01f79b80b9cab37127e762a5c" 
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
<div>
  <div class=" form-group col-sm-2 hide-print">
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
 <div class="form-group col-sm-4 hide-print">
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
  
<?Php $auths = new authentication();  if($auths->is_admin() == "true"){      ?>
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
         <button  class="form-control btn btn-success" id="loadData">    Load
             <span class="glyphicon glyphicon-send" ></span></button>     
    </div>
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
$totalSub = 0;
 $position = $auth->getCredentials('position');
 $fullname = $auth->getCredentials('fullname');

$isadmin = "false";
if($auth->is_admin()=="true")
{
    $isadmin = "true";
}
else{
    $isadmin = "false";
}
if(isset($_GET['optyear'])){
$year = $_GET['optyear'];
}
else{
    $year=$GLOBALS['year'];
}
if(isset($_GET['optfundsrc'])){
$fundsrc = $_GET['optfundsrc'];
}
else{
$fundsrc=0;
}
  if($auth->is_admin()=="true"){
      if(isset($_GET['agencysmrtbl'])){
      $agencyI = $_GET['agencysmrtbl'];
      }
      else{
          $agencyI = 0;
      }
      
  }else{
      $agencyI = 0;
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
    <th class="tg-e3zv">Project Result</th>
    <th class="tg-e3zv">Acknowledgement</th>
  </tr>
  </thead>
  <tbody>
  <tr>
';



if($auth->is_admin()=='true'){
$result=$acc->getAll($agencyI,$year,$fundsrc)->fetchAll(PDO::FETCH_ASSOC);
}else{
$result=$acc->getMyProj($auth->userAgency(),$year,$fundsrc)->fetchAll(PDO::FETCH_ASSOC);    
}



$dues = new duedatesDAO();

    $q1dateremaining  = $dues->remainingDays(428456);
    $q2dateremaining  = $dues->remainingDays(545652);
    $q3dateremaining  = $dues->remainingDays(562856);
    $q4dateremaining  = $dues->remainingDays(851254);
     
  
foreach($result as $row){
    if($auth->is_admin()=='true'){
        
$totalSub++;
        
echo '<td class="tg-yw4l" id="agencyCode"> <h2 align="center"><br/>'.$row['agencycode'].'</h2> </td>';   
    }

echo ' 
 <td class="tg-yw4l">
 <div class="list-group">
';

 if($row['q1datesub']==NULL){
    if($q1dateremaining<0){
        if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                    title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"
                     data-datesub="'.$row['q1datesub'].'"
                     data-datesave="'.$row['q1datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
                    >Quarter 1 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 1 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
        }
          
          
    }else{
        
        if($row['q1datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"   
                     data-datesub="'.$row['q1datesub'].'"
                         data-datesave="'.$row['q1datesave'].'"
                    data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                   
                     data-fundsrc="'.$fundsrc.'"
                         
                     >Quarter 1 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q1datesave'].' | Saved by: '.$row['q1savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"   
                     data-datesub="'.$row['q1datesub'].'"
                         data-datesave="'.$row['q1datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
                         
                     >Quarter 1 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
          
          
          
          }

  
}
 else {
     
     if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"   
                     data-datesub="'.$row['q1datesub'].'"  
                         data-datesave="'.$row['q1datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 1 <span class="glyphicon glyphicon-ok"></span><br/>  Date Submitted: '.$row['q1datesub'].' | Submitted by: '.$row['q1submittor'].'';
  
  if($row['q1datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q1datesave'].' | Modified by: '.$row['q1savior'].')';
  }
  echo'</a>';
     
  
     }else{  
      if($q1dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 1 <span class="glyphicon glyphicon-ok"></span> Date Submitted: '.$row['q1datesub'].' | Submitted by: '.$row['q1submittor'].'';
        
  if($row['q1datesave']!=NULL){
      echo '<br/> Date Modified: '.$row['q1datesave'].' | Modified by: '.$row['q1savior'].'';
  }
  echo'</a>';
          
  
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="1"  
                     data-datesub="'.$row['q1datesub'].'"  
                         data-datesave="'.$row['q1datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 1 <span class="glyphicon glyphicon-ok"></span> Date Submitted: '.$row['q1datesub'].' | Submitted by: '.$row['q1submittor'].'';
                
    if($row['q1datesave']!=NULL){
      echo '<br/>Modified (Date Saved: '.$row['q1datesave'].' | Modified by: '.$row['q1savior'].')';
  }
  echo'</a>';
     
          }
  }
 }
 if($row['q2datesub']==NULL){
    if($q2dateremaining<0){
          if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"
                     data-datesub="'.$row['q2datesub'].'"
                         data-datesave="'.$row['q2datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
                >Quarter 2 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 2 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
        }
        
        
        }else{
               if($row['q2datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"  
                     data-datesub="'.$row['q2datesub'].'" 
                         data-datesave="'.$row['q2datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 2 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q2datesave'].' | Saved by: '.$row['q2savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"   
                     data-datesub="'.$row['q2datesub'].'"
                         data-datesave="'.$row['q2datesave'].'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 2 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    }

  
}
 else {

          if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2" 
                     data-datesub="'.$row['q2datesub'].'" 
                         data-datesave="'.$row['q2datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q2datesub'].' | Submitted by: '.$row['q2submittor'].'';
   if($row['q2datesave']!=NULL){
      echo '<br/> Date Modified: '.$row['q2datesave'].' | Modified by: '.$row['q2savior'].')';
  }
  echo'</a>';
     
  
     }else{      
         if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2" 
                     data-datesub="'.$row['q2datesub'].'"
                         data-datesave="'.$row['q2datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span><br/>  Date Submitted: '.$row['q2datesub'].' | Submitted by: '.$row['q2submittor'].'';
   if($row['q2datesave']!=NULL){
      echo '<br/> Date Modified: '.$row['q2datesave'].' | Modified by: '.$row['q2savior'].'';
  }
  echo'</a>';
     
  
     }else{  
     if($q2dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 2 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q2datesub'].' | Submitted by: '.$row['q2submittor'].')';
   if($row['q2datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q2datesave'].' | Modified by: '.$row['q2savior'].')';
  }
  echo'</a>';
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="2"  
                     data-datesub="'.$row['q2datesub'].'"
                         data-datesave="'.$row['q2datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 2 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q2datesub'].' | Submitted by: '.$row['q2submittor'].'';
   if($row['q2datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q2datesave'].' | Modified by: '.$row['q2savior'].'';
  }
  echo'</a>';
     
          }
  }
  }
     
     
     
     }
 if($row['q3datesub']==NULL){
    if($q3dateremaining<0){
             if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"
                     data-datesub="'.$row['q3datesub'].'"
                         data-datesave="'.$row['q3datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                >Quarter 3 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 3 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
        }
        
        
        }else{
                 if($row['q3datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3" 
                     data-datesub="'.$row['q3datesub'].'"
                          data-datesave="'.$row['q3datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 3 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q3datesave'].' | Saved by: '.$row['q3savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3" 
                     data-datesub="'.$row['q3datesub'].'"
                          data-datesave="'.$row['q3datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 3 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    }

  
}
 else {
  
         if($auth->is_admin()=='true'){
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3" 
                     data-datesub="'.$row['q3datesub'].'"  
                          data-datesave="'.$row['q3datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 3 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q3datesub'].' | Submitted by: '.$row['q3submittor'].')';
   if($row['q3datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q3datesave'].' | Modified by: '.$row['q3savior'].'';
  }
  echo'</a>';
     
  
     }else{  
         if($q3dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 3 <span class="glyphicon glyphicon-ok"></span><br/>Date Submitted: '.$row['q3datesub'].' | Submitted by: '.$row['q3submittor'].')';
      if($row['q3datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q3datesave'].' | Modified by: '.$row['q3savior'].'';
  }
  echo'</a>';
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="3"  
                     data-datesub="'.$row['q3datesub'].'"
                          data-datesave="'.$row['q3datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 3 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q3datesub'].' | Submitted by: '.$row['q3submittor'].'';
                 if($row['q3datesave']!=NULL){
      echo '<br/>Modified (Date Saved: '.$row['q3datesave'].' | Modified by: '.$row['q3savior'].')';
  }
  echo'</a>';
     
          }
  } 
     
     
  }
 if($row['q4datesub']==NULL){
    if($q4dateremaining<0){
         if($auth->is_admin()=='true'){
          echo '<a  class="list-group-item list-group-item-danger"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter=4
                     data-datesub="'.$row['q4datesub'].'"
                          data-datesave="'.$row['q4datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                >Quarter 4 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
          
         }else{
              echo '<a  class="list-group-item list-group-item-danger">Quarter 4 <span class="glyphicon glyphicon-remove"></span> Closed for Submission</a>';
        }
        }else{
                 if($row['q4datesave']!=NULL){
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                     data-datesub="'.$row['q4datesub'].'"
                         data-datesave="'.$row['q4datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 4 <span class="glyphicon glyphicon-time"></span> Saved but not yet submitted (Date Saved: '.$row['q4datesave'].' | Saved by: '.$row['q4savior'].')</a>';
   
    }
        else{
          echo '<a  class="list-group-item list-group-item-warning"
              
        title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                     data-datesub="'.$row['q4datesub'].'"
                         data-datesave="'.$row['q4datesave'].'"
                     data-year="'.$year.'"
                     data-isadmin = "'.$isadmin.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
                     >Quarter 4 <span class="glyphicon glyphicon-time"></span> Open for Submission</a>';
   
    }
    }

  
}
 else {
 
          if($auth->is_admin()=='true'){
              
  echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                     data-quarter="4" 
                     data-datesub="'.$row['q4datesub'].'"
                         data-datesave="'.$row['q4datesave'].'"
                     data-isadmin = "'.$isadmin.'"
                     data-year="'.$year.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                         data-fundsrc="'.$fundsrc.'"
>
      Quarter 4 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q4datesub'].' | Submitted by: '.$row['q4submittor'].'';
      if($row['q4datesave']!=NULL){
      echo '<br/>Date Modified: '.$row['q4datesave'].' | Modified by: '.$row['q4savior'].'';
  }
  echo'</a>';
     
  
     }else{  
         
          if($q4dateremaining<0){
  echo '<a  class="list-group-item list-group-item-success">
      Quarter 4 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q4datesub'].' | Submitted by: '.$row['q4submittor'].'';
    if($row['q4datesave']!=NULL){
      echo '<br/> Date Modified: '.$row['q4datesave'].' | Modified by: '.$row['q4savior'].'';
  }
  echo'</a>';  
  
  
  
          }else{
                echo '<a  class="list-group-item list-group-item-success"
     data-toggle="modal" data-backdrop="static" 
                    data-target="#submitAccomplishmentModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-title="'.$row['agencycode'].'"
                    data-quarter="4"  
                     data-datesub="'.$row['q4datesub'].'"
                         data-datesave="'.$row['q4datesave'].'"
                     data-isadmin = "'.$isadmin.'"
                    data-year="'.$year.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                    data-fundsrc="'.$fundsrc.'"
>
      Quarter 4 <span class="glyphicon glyphicon-ok"></span><br/> Date Submitted: '.$row['q4datesub'].' | Submitted by: '.$row['q4submittor'].'';
                    if($row['q4datesave']!=NULL){
      echo '<br/> Date Modified: '.$row['q4datesave'].' | Modified by: '.$row['q4savior'].'';
  }
  echo'</a>';
     
          }
  }
     
     
     }

     
     
echo '

</div>


';

echo '
    
</td>
    ';


//end of row

//start of row  


$countd = $acc->getCountMyForm4($row['agencyid']);
echo ' 
 <td class="tg-yw4l " style="width:230px;">

';

 if($countd>0){ 
   
          echo '
               <div class="list-group">
<a  class="list-group-item list-group-item-warning"
                 title="Submit Accomplishment Report"  
                    data-toggle="modal" data-backdrop="static" 
                    data-target="#ProjectResultModal" 
                    data-idd="'.$row['agencyid'].'" 
                    data-isadmin = "'.$isadmin.'"
                    data-year = "'.$year.'"
                    data-fullname="'.$fullname.'"
                    data-position="'.$position.'"
                    data-agencycode="'.$row['agencycode'].'" 
                    >'.$countd.' Project already completed. Click to  to submit project result</a>
                    </div>
'; 
          
     
          
    

  
}



echo '
    
</td>
    ';


//end of row




echo '
 <td class="tg-yw4l" align="center" style="width:50px;">
 
<div  class="btn-group-vertical " >

';
$ackn = $ack->getByAgencyforAck($row['yrenrolled'], $row['agencyid']);

 while($row = $ackn->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
     
     if($row[2]!=""&&$row[3]!=""){
echo '
<button class="btn btn-info " 
 data-toggle="modal" data-backdrop="static" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[0].'" 
                    data-title="'.$row[6].'"
                    data-findings="'.$row[2].'"
                    data-action="'.$row[3].'"
                    data-quarter="'.$row[1].'"
                    data-year='.$row[5].'
title="Print Report for ">
    <span class="glyphicon glyphicon-print"></span> Q'.$row[1].'</button>
';


 }
 }
echo '

</div>


</td>
    
  </tr>
  ';
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
<?Php echo        $totalSub ." Participating Entities for ".$year; ?>
<div class="modal fade bs-example-modal-lg" id="acknowledgeOut" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" ></h5> 
      </div>
      <div class="modal-body" >
          
     
      </div>
      
    </div>
  </div>
</div>
         


<div class="modal fade " id="submitAccomplishmentModal" tabindex="-1" 
     role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content"  role="document">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        <h5 class="modal-title" >Title Here</h5> 
        
        
      </div>
      <div class="modal-body" >
          
          <div id="forsample"></div>
          
     
              <form id="accomplishmentSubmission"  class="form-horizontal">
     <div id="tableHere"></div>
                  <br/>       
           
                  <div class="form-group  ">
               
             <div class="well">
               <div class="checkbox" id="term">  
                
                 
                </div>
               </div> 
                      <div class="col-md-offset-4   "> 
                          
                      <?Php if($auth->is_admin()=="true"){ ?>    
                <div class="col-sm-5">
                <input class="form-control  "  required id="name" name="name" placeholder="NAME"/>
                </div>
                <div class="col-sm-4">
                <input class="form-control "  required id="desig" name="desig" placeholder="Designation"/>
                </div>
                          <?Php }else{ ?>
                          
                <div class="col-sm-5">
                <input class="form-control  "  readonly required id="name" name="name" placeholder="NAME"/>
                </div>
                <div class="col-sm-4">
                <input class="form-control " readonly required id="desig" name="desig" placeholder="Designation"/>
                </div>          
                          
                          <?Php } ?>
                          
                 <div class=" btn-group " aria-label="Action">
                <input type="submit" 
                    
                       name="submit" id="submitAcc"  class=" btn btn-primary btn-md" value="Submit" />
               
           
               
                <input type="submit"  name="save" id="saveAcc" class=" btn btn-info btn-md" value="Save"/>
            </div>
                      </div>
                      
             
        </div>
                  
                  <input name="quarter" style="width: 0px;height: 0px;padding: 0;margin: 0;"  id="quarter"/>
            </form>
   
      
         
      </div>
      
    </div>
  </div>
</div>
         
         
         
<div class="modal fade " id="ProjectResultModal"tabindex="-1" 
     role="dialog">
  <div class="modal-dialog " >
    <div class="modal-content"  role="document">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" ></h5> 
        
   
        
      </div>
      <div class="modal-body" >
          
  
          
      
              <form id="projectResultSubmission"  class="form-horizontal">
   
                    <div id="tableex" class="scrollY">
<table class="tg">
    <thead>
  <tr>
    <th class="tg-amwm">Name of Project</th>
    <th class="tg-amwm">Project Result</th>
    <th class="tg-amwm">Output Indicator</th>
    <th class="tg-amwm">Observed Result</th>
  
  </tr>
  </thead>
  <tbody>
      
      
  
  
  
  </tbody>
</table>
    </div>
                  <br/>
                  <button class="btn btn-info " >submit</button> 
                  
           </form>
   
      
         
      </div>
      
    </div>
  </div>
</div>




<br/>
<br/>

