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
            $reservation->setRestaurantId(htmlspecialchars($objects->restaurantId));
            $reservation->setSessionId(htmlspecialchars($objects->sessionId));
            $reservation->setAmountAbove12(htmlspecialchars(!empty($objects->amountAbove12) ? $objects->amountAbove12 : 0));
            $reservation->setAmountUnderOr12(htmlspecialchars(!empty($objects->amountUnderOr12) ? $objects->amountUnderOr12 : 0)); //ternary operator to check if $amountUnderOr12 is empty or not, and if it is empty, then return 0
            $reservation->setDate(htmlspecialchars($objects->date));
            $reservation->setComments(htmlspecialchars(!empty($objects->comment) ? $objects->comment : ""));
            $reservation->setStatus(htmlspecialchars('active'));
            $this->reservationService->insertReservation($reservation);

            $reservationId = $this->reservationService->getLastReservationId();
            $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
            $userId = $loggedInUser->getId();
            $cartId = $this->cartService->getCartIdByUserId($userId);

            $cartItems = $this->cartService->insertToCartItems($cartId['id'], $reservationId['id'], "reservation", 1);
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

            $reservation = new Reservation();
            $reservation->setRestaurantId(htmlspecialchars($objects->restaurantId));
            $reservation->setSessionId(htmlspecialchars($objects->sessionId));
            $reservation->setAmountAbove12(htmlspecialchars(!empty($objects->amountAbove12) ? $objects->amountAbove12 : 0));
            $reservation->setAmountUnderOr12(htmlspecialchars(!empty($objects->amountUnderOr12) ? $objects->amountUnderOr12 : 0)); //ternary operator to check if $amountUnderOr12 is empty or not, and if it is empty, then return 0
            $reservation->setDate(htmlspecialchars($objects->date));
            $reservation->setComments(htmlspecialchars(!empty($objects->comment) ? $objects->comment : ""));
            $reservation->setStatus(htmlspecialchars('active'));
            //$this->reservationService->insertReservation($reservation);


            $cart = array();

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            else{
                $vistorSession = $this->cartService->createNewVistorSession();
                $cart = $vistorSession;
            }
            $_SESSION['cart'] = $cart;
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
