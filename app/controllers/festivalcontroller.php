<?php

class FestivalController
{   
    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }
    public function yummie()
    {
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurant()
    {
        require __DIR__ . '/../views/festival/restaurant.php';
    }
}