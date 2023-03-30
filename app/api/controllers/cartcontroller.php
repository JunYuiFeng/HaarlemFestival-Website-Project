<?php
require_once __DIR__ . '/../../services/reservationservice.php';
require_once __DIR__ . '/../../services/cartservice.php';
require_once __DIR__ . '/controller.php';
include_once("../services/userservice.php");


class CartController extends Controller
{
    private $reservationService;
    private $cartService;
    private $userService;


    function __construct()
    {
        parent::__construct();
        $this->reservationService = new ReservationService();
        $this->cartService = new CartService();
        $this->userService = new UserService();
    }

    function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents("php://input");
            $objects = json_decode($body);


            $reservation = new Reservation();
            $reservation->setRestaurantId($objects->restaurantId);
            $reservation->setSessionId($objects->sessionId);
            $reservation->setAmountAbove12(!empty($objects->amountAbove12) ? $objects->amountAbove12 : 0);
            $reservation->setAmountUnderOr12(!empty($objects->amountUnderOr12) ? $objects->amountUnderOr12 : 0); //ternary operator to check if $amountUnderOr12 is empty or not, and if it is empty, then return 0
            $reservation->setDate($objects->date);
            $reservation->setComments(!empty($objects->comment) ? $objects->comment : "");
            $reservation->setStatus(htmlspecialchars('active'));
            $this->reservationService->insertReservation($reservation);
            
            $reservationId = $this->reservationService->getLastReservationId();
            $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
            $userId = $loggedInUser->getId();
            $cartId = $this->cartService->getCartIdByUserId($userId);

            $this->cartService->insertToCartItems($cartId['id'], $reservationId['id'], "reservation", 1);
        }
    }

    function getCartAmount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $userId = $_SESSION["logedin"];
            $cartAmount = $this->cartService->getQuantityByUserId($userId);

            header("Content-Type: application/json");
            echo json_encode($cartAmount['quantity']);
        }
    }

    function addToCartAsVisitor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents("php://input");
            $objects = json_decode($body);

            // $reservationDate = $objects->date;
            // $restaurantId = $objects->restaurantId;
            // $sessionId = $objects->sessionId;
            // $amountAbove12 = !empty($objects->amountAbove12) ? $objects->amountAbove12 : 0;
            // $amountUnderOr12 = !empty($objects->amountUnderOr12) ? $objects->amountUnderOr12 : 0;
            // $comment = !empty($objects->comment) ? $objects->comment : "";
            // $status = htmlspecialchars('active');

            $reservation = new Reservation();
            $reservation->setRestaurantId($objects->restaurantId);
            $reservation->setSessionId($objects->sessionId);
            $reservation->setAmountAbove12(!empty($objects->amountAbove12) ? $objects->amountAbove12 : 0);
            $reservation->setAmountUnderOr12(!empty($objects->amountUnderOr12) ? $objects->amountUnderOr12 : 0);
            $reservation->setDate($objects->date);
            $reservation->setComments(!empty($objects->comment) ? $objects->comment : "");
            $reservation->setStatus(htmlspecialchars('active'));

            $_SESSION['cart'][] = $reservation;
        }
    }

    function getCartAmountAsVisitor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $cart = array();

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            $amount = 0;

            foreach ($cart as $reservation) {
                $amount++;
            }

            header("Content-Type: application/json");
            echo json_encode($amount);
        }
    }
    
}
