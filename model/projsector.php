<?php
class projsector{
    private $secid;
    private $catid;
    private $secname;
    
    
    public function getSecid() {
        return $this->secid;
    }

    public function setSecid($secid) {
        $this->secid = $secid;
    }

    public function getCatid() {
        return $this->catid;
    }

    public function setCatid($catid) {
        $this->catid = $catid;
    }

    public function getSecname() {
        return $this->secname;
    }

    public function setSecname($secname) {
        $this->secname = $secname;
    }


}
?>
