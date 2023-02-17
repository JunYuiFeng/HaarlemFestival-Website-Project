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
}