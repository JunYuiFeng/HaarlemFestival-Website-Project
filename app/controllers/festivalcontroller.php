<?php

class FestivalController
{
    public function overview()
    {
        require __DIR__ . '/../views/festival/overview.php';
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