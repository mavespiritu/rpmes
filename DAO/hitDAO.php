<?php

class hitDAO{
    function addHit($id,$host,$ref,$agent,$ip,$datetime){
        $db = new database();
        $statement = $db->getDb()->prepare('INSERT INTO hits (id,hostname,referername,useragent,ipAddress,dateAccess) VALUES (:id,:host,:ref,:agent,:ip,:access)');
        $statement->bindParam(':id', $id);
        $statement->bindParam(':host', $host);
        $statement->bindParam(':ref', $ref);
        $statement->bindParam(':agent', $agent);
        $statement->bindParam(':ip', $ip);
        $statement->bindParam(':access', $datetime);
        $statement->execute();
        return $statement;
    }
    function getHit(){
        $db = new database();
        $statement = $db->getDb()->prepare('SELECT * from hits');
        $statement->execute();
        return  $statement->rowCount();
        
    }
}
?>
