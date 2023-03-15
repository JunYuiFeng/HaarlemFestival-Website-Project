<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/danceservice.php';

class FestivalController
{   
    private $restaurantService;
    private $danceService;

    function __construct()
    {
        $this->danceService = new DanceService();
        $this->restaurantService = new RestaurantService();
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
    public function dancedetailedpage1(){
        require __DIR__ . '/../views/festival/dancedetailedpage1.php';
    }
    public function dancedetailed2(){
        require __DIR__ . '/../views/festival/dancedetailedpage2.php';
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
        }
        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }
}
?>