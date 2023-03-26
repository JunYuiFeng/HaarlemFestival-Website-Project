<?php
    class Dance{
        private $id;
        private $day;
        private $date;
        private $time;
        private $vanue;
        private $artist;
        private $session;
        private $duration;
        private $ticketAvailable;
        private $price;

        public function getId(){
            return $this->id;
        }
        public function getDay(){
            return $this->day;
        }
        public function getDate(){
            return $this->date;
        }
        public function getTime(){
            return $this->time;
        }
        public function getVanue(){
            return $this->vanue;
        }
        public function getArtist(){
            return $this->artist;
        }
        public function getSession(){
            return $this->session;
        }
        public function getDuration(){
            return $this->duration;
        }
        public function getAvaliableTickets(){
            return $this->ticketAvailable;
        }
        public function getPrice(){
            return $this->price;
        }

    }


?>