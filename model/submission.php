<?php
class submission{
    
    private $submissionId;
    private $quarter1;
    private $quarter2;
    private $quarter3;
    private $quarter4;
    private $yearEnrolled;
    private $Submittor;
    
    public function getSubmissionId() {
        return $this->submissionId;
    }

    public function setSubmissionId($submissionId) {
        $this->submissionId = $submissionId;
    }

    
    public function getQuarter1() {
        return $this->quarter1;
    }

    public function setQuarter1($quarter1) {
        $this->quarter1 = $quarter1;
    }

    public function getQuarter2() {
        return $this->quarter2;
    }

    public function setQuarter2($quarter2) {
        $this->quarter2 = $quarter2;
    }

    public function getQuarter3() {
        return $this->quarter3;
    }

    public function setQuarter3($quarter3) {
        $this->quarter3 = $quarter3;
    }

    public function getQuarter4() {
        return $this->quarter4;
    }

    public function setQuarter4($quarter4) {
        $this->quarter4 = $quarter4;
    }

    public function getYearEnrolled() {
        return $this->yearEnrolled;
    }

    public function setYearEnrolled($yearEnrolled) {
        $this->yearEnrolled = $yearEnrolled;
    }

    public function getSubmittor() {
        return $this->Submittor;
    }

    public function setSubmittor($Submittor) {
        $this->Submittor = $Submittor;
    }


    
}

?>
