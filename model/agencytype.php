<?php

class agencytype {
  private $agencytypeid;
  private $agencytypecode;
  private $agencytypedesc;
  
  public function getAgencytypeid() {
      return $this->agencytypeid;
  }

  public function setAgencytypeid($agencytypeid) {
      $this->agencytypeid = $agencytypeid;
  }

  public function getAgencytypecode() {
      return $this->agencytypecode;
  }

  public function setAgencytypecode($agencytypecode) {
      $this->agencytypecode = $agencytypecode;
  }

  public function getAgencytypedesc() {
      return $this->agencytypedesc;
  }

  public function setAgencytypedesc($agencytypedesc) {
      $this->agencytypedesc = $agencytypedesc;
  }


  
}

?>
