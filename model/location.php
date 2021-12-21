<?php


class location {
    private $locid;
    private $provincename;
    private $distric;
    private $city;
    
    
    public function getLocid() {
        return $this->locid;
    }

    public function setLocid($locid) {
        $this->locid = $locid;
    }

    public function getProvincename() {
        return $this->provincename;
    }

    public function setProvincename($provincename) {
        $this->provincename = $provincename;
    }

    public function getDistric() {
        return $this->distric;
    }

    public function setDistric($distric) {
        $this->distric = $distric;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }


}

?>
