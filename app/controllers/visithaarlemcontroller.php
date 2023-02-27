<?php

class VisitHaarlemController
{

    public function index()
    {
        require __DIR__ . '/../views/visithaarlem/index.php';
    }

    public function food()
    {
        require __DIR__ . '/../views/visithaarlem/food.php';
    }

    public function history()
    {
        require __DIR__ . '/../views/visithaarlem/history.php';
    }

    public function Culture(){        
        require __DIR__ . '/../views/visithaarlem/culture.php';
    }
    public function Theatre(){
        require __DIR__ . '/../views/visithaarlem/theatre.php';
    }
    public function FestivalCulture(){
        require __DIR__ . '/../views/visithaarlem/cultureFestival.php';
    }
    public function Museum(){
        require __DIR__ . '/../views/visithaarlem/museum.php';
    }
    public function kids()
    {
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }

}