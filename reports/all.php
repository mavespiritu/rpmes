<?php

require_once("dompdf/dompdf_config.inc.php");




  $dompdf = new DOMPDF();

  
  $dompdf->load_html(
getlist());
  $dompdf->set_paper('A4', 'landscape');
  $dompdf->render();

 // $dompdf->stream("ERPMESMonitoringPlan.pdf", array("Attachment" => false));



function getlist(){
       $config =  parse_ini_file('../Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }    
   
       $statement = $db->prepare('SELECT  tblprojects.projname
    , tbllocation.provincename
    , tblprojects.unitofmeasure
    , tblprojtargets.q1Ptarget
    , tblprojtargets.q2Ptarget
    , tblprojtargets.q3Ptarget
    , tblprojtargets.q4Ptarget
    , tblprojtargets.q1Ftarget
    , tblprojtargets.q2Ftarget
    , tblprojtargets.q3Ftarget
    , tblprojtargets.q4Ftarget
    , tblprojtargets.q1Mtarget
    , tblprojtargets.q2Mtarget
    , tblprojtargets.q3Mtarget
    , tblprojtargets.q4Mtarget
    , tblprojects.projid
FROM
    rpmesregion1.tblprojtargets
    INNER JOIN rpmesregion1.tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN rpmesregion1.tbllocation 
        ON (tblprojects.locid = tbllocation.locid)limit 100') ;
       
    
        $statement->execute();
        
        
     
        $result =     $statement;
        
        $html = '
            
      
<html>
<head>
<style>
table{
width:100%;
}
.table-bordered td,.table-bordered th{border:1px solid #ddd!important}
thead{display:table-header-group}
</style>
</head>
<body>
                <table   class="table table-bordered table-hover">
               
                <thead >
                <tr >
                    
                    <th width="60px" rowspan="2">Project Name</th>   
                   <th width="60px" rowspan="2">Location</th>   
                   <th width="60px" rowspan="2">Unit Of Measure</th>  
                   <th colspan="4">Physical Targets</th>   
                   <th colspan="4" >Financial Requirements</th>   
                   <th colspan="4">Man-Days Requirements</th> 
                </tr>
                
 <tr>
                <th>qtr1</th>
                <th>qtr2</th>
                <th>qtr3</th>
                <th>qtr4</th>
                <th>qtr1</th>
                <th>qtr2</th>
                <th>qtr3</th>
                <th>qtr4</th>
                <th>qtr1</th>
                <th>qtr2</th>
                <th>qtr3</th>
                <th>qtr4</th>
                
              
                   </tr>
                </thead>
                <tbody >
                ';
         
        while($row  = $result->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
            
            $html .= ' 
                     <tr id="rowProj'.$row[15].'">
                       
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.number_format($row[3],2).'</td>
                    <td>'.number_format($row[4],2).'</td>
                    <td>'.number_format($row[5],2).'</td>
                    <td>'.number_format($row[6],2).'</td>
                    <td>'.number_format($row[7],2).'</td>
                    <td>'.number_format($row[8],2).'</td>
                    <td>'.number_format($row[9],2).'</td>
                    <td>'.number_format($row[10],2).'</td>
                    <td>'.number_format($row[11],2).'</td>
                    <td>'.number_format($row[12],2).'</td>
                    <td>'.number_format($row[13],2).'</td>
                    <td>'.number_format($row[14],2).'</td>
                         
              

            </tr>
                    ';
                
                
                
        }
        $html.= '
                </tbody>
            </table>
         
          </body>
</html>


';
 return $html;
}
?>
