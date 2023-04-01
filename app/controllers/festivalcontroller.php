<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/danceservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/ticketservice.php';
require_once __DIR__ . '/controller.php';


class FestivalController extends Controller
{
    private $restaurantService;
    private $danceService;
    private $sessionService;
    private $reservationService;
    private $artistService;
    private $venueService;
    private $ticketService;
    protected $loggedInUser;


    function __construct()
    {
        parent::__construct();
        $this->danceService = new DanceService();
        $this->venueService = new VenueService();
        $this->artistService = new ArtistService();
        $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        $this->reservationService = new ReservationService();
    }

    public function index()
    {
        require __DIR__ . '/../views/festival/index.php';
    }

    public function dance()
    {
        $danecVanueType = "";
        $DanceCardType = 0;
        $dances = $this->danceService->getAll();
        $artists = $this->artistService->getAll();
        $venues = $this->venueService->getAll();
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
        $loggedInUser = $this->loggedInUser;

        $restaurant = null;

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $restaurant = $this->restaurantService->getById($id);
            $sessions = $this->sessionService->getSessionsByRestaurantId($id);
        }

        // $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        //var_dump($loggedInUser);

        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }

    public function validateTicket()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $this->ticketService = new TicketService();
            $ticketStatus = $this->ticketService->validateToken($token);

            require __DIR__ . '/../views/festival/ticketvalidation.php';
        }
    }
}
