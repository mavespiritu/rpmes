

<?php 
if($auth->is_logged_in()=='true'){
    
echo '
<div class=" form-group col-md-12 divGlass">';
}
else{
echo '<div class=" form-group col-md-9 divGlass"> ';    
}
?>







    <h2 align="center">Due Dates</h2>
  <div class="table-responsive">     
<table class="table table-bordered table-hover">
    <thead>
    <th>Name</th>
    <th>Date</th>
    <th>Remaining days</th>
    </thead>
 <?Php
        $dues = new duedatesDAO();
        $result = $dues->getList();
    
        while($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
        echo '<tr>
            <td>'.$row[2].'</td>
            <td>'.$row[1].'</td>        
            <td> 
               ';
        
        if($dues->remainingDays($row[0])==0){
            echo '   Last Day ';
        }
        else if($dues->remainingDays($row[0])>0){
            
              echo '   '.$dues->remainingDays($row[0]).' days remaining';
       
            
        }
        else{
            echo 'deadline';
        }
        }
        
        echo  '</td></tr>'
        
        ?>
</table>
        </div>
    
    
    <h2 id="timeAdapt">
      
    </h2>
</div>


<?Php
if($auth->is_logged_in()!='true'){
 echo '<div class="col-md-2 divGlass"  ><h4 align="center"><b>Login</b></h4>';
 
  if(isset($_GET['home'])){
            $page  = $_GET['home'];
            switch ($page){

                case '2736fab291f04e69b62d490c3c09361f5b82461a':
                    //login
                    
                   
                      
                    include_once self::PAGE_DIR."login.php";
                    
                   
                    
                    break;
             
              
                        
                 
            }
        }
         echo '</div>';
        
}
 
?> 


<div class="form-group col-sm-12 divGlass">
      <h2 align="center">Public Information</h2>
      
      
      
      <div class="col-sm-2 hide-print">
        <select class="form-control" id="yearp">
         
         
            <?Php
            $current = $GLOBALS['year'];
            $yearGap =$current-2012;
            $i = 0; 
                 echo "<option value='0'>Select Year</option>";
            while($i<=$yearGap){
                
            echo "<option value='".($current-$i)."'>".($current-$i)."</option>";
            
            $i++;
            
            }
            ?>
        </select>
        
    </div>

    <div class="col-sm-2">
              <select required="required" id="quarterp"   name="smryDrpDownQuarter"
                     class="form-control">
              <option selected="selected" value="0">Select a quarter</option>
              <option value="1">Quarter 1</option>
              <option value="2">Quarter 2</option>
              <option value="3">Quarter 3</option>
              <option value="4">Quarter 4</option>
               
            </select>
    </div>

     
          <div class="col-sm-2">
               <?php
             $agency = new agencyDAO();
                $resultagn =$agency->getList(); 
                 echo '
                     <select required="required" id="agencyp" name="agency" class="form-control">';
                   echo '<option selected="selected" value="0">Select Agency</option>';
                       while($row  = $resultagn->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
              echo '</select> ';
        ?>
            
    
            
            </div>


          <div class="col-sm-2">
               <?php
             $location = new locationDAO();
                $resultLocations =$location->getList(); 
                
                 echo '<select required="required" id="locationp" name="location" class="form-control">';
                            echo '<option selected="selected" value="0">Select Location</option>';
                 while($row  = $resultLocations->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'"> '.$row[1].'  '.$row[3].' '.$row[2].'</option>';
                       }
              echo '</select>';
        ?>
            
    
            
            </div>
 <div class="col-sm-2 ">
        <?php
                $category = new fundsrcDAO();
                $resultCat =$category->getList(); 
                 echo '<select placeholder="Fund Source" required="required" id="optfundsrcs"  class="form-control">';
               $resultCat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
                 echo '<option value="0">Select all</option>';
                       while($row  = $resultCat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                 echo '<option value="'.$row[0].'"> '.$row[3].' ('.$row[2].')</option>';
                       }
              echo '</select>';
        ?>
</div>

       

      
    <div class="form-group">
          <div class="col-sm-2">
               <?php
               
          
                $sect = new sectorDAO();
              
                $resultSect =$sect->getList()   ;
              $resultSect->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
              
                 echo '<select id="ssectorp"   name="sector"
                     class="form-control ">';
            
               echo '<option selected="selected" value="0">Select Sector</option>';
                       while($row  = $resultSect->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
                       }
              echo '</select>';
        ?>
            
    
            
            </div>
    </div>


       

   
<br/>
<br/>


<div class="progress">
  <div class="progress-bar" id="progressbar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" >
    
  </div>
</div>

    <div class="col-sm-3">
        <button   id="publicMonitoringPlan" type="button" class="btn btn-info col-sm-12">Monitoring Plan</button>
        
    </div >
    
    <div class="col-sm-3 hideElement">
        <button   id="publicAccomplishment" type="button" class="btn btn-info col-sm-12"> Accomplishment Report</button>
    </div>
    <div class="col-sm-4">
        <div class="col-sm-2"  id="loaderAjaxLabel"></div>
        <div class="col-sm-10" id="loaderAjax"></div>
    </div>

 
<br/>
<br/>



<br/>

<div style="max-height: 500px; overflow: scroll;" id="publicContent">
    </div>

</div>
   

   
<div class="form-group col-sm-12 divGlass">
    
    <h1>Downloadable Form</h1>
      <p>
        <a target="_blank" href="./forms/RPMES Form 1.xlsx">Click </a> to download form 1 format.
      </p>
      <p>
        <a target="_blank" href="./forms/RPMES Form 2.xlsx">Click </a> to download form 2 format.
    </p>
</div>