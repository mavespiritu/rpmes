<?php

class projects{
    private $projid;
    private $agencyid;
    private $catid;
    private $fundid;
    private $locid;
    private $secid;
    private $subsecid;
    private $projname;
    private $unitofmeasure;
    private $yrenrolled;
    private $enrolledby;
    private $period;
    private $programname;
    private $datatype;
    private $start;
    private $end;
    private $typhoon;
    private $projObjective;
    private $expectedResult;
    private $actualresult;
    private $ordering;
    
    public function getOrdering() {
        return $this->ordering;
    }

    public function setOrdering($ordering) {
        $this->ordering = $ordering;
    }

        public function getProjObjective() {
        return $this->projObjective;
    }

    public function setProjObjective($projObjective) {
        $this->projObjective = $projObjective;
    }

    public function getExpectedResult() {
        return $this->expectedResult;
    }

    public function setExpectedResult($expectedResult) {
        $this->expectedResult = $expectedResult;
    }

    public function getActualresult() {
        return $this->actualresult;
    }

    public function setActualresult($actualresult) {
        $this->actualresult = $actualresult;
    }

        public function getTyphoon() {
        return $this->typhoon;
    }

    public function setTyphoon($typhoon) {
        $this->typhoon = $typhoon;
    }

        public function getStart() {
        return $this->start;
    }

    public function setStart($start) {
        $this->start = $start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }

        
    public function getDatatype() {
        return $this->datatype;
    }

    public function setDatatype($datatype) {
        $this->datatype = $datatype;
    }

        
    public function getProgramname() {
        return $this->programname;
    }

    public function setProgramname($programname) {
        $this->programname = $programname;
    }

        public function getPeriod() {
        return $this->period;
    }

    public function setPeriod($period) {
        $this->period = $period;
    }

        public function getProjid() {
        return $this->projid;
    }

    public function setProjid($projid) {
        $this->projid = $projid;
    }

    public function getAgencyid() {
        return $this->agencyid;
    }

    public function setAgencyid($agencyid) {
        $this->agencyid = $agencyid;
    }

    public function getCatid() {
        return $this->catid;
    }

    public function setCatid($catid) {
        $this->catid = $catid;
    }

    public function getFundid() {
        return $this->fundid;
    }

    public function setFundid($fundid) {
        $this->fundid = $fundid;
    }

    public function getLocid() {
        return $this->locid;
    }

    public function setLocid($locid) {
        $this->locid = $locid;
    }

    public function getSecid() {
        return $this->secid;
    }

    public function setSecid($secid) {
        $this->secid = $secid;
    }

    public function getSubsecid() {
        return $this->subsecid;
    }

    public function setSubsecid($subsecid) {
        $this->subsecid = $subsecid;
    }

    public function getProjname() {
        return $this->projname;
    }

    public function setProjname($projname) {
        $this->projname = $projname;
    }

    public function getUnitofmeasure() {
        return $this->unitofmeasure;
    }

    public function setUnitofmeasure($unitofmeasure) {
        $this->unitofmeasure = $unitofmeasure;
    }

    public function getYrenrolled() {
        return $this->yrenrolled;
    }

    public function setYrenrolled($yrenrolled) {
        $this->yrenrolled = $yrenrolled;
    }

    public function getEnrolledby() {
        return $this->enrolledby;
    }

    public function setEnrolledby($enrolledby) {
        $this->enrolledby = $enrolledby;
    }


    
    
}
?>
