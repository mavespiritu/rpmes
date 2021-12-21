<?php
class duedate{
    
    private $dudateId;
    private $dudate;
    private $name;
    
    public function getDudateId() {
        return $this->dudateId;
    }

    public function setDudateId($dudateId) {
        $this->dudateId = $dudateId;
    }

    public function getDudate() {
        return $this->dudate;
    }

    public function setDudate($dudate) {
        $this->dudate = $dudate;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


    
}
?>
