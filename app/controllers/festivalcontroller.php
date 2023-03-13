<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/sessionservice.php';

class FestivalController
{   
    private $restaurantService;
    private $sessionService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
    }
    
    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }
    public function dancedetailed1(){
        require __DIR__ . '/../views/festival/dancedetailedpage1.php';
    }
    public function yummie()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurantdetail()
    {
        if(isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $restaurant = $this->restaurantService->getById($id);
            $sessions = $this->sessionService->getSessionsByRestaurantId($id); 
        }
        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }
}