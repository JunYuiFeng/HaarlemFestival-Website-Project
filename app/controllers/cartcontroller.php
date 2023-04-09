<?php

use function Ramsey\Uuid\v1;

require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/danceservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/paymentservice.php';
require_once __DIR__ . '/../services/orderservice.php';

require_once __DIR__ . '/controller.php';

require_once '../vendor/autoload.php';

class CartController extends Controller
{
    private $cartService;
    private $restaurantService;
    private $reservationService;
    private $danceService;
    private $sessionService;
    private $paymentService;
    private $orderService;
    protected $loggedInUser;


    public function __construct() {
        parent::__construct();
        $this->cartService = new CartService();
        $this->restaurantService = new RestaurantService();
        $this->danceService = new DanceService();
        $this->reservationService = new ReservationService();
        $this->sessionService = new SessionService();
        $this->orderService = new OrderService();
        $this->paymentService = new PaymentService();
    }

    public function index() {
        if (isset($_SESSION['alert'])) {
            echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
            
            unset($_SESSION['alert']);
        }
                
        $VAT = 0.09; //VAT is 9%
        $VATAmount = $subTotal = $totalAmount = $reservationFee = 0;
        $reservations = $tickets = $reservationData = $ticketData = array();

        $reservations = ($this->getReservationsAndTickets())['reservations'];
        $tickets = ($this->getReservationsAndTickets())['tickets'];
        $cartId = ($this->getReservationsAndTickets())['cartId'];

        if (isset($_GET['saveCart'])) {
            $this->cartService->duplicateCartItemsByCartId(htmlspecialchars($_GET['saveCart']), $cartId);
            header("Location: /cart/index");
        }

        if (!empty($tickets)) {
            $ticketInfo = $this->getTicketData($tickets);
            $ticketData = $ticketInfo['ticketData'];
            $subTotal += $ticketInfo['subTotal'];
        }

        if (!empty($reservations)) {
            $reservationInfo = $this->getReservationData($reservations);
            $reservationData = $reservationInfo['reservationData'];
            $reservationFee = $reservationInfo['reservationFee'];
            $subTotal += $reservationInfo['subTotal'];
        }

        $totalAmount = $subTotal + $reservationFee;
        $VATAmount = $totalAmount * $VAT;
        $totalAmount += $VATAmount;

        $_SESSION['totalAmount'] = $totalAmount;
        $_SESSION['VATAmount'] = $VATAmount;
        $_SESSION['reservationFee'] = $reservationFee;
        $_SESSION['subTotal'] = $subTotal;

        $_SESSION['cartItems'] = array("reservations" => $reservationData, "tickets" => $ticketData);

        require __DIR__ . '/../views/cart/index.php';
    }

    function getReservationsAndTickets() {
        $reservations = array();
        $tickets = array();
        $cartId = null;

        if (isset($_GET['share'])) {
            $sharedCartId = $_GET['share'];
            $reservations = $this->reservationService->getFromCartByCartId($sharedCartId);
            $tickets = $this->danceService->getTicketFromCartByCartId($sharedCartId);
        } else {
            if (isset($_SESSION["logedin"])) {
                $loggedInUser = $this->loggedInUser;
                $reservations = $this->reservationService->getFromCartByUserId($loggedInUser->getId());
                $tickets = $this->danceService->getTicketsFromCartByUserId($loggedInUser->getId());
                $cartId = $this->cartService->getCartIdByUserId($loggedInUser->getId())['id'];
            } else {
                if (isset($_SESSION['cart'])) {
                    $reservations = $this->reservationService->getFromCartByCartId($_SESSION['cart']);
                    $tickets = $this->danceService->getTicketFromCartByCartId($_SESSION['cart']);
                    $cartId = $_SESSION['cart'];
                }
            }
        }

        return [
            'reservations' => $reservations,
            'tickets' => $tickets,
            'cartId' => $cartId
        ];
    }

    function getReservationData($reservations) {
        $reservationData = array();
        $reservationFeePerPerson = 10;
        $reservationFee = 0;
        $subTotal = 0;

        foreach ($reservations as $reservation) {
            $item = array(
                'id' => $reservation->getId(),
                'comment' => $reservation->getComments(),
                'amountAbove12' => $reservation->getAmountAbove12(),
                'amountUnderOr12' => $reservation->getAmountUnderOr12(),
                'price' => number_format($this->reservationService->getPrice($reservation->getId()), 2),
                'restaurant' => $this->restaurantService->getById($reservation->getRestaurantId())->getName(),
                'restaurantId' => $reservation->getRestaurantId(),
                'session' => $this->sessionService->getById($reservation->getSessionId())->getName(),
                'sessionId' => $reservation->getSessionId(),
                'date' => $reservation->getDate()
            );
            $reservationFee += ($reservation->getAmountAbove12() + $reservation->getAmountUnderOr12()) * $reservationFeePerPerson;
            $subTotal += $this->reservationService->getPrice($reservation->getId());

            $reservationData[] = $item;
        }

        return [
            'reservationData' => $reservationData,
            'reservationFee' => $reservationFee,
            'subTotal' => $subTotal
        ];
    }

