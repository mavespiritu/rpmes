<?php
$badgeCount = new acknowledgementDAO();
?>
<script type="text/javascript" src="./API/javascript/jquery.quicksearch.js"></script>


   <ul class="nav nav-tabs" role="tablist">
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" role="tab" >
            Monitoring Plan <span class="badge"><?php echo $badgeCount->countMonitoring($GLOBALS['year']); ?></span></a> </li>
    <li class="active"><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=b0495f6e0571f5427f7a35c8c1162944f2b496e9"  role="tab" >
            Accomplishment <span class="badge"><?php echo $badgeCount->countAccomplishment($GLOBALS['year']); ?></span> </a></li>
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=d7fc60fa1ba1c37c5e4f2dae65e7a9a3b2c79eba"  role="tab" >
            Project Exception <span class="badge"><?php echo $badgeCount->countException($GLOBALS['year']); ?></span> </a></li>
</ul>
    <br/>
    <h2>Acknowledgement for accomplishment</h2>
    

    
    
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

$ctrN = 1;
$agencyR2 =$agency->getAgencyWithMon($agencysmrtbl); 

$ctr0 = $agencyR2->rowCount();
$rowrow = $agencyR2->fetchAll(PDO::FETCH_NUM);

          for($ctr24 = 0;$ctr24<$ctr0;$ctr24++){//outer loop
              $result = $ack->getByAgency($year,$rowrow[$ctr24][0]);  
              $row=  $result->fetchAll(PDO::FETCH_NUM);
        
          
          
              echo  '<tr>
                  <td  style="width:10px;"><b>
         '.$ctrN++.')</b> </td>
             <td>'.$rowrow[$ctr24][2].'</td>    ';  
              $rowB = array(
                  "q1"=>'',
                  "q2"=>'',
                  "q3"=>'',
                  "q4"=>''
                  );
         for($ctrr=0;$ctrr<4;$ctrr++){
            
              if(isset($row[$ctrr])){
               
                    $subdate = $ack->getdateSubACC($row[$ctrr][0], $row[$ctrr][1], $row[$ctrr][5]);
              
                    if($row[$ctrr][2]!=""&&$row[$ctrr][3]!=""){
                $status= 'btn-success';
                }else{
                $status = 'btn-warning';    
                }
                
                if($row[$ctrr][1]==1) {
                    $rowB['q1']='

                                
          <td >     
          <div class="btn-group" role="group" aria-label="...">
   <a  class="btn '.$status.' " title="Submission date: '.$subdate.'" 
title="Acknowledge '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledge" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'                  
>     <span class="glyphicon glyphicon-leaf"></span>        
Q'.$row[$ctrr][1].'
    
         </a>

   <a  class="btn btn-primary" title="Submission date: '.$subdate.'" 
title="Print Acknowledgement of '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'
                    
><span class="glyphicon glyphicon-print"></span>

         </a>

</div>

</td>                   
';
                
}
                else if($row[$ctrr][1]==2) {
                    $rowB['q2']='

                                
          <td >     
          <div class="btn-group" role="group" aria-label="...">
   <a  class="btn '.$status.' " title="Submission date: '.$subdate.'" 
title="Acknowledge '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledge" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'                  
>     <span class="glyphicon glyphicon-leaf"></span>        
Q'.$row[$ctrr][1].'
    
         </a>

   <a  class="btn btn-primary" title="Submission date: '.$subdate.'" 
title="Print Acknowledgement of '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'
                    
><span class="glyphicon glyphicon-print"></span>

         </a>


</div>
</td>                   
';
                
}
                else if($row[$ctrr][1]==3) {
                    $rowB['q3']='

                                
          <td >    
          <div class="btn-group" role="group" aria-label="...">
   <a  class="btn '.$status.' " title="Submission date: '.$subdate.'" 
title="Acknowledge '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledge" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'                  
>     <span class="glyphicon glyphicon-leaf"></span>        
Q'.$row[$ctrr][1].' </a>

   <a  class="btn btn-primary" title="Submission date: '.$subdate.'" 
title="Print Acknowledgement of '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'
                    
><span class="glyphicon glyphicon-print"></span>

         </a>

</div>

</td>                   
';
                
}
                else if($row[$ctrr][1]==4)  {
                    $rowB['q4']='

                                
          <td >    
          <div class="btn-group" role="group" aria-label="...">
   <a  class="btn '.$status.'" title="Submission date: '.$subdate.'" 
title="Acknowledge '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledge" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'                  
>     <span class="glyphicon glyphicon-leaf"></span>        
Q'.$row[$ctrr][1].'
    
         </a>

   <a  class="btn btn-primary" title="Submission date: '.$subdate.'" 
title="Print Acknowledgement of '.$row[$ctrr][6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[$ctrr][0].'" 
                    data-title="'.$row[$ctrr][6].'"
                    data-findings="'.$row[$ctrr][2].'"
                    data-action="'.$row[$ctrr][3].'"
                    data-quarter="'.$row[$ctrr][1].'"
                    data-year='.$row[$ctrr][5].'
                    
><span class="glyphicon glyphicon-print"></span>

         </a>

</div>

</td>                   
';
                
}
            }
            
            
         }
 if($rowB['q1']) echo $rowB['q1']; else echo '<td style="width:20%;" ><a style="width:39%;" class="btn btn-danger"><span class="glyphicon glyphicon-leaf"></span> Q1</td>';
 if($rowB['q2']) echo $rowB['q2']; else echo '<td style="width:20%;" ><a style="width:39%;" class="btn btn-danger"><span class="glyphicon glyphicon-leaf"></span> Q2</td>';
 if($rowB['q3']) echo $rowB['q3']; else echo '<td style="width:20%;" ><a style="width:39%;" class="btn btn-danger"><span class="glyphicon glyphicon-leaf"></span> Q3</td>';
 if($rowB['q4']) echo $rowB['q4']; else echo '<td style="width:20%;" ><a style="width:39%;" class="btn btn-danger"><span class="glyphicon glyphicon-leaf"></span> Q4</td>';
          }
            ?>
        </tbody>
    </table>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="acknowledgeOut" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 
      <div class="modal-body" >
          
     
      </div>
      
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="acknowledge" tabindex="-1" 
     role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" role="document">
 
      <div class="modal-body" >
          
          <form id="frmacknowledgement">
                Agency id: <input style ="border:0px; text-align: center; width:100px;" 
                                  id="agencyid" readonly 
                                  name="agencyid" />
         <h3>
              
            
              <br/>
          You are acknowledging 
          <input style ="border:0px; text-align: center; width:100px;" id="agencyname" readonly name="agencyname" /> 
          for the quarter 
          <input style ="border:0px; text-align: center; width: 15px;" id="quarter" readonly name="quarter" /> 
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






