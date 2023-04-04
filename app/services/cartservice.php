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

    function getQuantityByItemId($id)
    {
        return $this->repository->getQuantityByItemId($id);
    }

    // function insert($userId)
    // {
    //     $this->repository->insert($userId);
    // }

    function createRegisterUserCart($userId)
    {
        $this->repository->createRegisterUserCart($userId);
    }

    function createVisitorCart()
    {
        return $this->repository->createVisitorCart();
    }

    function getQuantityByCartId($id)
    {
        return $this->repository->getQuantityByCartId($id);
    }

    function changeVisitorCartToRegisterUserCart($visitorCartId, $userId)
    {
        $this->repository->changeVisitorCartToRegisterUserCart($visitorCartId, $userId);
    }

    function getTicketQuantity($cartId, $ticketId, $type)
    {
        return $this->repository->getTicketQuantity($cartId, $ticketId, $type);
    }
}