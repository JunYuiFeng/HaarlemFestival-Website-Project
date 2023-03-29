<?php
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/controller.php';



class CartController extends Controller
{
    private $cartService;
    private $restaurantService;
    private $reservationService;
    private $sessionService;
    protected $loggedInUser;

    public function __construct()
    {
        parent::__construct();
        $this->cartService = new CartService();
        $this->restaurantService = new RestaurantService();
        $this->reservationService = new ReservationService();
        $this->sessionService = new SessionService();
    }

    public function index() 
    {
        $items = array();
        $totalAmount = 0;

        if (isset($_SESSION["logedin"])) {
            $loggedInUser = $this->loggedInUser;
            $items = $this->reservationService->getFromCartByUserId($loggedInUser->getId());
            foreach ($items as $item) {
                $totalAmount += $item->getAmountAbove12() * 10;
                $totalAmount += $item->getAmountUnderOr12() * 10;
                $totalAmount += $this->reservationService->getPrice($item->getId());
            }
            //var_dump($totalAmount);
            // foreach ($_SESSION["cart"] as $item) {
            //     $totalAmount += $item["price"];
            // }
        }
        else
        {
            if(isset($_SESSION["cart"])) {
                $items = $_SESSION["cart"];
            }
        }
        //session_destroy();

        require __DIR__ . '/../views/cart/index.php';
    }

    function removeItem() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $id = $_GET["id"];
            if (isset($_SESSION["logedin"])) {
                $this->reservationService->deleteReservation($id);
            }
            else
            {
                if(isset($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $item) {
                        if ($key == $id) {
                            unset($_SESSION["cart"][$key]);
                        }
                    }
                }
            }
        }
        header("Location: /cart/index");
    }
}