    private function getTicketData($tickets) {
        $ticketData = array();
        $subTotal = 0;

        foreach ($tickets as $ticket) {
            $item = array(
                'id' => $ticket->getId(),
                'quantity' => $ticket->getQuantity(),
                'price' => number_format($ticket->getPrice() * $ticket->getQuantity(), 2),
                'artist' => $ticket->getArtist(),
                'venue' => $ticket->getVenue(),
                'date' => $ticket->getDate(),
                'session' => $ticket->getSession()
            );
            $subTotal += ($ticket->getPrice() * $ticket->getQuantity());

            $ticketData[] = $item;
        }

        return [
            'ticketData' => $ticketData,
            'subTotal' => $subTotal
        ];
    }

    function removeReservation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = htmlspecialchars($_GET['id']);
            $this->reservationService->deleteReservation($id);
        }
        header("Location: /cart/index");
    }

    function removeTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = htmlspecialchars($_GET['id']);
            $this->danceService->removeTicketFromCart($id);
        }
        header("Location: /cart/index");
    }

    function decreaseTicketQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ticketId = htmlspecialchars($_GET['ticketId']);
            $this->cartService->decreaseTicketQuantity($ticketId);
        }
        header("Location: /cart/index");
    }

    function increaseTicketQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ticketId = htmlspecialchars($_GET['ticketId']);

            if (($this->danceService->getTicketById($ticketId))->getAvaliableTickets() == 0) {
                $_SESSION['alert'] = "ticket unavailable";
            } else {
                $this->cartService->increaseTicketQuantity($ticketId);
            }
            header("Location: /cart/index");
        }
    }

    function reservationAvailabilityCheck() {
        $reservations = $this->reservationService->getFromCartByUserId($this->loggedInUser->getId());

        foreach ($reservations as $reservation) {
            $session = $this->sessionService->getById($reservation->getSessionId());

            if ($session->getSeats() == 0) {
                $_SESSION['alert'] = "reservation with RESTAURANT: {$this->restaurantService->getById($reservation->getRestaurantId())->getName()} and SESSION: {$session->getName()} on {$reservation->getDate()} is soldout";
            }
            else if ($reservation->getAmountAbove12() + $reservation->getAmountUnderOr12() > $session->getSeats() ) {
                $_SESSION['alert'] = "reservation with RESTAURANT: {$this->restaurantService->getById($reservation->getRestaurantId())->getName()} and SESSION: {$session->getName()} on {$reservation->getDate()} has only {$session->getSeats()} available";
            }
            header("Location: /cart/index");
            exit();
        }
    }

    function ticketAvailabilityCheck() {
        $tickets = $this->danceService->getTicketsFromCartByUserId($this->loggedInUser->getId());
    
        foreach ($tickets as $ticket) {
            if ($ticket->getAvaliableTickets() == 0) {
                $_SESSION['alert'] = "ticket with ARTIST(S): {$ticket->getArtist()} and VENUE: {$ticket->getVenue()} on {$ticket->getDate()} is soldout";
            }
            else if ($ticket->getQuantity() > $ticket->getAvaliableTickets()) {
                $_SESSION['alert'] = "ticket with ARTIST(S): {$ticket->getArtist()} and VENUE: {$ticket->getVenue()} on {$ticket->getDate()} has only {$ticket->getAvaliableTickets()} available";
            }
            header("Location: /cart/index");
            exit();
        }
    }
    

    function payment()
    {
        require_once __DIR__ . '/../config/mollieApi.php';
        if (isset($_SESSION["logedin"])) {
            try {

                $this->ticketAvailabilityCheck();
                $this->reservationAvailabilityCheck();

                $order = $this->orderService->insertIntoOrder($this->loggedInUser->getId(), date("Y-m-d"), "pending");
                $this->orderService->transferCartItemsToOrderItemsById($order->getId(), $this->loggedInUser->getId());

                $payment = $mollie->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => number_format($_SESSION['totalAmount'], 2, '.', '')
                    ],
                    "description" => "Test payment",
                    "redirectUrl" => "https://09be-217-105-28-34.ngrok-free.app//redirecturl?orderId={$order->getId()}", //https://7d68-217-105-28-25.eu.ngrok.io/redirecturl?orderId={$order->getId()}
                    "webhookUrl" => "https://09be-217-105-28-34.ngrok-free.app//api/webhook",
                    "metadata" => [
                        "order_id" => $order->getId(),
                        "user_id" => $order->getUserId(),
                        "totalAmount" => $_SESSION['totalAmount'],
                        "VATAmount" => $_SESSION['VATAmount'],
                        "reservationFee" => $_SESSION['reservationFee'],
                        "subTotal" => $_SESSION['subTotal'],
                        "items" => $_SESSION['cartItems'],
                    ],
                ]);

                $this->paymentService->insert($payment->id, $order->getId(), $payment->amount->value);

                header("Location: " . $payment->getCheckoutUrl(), true, 303);
            } catch (\Mollie\Api\Exceptions\ApiException $e) {
                echo "API call failed: " . htmlspecialchars($e->getMessage());
            }
        } else {
            header("Location: /myaccount/register");
        }
    }
}
