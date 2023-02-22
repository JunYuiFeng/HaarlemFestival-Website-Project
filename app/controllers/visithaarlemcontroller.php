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
    public function kids()
    {
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }

}