<?php
class monitoringplanDAO {
    function getSumArray(array $arr){
       $a = array('fq1'=>0,
                'fq2'=>0,
                'fq3'=>0,
                'fq4'=>0,
                'pq1'=>0,
                'pq2'=>0,
                'pq3'=>0,
                'pq4'=>0,
                'mq1'=>0,
                'mq2'=>0,
                'mq3'=>0,
                'mq4'=>0,
                'wq1'=>0,
                'wq2'=>0,
                'wq3'=>0,
                'wq4'=>0,
                'name'=>"TOTAL");
        foreach ($arr as $r){
            $a['fq1']+=$r['fq1'];
            $a['fq2']+=$r['fq2'];
            $a['fq3']+=$r['fq3'];
            $a['fq4']+=$r['fq4'];
            
            $a['pq1']+=$r['pq1'];
            $a['pq2']+=$r['pq2'];
            $a['pq3']+=$r['pq3'];
            $a['pq4']+=$r['pq4'];
        
            $a['mq1']+=$r['mq1'];
            $a['mq2']+=$r['mq2'];
            $a['mq3']+=$r['mq3'];
            $a['mq4']+=$r['mq4'];        
            
            $a['wq1']+=$r['wq1'];
            $a['wq2']+=$r['wq2'];
            $a['wq3']+=$r['wq3'];
            $a['wq4']+=$r['wq4'];
        
            
        }
        return $a;
    }    
    function quarterlyResultAgencybySector2($period,$sector,$agency){
        $db = new database();
        $statement = $db->getDb()->prepare('SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.period = :period
and tblprojects.secid = :secid 
and tblagency.agencyid = :agencyid
group by tblprojects.projid');
        $statement->bindParam(':period', $period);
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':agencyid', $agency);
        
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
             $quarter['q1'] += $row[0];
             $quarter['q2'] += $row[1];
             $quarter['q3'] += $row[2];
             $quarter['q4'] += $row[3];
             
         }
         return $quarter;
       
         
        
    }
    function summaryAgency($fundsrc,$period,$sector,$subsector,$agency,$optyear){
        $db = new database();
        
          if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $statement = $db->getDb()->prepare('SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where  tblprojects.secid = :secid 
and tblprojects.subsecid = :subsecid 
and tblagency.agencyid = :agencyid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1
'.$param1.' '.$param2.'

group by tblprojects.projid');
        
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':subsecid', $subsector);
        $statement->bindParam(':agencyid', $agency);
        $statement->bindParam(':year', $optyear);
        
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
            if($row[0]!=0){
                $quarter['q1'] ++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            }
             
         }
         return $quarter;
       
         
        
    }
    function summarySubSectorBy($fundsrc,$period,$sector,$subsector,$agency,$optyear){
        $db = new database();
        
        
        
          if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
         
        $statement = $db->getDb()->prepare('SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.secid = :secid 
and tblprojects.subsecid = :subsecid 
and tblagency.agencyid = :agencyid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 
'.$param1.' '.$param2.'

group by tblprojects.projid');
        
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':subsecid', $subsector);
        $statement->bindParam(':agencyid', $agency);
        $statement->bindParam(':year', $optyear);
        
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                  if($row[0]!=0){
                $quarter['q1'] ++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            }
             
         }
         return $quarter;
       
         
        
    }
    function quarterlyResultAgencybySector($period,$agency,$catid){
        $db = new database();
        $wOp = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.period = :period
and tblprojects.agencyid = :agencyid
group by tblprojects.projid';
        $wP = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.period = :period
and tblprojects.agencyid = :agencyid
and tblprojects.catid = :catid
and tblprojtargets.isApproved = 1

group by tblprojects.projid';
        
          if($catid==0||$catid==""){
          $statement = $db->getDb()->prepare($wOp);
        $statement->bindParam(':period', $period);
        $statement->bindParam(':agencyid', $agency);
        }
        else{  
          $statement = $db->getDb()->prepare($wP);
        $statement->bindParam(':period', $period);
    $statement->bindParam(':agencyid', $agency);
        $statement->bindParam(':catid', $catid);
        
        }
        
       
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
             $quarter['q1'] += $row[0];
             $quarter['q2'] += $row[1];
             $quarter['q3'] += $row[2];
             $quarter['q4'] += $row[3];
             
         }
         return $quarter;
       
         
        
    }
    function summarySector($fundsrc,$period,$sector,$optyear){
        $db = new database();
      
                if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where
tblprojects.secid = :secid

and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2.'

group by tblprojects.projid';
        
        
          $statement = $db->getDb()->prepare($quer);

        $statement->bindParam(':secid', $sector);
  
        
        $statement->bindParam(':year', $optyear);
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
            if($row[0]!=0){
                $quarter['q1'] ++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            
            }
             
         }
         return $quarter;
       
         
        
    }
    function summaryAgencyBySector($fundsrc,$period,$agency,$optyear){
        $db = new database();
          if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.agencyid = :agencyid

and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2.'

group by tblprojects.projid';
        
  
          $statement = $db->getDb()->prepare($quer);
   
        $statement->bindParam(':agencyid', $agency);
   
        
           $statement->bindParam(':year', $optyear);
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                if($row[0]!=0){
                $quarter['q1'] ++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            
            }
             
         }
         return $quarter;
       
         
        
    }
    function summarySubSector($fundsrc,$period,$sector,$subsector,$optyear){
        $db = new database();
           if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where 
 tblprojects.secid = :secid
and tblprojects.subsecid = :subsecid

and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2.'

group by tblprojects.projid';
        
        
          $statement = $db->getDb()->prepare($quer);
       
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':subsecid', $subsector);
    
      
        
         $statement->bindParam(':year', $optyear);
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                     if($row[0]!=0){
                $quarter['q1']++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            }
             
         }
         return $quarter;
       
         
        
    }
    function summarySectorBySubSector($fundsrc,$period,$agency,$sector,$optyear){
        $db = new database();
             if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer = 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where 
tblprojects.secid = :secid
and tblprojects.agencyid = :agencyid

and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1
'.$param1.''.$param2.'

group by tblprojects.projid';
        

          $statement = $db->getDb()->prepare($quer);


        $statement->bindParam(':agencyid', $agency);
           $statement->bindParam(':secid', $sector);
            $statement->bindParam(':year', $optyear);
       
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
                   if($row[0]!=0){
                $quarter['q1']++;
            }
            elseif ($row[1]!=0) {
                $quarter['q2']++;
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']++;
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']++;
            }
         }
         return $quarter;
       
         
        
    }
    function summaryPeriod($fundsrc,$period,$optyear){
        $db = new database();
        
        $qWP= 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.period = :period
and tblprojects.fundid = :fundid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1
group by tblprojects.projid';
        
        
        $qWoP= 'SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
where tblprojects.period = :period
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1

group by tblprojects.projid';
        
        
        
       
        
         if($fundsrc==0||$fundsrc==""){
        
         $statement = $db->getDb()->prepare($qWoP);
        
        $statement->bindParam(':period', $period);
        
         }
         else{
          $statement = $db->getDb()->prepare($qWP);
        
        $statement->bindParam(':period', $period);
        
        $statement->bindParam(':fundid', $fundsrc);
      
         }
           $statement->bindParam(':year', $optyear);
        $statement->execute();
        $quarter = array(
            'q1'=>0,
            'q2'=>0,
            'q3'=>0,
            'q4'=>0
            );
         while($row = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
            if($row[0]!=0){
                $quarter['q1'] += $row[0];
            }
            elseif ($row[1]!=0) {
                $quarter['q2']+= $row[1];
            
            }
            elseif ($row[2]!=0) {
                $quarter['q3']+= $row[2];
            
            }
            elseif ($row[3]!=0) {
                $quarter['q4']+= $row[3];
            
            }
             /*
             * 
             $quarter['q1'] += $row[0];
             $quarter['q2'] += $row[1];
             $quarter['q3'] += $row[2];
             $quarter['q4'] += $row[3];
             * */
             
             
         }
         return $quarter;
       
         
        
    }
    function getSummaryPeriod($fundsrc,$optyear){
        
         $db = new database();
    
        $WithParam= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblperiod.periodname as pname,
tblprojects.period,
tblprojects.datatype


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE tblprojects.fundid = :fundid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1

Group by tblprojects.period
';
        $WithOutParam= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblperiod.periodname as pname,
tblprojects.period


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
where  tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1

Group by tblprojects.period
';
   
        if($fundsrc==0||$fundsrc==""){
       $statement = $db->getDb()->prepare($WithOutParam);
  
        }
        else{  
             $statement = $db->getDb()->prepare($WithParam);
     $statement->bindParam(':fundid', $fundsrc);
   
        }
      $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getSummarySectorByAgency($fundsrc,$period,$optyear){
        
         $db = new database();
       if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
       
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblprojsector.secname as pname,
tblprojects.secid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE  
 tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2.'

Group by tblprojects.secid
';
   
   
       $statement = $db->getDb()->prepare($quer);
     
    
       $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getSummarySectorBySubSector($fundsrc,$period,$agency,$optyear){
        
         $db = new database();
            if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblprojsector.secname as pname,
tblprojects.secid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE

 tblprojects.agencyid = :agencyid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1

'.$param1.' '.$param2. '

Group by tblprojects.secid
';
   
  
       $statement = $db->getDb()->prepare($quer);
    
         $statement->bindParam(':agencyid', $agency);
     
      $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getSummaryAgencyBySector($fundsrc,$period,$optyear){
        
         $db = new database();
    
         
         if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
         
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblagency.agencycode as pname,
tblprojects.agencyid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.'  '.$param2.'

Group by tblprojects.agencyid
';
   
        
             $statement = $db->getDb()->prepare($quer);
     
      
      $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getSummarySubSector($fundsrc,$period,$sector,$optyear){
        
         $db = new database();
      if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblprojsubsector.subsecname as pname,
tblprojects.subsecid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE   tblprojects.secid = :secid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1
'.$param1.' ' .$param2.'

Group by tblprojects.subsecid
Order by tblprojsubsector.ord ASC
';
   

             $statement = $db->getDb()->prepare($quer);
     
         $statement->bindParam(':secid', $sector);
        
        
     $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getSummaryAgency($fundsrc,$period,$sector,$subsector,$optyear){
        
         $db = new database();
          if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Warget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblagency.agencycode as pname,
tblprojects.agencyid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE  tblprojects.secid = :secid
AND tblprojects.subsecid = :subsecid
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2.'

Group by tblprojects.agencyid

';
   
       $statement = $db->getDb()->prepare($quer);
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':subsecid', $subsector);
       $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getOverallLocation(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tbllocation.provincename as pname,
tblprojects.locid,
tbllocation.district,
tbllocation.city

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tbllocation
        ON (tblprojects.locid = tbllocation.locid)
Group by tblprojects.locid
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.locid= :locid
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':locid',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'wq1'=>$row[8],
                'wq2'=>$row[9],
                'wq3'=>$row[10],
                'wq4'=>$row[11],
                'name'=>$row[12] .' , '. $row[13].' , ' .$row[14]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getOverallFunding(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tblfundsrc.fundcode as pname,
tblprojects.fundid

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
Group by tblprojects.fundid
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.fundid= :fundid
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':fundid',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'wq1'=>$row[8],
                'wq2'=>$row[9],
                'wq3'=>$row[10],
                'wq4'=>$row[11],
                'name'=>$row[12]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getOverallImplementing(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tblperiod.periodname as pname,
tblprojects.period

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
Group by tblprojects.period
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.period= :period
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':period',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'mq1'=>$row[8],
                'mq2'=>$row[9],
                'mq3'=>$row[10],
                'mq4'=>$row[11],
                'name'=>$row[12]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getOverallAgency(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tblagency.agencycode as pname,
tblprojects.agencyid

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency
        ON (tblprojects.agencyid = tblagency.agencyid)
Group by tblprojects.agencyid
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.agencyid = :agencyid
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':agencyid',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'mq1'=>$row[8],
                'mq2'=>$row[9],
                'mq3'=>$row[10],
                'mq4'=>$row[11],
                'name'=>$row[12]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getOverallSector(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tblprojsector.secname as pname,
tblprojects.secid

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
Group by tblprojects.secid
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.secid = :secid
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':secid',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'mq1'=>$row[8],
                'mq2'=>$row[9],
                'mq3'=>$row[10],
                'mq4'=>$row[11],
                'name'=>$row[12]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getOverallProjectType(){
        
         $db = new database();
         
   $statement = $db->getDb()->prepare('
       
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Wtarget) as q1W,
SUM(q2Wtarget) as q2W,
SUM(q3Wtarget) as q3W,
SUM(q4Wtarget) as q4W,
tblprojcategory.catname as pname,
tblprojects.catid

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
Group by tblprojects.catid
');
      
        
   $statement2 = $db->getDb()->prepare('
       
SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)

where tblprojects.catid= :catid
group by tblprojects.projid
');
    

    
    $quarter = array();
            
    
    $statement->execute();
    while($row  = $statement->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
       
             $statement2->bindParam(':catid',$row[9]);
              $statement2->execute();
             $q1 = 0;
             $q2 = 0;
             $q3 = 0;
             $q4 = 0;
           
             
        while($row1 = $statement2->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
             {
             $q1 += $row1[0];
             $q2 += $row1[1];
             $q3 += $row1[2];
             $q4 += $row1[3];
             }
             
             
            $quarter[] = array(
                'fq1'=>$row[0],
                'fq2'=>$row[1],
                'fq3'=>$row[2],
                'fq4'=>$row[3],
                'pq1'=>$q1,
                'pq2'=>$q2,
                'pq3'=>$q3,
                'pq4'=>$q4,
                'mq1'=>$row[4],
                'mq2'=>$row[5],
                'mq3'=>$row[6],
                'mq4'=>$row[7],
                'mq1'=>$row[8],
                'mq2'=>$row[9],
                'mq3'=>$row[10],
                'mq4'=>$row[11],
                'name'=>$row[12]
                );
             
             
                    
    }
 
    
    
    $quarter[] = self::getSumArray($quarter);
             
    
    
    return $quarter;
    }
    function getSummarySubSectorBy($fundsrc,$period,$agency,$sector,$optyear){
        
         $db = new database();
          if($period!=0){
             $param1=" and tblprojects.period = ".$period;
         }
         else {
             $param1="";
         }
         
         if($fundsrc!=0){
             $param2=" and tblprojects.fundid = ".$fundsrc;
         }
         else {
             $param2="";
         }
        $quer= 'SELECT 

sum(if(tblprojects.datatype="Cumulative",if(q1Ftarget=0,q1Ftarget,q1Ftarget),q1Ftarget)) as q1F,
sum(if(tblprojects.datatype="Cumulative",if(q2Ftarget=0,q2Ftarget,(q2Ftarget-q1Ftarget)),q2Ftarget)) as q2F,
sum(if(tblprojects.datatype="Cumulative",if(q3Ftarget=0,q3Ftarget,(q3Ftarget-q2Ftarget)),q3Ftarget)) as q3F,
sum(if(tblprojects.datatype="Cumulative",if(q4Ftarget=0,q4Ftarget,(q4Ftarget-q3Ftarget)),q4Ftarget)) as q4F,

sum(if(tblprojects.datatype="Cumulative",if(q1Mtarget=0,q1Mtarget,q1Mtarget),q1Mtarget)) as q1M,
sum(if(tblprojects.datatype="Cumulative",if(q2Mtarget=0,q2Mtarget,(q2Mtarget-q1Mtarget)),q2Mtarget)) as q2M,
sum(if(tblprojects.datatype="Cumulative",if(q3Mtarget=0,q3Mtarget,(q3Mtarget-q2Mtarget)),q3Mtarget)) as q3M,
sum(if(tblprojects.datatype="Cumulative",if(q4Mtarget=0,q4Mtarget,(q4Mtarget-q3Mtarget)),q4Mtarget)) as q4M,

sum(if(tblprojects.datatype="Cumulative",if(q1Wtarget=0,q1Wtarget,q1Wtarget),q1Wtarget)) as q1W,
sum(if(tblprojects.datatype="Cumulative",if(q2Wtarget=0,q2Wtarget,(q2Wtarget-q1Wtarget)),q2Wtarget)) as q2W,
sum(if(tblprojects.datatype="Cumulative",if(q3Wtarget=0,q3Wtarget,(q3Wtarget-q2Wtarget)),q3Wtarget)) as q3W,
sum(if(tblprojects.datatype="Cumulative",if(q4Wtarget=0,q4Wtarget,(q4Wtarget-q3Wtarget)),q4Wtarget)) as q4W,
tblprojsubsector.subsecname as pname,
tblprojects.subsecid


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
INNER JOIN tblperiod
        ON (tblprojects.period = tblperiod.periodId)
INNER JOIN tblprojsubsector
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
WHERE   tblprojects.agencyid = :agencyid
AND tblprojects.secid = :secid
AND NOT tblprojects.subsecid = 0
and tblprojects.yrenrolled = :year
and tblprojtargets.isApproved = 1 '.$param1.' '.$param2 .'

Group by tblprojects.subsecid
Order by tblprojsubsector.ord ASC
';
   
      
       $statement = $db->getDb()->prepare($quer);
       
        $statement->bindParam(':secid', $sector);
        $statement->bindParam(':agencyid', $agency);
      
     $statement->bindParam(':year', $optyear);
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
    }
    function getAllProject(){
                $db = new database();
    
        
   
       $statement = $db->getDb()->prepare('SELECT  *
FROM tblprojects');
    
        $statement->execute();
        
        
        
   
        
       
           return $statement;
          
            
    
}
    function getProject($id){
            $db = new database();
    
        
   
       $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
where tblprojects.projid = :id');
       $statement->bindParam(':id', $id);
    
        $statement->execute();
        
       
        
       
           return $statement;
          
            
    
       
     
    }
    function getListBy(){
            $db = new database();
    
        
   
       $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
    , tblprojects.projid
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid) where tblprojects.catid = :catid 
        or tblprojects.locid = :locid 
        or tblprojects.secid = :secid
        or tblprojects.agencyid = :agency') ;
       
    
        $statement->bindParam(':catid', $catid);
        $statement->bindParam(':locid', $locid);
        $statement->bindParam(':secid', $secid);
        $statement->bindParam(':agencyid', $agencyid);
        $statement->execute();
        
        
        
        
       // print_r($statement->fetchAll());
      
        
       
           return $statement;
          
            
    
       
     
    }
    function getSummaryPlan($projecttype,$year){
            $db = new database();
    
        
   
       $statement = $db->getDb()->prepare('SELECT
    tblprojsubsector.*
    , tblprojsector.*
    , tblagency.*
    , tbllocation.*
    
    , tblfundsrc.*
    , tblprojtargets.*
FROM
    rpmesregion1.tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN rpmesregion1.tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
    INNER JOIN rpmesregion1.tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN rpmesregion1.tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
    INNER JOIN rpmesregion1.tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
    INNER JOIN rpmesregion1.tblprojsubsector 
        ON (tblprojects.subsecid = tblprojsubsector.subsecid) where  tblprojtargets.isApproved = 1 and tblprojects.yrenrolled = :year 
        and tblprojects.catid = :projecttype');
       $statement->bindParam(':year', $year);
       $statement->bindParam(':projecttype', $projecttype);
       
    
        $statement->execute();
       
        
       
           return $statement;
          
            
    
       
     
    }
    function getList($fundsrc,$year, $smrySect, $locationss, $agencysmrtbl){
            $db = new database();
    
            if($fundsrc!=0){
        $param1 = ' and tblprojects.fundid = '.$fundsrc;
            }
            else{
                $param1 = "";
            }
            if($year!=0){
        $param2 = ' and tblprojects.yrenrolled = '.$year;
            }
            else{
                $param2 = "";
            }
            if($smrySect!=0){
        $param3 = ' and tblprojects.secid = '.$smrySect;
            }
            else{
                $param3 = "";
            }
            if($locationss!=0){
        $param4 = ' and tblprojects.locid = '.$locationss;
            }
            else{
                $param4 = "";
            }
            if($agencysmrtbl!=0){
        $param5 = ' and tblprojects.agencyid = '.$agencysmrtbl;
            }
            else{
                $param5 = "";
            }
       $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
    , tblprojects.projid    
    , tblprojects.programname    
    , tbllocation.provincename
    , tbllocation.district
    , tbllocation.city
    

 
    , tblprojsector.secname
    , tblprojects.secid
    , tblprojects.subsecid
    , tblprojsubsector.subsecname
    , tblfundsrc.fundcode
    
    , tblprojects.unitofmeasure
    , tblperiod.periodname
    , tblprojects.datestart
    , tblprojects.dateend
    , tblprojects.datatype
    

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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
        
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
        
    INNER JOIN tblperiod
        ON (tblprojects.period  = tblperiod.periodId)
        
        
    INNER JOIN tblprojsubsector 
        ON (tblprojects.subsecid = tblprojsubsector.subsecid)
        
where  tblprojtargets.isApproved = 1 '.$param1.' '.$param2 .' '.$param3.' '.$param4.' '.$param5.' ORDER by tblprojects.ordering');
       
    
        $statement->execute();
       
      
       
           return $statement;
          
            
    
       
     
    }
    function getSavedProject($id){
            $db = new database();
    
        if($id==0){
            $param = "  ";
            
        }
        else{
            $param = "  and tblprojects.agencyid = ".$id;
        }
   
      $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
    , tblprojects.programname    
    , tblprojects.projid    
    , tbllocation.provincename
    , tbllocation.district
    , tbllocation.city
    

 
    , tblprojsector.secname
    , tblprojects.secid
    , tblprojects.subsecid
    , tblprojsubsector.subsecname
    , tblfundsrc.fundcode
    
    , tblprojects.unitofmeasure
    , tblperiod.periodname
    , tblprojects.datestart
    , tblprojects.dateend
    , tblprojects.datatype
    

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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
        
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
        
    INNER JOIN tblperiod
        ON (tblprojects.period  = tblperiod.periodId)
        
        
    INNER JOIN tblprojsubsector 
        ON (tblprojects.subsecid = tblprojsubsector.subsecid) WHERE  tblprojtargets.isApproved = 0 '.$param.' ORDER BY tblprojects.ordering');
       
       //echo "<pre>"; print_r($param);exit;
    
       $statement->execute();
                
           return $statement;
         
    }
    function getMyEntry($id){
            $db = new database();
     if($id==0){
            $param = "  ";
            
        }
        else{
            $param = "  and tblprojects.agencyid = ".$id;
        }
    $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
    , tblprojects.projid    
    , tblprojects.programname    
    , tbllocation.provincename
    , tbllocation.district
    , tbllocation.city
    

 
    , tblprojsector.secname
    , tblprojects.secid
    , tblprojects.subsecid
    , tblprojsubsector.subsecname
    , tblfundsrc.fundcode
    
    , tblprojects.unitofmeasure
    , tblperiod.periodname
    , tblprojects.datestart
    , tblprojects.dateend
    , tblprojects.datatype
    

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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblfundsrc 
        ON (tblprojects.fundid = tblfundsrc.fundid)
        
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
        
    INNER JOIN tblperiod
        ON (tblprojects.period  = tblperiod.periodId)
        
        
    INNER JOIN tblprojsubsector 
        ON (tblprojects.subsecid = tblprojsubsector.subsecid) WHERE  tblprojtargets.isApproved = 1  and tblprojects.yrenrolled = year(now())  '.$param . ' ORDER BY tblprojects.ordering');
       $statement->bindParam(':id', $id);
    
        $statement->execute();
        
        
        
        
       // print_r($statement->fetchAll());
      
        
       
           return $statement;
          
            
    
       
     
    }
    function getByCategory($id){
            $db = new database();
    
        
   
       $statement = $db->getDb()->prepare('SELECT  tblprojects.projname
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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Wtarget
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid) WHERE tblprojects.catid = :id');
        $statement->bindParam(':id', $id);
    
        $statement->execute();
        
        
        
        
       // print_r($statement->fetchAll());
      
        
       
           return $statement;
          
            
    
       
     
    }
  
}

?>
