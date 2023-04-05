<?php
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


    public function __construct()
    {
        parent::__construct();
        $this->cartService = new CartService();
        $this->restaurantService = new RestaurantService();
        $this->danceService = new DanceService();
        $this->reservationService = new ReservationService();
        $this->sessionService = new SessionService();
        $this->orderService = new OrderService();
        $this->paymentService = new PaymentService();
    }

    public function index()
    {
        // $mollie = new \Mollie\Api\MollieApiClient();
        // $mollie->setApiKey('test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8');

        // $invoice = $mollie->invoices->get("tr_F7puMvpQEz");
        // var_dump($invoice);

        $VAT = 0.09; //VAT is 9%
        $reservationFeePerPerson = 10;
        $VATAmount = 0;
        $reservationFee = 0;
        $subTotal = 0;
        $totalAmount = 0;
        $reservations = array();
        $tickets = array();
        $reservationData = array();
        $ticketData = array();

        if (isset($_SESSION["logedin"])) {
            $loggedInUser = $this->loggedInUser;
            $reservations = $this->reservationService->getFromCartByUserId($loggedInUser->getId());
            $tickets = $this->danceService->getTicketsFromCartByUserId($loggedInUser->getId());
        } else {
            if (isset($_SESSION['cart'])) {
                $reservations = $this->reservationService->getFromCartByCartId($_SESSION['cart']);
                $tickets = $this->danceService->getTicketFromCartByCartId($_SESSION['cart']);
            }
        }

        if (!empty($tickets)) {
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
        }
        
        if (!empty($reservations)) {
            foreach ($reservations as $reservation) {
                $item = array(
                    'id' => $reservation->getId(),
                    'comment' => $reservation->getComments(),
                    'amountAbove12' => $reservation->getAmountAbove12(),
                    'amountUnderOr12' => $reservation->getAmountUnderOr12(),
                    'price' => number_format($this->reservationService->getPrice($reservation->getId()), 2),
                    'restaurant' => $this->restaurantService->getById($reservation->getRestaurantId())->getName(),
                    'session' => $this->sessionService->getById($reservation->getSessionId())->getName(),
                    'date' => $reservation->getDate()
                );
                $reservationFee += ($reservation->getAmountAbove12() + $reservation->getAmountUnderOr12()) * $reservationFeePerPerson;
                $subTotal += $this->reservationService->getPrice($reservation->getId());

                $reservationData[] = $item;
            }
        }

        $totalAmount = $subTotal + $reservationFee;
        $VATAmount = $totalAmount * $VAT;
        $totalAmount += $VATAmount;
        $_SESSION['totalAmount'] = $totalAmount;

        require __DIR__ . '/../views/cart/index.php';
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
            $this->cartService->increaseTicketQuantity($ticketId);
        }
        header("Location: /cart/index");
    }

    function payment()
    {
        if (isset($_SESSION["logedin"])) {
            try {
                $mollie = new \Mollie\Api\MollieApiClient();
                $mollie->setApiKey('test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8');

                $order = $this->orderService->insertIntoOrder($this->loggedInUser->getId(), date("Y-m-d"), "pending");

                $payment = $mollie->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => number_format($_SESSION['totalAmount'], 2, '.', '')
                    ],
                    "description" => "Test payment",
                    "redirectUrl" => "https://4474-217-105-28-29.eu.ngrok.io/cart",
                    "webhookUrl" => "https://4474-217-105-28-29.eu.ngrok.io/api/webhook", //webhookUrl: "https://......./api/webhook"
                    "metadata" => [
                        "order_id" => $order->getId(),
                        "user_id" => $order->getUserId(),
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
