<?php
session_start();
require_once("dompdf/dompdf_config.inc.php");


$now = new DateTime();


        
        $datetime = $now->format("Y-m-d H:i");
        $year = $now->format("Y");
        $date = $now->format("Y-m-d");
        $monoDate = $now->format("d");

$refnum =  rand(1, 1000);
class pdfReport{
  
    
    
}





     


  $dompdf = new DOMPDF();

  $doc = new report();
  
  $dompdf->load_html($doc->generate()."".$doc->generate());
  $dompdf->set_paper('letter', 'portrait');
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
 
      
            $year = $_GET['year'];
            $agencyid = $_GET['agencyid'];
            $userid = $_SESSION['userid'];
    
            
        
        
      
      $statement1 =  $db->prepare('SELECT
    acknowledgementmoni.findings
    , acknowledgementmoni.action
    , tblagency.agencyhead
    , tblagency.agencycode
    , tblagency.designation
    
    , tblagency.agencyname
    , tblagency.agencyloc
    , tblprojtargets.datesub as datesub
    , tblprojtargets.submittor as submittor
    , date(now()) as svrdate
FROM
    acknowledgementmoni
    INNER JOIN tblagency 
        ON (acknowledgementmoni.agency = tblagency.agencyid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.agencyid = tblagency.agencyid)
        WHERE 
        acknowledgementmoni.year =:year
        AND
        tblagency.agencyid = :agencyid
        AND year(tblprojtargets.datesub) = :year 
        
	GROUP BY agencycode
        ');
      $statement2 =  $db->prepare('SELECT
    tbluser.lastname
    , tbluser.firstname
    , tbluser.middlename
    , tbluser.division
    , tblagency.agencyhead
    , tblagency.designation
FROM
    tbluser
    INNER JOIN tblagency 
        ON (tbluser.agencyid = tblagency.agencyid)
WHERE tbluser.userid = :userid
        ');
        
     $statement1->bindParam(':agencyid', $agencyid);
      $statement1->bindParam(':year', $year);
      $statement2->bindParam(':userid', $userid);
        $statement1->execute();
        $statement2->execute();
       
    
     
        
        
        
        
        
        
        
        
        
        $dat1 =$statement1->fetchAll(PDO::FETCH_ASSOC);
        $dat2 =$statement2->fetchAll(PDO::FETCH_ASSOC);

$data1=$dat1[0];
$data2=$dat2[0];

error_log($data1['datesub'][0]);

$datere = 
$data1['datesub'][0]
.$data1['datesub'][1]
.$data1['datesub'][2]
.$data1['datesub'][3]
.$data1['datesub'][4]
.$data1['datesub'][5]
.$data1['datesub'][6]
.$data1['datesub'][7]
.$data1['datesub'][8]
.$data1['datesub'][9]

        ;

$html = '<html>
<head>    
    <style type="text/css">
  html{margin: 0.2in 0.5in 0.2in 0.5in;}
.tg  {width: 100%;border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:13px;padding:3px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:13px;font-weight:normal;padding:3px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;padding-top:25px;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
pre{width:50px; font-family:Arial, sans-serif;font-size:10px;padding:0px 0px;word-break:inherit;}

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

<table class="tg">
  <tr>
    <th class="tg-s6z2">
        <b>
        National Economic and Development Authority
      
        <br>Regional Office I<br>
          </b>
        
        Guerrero Road, City of San Fernando, La Union</th>
    <th class="tg-031e">
     <b>   
        CORRESPONDENCE <br>ACKNOWLEDGEMENT
    </b>
    </th>
  </tr>
  <tr>
    <td class="tg-031e">
        
      <b>  For/To:</b>
        
        '.$data1['agencyhead'].'<br>  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      '.$data1['agencyname'].'<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data1['agencyloc'].'</td>
    <td class="tg-031e">
        
    <b>    Control No.: </b>
        
       RPMES-'.$GLOBALS['year'].'-'.$GLOBALS['monoDate'].'-'. $GLOBALS['refnum'].'<br>
       <b> Date Received: </b>
        
        '.$datere.'</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="2">
 <b>       Subject: </b>
        RPMES Form I: Monitoring Plan Report on Agency Action Plan for the year '.$_GET['year'].'.,
     
        Submitted by '.$data1['submittor'].' on '.$datere.'</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2">
  <b>      Findings:</b>
  
  '.$data1['findings'].'
     
    </td>
  </tr>
  <tr>
    <td class="tg-031e"><b>Division: </b>'.$data2['division'].'</td>
    <td class="tg-031e"><b>Staff:</b>'.$data2['firstname'].' '.$data2['middlename'].' '.$data2['lastname'].'</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="2">
     <b>   Action Taken: </b>
    
      '.$data1['action'].'
      
         
    </td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="2">Thank you and best regards.</td>
  </tr>
  <tr >


    <td class="tg-baqh" >'.$data1['svrdate'].'<br>Date</td>
    <td class="tg-baqh" >
        
    <u>    '.$data2['agencyhead'].'</u>
        
        <br>'.$data2['designation'].'</td>
  </tr>
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