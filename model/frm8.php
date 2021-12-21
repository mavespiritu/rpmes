<?php
class frm8{
    private $projid;
    private $location;
    private $projectname;
    private $implementingAgency;
    private $dateOfPSS;
    private $concernedAgency;
    private $agreementReached;
    private $nextStep;
    private $preparedBy;
    
    public function getPreparedBy() {
        return $this->preparedBy;
    }

    public function setPreparedBy($preparedBy) {
        $this->preparedBy = $preparedBy;
    }

        public function getProjid() {
        return $this->projid;
    }

    public function setProjid($projid) {
        $this->projid = $projid;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getProjectname() {
        return $this->projectname;
    }

    public function setProjectname($projectname) {
        $this->projectname = $projectname;
    }

    public function getImplementingAgency() {
        return $this->implementingAgency;
    }

    public function setImplementingAgency($implementingAgency) {
        $this->implementingAgency = $implementingAgency;
    }

    public function getDateOfPSS() {
        return $this->dateOfPSS;
    }

    public function setDateOfPSS($dateOfPSS) {
        $this->dateOfPSS = $dateOfPSS;
    }

    public function getConcernedAgency() {
        return $this->concernedAgency;
    }

    public function setConcernedAgency($concernedAgency) {
        $this->concernedAgency = $concernedAgency;
    }

    public function getAgreementReached() {
        return $this->agreementReached;
    }

    public function setAgreementReached($agreementReached) {
        $this->agreementReached = $agreementReached;
    }

    public function getNextStep() {
        return $this->nextStep;
    }

    public function setNextStep($nextStep) {
        $this->nextStep = $nextStep;
    }


    


    
}
?>


    