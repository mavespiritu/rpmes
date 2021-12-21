<?php


class fundsrc {

    private $fundid;
    private $fundtypeid;
    private $fundcode;
    private $funddesc;
    
    public function getFundid() {
        return $this->fundid;
    }

    public function setFundid($fundid) {
        $this->fundid = $fundid;
    }

    public function getFundtypeid() {
        return $this->fundtypeid;
    }

    public function setFundtypeid($fundtypeid) {
        $this->fundtypeid = $fundtypeid;
    }

    public function getFundcode() {
        return $this->fundcode;
    }

    public function setFundcode($fundcode) {
        $this->fundcode = $fundcode;
    }

    public function getFunddesc() {
        return $this->funddesc;
    }

    public function setFunddesc($funddesc) {
        $this->funddesc = $funddesc;
    }


}

?>
