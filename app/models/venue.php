<?php 
    class Venue{
        private $id;
        private $name;
        private $address;
        private $image;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getAddress(){
            return $this->address;
        }

        public function getVenueName(){
            return $this->name;
        }
        public function getImage(){
            return $this->image;
        }
    }
