<?php


   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $agencyId = $_GET['agency']; 
       $year = $_GET['year']; 
       $quarter = $_GET['quarter']; 
       $fundsrc = $_GET['fundsrc']; 

       
       if($quarter == 1){
       $que = "q1Ptarget as TPhysical,"
           
                 ."q1Ftarget as cmTallocation,"
                 ."q1Ftarget as Tallocation,"
               
                 ."q1Mtarget as TMandays,"
                 ."q1Paccomp as APhysical,"
               
               
                 ."q1Ptarget as APhysicaltodate,"
                 ."q1Ptarget as cmAPhysicaltodate,"
               
               
               ."(q1Ptarget) as APhysicalforthemonth,"
               
                 ."q1AccPayable as AccountPayable,"
                 ."q1CashDis as CashDisbursed,"
                 ."q1Remarks as Remarks,"
               
                 ."q1Maccomp as AMandays,"
                 ."q1Obligations as Obligations,"
                 ."(q1Expenditure) as Expenditure,"
                 ."q1Releases as Releases,"
                 //previous quarter
                 ."0 as TPhysicalPREV,"
           
                 ."0 as cmTallocationPREV,"
                 ."0 as TallocationPREV,"
               
                 ."0 as TMandaysPREV,"
                 ."0 as APhysicalPREV,"
               
               
                 ."0 as APhysicaltodatePREV,"
                 ."0 as cmAPhysicaltodatePREV,"
               
               
               ."(0) as APhysicalforthemonthPREV,"
               
                 ."0 as AccountPayablePREV,"
                 ."0 as CashDisbursedPREV,"
                 
               
                 ."0 as AMandaysPREV,"
                 ."0 as ObligationsPREV,"
                 ."(0) as ExpenditurePREV,"
                 ."0 as ReleasesPREV";
       
       
       }
       if($quarter == 2){
       $que = "(q1Ptarget+q2Ptarget) as TPhysical,"
           
           
                 ."(q2Ftarget-q1Ftarget)  as cmTallocation,"
                 ."(q2Ftarget) as Tallocation,"
               
               
                 ."(q2Mtarget) as TMandays,"
                  ."q2Paccomp as APhysical,"
               
               
                 ."(q2Ptarget) as APhysicaltodate,"
                 ."(q2Ptarget-q1Ptarget) as cmAPhysicaltodate,"
              
               
               
               ."(q2Ptarget) as APhysicalforthemonth,"
             
               
                 ."q2AccPayable as AccountPayable,"
                 ."q2CashDis as CashDisbursed,"
                 ."q2Remarks as Remarks,"
               
               
                 ."(q2Maccomp) as AMandays,"
                 ."(q2Expenditure) as Expenditure,"
                 ."(q2Obligations) as Obligations,"
                 ."(q2Releases) as Releases,"
                  //previous quarter
                 ."q1Ptarget as TPhysicalPREV,"
           
                 ."q1Ftarget as cmTallocationPREV,"
                 ."q1Ftarget as TallocationPREV,"
               
                 ."q1Mtarget as TMandaysPREV,"
                 ."q1Paccomp as APhysicalPREV,"
               
               
                 ."q1Ptarget as APhysicaltodatePREV,"
                 ."q1Ptarget as cmAPhysicaltodatePREV,"
               
               
               ."(q1Ptarget) as APhysicalforthemonthPREV,"
               
                 ."q1AccPayable as AccountPayablePREV,"
                 ."q1CashDis as CashDisbursedPREV,"
                 
               
                 ."q1Maccomp as AMandaysPREV,"
                 ."q1Obligations as ObligationsPREV,"
                 ."(q1Expenditure) as ExpenditurePREV,"
                 ."q1Releases as ReleasesPREV";
       
       
       }
       if($quarter == 3){
       $que = "(q1Ptarget+q2Ptarget+q3Ptarget) as TPhysical,"
           
                 ."q3Ftarget as Tallocation,"
                 ."(q3Ftarget-q2Ftarget) as cmTallocation,"
               
                 ."(q3Mtarget) as TMandays,"
                  ."q3Paccomp as APhysical,"
               
                 ."(q3Ptarget) as APhysicaltodate,"
                 ."(q3Ptarget-q2Ptarget) as cmAPhysicaltodate,"
            
               
               
               ."(q3Ptarget) as APhysicalforthemonth,"
                
               
                 ."q3AccPayable as AccountPayable,"
                 ."q3CashDis as CashDisbursed,"
                 ."q3Remarks as Remarks,"
               
                 ."(q3Maccomp) as AMandays,"
                 ."(q3Expenditure) as Expenditure,"
                 ."(q3Obligations) as Obligations,"
                 ."(q3Releases) as Releases,"
                  //previous quarter
                 ."q2Ptarget as TPhysicalPREV,"
           
                 ."(q2Ftarget-q1Ftarget) as cmTallocationPREV,"
                 ."q2Ftarget as TallocationPREV,"
               
                 ."q2Mtarget as TMandaysPREV,"
                 ."q2Paccomp as APhysicalPREV,"
               
               
                 ."q2Ptarget as APhysicaltodatePREV,"
                 ."q2Ptarget as cmAPhysicaltodatePREV,"
               
               
               ."(q2Ptarget) as APhysicalforthemonthPREV,"
               
                 ."q2AccPayable as AccountPayablePREV,"
                 ."q2CashDis as CashDisbursedPREV,"
                 
               
                 ."q2Maccomp as AMandaysPREV,"
                 ."q2Obligations as ObligationsPREV,"
                 ."(q2Expenditure) as ExpenditurePREV,"
                 ."q2Releases as ReleasesPREV";
       
       
       }
       if($quarter == 4){
       $que = "(q1Ptarget+q2Ptarget+q3Ptarget+q4Ptarget) as TPhysical,"
           
                 ."q4Ftarget as Tallocation,"
                 ."(q4Ftarget-q3Ftarget) as cmTallocation,"
               
                 ."(q4Mtarget) as TMandays,"
                 ." q4Paccomp as APhysical,"
               
                 ."(q4Ptarget) as APhysicaltodate,"
                 ."(q4Ptarget-q3Ptarget) as cmAPhysicaltodate,"
          
               
               
                 ."(q4Ptarget) as APhysicalforthemonth,"
               
               
                 ."q4AccPayable as AccountPayable,"
                 ."q4CashDis as CashDisbursed,"
                 ."q4Remarks as Remarks,"
               
               
                 ."(q4Maccomp) as AMandays,"
                 ."(q4Expenditure) as Expenditure,"
                 ."(q4Obligations) as Obligations,"
                 ."(q4Releases) as Releases,"
                  //previous quarter
                 ."q3Ptarget as TPhysicalPREV,"
           
                 ."(q3Ftarget-q2Ftarget) as cmTallocationPREV,"
                 ."q3Ftarget as TallocationPREV,"
               
                 ."q3Mtarget as TMandaysPREV,"
                 ."q3Paccomp as APhysicalPREV,"
               
               
                 ."q3Ptarget as APhysicaltodatePREV,"
                 ."q3Ptarget as cmAPhysicaltodatePREV,"
               
               
               ."(q3Ptarget) as APhysicalforthemonthPREV,"
               
                 ."q3AccPayable as AccountPayablePREV,"
                 ."q3CashDis as CashDisbursedPREV,"
                 
               
                 ."q3Maccomp as AMandaysPREV,"
                 ."q3Obligations as ObligationsPREV,"
                 ."(q3Expenditure) as ExpenditurePREV,"
                 ."q3Releases as ReleasesPREV";
       
       
       }
