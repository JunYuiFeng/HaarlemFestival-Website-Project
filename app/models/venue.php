<?php 
    class Venue{
        private $id;
        private $name;
        private $address;
        private $image;

        public function getId(){
            return $this->id;
        }

        public function getVenueName(){
            return $this->name;
        }

        public function getAddress(){
            return $this->address;
        }
        public function getImage(){
            return $this->image;
        }
    }

?>