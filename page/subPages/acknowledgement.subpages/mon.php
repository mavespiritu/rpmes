<?php
$badgeCount = new acknowledgementDAO();
?>
<script type="text/javascript" src="./API/javascript/jquery.quicksearch.js"></script>


   <ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" role="tab" >
            Monitoring Plan <span class="badge"><?php echo $badgeCount->countMonitoring($GLOBALS['year']); ?></span></a> </li>
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=b0495f6e0571f5427f7a35c8c1162944f2b496e9"  role="tab" >
            Accomplishment <span class="badge"><?php echo $badgeCount->countAccomplishment($GLOBALS['year']); ?></span> </a></li>
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=d7fc60fa1ba1c37c5e4f2dae65e7a9a3b2c79eba"  role="tab" >
            Project Exception <span class="badge"><?php echo $badgeCount->countException($GLOBALS['year']); ?></span> </a></li>
</ul>
    <br/>
    <h2>Acknowledgement for monitoring plan</h2>
    

    
    
<?php

$ack = new acknowledgementDAO();
  $agency = new agencyDAO();
                
  if(isset($_GET['agencysmrtbl'])){
   $agencysmrtbl  = $_GET['agencysmrtbl'];
        
      }
      else{
          $agencysmrtbl = 0 ;
      }
if(isset($_GET['optyear'])){
$year = $_GET['optyear'];
}
else{
    $year = $GLOBALS['year'];
}

if($agencysmrtbl!=0){
$result = $ack->getAllMON($year,$agencysmrtbl);  
}
else 
    {

$result = $ack->getAllMON($year,0);
}
    


$agencyR =$agency->getList(); 

?> 
     
      <div class="col-sm-2">
          <label for="optYear" class="control-label">Year</label>
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
   

                     <div class="col-sm-2">
                               <label for="optYear" class="control-label">Agency</label>
                     <select  id="agencysmrtbl" name="agencysmrtbl" class="form-control">
                         <option value="0">SELECT ALL</option>
                     <?Php
                         while($row  = $agencyR->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                       }
                       ?>
            </select> 
                  </div>
                   
    
     <div class="col-sm-2">
                <label for="optYear" class="control-label"> </label>
                
         <button type="button" value="Load"  class="form-control btn btn-success" id="loadData">
                 Load
             <span class="glyphicon glyphicon-send" ></span>
             
         </button>     
    </div>
  
        
<br/>
<br/>
<br/>
<br/>


        <form class="form-horizontal " action="#">
			
	<input type="text" name="search" value="" class="form-control hide-print" id="id_searchAckIn" placeholder="Search" autofocus />
			
		</form>

    
    
<div class="table-responsive">
    <table id="AckInDatatable"   class="table table-hover ">
        <thead><tr></tr></thead>
        <tbody>
            <?php
$row=  $result->fetchAll();

            $ctr = $result->rowCount()-1;
$ctrN = 1;
            for($ctr;$ctr>=0;$ctr--  ){
                
                   if($row[$ctr]['isRead']!=0){
                $status= 'btn-success';
                }else{
                $status = 'btn-warning';    
                }
                
                echo  '<tr style="text-align:left;">
                    <td >
         '.$ctrN++.'   </td>        
          <td >        
           <div class="btn-group" role="group" aria-label="...">
   <a  class="btn '.$status.'" style="min-width:300px; text-align:left;"
title="Acknowledge '.$row[$ctr][5].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgemoni" 
                    data-idd="'.$row[$ctr][0].'" 
                    data-title="'.$row[$ctr][5].'"
                    data-findings="'.$row[$ctr][1].'"
                    data-action="'.$row[$ctr][2].'"
                    data-quarter="'.$row[$ctr][1].'"
                    data-year='.$row[$ctr][4].'                  
>     <span class="glyphicon glyphicon-leaf"></span>        
'.$row[$ctr][5].' Monitoring Plan
    
         </a>

   <a  class="btn btn-primary" style="min-width:100px; text-align:left;"
title="Print Acknowledgement of '.$row[$ctr][5].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOutmoni" 
                    data-idd="'.$row[$ctr][0].'" 
                    data-title="'.$row[$ctr][5].'"
                    data-findings="'.$row[$ctr][1].'"
                    data-action="'.$row[$ctr][2].'"
                    data-quarter="'.$row[$ctr][1].'"
                    data-year='.$row[$ctr][4].'
                    
><span class="glyphicon glyphicon-print"></span>
Print
         </a>
         </div>

';
                if($row[$ctr][2]!=""&&$row[$ctr][3]!=""){
                echo '<span class="glyphicon glyphicon-ok"></span>';
                }
                echo '

</td>
<td ><b>Submission Date: </b>
'.$row[$ctr][6].'
</td>
</tr>';
                
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="acknowledgeOutmoni" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 
      <div class="modal-body" >
          
     
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="acknowledgemoni" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 
      <div class="modal-body" >
          
          <form id="frmacknowledgementmoni">
                Agency id: <input style ="border:0px; text-align: center; width:100px;" 
                                  id="agencyid" readonly 
                                  name="agencyid" />
         <h3>
              
            
              <br/>
          You are acknowledging 
          <input style ="border:0px; text-align: center; width:auto; max-width: 160px;" id="agencyname" readonly name="agencyname" /> 
          for their enrollment of projects 
          on year 
          <input style ="border:0px; text-align: center; width: 60px;" id="year" readonly name="year" />.
         
          </h3>
          <br/>
          <textarea class="form-control" style="max-width: 100%;" required name="findings" id="findings" placeholder="Findings...." ></textarea>
         <br/>
          <textarea class="form-control" style="max-width: 100%;"  required  name="actiontaken" id="actiontaken" placeholder="Action Taken...."></textarea>
          <br/>    
          <input type="submit" name="submit" id="saveAck"  class=" btn btn-primary btn-md" value="Save" />
           </form>
      </div>
      
    </div>
  </div>








