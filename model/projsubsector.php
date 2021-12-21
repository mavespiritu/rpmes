<?php

class projsubsector{
    private $subsecid;
    private $secid;

    private $subsecname;
    
    
    public function getSubsecid() {
        return $this->subsecid;
    }

    public function setSubsecid($subsecid) {
        $this->subsecid = $subsecid;
    }

    public function getSecid() {
        return $this->secid;
    }

    public function setSecid($secid) {
        $this->secid = $secid;
    }

    

    public function getSubsecname() {
        return $this->subsecname;
    }

    public function setSubsecname($subsecname) {
        $this->subsecname = $subsecname;
    }


}
?>
