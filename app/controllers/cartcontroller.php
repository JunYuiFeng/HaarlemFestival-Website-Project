<?php
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
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
    private $sessionService;
    private $paymentService;
    private $orderService;
    protected $loggedInUser;


    public function __construct()
    {
        parent::__construct();
        $this->cartService = new CartService();
        $this->restaurantService = new RestaurantService();
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

        $VAT = 1.09; //VAT is 9%
        $totalAmount = 0;
        $items = array();
        $data = array();

        if (isset($_SESSION["logedin"])) {
            $loggedInUser = $this->loggedInUser;
            $items = $this->reservationService->getFromCartByUserId($loggedInUser->getId());
        } else {
            if (isset($_SESSION['cart'])) {
                $items = $this->reservationService->getFromCartByCartId($_SESSION['cart']);
            }
        }

        if (!empty($items)) {
            foreach ($items as $item) {
                $itemData = array(
                    'id' => $item->getId(),
                    'comment' => $item->getComments(),
                    'amountAbove12' => $item->getAmountAbove12(),
                    'amountUnderOr12' => $item->getAmountUnderOr12(),
                    'price' => number_format($this->reservationService->getPrice($item->getId()), 2),
                    'restaurant' => $this->restaurantService->getById($item->getRestaurantId())->getName(),
                    'session' => $this->sessionService->getById($item->getSessionId())->getName(),
                    'date' => $item->getDate()
                );
                $totalAmount += $item->getAmountAbove12() * 10;
                $totalAmount += $item->getAmountUnderOr12() * 10;
                $totalAmount += $this->reservationService->getPrice($item->getId());

                $data[] = $itemData;
            }
        }
        //var_dump($items);
        $totalAmount = $totalAmount * $VAT;
        $_SESSION['totalAmount'] = $totalAmount;
        //var_dump($totalAmount);
        require __DIR__ . '/../views/cart/index.php';
    }

    function removeItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = htmlspecialchars($_GET['id']);
            $this->reservationService->deleteReservation($id);
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
                    "redirectUrl" => "http://localhost/cart",
                    "webhookUrl" => "https://example.com/webhook", //webhookUrl: "https://......./api/webhook"
                    "metadata" => [
                        "order_id" => $order->getId(),
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

        //echo "Payment created: " . $payment->id;
    }
}
