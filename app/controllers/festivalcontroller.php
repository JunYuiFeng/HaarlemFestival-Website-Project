<?php
require_once __DIR__ . '/../services/restaurantservice.php';

class FestivalController
{   
    private $restaurantService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
    }
    
    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }
    public function yummie()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurant()
    {
        require __DIR__ . '/../views/festival/restaurant.php';
    }
}