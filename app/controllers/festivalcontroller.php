<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/danceservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
include_once("../services/userservice.php");

class FestivalController 
{
    private $restaurantService;
    private $danceService;
    private $sessionService;
    private $reservationService;
    private $loggedInUser;
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
        $this->danceService = new DanceService();
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        $this->reservationService = new ReservationService();
    }

    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance(){
        $danecVanueType = "";
        $DanceCardType = 0;
        $dances = $this->danceService->getAll();
        $artists = $this->danceService->getArtistsBySession();
        $vanues = $this->danceService->getVanue();
        $dancesByDate27Jul = $this->danceService->getAllByDate('27 Jul');
        $dancesByDate28Jul = $this->danceService->getAllByDate('28 Jul');
        $dancesByDate29Jul = $this->danceService->getAllByDate('29 Jul');
        require __DIR__ . '/../views/festival/dance.php';
    }

    public function dancedetailedpage1()
    {
        require __DIR__ . '/../views/festival/dancedetailedpage1.php';
    }

    public function dancedetailed2()
    {
        require __DIR__ . '/../views/festival/dancedetailedpage2.php';
    }

    public function yummie()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/festival/yummie.php';
    }

    public function restaurantdetail()
    {
        $restaurant = null;

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $restaurant = $this->restaurantService->getById($id);
            $sessions = $this->sessionService->getSessionsByRestaurantId($id);
        }

        if (isset($_SESSION["logedin"]))
        {
            $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        }
        else
        {
            $loggedInUser = null;
        }

       // $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        //var_dump($loggedInUser);
        
        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }
}
