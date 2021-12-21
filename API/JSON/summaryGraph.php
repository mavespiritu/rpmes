<?php

   $config =  parse_ini_file('../../Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
      
if($_GET['summary']=='overall'){
        $yearOA = "year(now())";
    if(isset($_GET['year'])){
      $yearOA =   $_GET['year'];
    }
 $overall = $db->prepare('SELECT
if(tblprojects.iscompleted = "completed","completed", 
	if(tblprojtargets.q1Ptarget=0 and tblprojaccomplishment.q1Paccomp = 0,"not-yet started",
		"on-going"
	)
)as projstatus
FROM tblprojects
INNER JOIN tblprojaccomplishment
	ON (tblprojaccomplishment.projid = tblprojects.projid)
INNER JOIN tblprojtargets
	ON (tblprojtargets.projid = tblprojaccomplishment.projid)
WHERE tblprojtargets.isApproved = 1
AND tblprojects.yrenrolled = '.$yearOA.'
group by tblprojects.projid

');

    
        $overall->execute();
       

   $OG = 0;
   $C = 0;
   $NYS = 0;
   
 while($arr= $overall->fetch(PDO::FETCH_OBJ)){    

          if($arr->projstatus == "completed"){
                                            $C++;

                                        }
                                        else if($arr->projstatus == "not-yet started"){
                                            $NYS++;
                                        }
                                        else if($arr->projstatus == "on-going"){
                                             $OG++;
                                        }

 }

      
 echo '{
  "cols": [
        {"id":"","label":"ProjectTypes","pattern":"","type":"string"},
        {"id":"","label":"Quarter","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Completed","f":null},{"v": '.$C.' ,"f":null}]},
        {"c":[{"v":"Not Yet Started","f":null},{"v":'.$NYS.',"f":null}]},
        {"c":[{"v":"On-Going","f":null},{"v":'.$OG.',"f":null}]}
      ]
}';
    
    
}
if($_GET['summary']=='BAO'){
    if(isset($_GET['quarter'])){
        $quarter = $_GET['quarter'];
    }
    else{
        $quarter = $GLOBALS['autoQuarter'];
    }
         $yearBAO = "year(now())";
    if(isset($_GET['year'])){
      $yearBAO =   $_GET['year'];
    }
    
     $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
     if($quarter == 1){
        $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
       $ptargetDCM = '(tblprojtargets.q1Ptarget)';
          $paccompC = '(tblprojaccomplishment.q1Paccomp)';
       
         $ptargetC= '(tblprojtargets.q1Ptarget)';
   
      }
      else if($quarter == 2){
       
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
      
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
           $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
     
         }
      else if($quarter == 3){
        
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
        $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
           
                  $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
      }
      else if($quarter == 4){
        
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
              $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
        
      }
 $overall = $db->prepare('SELECT
if(tblprojects.iscompleted = "completed","completed", 
	if(tblprojtargets.q1Ptarget=0 and tblprojaccomplishment.q1Paccomp = 0,"not-yet started",
		"on-going"
	)
)as projstatus

,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

FROM tblprojects
INNER JOIN tblprojaccomplishment
	ON (tblprojaccomplishment.projid = tblprojects.projid)
INNER JOIN tblprojtargets
	ON (tblprojtargets.projid = tblprojaccomplishment.projid)
WHERE tblprojtargets.isApproved = 1
AND tblprojects.yrenrolled = 
' . $yearBAO);


        $overall->execute();
       
  
   $array = array("behind"=>0,"ontime"=>0,"ahead"=>0);
   
 while($arr= $overall->fetch(PDO::FETCH_OBJ)){    

           if($arr->projstatus == "on-going"){
                                         if($arr->sllipage<=(-15)){
                            $array['behind']++;
                        }
                        else if($arr->sllipage>(-15)&&$arr->sllipage<=(0)){
                            $array['ontime']++;
                        }
                        else {
                            $array['ahead']++;
                        }
                                        }

 }

      
 echo '{    
  "cols": [
        {"id":"","label":"ProjectTypes","pattern":"","type":"string"},
        {"id":"","label":"Quarter","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Ahead","f":null},{"v": '.$array['ahead'].' ,"f":null}]},
        {"c":[{"v":"Behind","f":null},{"v":'.$array['behind'].',"f":null}]},
        {"c":[{"v":"On-Time","f":null},{"v":'.$array['ontime'].',"f":null}]}
      ]
}';
    
    
}
if($_GET['summary']=='bysector'){
    $now = new DateTime();

       $month = $now->format("m");
        if($month>=1&&$month<=3){
          $autoQuarter = 1;
      }
      if($month>=4&&$month<=6){
          $autoQuarter = 2;
      }
      if($month>=7&&$month<=9){
          $autoQuarter = 3;
      }
      if($month>=10&&$month<=12){
          $autoQuarter = 4;
      }
      $yearSEC = "year(now())";
    if(isset($_GET['year'])){
      $yearSEC =   $_GET['year'];
    }
    
    if(isset($_GET['quarter'])){
        $quarter = $_GET['quarter'];
    }
    else{
        $quarter = $autoQuarter;
    }
    
     $ptargetTOTAL = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
         $ptargetTOTALCUM = '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
     if($quarter == 1){
        $paccompDCM = '(tblprojaccomplishment.q1Paccomp)';
       $ptargetDCM = '(tblprojtargets.q1Ptarget)';
        
      $paccompC = '(tblprojaccomplishment.q1Paccomp)';
       
         $ptargetC= '(tblprojtargets.q1Ptarget)';
        
      }
      else if($quarter == 2){
       
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp)';
         
      
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)';
        
       $paccompC = '(CASE 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q2Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q2Ptarget
