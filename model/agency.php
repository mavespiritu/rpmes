<?php

class agency {

    private $agencyid;
    private $agencytype;
    private $agencycode;
    private $agencyhead;
    private $designation;
    private $agencyname;
    private $agencyloc;
    public function getAgencyloc() {
        return $this->agencyloc;
    }

    public function setAgencyloc($agencyloc) {
        $this->agencyloc = $agencyloc;
    }

        public function getAgencyname() {
        return $this->agencyname;
    }

    public function setAgencyname($agencyname) {
        $this->agencyname = $agencyname;
    }

        
    public function getAgencyid() {
        return $this->agencyid;
    }

    public function setAgencyid($agencyid) {
        $this->agencyid = $agencyid;
    }

    public function getAgencytype() {
        return $this->agencytype;
    }

    public function setAgencytype($agencytype) {
        $this->agencytype = $agencytype;
    }

    public function getAgencycode() {
        return $this->agencycode;
    }

    public function setAgencycode($agencycode) {
        $this->agencycode = $agencycode;
    }

    public function getAgencyhead() {
        return $this->agencyhead;
    }

    public function setAgencyhead($agencyhead) {
        $this->agencyhead = $agencyhead;
    }

    public function getDesignation() {
        return $this->designation;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }


}

?>
