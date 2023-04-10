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
        private $firstSongSourceCode;
        private $secondSongSourceCode;
        private $thirdSongSourceCode;
        private $detailedPicture;
        private $career;

        public function Artist($id,$name, $style, $firstSong, $secondSong, $thirdSong, $indexPicture, $firstSongSourceCode, $secondSongSourceCode, $thirdSongSourceCode, $detailedPicture, $career){
            $this->id = $id;
            $this->name = $name;
            $this->style = $style;
            $this->firstSong = $firstSong;
            $this->secondSong = $secondSong;
            $this->thirdSong = $thirdSong;
            $this->indexPicture = $indexPicture;
            $this->firstSongSourceCode = $firstSongSourceCode;
            $this->secondSongSourceCode = $secondSongSourceCode;
            $this->thirdSongSourceCode = $thirdSongSourceCode;
            $this->detailedPicture = $detailedPicture;
            $this->career = $career;
        }
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
        public function getSecondDetailedPicture(){
            return $this->secondDetailedPicture;
        }
        public function getFirstSongSource(){
            return htmlspecialchars_decode($this->firstSongSourceCode);
        }
        public function getSecondSongSource(){
            return htmlspecialchars_decode($this->secondSongSourceCode);
        }
        public function getThirdSongSource(){
            return htmlspecialchars_decode($this->thirdSongSourceCode);
        }
        public function getDetailedPicture(){
            return $this->detailedPicture;
        }
        public function getCareer(){
            return $this->career;
        }


    }
?>