if($fundsrc==0){
    
 $statement = $db->prepare('SELECT
tblprojects.*,
'.$que.',
    tbllocation.provincename,
    tbllocation.district,
    tbllocation.city,
    tblfundsrc.fundcode,
    tblfundsrc.funddesc
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN tblprojaccomplishment
        ON (tblprojects.projid = tblprojaccomplishment.projid)
     INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
 WHERE tblprojects.agencyid = :agencyid
 and tblprojtargets.isApproved = 1
 and tblprojects.yrenrolled = :year

 GROUP By tblprojects.projid
 ORDER BY tblprojects.ordering
 
');
                                      $statement->bindParam(":agencyid", $agencyId);
                                      $statement->bindParam(":year", $year);
                                 
                                 
                           
}           
else{
    
 $statement = $db->prepare('SELECT
tblprojects.*,
'.$que.',
    tbllocation.provincename,
    tbllocation.district,
    tbllocation.city,
    tblfundsrc.fundcode,
    tblfundsrc.funddesc
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
      INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
     INNER JOIN tblprojaccomplishment
        ON (tblprojects.projid = tblprojaccomplishment.projid)
     INNER JOIN tblfundsrc
        ON (tblprojects.fundid = tblfundsrc.fundid)
 WHERE tblprojects.agencyid = :agencyid
 and tblprojtargets.isApproved = 1
 and tblprojects.yrenrolled = :year
 and tblprojects.fundid = :fundsrc

 GROUP By tblprojects.projid
  ORDER BY tblprojects.ordering
');
                                      $statement->bindParam(":agencyid", $agencyId);
                                      $statement->bindParam(":year", $year);
                                      $statement->bindParam(":fundsrc", $fundsrc);
                                 
                           
}

    
        $statement->execute();

        $json =  json_encode($statement->fetchAll(PDO::FETCH_OBJ));
       echo $json;
?>
