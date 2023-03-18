<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/reservationservice.php';

class FestivalController
{
    private $restaurantService;
    private $sessionService;
    private $reservationService;

    function __construct()
    {
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $restaurantId = htmlspecialchars($restaurant->getId());
            $sessionId = htmlspecialchars($_POST['sessionId']);
            $amountAbove12 = htmlspecialchars($_POST['amountAbove12']);
            $amountUnderOr12 = htmlspecialchars($_POST['amountUnderOr12']);
            $reservationDateStr = htmlspecialchars($_POST['date']);
            $reservationDate = new DateTime($reservationDateStr);
            $comment = htmlspecialchars($_POST['comment']);
            $status = htmlspecialchars('active');

            $this->reservationService->insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comment, $status);
            $this->restaurantService->decreaseSeats($restaurantId, $amountAbove12 + $amountUnderOr12); //decrease seats of a restaurant based on the amount of people that are reserving
        }
        require __DIR__ . '/../views/festival/restaurantdetail.php';
    }
}
