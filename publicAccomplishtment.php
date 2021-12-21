   <?PHP
   
   function getDb(){
           $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
     
        return $db;
   }
   function getAccReport(){
        
        
      
        
        $statement = getDb()->prepare('SELECT projid,datatype from tblprojects');
        
        
        $statement->execute();
    

       
    

     return  $statement;
                
    }
    
    function getAccomplishmentReport($year,$smrySect,$locationss,$agencysmrtbl,$quarter,$category,$projid,$datatype){

  
        $param2="";
         if ($agencysmrtbl == 0){
             $param2  = "";
         }
         else {
             $param2 = 'AND tblprojects.agencyid = '.$agencysmrtbl;
         }
         $param3 = "";
         if ($locationss == 0){
             $param3  = "";
         }
         else {
             $param3 = 'AND tblprojects.locid = '.$locationss;
         }
         $param4 = "";
         if ($smrySect == 0){
             $param4  = "";
         }
         else {
             $param4 = 'AND tblprojects.secid = '.$smrySect;
         }
         if ($year == 0){
             $param5  = "";
         }
         else {
             $param5 = 'AND tblprojects.yrenrolled = '.$year;
         }
             
        $formulaDataReport[0] = '
    
SELECT

tblfundsrc.fundcode ,
tblfundsrc.funddesc ,
tblprojects.projname ,

tbllocation.provincename,

tbllocation.district,

tbllocation.city,

tblprojects.unitofmeasure,

tblprojtargets.q1Ftarget as fq1,

tblprojtargets.q2Ftarget as fq2,

tblprojtargets.q3Ftarget as fq3,

tblprojtargets.q4Ftarget as fq4,

tblprojtargets.q1Ftarget +
tblprojtargets.q2Ftarget + 
tblprojtargets.q3Ftarget + 
tblprojtargets.q4Ftarget 
as Ftotal,

tblprojaccomplishment.q'.$quarter.'Releases
as ReleasesTodate, 

( tblprojaccomplishment.q'.$quarter.'Releases /
   tblprojtargets.q'.$quarter.'Ftarget) * 100 
as fundingsupport,

(tblprojaccomplishment.q'.$quarter.'ExpAccPayable + 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed) 
as actualExpenditure , 

((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 
as  expenditureRate, 

(
((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) /
(((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 )
         )*100
         
as FinanciallyCorrelated,

tblprojtargets.q1Ptarget as pq1,

tblprojtargets.q2Ptarget as pq2,

tblprojtargets.q3Ptarget as pq3,

tblprojtargets.q4Ptarget as pq4,

(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) 
as Ptotal,

tblprojtargets.q'.$quarter.'Ptarget
as targettodate,

(tblprojtargets.q1Ptarget/
(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget +
tblprojtargets.q4Ptarget ) )*100
as q1TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)/
(tblprojtargets.q1Ptarget +
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) )*100
as q2TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q3TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q4TargetPercent,



tblprojaccomplishment.q'.$quarter.'Paccomp
as actualAccomplishment,


((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 100) 
as q1AccomplishmentPercent,

((tblprojaccomplishment.q2Paccomp/(tblprojtargets.q2Ptarget 
                                    +tblprojtargets.q1Ptarget)) * 100) 
as q2AccomplishmentPercent,

((tblprojaccomplishment.q3Paccomp/(tblprojtargets.q3Ptarget
                                    +tblprojtargets.q2Ptarget
                                        +tblprojtargets.q1Ptarget)) * 100) 
as q3AccomplishmentPercent,

((tblprojaccomplishment.q4Paccomp/(tblprojtargets.q4Ptarget
                                       +tblprojtargets.q3Ptarget
                                            +tblprojtargets.q2Ptarget
                                                +tblprojtargets.q1Ptarget)) * 100) 
as q4AccomplishmentPercent,


(tblprojaccomplishment.q'.$quarter.'Paccomp - tblprojtargets.q'.$quarter.'Ptarget) 
as slippage , 

((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) 
as physicalPerformance ,

((tblprojaccomplishment.q'.$quarter.'Maccomp / tblprojtargets.q'.$quarter.'Mtarget) * 100) 
as employmentgenerated,


(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS NOT NULL 
	and tblprojaccomplishment.q2Paccomp IS NOT NULL 
	and tblprojaccomplishment.q3Paccomp IS NOT NULL 
	and tblprojaccomplishment.q4Paccomp IS NOT NULL
          and tblprojects.projid =  
          '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as completed,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	and tblprojaccomplishment.q2Paccomp IS  NULL 
	and tblprojaccomplishment.q3Paccomp IS  NULL 
	and tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =  '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as notyetstarted,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	or tblprojaccomplishment.q2Paccomp IS  NULL 
	or tblprojaccomplishment.q3Paccomp IS  NULL 
	or tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =  '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as ongoing,

tblprojects.secid as sectorid,

tblprojects.agencyid as agencyid,

tblprojects.fundid as fundid




FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
    INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
      WHERE tblprojects.projid = 
   '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5;
       
         $formulaDataReport[1] = '
    
SELECT

tblfundsrc.fundcode ,
tblfundsrc.funddesc ,
tblprojects.projname ,

tbllocation.provincename,

tbllocation.district,

tbllocation.city,

tblprojects.unitofmeasure,

tblprojtargets.q1Ftarget as fq1,

tblprojtargets.q2Ftarget as fq2,

tblprojtargets.q3Ftarget as fq3,

tblprojtargets.q4Ftarget as fq4,

(tblprojtargets.q1Ftarget +
tblprojtargets.q2Ftarget + 
tblprojtargets.q3Ftarget + 
tblprojtargets.q4Ftarget ) 
as Ftotal,

tblprojaccomplishment.q'.$quarter.'Releases
as ReleasesTodate, 

( tblprojaccomplishment.q'.$quarter.'Releases /
   tblprojtargets.q'.$quarter.'Ftarget) * 100 
as fundingsupport,

(tblprojaccomplishment.q'.$quarter.'ExpAccPayable + 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed) 
as actualExpenditure , 

((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 
as  expenditureRate, 

(
((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) /
(((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 )
         )*100
as FinanciallyCorrelated,

tblprojtargets.q1Ptarget as pq1,

tblprojtargets.q2Ptarget as pq2,

tblprojtargets.q3Ptarget as pq3,

tblprojtargets.q4Ptarget as pq4,

(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) 
as Ptotal,

tblprojtargets.q'.$quarter.'Ptarget
as targettodate,

tblprojtargets.q1Ptarget * 0.25
as q1TargetPercent,

tblprojtargets.q2Ptarget*.50
as q2TargetPercent,

tblprojtargets.q3Ptarget*.75
as q3TargetPercent,

tblprojtargets.q4Ptarget*100
as q4TargetPercent,



tblprojaccomplishment.q'.$quarter.'Paccomp
as actualAccomplishment,


((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * .25) 
as q1AccomplishmentPercent,

((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * .50) 
as q2AccomplishmentPercent,

((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * .75) 
as q3AccomplishmentPercent,

((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 100) 
as q4AccomplishmentPercent,


(tblprojaccomplishment.q'.$quarter.'Paccomp - tblprojtargets.q'.$quarter.'Ptarget) 
as slippage , 

((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) 
as physicalPerformance ,

((tblprojaccomplishment.q'.$quarter.'Maccomp / tblprojtargets.q'.$quarter.'Mtarget) * 100) 
as employmentgenerated,



(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS NOT NULL 
	and tblprojaccomplishment.q2Paccomp IS NOT NULL 
	and tblprojaccomplishment.q3Paccomp IS NOT NULL 
	and tblprojaccomplishment.q4Paccomp IS NOT NULL
          and tblprojects.projid =  '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as completed,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	and tblprojaccomplishment.q2Paccomp IS  NULL 
	and tblprojaccomplishment.q3Paccomp IS  NULL 
	and tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =   '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as notyetstarted,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	or tblprojaccomplishment.q2Paccomp IS  NULL 
	or tblprojaccomplishment.q3Paccomp IS  NULL 
	or tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =  '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as ongoing,

tblprojects.secid as sectorid,

tblprojects.agencyid as agencyid,

tblprojects.fundid as fundid



FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
           INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
              WHERE tblprojects.projid = 
   '.$projid.'  '.$param2.' '.$param3.' '.$param4 .' '.$param5;
        
              $formulaDataReport[2] = '
    
SELECT
tblfundsrc.fundcode ,
tblfundsrc.funddesc ,
tblprojects.projname ,

tbllocation.provincename,

tbllocation.district,

tbllocation.city,

tblprojects.unitofmeasure,

tblprojtargets.q1Ftarget as fq1,

tblprojtargets.q2Ftarget as fq2,

tblprojtargets.q3Ftarget as fq3,

tblprojtargets.q4Ftarget as fq4,

(tblprojtargets.q1Ftarget +
tblprojtargets.q2Ftarget + 
tblprojtargets.q3Ftarget + 
tblprojtargets.q4Ftarget ) 
as Ftotal,

tblprojaccomplishment.q'.$quarter.'Releases
as ReleasesTodate, 

( tblprojaccomplishment.q'.$quarter.'Releases /
   tblprojtargets.q'.$quarter.'Ftarget) * 100 
as fundingsupport,

(tblprojaccomplishment.q'.$quarter.'ExpAccPayable + 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed) 
as actualExpenditure , 

((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 
as  expenditureRate, 

(
((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) /
(((tblprojaccomplishment.q'.$quarter.'ExpAccPayable+ 
 tblprojaccomplishment.q'.$quarter.'ExpCashDisbursed)
     /tblprojaccomplishment.q'.$quarter.'Releases )* 100 )
         )*100
as FinanciallyCorrelated,

tblprojtargets.q1Ptarget as pq1,

tblprojtargets.q2Ptarget as pq2,

tblprojtargets.q3Ptarget as pq3,

tblprojtargets.q4Ptarget as pq4,

(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) 
as Ptotal,

tblprojtargets.q'.$quarter.'Ptarget
as targettodate,

(tblprojtargets.q1Ptarget/
(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget +
tblprojtargets.q4Ptarget ) )*100
as q1TargetPercent,

((tblprojtargets.q2Ptarget)/
(tblprojtargets.q1Ptarget +
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) )*100
as q2TargetPercent,

((tblprojtargets.q3Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q3TargetPercent,

((tblprojtargets.q4Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q4TargetPercent,



tblprojaccomplishment.q'.$quarter.'Paccomp
as actualAccomplishment,


((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 100) 
as q1AccomplishmentPercent,

((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 100) 
as q2AccomplishmentPercent,

((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 100) 
as q3AccomplishmentPercent,

((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 100) 
as q4AccomplishmentPercent,


(tblprojaccomplishment.q'.$quarter.'Paccomp - tblprojtargets.q'.$quarter.'Ptarget) 
as slippage , 

((tblprojaccomplishment.q'.$quarter.'Paccomp / tblprojtargets.q'.$quarter.'Ptarget) * 100) 
as physicalPerformance ,

((tblprojaccomplishment.q'.$quarter.'Maccomp / tblprojtargets.q'.$quarter.'Mtarget) * 100) 
as employmentgenerated,



(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS NOT NULL 
	and tblprojaccomplishment.q2Paccomp IS NOT NULL 
	and tblprojaccomplishment.q3Paccomp IS NOT NULL 
	and tblprojaccomplishment.q4Paccomp IS NOT NULL
          and tblprojects.projid =  '.$projid.' '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as completed,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	and tblprojaccomplishment.q2Paccomp IS  NULL 
	and tblprojaccomplishment.q3Paccomp IS  NULL 
	and tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =   '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as notyetstarted,

(SELECT count(tblprojects.projid)  from tblprojaccomplishment
  INNER JOIN tblprojects 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
	where tblprojaccomplishment.q1Paccomp IS  NULL 
	or tblprojaccomplishment.q2Paccomp IS  NULL 
	or tblprojaccomplishment.q3Paccomp IS  NULL 
	or tblprojaccomplishment.q4Paccomp IS  NULL 
        and tblprojects.projid =  '.$projid.'  '.$param2.' '.$param3.' '.$param4.' '.$param5.'
) as ongoing,

tblprojects.secid as sectorid,

tblprojects.agencyid as agencyid,

tblprojects.fundid as fundid



FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
           INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
        WHERE tblprojects.projid = 
   '.$projid.'  '.$param2.' '.$param3.' '.$param4 .' '.$param5;
 
        
      
        

        $statement = getDb()->prepare($formulaDataReport[$datatype]);
   
         $statement->execute();
             return $statement;

        
       
         
    }
    
    
    
   ?>


<div id="tableex" class="scrollY">
<table id="tblOverFlow" class="tg accReport table">
<thead>
  <tr>

    <th class="tg-amwm" rowspan="2">Specific Project</th>
    <th class="tg-amwm" rowspan="2">Location</th>
    <th class="tg-amwm" rowspan="2">Unit of Measure</th>
    <th class="tg-amwm" colspan="10">Financial (P 000)</th>
    <th class="tg-amwm" colspan="11">Physical</th>
    <td class="tg-amwm" rowspan="2">Employment Generated</td>

  </tr>
  <tr>
    <td class="tg-amwm">Q1</td>
    <td class="tg-amwm">Q2</td>
    <td class="tg-amwm">Q3</td>
    <td class="tg-amwm">Q4</td>
    <td class="tg-amwm">Total</td>
    <td class="tg-amwm">Actual Releases to Date (P 000)</td>
    <td class="tg-amwm">Funding Support (%)</td>
    <td class="tg-amwm">Actual Expenditure to Date (P 000)</td>
    <td class="tg-amwm">Expenditure Rate (%)</td>
    <td class="tg-amwm">Financially-Correlated Performance</td>
    <td class="tg-amwm">Q1</td>
    <td class="tg-amwm">Q2</td>
    <td class="tg-amwm">Q3</td>
    <td class="tg-amwm">Q4</td>
    <td class="tg-amwm">Total</td>
    <td class="tg-amwm">Target to Date</td>
    <td class="tg-amwm">Target to date (%)</td>
    <td class="tg-amwm">Actual Accomplishment to date</td>
    <td class="tg-amwm">Actual Accomplishment to date (%)</td>
    <td class="tg-amwm">Slippage</td>
    <td class="tg-amwm">Physical Performance</td>
   
  </tr>
</thead>
 <tbody class="tody">
      
  
      <?Php
      
      if(isset($_GET['smrySect'])){
          $smrySect  = $_GET['smrySect'];
        
      }
      else{
          $smrySect = 0 ;
      }
      if(isset($_GET['catidp'])){
          $category  = $_GET['catidp'];
        
      }
      else{
          $category = 0 ;
      }
      if(isset($_GET['locationp'])){
          $locationss  = $_GET['locationp'];
        
      }
      else{
          $locationss = 0 ;
      }
      if(isset($_GET['agencyp'])){
          $agencysmrtbl  = $_GET['agencyp'];
        
      }
      else{
          $agencysmrtbl = 0 ;
      }
      if(isset($_GET['yearp'])){
          $yrenroll= $_GET['yearp'];
        
      }
      else{
          $yrenroll = 0 ;
      }
      if($_GET['quarterp'] != 0){
              $quarterG = $_GET['quarterp'];

      $result = getAccReport();

      while($data =  $result->fetch(PDO::FETCH_OBJ)){
          
          if($data->datatype == "Default"){
          $row =  getAccomplishmentReport($yrenroll,$smrySect,$locationss,$agencysmrtbl,$quarterG,$category, $data->projid, 0)->fetch(PDO::FETCH_OBJ);
          }
          else if($data->datatype == "Maintained"){
          $row =  getAccomplishmentReport($yrenroll,$smrySect,$locationss,$agencysmrtbl,$quarterG,$category, $data->projid, 1)->fetch(PDO::FETCH_OBJ);    
          }
          else if($data->datatype == "Cummulative"){
          $row =  getAccomplishmentReport($yrenroll,$smrySect,$locationss,$agencysmrtbl,$quarterG,$category, $data->projid, 2)->fetch(PDO::FETCH_OBJ);    
          }
     
          
         if($row){
          echo '
  <tr>

    <td class="tg-yw4l">'.$row->projname.'</td>
    <td class="tg-yw4l">'.$row->provincename.' '.$row->district.' '.$row->city.' </td>
    <td class="tg-yw4l">'.$row->unitofmeasure.'  </td>
    <td class="tg-yw4l">'.number_format($row->fq1/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->fq2/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->fq3/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->fq4/1000,2).'  </td>
        ';
          
       if($data->datatype == "Default"){
       echo '<td class="tg-yw4l">'.number_format($row->Ftotal/1000,2).'  </td>';
        }
          else if($data->datatype == "Maintained"){
        echo '<td class="tg-yw4l">'.number_format($row->fq1/1000,2).'  </td>';
       }
          else if($data->datatype == "Cummulative"){
         echo '<td class="tg-yw4l">'.number_format($row->fq4/1000,2).'  </td>';
       }
        
          
   echo '
    <td class="tg-yw4l">'.number_format($row->ReleasesTodate/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->fundingsupport/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->actualExpenditure/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->expenditureRate/1000,2).'  </td>
    <td class="tg-yw4l">'.number_format($row->FinanciallyCorrelated/1000,2).'  </td>
    <td class="tg-yw4l">'.$row->pq1.'  </td>
    <td class="tg-yw4l">'.$row->pq2.'  </td>
    <td class="tg-yw4l">'.$row->pq3.'  </td>
    <td class="tg-yw4l">'.$row->pq4.'  </td>';
          
       if($data->datatype == "Default"){
       echo '<td class="tg-yw4l">'.$row->Ptotal.'  </td>';
        }
          else if($data->datatype == "Maintained"){
        echo '<td class="tg-yw4l">'.$row->pq1.'  </td>';
       }
          else if($data->datatype == "Cummulative"){
         echo '<td class="tg-yw4l">'.$row->pq4.'  </td>';
       }
        
          
   echo '
    <td class="tg-yw4l">'.$row->targettodate.'  </td>';
        
   
              if($quarterG==1){
                echo  '<td class="tg-yw4l">'.number_format($row->q1TargetPercent,2)    .'  </td>';
                }
              else if($quarterG==2){
                    echo  '<td class="tg-yw4l">'. number_format($row->q2TargetPercent,2)  .'  </td>';
                }
              else if($quarterG==3){
                    echo  '<td class="tg-yw4l">'. number_format($row->q3TargetPercent,2)  .'  </td>';
                }
              else if($quarterG==4){
                    echo  '<td class="tg-yw4l">'. number_format($row->q4TargetPercent,2)   .'  </td>';
                }


                
                echo '
                    <td class="tg-yw4l">'.$row->actualAccomplishment.'  </td>
                           ';
                
              if($quarterG==1){
                echo  '<td class="tg-yw4l">'. number_format( $row->q1AccomplishmentPercent ,2)    .'  </td>';
                }
              else if($quarterG==2){
                    echo  '<td class="tg-yw4l">'.number_format( $row->q2AccomplishmentPercent ,2)    .'  </td>';
                }
              else if($quarterG==3){
                    echo  '<td class="tg-yw4l">'.number_format( $row->q3AccomplishmentPercent ,2)   .'  </td>';
                }
              else if($quarterG==4){
                    echo  '<td class="tg-yw4l">'. number_format( $row->q4AccomplishmentPercent ,2)   .'  </td>';
                }
                  echo '
                    <td class="tg-yw4l">'.number_format($row->slippage,2).'  </td>
                    <td class="tg-yw4l">'.number_format($row->physicalPerformance,2).'  </td>
                    <td class="tg-yw4l">'.number_format($row->employmentgenerated,2).'  </td>
               
                           ';
                
                echo '
</tr>
      ';
      }
      }
      }
      else{
          echo ' <td colspan="26" align="center" class="tg-yw4l">please select a QUARTER to fetch data<br/>(no record)</td>';
      }
      
  ?>
  
  </tbody>
</table>
    </div>