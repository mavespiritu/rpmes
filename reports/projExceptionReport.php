

<?php
session_start();
require_once("dompdf/dompdf_config.inc.php");


$now = new DateTime();


        
        $datetime = $now->format("Y-m-d H:i");
        $year = $now->format("Y");
        $date = $now->format("Y-m-d");
        $monoDate = $now->format("d");








     


  $dompdf = new DOMPDF();

  $doc = new report();
  
  $dompdf->load_html($doc->generate());
  $dompdf->set_paper('letter', 'landscape');
  $dompdf->render();

  $dompdf->stream("ERPMES.pdf", array("Attachment" => FALSE));

class report{
    function generate(){ 
   $config =  parse_ini_file('../Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
 
            $quarter = $_GET['quarter'];
            $year = $_GET['year'];
            $agencyid = $_GET['agencyid'];
           
            
          if($quarter == 1){
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
         $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
    
      }
      else if($quarter == 2){
        $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
         
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
   
         }
      else if($quarter == 3){
    
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
   
           $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
        
      }
      else if($quarter == 4){
     
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
     
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         
    }
    
   

      


 $statement = $db->prepare('
SELECT
tblprojects.projid,
tblprojects.projname,
tblprojects.datatype
,tbllocation.provincename 
,tblagency.agencycode
,projectexception.q'.$quarter.'datesub as datesub
,projectexception.q'.$quarter.'datesave as datesave
,projectexception.q'.$quarter.'savior as savior
,projectexception.q'.$quarter.'submittor as submittor
    ,
IF(tblprojects.datatype = "Cumulative",
(((tblprojaccomplishment.q'.$quarter.'Paccomp-tblprojtargets.q'.$quarter.'Ptarget)/
      (CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)
      )*100)  ,
((('.$paccompDCM.'-'.$ptargetDCM.')
/   (tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)
      )*100)  )

 as slippage,

projectexception.q'.$quarter.'reason as reason,

projectexception.q'.$quarter.'recomendation as recomendation

FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN tblprojaccomplishment
        ON (tblprojects.projid = tblprojaccomplishment.projid)
     INNER JOIN projectexception
        ON (tblprojects.projid = projectexception.projid)
      INNER JOIN tblagency
	ON (tblprojects.agencyid = tblagency.agencyid)
 WHERE tblprojects.agencyid = :agencyid
AND tblprojects.yrenrolled = :year
AND tblprojaccomplishment.q'.$quarter.'datesub IS NOT NULL

 GROUP By tblprojects.projid ;

 
');



        $statement->bindParam(':year', $year);
        $statement->bindParam(':agencyid', $agencyid);


        $statement->execute();
  
       $now = new DateTime();
    
     
                $date = $now->format("Y-m-d");
        
        
        
    
 

        while ( $row  = $statement->fetch(PDO::FETCH_ASSOC) ){
if($row['slippage']<(-15)){            
$data .=   '
    <tr>    
    <td class="tg-yw4l"><p>'.$row['projname'].' - '.$row['provincename'].'</p></td>
    <td class="tg-yw4l"><p>Behind schedule with negative slippage of '.  number_format(-$row['slippage']).'</p></td>
    <td class="tg-yw4l">'.$row['reason'].'</pre></td>
    <td class="tg-yw4l">'.$row['recomendation'].'</td>
    </tr>
    ';
}

$Agency  =  $row['agencycode'];
    }

  
$html = '<html>
<head>    
    <style type="text/css">
.tg  {width: 100%;border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
 pre{font-family:Arial, sans-serif;font-size:12px;padding:5px 5px;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;padding-top:50px;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
#footr{
font-size:11px;padding:10px 5px;;
    width: 100%;
}
thead {
    
    display: table-header-group;
}
</style>
</head>
<body>
<div align="Left">
    <h4>
    <div class="hide-print col-sm-1">
<button style="display:none;" class="form-control " onclick="printMe()">print</button>
</div>

<div class="title-header-print">
    <img style="float: left;" src="../image/RDC.jpg" width=50px" height="50px"/>
  
    <h3 style="float: left;"> Project Exception Report : CY '.$year.'</h3>
    <br/>
    <br/>
    <br/>
   
   Agency: <u>'.$Agency.'</u>
           <br/>
       As of : <u>'.$date.'</u>
           </div>
       
</div>
       
   
  
    </h4>
   
   

<table class="tg">
 <thead>
    <tr>
        <td class="tg-yw4l">
            Name of Project/ Location
        </td>
        <td class="tg-yw4l">
            Findings
        </td>
        <td class="tg-yw4l">
            Posible Reason / Cause
        </td>
        <td class="tg-yw4l">
            Recomendations
        </td>
    </tr>
 </thead>
 <tbody>
 '.$data.'
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
    
    
</body>
</html>';

return $html;
}
}
?>