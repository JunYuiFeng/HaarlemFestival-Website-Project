<?php 
    class Artist{
        private $id;
        private $name;
        private $style;

        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getStyle(){
            return $this->style;
        }
    }
?>