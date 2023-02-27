<?php
require_once __DIR__ . '/../services/restaurantservice.php';

class VisitHaarlemController
{
    private $restaurantService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
    }

    public function index()
    {
        require __DIR__ . '/../views/visithaarlem/index.php';
    }

    public function food()
    {
        $restaurants = $this->restaurantService->getAll();
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
        require __DIR__ . '/../views/visithaarlem/festival.php';
    }
    public function Museum(){
        require __DIR__ . '/../views/visithaarlem/museum.php';
    }
    public function kids()
    {
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }
    public function dashboard()
    {
        require __DIR__ . '/../views/cms/dashboard.php';
    }

}