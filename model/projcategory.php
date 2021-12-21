<?php

    class projcategory{
        private $catid;
        private $catcode;
        private $catname;
        
        
        public function getCatid() {
            return $this->catid;
        }

        public function setCatid($catid) {
            $this->catid = $catid;
        }

        public function getCatcode() {
            return $this->catcode;
        }

        public function setCatcode($catcode) {
            $this->catcode = $catcode;
        }

        public function getCatname() {
            return $this->catname;
        }

        public function setCatname($catname) {
            $this->catname = $catname;
        }


    }
?>
