<?php 
    class Artist{
        private $id;
        private $name;
        private $style;
        private $firstSong;
        private $secondSong;
        private $thirdSong;
        private $indexPicture;
        private $firstDetailedPicture;
        private $secondDetailedPicture;

        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getStyle(){
            return $this->style;
        }
        public function getFirstSong(){
            return $this->firstSong;
        }
        public function getSecondSong(){
            return $this->secondSong;
        }
        public function getThirdSong(){
            return $this->thirdSong;
        }
        public function getIndexPicture(){
            return $this->indexPicture;
        }
        public function getFirstDetailedPicture(){
            return $this->firstDetailedPicture;
        }

    }
?>