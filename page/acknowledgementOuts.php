
<div class="divGlass">
        
    <ul class="nav nav-tabs" role="tablist">
    <li><a href="?page=08a5564a79b3d56562ff091aa4077e9abd0cdc3e" role="tab" >
            Acknowledgement Inbox</a></li>
    <li  class="active"><a href="?page=3ddb6d9ccd5f45b0b435f87c40516ba5a752f415" role="tab" >
            Acknowledgement Outbox</a></li>

    </ul>
    
    <h2>ACKNOWLEDGEMENT</h2>
    

    
    
<?php

$ack = new acknowledgementDAO();


if(isset($_GET['optyear'])){
$year = $_GET['optyear'];
}
else{
    $year = $GLOBALS['year'];
}
$result = $ack->getOutbox($year);


?>
    
    
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
        <br/>
 
    <div class="form-group">
   
    <form class="form-horizontal " action="#">
			 
	<input type="text" name="search" value="" class="form-control hide-print" id="id_searchAck" placeholder="Search" autofocus />
			
		</form>
</div>
<div class="table-responsive">
    <table id="AckOutDatatable"  class="table table-hover ">
        <thead><tr></tr></thead>
        <tbody>
            <?php
$ctr = 1;
            while($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                echo  '<tr>
                    <td>
         '.$ctr++.'           
</td>
<td>    <a  class="btn btn-primary"
title="Acknowledge '.$row[6].'"  
                    data-toggle="modal" 
                    data-target="#acknowledgeOut" 
                    data-idd="'.$row[0].'" 
                    data-title="'.$row[6].'"
                    data-findings="'.$row[2].'"
                    data-action="'.$row[3].'"
                    data-quarter="'.$row[1].'"
                    data-year='.$row[5].'
                        >print
         </a>

</td>                    

</tr>';
                
            }
            ?>
        </tbody>
  
      
          </table>
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


