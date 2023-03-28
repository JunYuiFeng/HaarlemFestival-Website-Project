<?php
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/reservationservice.php';
include_once("../services/userservice.php");




class CartController 
{
    private $cartService;
    //private $restaurantService;
    private $reservationService;
    private $userService;

    public function __construct() 
    {
        $this->cartService = new CartService();
        //$this->restaurantService = new RestaurantService();
        $this->reservationService = new ReservationService();
        $this->userService = new UserService();
    }

    public function index() 
    {
        $items = array();
        $totalAmount = 0;

        if (isset($_SESSION["logedin"])) {
            $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
            $userId = $loggedInUser->getId();
            $items = $this->reservationService->getFromCartByUserId($userId);
            var_dump($items);

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

        // if (isset($_SESSION["cart"])&&!isset($_SESSION["logedin"])) {
        //     foreach ($_SESSION["cart"] as $item) {
        //         $totalAmount += $item["price"];
        //     }
        // }
        // else
        // {
        //     $loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        //     $userId = $loggedInUser->getId();
        //     $items = $this->reservationService->getFromCartByUserId($userId);
        //     foreach ($items as $item) {
        //         $quantity = $item->getAmountAbove12();
                
        //     }
        // }
        // return $totalAmount;

        //var_dump($items);
        //session_destroy();

        require __DIR__ . '/../views/cart/index.php';
    }
}