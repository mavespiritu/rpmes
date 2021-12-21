

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
  $dompdf->set_paper('A4', 'portrait');
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
            $projid = $_GET['id'];
           
            
   

      


 $statement = $db->prepare('
 SELECT 
nameOfProject,
location,
implementingAgency,
q'.$quarter.'dateOfPSS as dateOfPSS,
q'.$quarter.'concernedAgencies as concernedAgencies,
q'.$quarter.'agreementsReached as agreementsReached,
q'.$quarter.'nextSteps as nextSteps
,preparedBy
 from tblform8
 Where projid = :projid
');



 
        $statement->bindParam(':projid', $projid);


        $statement->execute();
  $result = $statement->fetch(PDO::FETCH_OBJ);
       $now = new DateTime();
    
     
                $month = $now->format("m");
                $date = $now->format("d");
                $year = $now->format('Y');
        
        switch($month){
            case 1; $month = "January"; break;
            case 2; $month = "February"; break;
            case 3; $month = "march"; break;
            case 4; $month = "April"; break;
            case 5; $month = "May"; break;
            case 6; $month = "June"; break;
            case 7; $month = "July"; break;
            case 8; $month = "August"; break;
            case 9; $month = "September"; break;
            case 10; $month = "October"; break;
            case 11; $month = "November"; break;
            case 12; $month = "December"; break;
        }
        
    $Fulldate=$month ." ".$date. ", ".$year;
  

$data = "
    <tr>
        <td class='tg-yw41'>
            Form No.
        </td>
        <td class='tg-yw41'>
         RPMES Form No. 8
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Type of Report
        </td>
        <td class='tg-yw41'>
            Report on the Problem Solving Session/Facilitation  Meeting
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Name of Project
        </td>
        <td class='tg-yw41'>
            ".$result->nameOfProject."
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Location
        </td>
        <td class='tg-yw41'>
            ".$result->location."
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Implementing Agency
        </td>
        <td class='tg-yw41'>
            ".$result->implementingAgency."
        </td>
    </tr>
    
    <tr>
        <td class='tg-yw41'>
            Date of PSS
        </td>
        <td class='tg-yw41'>
            ".$result->dateOfPSS."
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Concerned Agencies
        </td>
        <td class='tg-yw41'>
            ".$result->concernedAgencies."
        </td>
    </tr>
     <tr>
        <td class='tg-yw41'>
            Agreement Reached
        </td>
        <td class='tg-yw41'>
            ".$result->agreementsReached."
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Next Steps
        </td>
        <td class='tg-yw41'>
            ".$result->nextSteps."
        </td>
    </tr>
    <tr>
        <td class='tg-yw41'>
            Prepared by:
        </td>
        <td class='tg-yw41'>
            ".$result->preparedBy."
        </td>
    </tr>
";
  
$html = '<html>
<head>    
    <style type="text/css">
    @page { margin: 1in; }

.tg  {width: 100%;border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:11pt;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
#footr{
font-size:11px;padding:10px 5px;;
    width: 100%;
}

</style>
</head>
<body>

   
   

<table class="tg">

 <tbody>
 '.$data.'
 </tbody>
</table>



    
    
</body>
</html>';

return $html;
}
}
?>