END)';
         }
      else if($quarter == 3){
        
         $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp)';
         
        $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)';
                $paccompC = '(CASE 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q3Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q3Ptarget
END)';
         
      }
      else if($quarter == 4){
        
          $paccompDCM = '(tblprojaccomplishment.q1Paccomp+tblprojaccomplishment.q2Paccomp+tblprojaccomplishment.q3Paccomp+tblprojaccomplishment.q4Paccomp)';
          
         $ptargetDCM = '(tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)';
             $paccompC = '(CASE 
WHEN tblprojaccomplishment.q4Paccomp>0 THEN tblprojaccomplishment.q4Paccomp 
WHEN tblprojaccomplishment.q3Paccomp>0 THEN tblprojaccomplishment.q3Paccomp 
WHEN tblprojaccomplishment.q2Paccomp>0 THEN tblprojaccomplishment.q2Paccomp 
WHEN tblprojaccomplishment.q1Paccomp>0 THEN tblprojaccomplishment.q1Paccomp 
ELSE tblprojaccomplishment.q4Paccomp
END)';
         $ptargetC =  '(CASE 
WHEN tblprojtargets.q4Ptarget>0 THEN tblprojtargets.q4Ptarget 
WHEN tblprojtargets.q3Ptarget>0 THEN tblprojtargets.q3Ptarget 
WHEN tblprojtargets.q2Ptarget>0 THEN tblprojtargets.q2Ptarget 
WHEN tblprojtargets.q1Ptarget>0 THEN tblprojtargets.q1Ptarget 
ELSE tblprojtargets.q4Ptarget
END)';
        
      }
      
      $sec = $db->prepare('SELECT * from tblprojsector where secid !=0');
      $sec->execute();
     $array[] = array("Name of Sector" ,"Ahead","Behind","On-Time");
      while($r = $sec->fetch(PDO::FETCH_OBJ)){
 $overall = $db->prepare('SELECT
     
if(tblprojects.iscompleted = "completed","completed", 
	if(tblprojtargets.q1Ptarget=0 and tblprojaccomplishment.q1Paccomp = 0,"not-yet started",
		"on-going"
	)
)as projstatus

,if(tblprojects.datatype="Cumulative",(('.$paccompC.' -'.$ptargetC.') /'.$ptargetTOTALCUM.')*100,(('.$paccompDCM.' -'.$ptargetDCM.') /'.$ptargetTOTAL.')*100) as sllipage 

,tblprojsector.*

FROM tblprojects
INNER JOIN tblprojsector
	ON (tblprojsector.secid = tblprojects.secid)
INNER JOIN tblprojaccomplishment
	ON (tblprojaccomplishment.projid = tblprojects.projid)
INNER JOIN tblprojtargets
	ON (tblprojtargets.projid = tblprojaccomplishment.projid)
WHERE tblprojtargets.isApproved = 1
AND tblprojects.yrenrolled = '.$yearSEC.'
And tblprojects.secid = 

' .$r->secid);

    

    
        $overall->execute();
    
      
$a = 0;
$b = 0;
$c = 0;
 while($arr= $overall->fetch(PDO::FETCH_OBJ)){    
                        
           if($arr->projstatus == "on-going"){
                                         if($arr->sllipage<=(-15)){
                            $a++;
                        }
                        else if($arr->sllipage>(-15)&&$arr->sllipage<=(0)){
                            $b++;
                        }
                        else {
                            $c++;
                        }
                                        }
                                        

 }
 $array[] = array($r->secname,$c,$a,$b);
 

      }    

   echo json_encode($array);
}
if($_GET['summary']=='numProj'){
      
$yearCh = $_GET['year'];
 $overall = $db->prepare('Select tblagency.agencycode , count(tblprojects.projid)
 as numberofproj 
from tblprojects 
inner join tblagency 
on (tblagency.agencyid = tblprojects.agencyid) 
INNER JOIN tblprojtargets
ON ( tblprojtargets.projid = tblprojects.projid)
WHERE tblprojects.yrenrolled = :year
AND tblprojtargets.isApproved = 1
 group by tblprojects.agencyid
order by count(tblprojects.projid) asc

' );

    $overall->bindParam(':year', $yearCh);
    
      
    
        $overall->execute();
  $data[] = array("Name of Agency" ,"Number of Projects Enrolled");
   

       while($arr= $overall->fetch(PDO::FETCH_OBJ)){  
            $data[] = array($arr->agencycode ,$arr->numberofproj);
   
       }

   echo json_encode($data);
}
?>
