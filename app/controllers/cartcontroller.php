<?php
require_once __DIR__ . '/../services/cartservice.php';

class CartController 
{
    private $cartService;

    public function __construct() 
    {
        $this->cartService = new CartService();
    }

    public function index() 
    {
        //$cart = $this->cartService->getCart();
        require __DIR__ . '/../views/cart/index.php';
    }

    public function addToCart($id, $quantity) 
    {
        $this->cartService->addToCart($id, $quantity);
    }

    public function removeFromCart($id) 
    {
        $this->cartService->removeFromCart($id);
    }

    public function decrease($id) 
    {
        $this->cartService->decrease($id);
    }
}