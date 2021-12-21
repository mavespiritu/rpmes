<?php

class user{
    
    private $email;
    private $userid;
    private $agencyIid;
    private $uname;
    private $pword;
    private $rightid;
    private $position;
    private $lastname;
    private $firstname;
    private $middlename;
    private $division;
    private $title;
    
    
    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getMiddlename() {
        return $this->middlename;
    }

    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }

    public function getDivision() {
        return $this->division;
    }

    public function setDivision($division) {
        $this->division = $division;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

        public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function getAgencyIid() {
        return $this->agencyIid;
    }

    public function setAgencyIid($agencyIid) {
        $this->agencyIid = $agencyIid;
    }

    public function getUname() {
        return $this->uname;
    }

    public function setUname($uname) {
        $this->uname = $uname;
    }

    public function getPword() {
        return $this->pword;
    }

    public function setPword($pword) {
        $this->pword = $pword;
    }

    public function getRightid() {
        return $this->rightid;
    }

    public function setRightid($rightid) {
        $this->rightid = $rightid;
    }


    
    
}
?>
