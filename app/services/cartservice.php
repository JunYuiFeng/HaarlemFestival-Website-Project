<?php
require_once __DIR__ . '/../repositories/cartrepository.php';

class CartService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new CartRepository();
    }

    function insertToCartItems($cartId, $itemId, $type, $quantity)
    {
        $this->repository->insertToCartItems($cartId, $itemId, $type, $quantity);
    }

    function getCartIdByUserId($id)
    {
        return $this->repository->getCartIdByUserId($id);
    }

    function getQuantityByUserId($id)
    {
        return $this->repository->getQuantityByUserId($id);
    }
}