<?php


   $config =  parse_ini_file('./Config/config.ini');

       
        try {
            $db = new PDO($config['dsn'], $config['username'], $config['password']);
        
            
        } catch (PDOException $ex) {
            
           throw new Exception('DB connection error: ' . $ex->getMessage());
        }
       $id = $_GET['q']; 

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
    , tblprojtargets.q1Wtarget
    , tblprojtargets.q2Mtarget
    , tblprojtargets.q2Wtarget
    , tblprojtargets.q3Mtarget
    , tblprojtargets.q3Wtarget
    , tblprojtargets.q4Mtarget
    , tblprojtargets.q4Wtarget
    , tblprojects.projid
FROM
    tblprojtargets
    INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)');
 
 
 
                                     // $statement->bindParam(":id", $id);
                                      

    
     $statement->execute();

$result = $statement;     
        
       while($row  = $result->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
            
            echo ' 
                     <tr id="rowProj'.$row[20].'">
                       
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
                    <td>'.number_format($row[15],2).'</td>
                    <td>'.number_format($row[16],2).'</td>
                    <td>'.number_format($row[17],2).'</td>
                    <td>'.number_format($row[18],2).'</td>
                    <td>'.number_format($row[19],2).'</td>
                         
              
            
';
            if($auth->is_admin()=="true"){
            echo ' <td>
               <div class=" btn-group-xs" aria-label="Action">
                    <button class="btn btn-info viewc"  data-toggle="modal" 
      data-target="#viewModal" data-idd="'.$row[20].'" data-titled="'.$row[0].'"  ><span class="glyphicon glyphicon-search"></span></button>
         
          
          <button class="btn  btn-primary editc"  data-toggle="modal" 
      data-target="#editProjModal" data-idd="'.$row[20].'" data-titled="'.$row[0].'"   ><span class="glyphicon glyphicon-pencil"></span></button>
         
          
          <button class="btn btn-danger delc "  data-toggle="modal" 
      data-target="#deleteModal" data-idd="'.$row[20].'" data-titled="'.$row[0].'"  ><span class="glyphicon glyphicon-trash"></span></button>

</div></td>
        
';
            
}
            
            
            
echo '
            </tr>
                    ';
                
                
                
        }
?>
