<?php
class frm7{
    private $projid;
    private $location;
    private $projectname;
    
    private $dateOfProjectInspection;
    private $implementingAgency;
    private $issues;
    private $actionTaken;
    private $physicalStatus;
    private $projectCost;
    private $preparedBy;

    public function getPreparedBy() {
        return $this->preparedBy;
    }

    public function setPreparedBy($preparedBy) {
        $this->preparedBy = $preparedBy;
    }

        
    public function getProjectCost() {
        return $this->projectCost;
    }

    public function setProjectCost($projectCost) {
        $this->projectCost = $projectCost;
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

    public function getDateOfProjectInspection() {
        return $this->dateOfProjectInspection;
    }

    public function setDateOfProjectInspection($dateOfProjectInspection) {
        $this->dateOfProjectInspection = $dateOfProjectInspection;
    }

    public function getImplementingAgency() {
        return $this->implementingAgency;
    }

    public function setImplementingAgency($implementingAgency) {
        $this->implementingAgency = $implementingAgency;
    }

    public function getIssues() {
        return $this->issues;
    }

    public function setIssues($issues) {
        $this->issues = $issues;
    }

    public function getActionTaken() {
        return $this->actionTaken;
    }

    public function setActionTaken($actionTaken) {
        $this->actionTaken = $actionTaken;
    }

    public function getPhysicalStatus() {
        return $this->physicalStatus;
    }

    public function setPhysicalStatus($physicalStatus) {
        $this->physicalStatus = $physicalStatus;
    }


}
?>


    