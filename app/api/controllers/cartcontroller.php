<?php
require_once __DIR__ . '/../../services/reservationservice.php';
require_once __DIR__ . '/controller.php';

class CartController extends Controller
{
    private $reservationService;

    function __construct()
    {
        parent::__construct();
        $this->reservationService = new ReservationService();
    }

    function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents("php://input");
            $objects = json_decode($body);
    
            $reservationDate = new DateTime($objects->date);
            $restaurantId = $objects->restaurantId;
            $sessionId = $objects->sessionId;
            $amountAbove12 = $objects->amountAbove12;
            $amountUnderOr12 = $objects->amountUnderOr12;
            $comment = $objects->comment;
            $status = htmlspecialchars('active');
    
            $this->reservationService->insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comment, $status);
    
            header("Content-Type: application/json");
            echo json_encode($objects);
        }
    }

    function addToCartVisitor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents("php://input");
            $objects = json_decode($body);

            $reservationDate = new DateTime($objects->date);
            $restaurantId = $objects->restaurantId;
            $sessionId = $objects->sessionId;
            $amountAbove12 = $objects->amountAbove12;
            $amountUnderOr12 = $objects->amountUnderOr12;
            $comment = $objects->comment;
            $status = htmlspecialchars('active');

            $reservation = new Reservation();
            $reservation->setRestaurantId($restaurantId);
            $reservation->setSessionId($sessionId);
            $reservation->setAmountAbove12($amountAbove12);
            $reservation->setAmountUnderOr12($amountUnderOr12);
            $reservation->setDate($reservationDate);
            $reservation->setComments($comment);
            $reservation->setStatus($status);

            $_SESSION['cart'][] =+ $reservation;

        }
    }
    
}
