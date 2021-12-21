  <?Php 
 
 if(isset($_GET['yearp'])){
            $year = $_GET['yearp'];
        }
        else{
            $year = 0;
        }
        if(isset($_GET['fundsrc'])){
            $fundsrc = $_GET['fundsrc'];
        }
        else{
            $fundsrc = 0;
        }

      if(isset($_GET['sectorp'])){
          $smrySect  = $_GET['sectorp'];
        
      }
      else{
          $smrySect = 0 ;
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
        
         function getList($fundsrc , $year, $smrySect, $locationss, $agencysmrtbl){
                $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
     
          
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
             
       $statement = $db->prepare('SELECT  tblprojects.projname
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
        
where  tblprojtargets.isApproved = 1 '.$param1.' '.$param2 .' '.$param3.''.$param4.''.$param5);
       
    
        $statement->execute();
       
        
       
           return $statement;
          
            
    
       
     
    }
        

  
        $result =    getList($fundsrc , $year, $smrySect, $locationss, $agencysmrtbl);
        
        
        
        echo '<div  class="table-responsive  scrollY" >
                 <table id="monitoringDatatable" class="table table-bordered table-hover ">
               
                <thead>
                <tr>
                    
                    <th  rowspan="2"  >#</th>   
                    <th width="200px" style="text-align:left;" rowspan="2">
                    (a)Name of Project<br/>
                    (b)Location<br/>
                    (c)Sector/Sub-Sector<br/>
                    (d)Funding Source<br/>
                    (e)Mode of Implementation<br/>
                    (f)Project Schedule<br/>
                    </th>   
            
                   <th width="60px" rowspan="2">Unit Of Measure</th>  
                   
        <th colspan="5" >Financial Requirements</th>   
                   <th colspan="5">Physical Targets</th>   
           
                   <th id="reduceSpan" colspan="6">Employment Generated</th> 
                </tr>
                
 <tr>
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th>Total</th>
                
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th>Total</th>
                
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th>Total</th>
                
            
                <th class="hide-print"></th>
               
                
              
                   </tr>
                </thead>
                <tbody>
                ';
           
           $ctr = 1;
         while($row  = $result->fetch(PDO::FETCH_OBJ)){
            
            $loc=  $row->provincename;
            if($row->district != null){
                $loc.= ", ".$row->district;
            }
            if($row->city != null){
                $loc.= ", ".$row->city;
            }
            
            $secorsubsec = "";
            if($row->secid!=0){
                $secorsubsec = $row->secname;
            }
            if($row->subsecid!=0){
                $secorsubsec .= "(".$row->subsecname.")";
            }
            
            
            if($row->datatype == "Default"||$row->datatype == "default"){
                $ftotal = $row->q1Ftarget+
                        $row->q2Ftarget +
                        $row->q3Ftarget+
                        $row->q4Ftarget;
                
                $ptotal = $row->q1Ptarget+
                        $row->q2Ptarget +
                        $row->q3Ptarget+
                        $row->q4Ptarget;
                
                $mtotal = $row->q1Mtarget+
                        $row->q2Mtarget +
                        $row->q3Mtarget+
                        $row->q4Mtarget;
                
                
            }
            if($row->datatype == "Maintained"){
                $ftotal = $row->q1Ftarget+
                        $row->q2Ftarget +
                        $row->q3Ftarget+
                        $row->q4Ftarget;
                
                $ptotal = $row->q1Ptarget;
                
                $mtotal = $row->q1Mtarget+
                        $row->q2Mtarget +
                        $row->q3Mtarget+
                        $row->q4Mtarget;
                
                
            }
            
            if($row->datatype == "Cumulative"){
                $ftotal = 0;
                $mtotal = 0;
                $ptotal = 0;
                if($row->q1Ftarget!=0){
                $ftotal =  $row->q1Ftarget;    
                }
                if($row->q2Ftarget!=0){
                $ftotal =  $row->q2Ftarget;    
                }
                if($row->q3Ftarget!=0){
                $ftotal =  $row->q3Ftarget;
                }
                if($row->q4Ftarget!=0){
                $ftotal =  $row->q4Ftarget;
                }
               
                
                if($row->q1Ptarget!=0){
                $ptotal =  $row->q1Ptarget;    
                }
                if($row->q2Ptarget!=0){
                $ptotal =  $row->q2Ptarget;    
                }
                if($row->q3Ptarget!=0){
                $ptotal =  $row->q3Ptarget;
                }
                if($row->q4Ptarget!=0){
                $ptotal =  $row->q4Ptarget;
                }
             
                
                if($row->q1Mtarget!=0){
                $mtotal =  $row->q1Mtarget;    
                }
                if($row->q2Mtarget!=0){
                $mtotal =  $row->q2Mtarget;    
                }
                if($row->q3Mtarget!=0){
                $mtotal =  $row->q3Mtarget;
                }
                if($row->q4Mtarget!=0){
                $mtotal =  $row->q4Mtarget;
                }
             
                
                
                
            }
                  if($row->programname!=null){
                $pname = "<br/>(".$row->programname.")";
            }
            else{
                $pname = "";
            }
            
            
            
            echo ' 
                     <tr id="rowProj'.$row->projid.'"  >
                       
                    <td class="tg-yw4l" >'.$ctr++.'</td>
                    <td class="tg-yw4l">
                    (a)'.$row->projname.$pname.'<br/>(b)'.$loc.
                    '<br/>(c)'.$secorsubsec.
                    '<br/>(d)'.$row->fundcode.
                    '<br/>(e)'.$row->periodname.
                    '<br/>(f)'.$row->datestart." - ".$row->dateend.
                    
                    
                    '</td>
                        <td class="tg-yw4l" >'.$row->unitofmeasure.'<br/>('.$row->datatype.')</td>
                        <td class="tg-yw4l">'.number_format($row->q1Ftarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q2Ftarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q3Ftarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q4Ftarget).'</td>
                        <td class="tg-yw4l">'.number_format($ftotal).'</td>
                        
                        <td class="tg-yw4l">'.$row->q1Ptarget.'</td>
                        <td class="tg-yw4l">'.$row->q2Ptarget.'</td>
                        <td class="tg-yw4l">'.$row->q3Ptarget.'</td>
                        <td class="tg-yw4l">'.$row->q4Ptarget.'</td>
                        <td class="tg-yw4l">'.$ptotal.'</td>
                        
                        <td class="tg-yw4l">'.number_format($row->q1Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q2Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q3Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($row->q4Mtarget).'</td>
                        <td class="tg-yw4l">'.number_format($mtotal).'</td>';
            
}
echo '
</tbody>    
</table>    
</div>    
';
    ?>