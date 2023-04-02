<?php
require_once __DIR__ . "/../repositories/orderrepository.php";
class OrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getAllAsJSON()
    {
        return $this->repository->getAllAsJSON();
    }

    function getLastOrderByUserId($id)
    {
        return $this->repository->getLastOrderByUserId($id);
    }

    function updateOrderStatus($id, $status)
    {
        $this->repository->updateOrderStatus($id, $status);
    }

    function insertIntoOrder($userId, $date, $status)
    {
        return $this->repository->insertIntoOrder($userId, $date, $status);
    }

    function insertIntoOrderItems($orderId, $itemId, $type, $quantity)
    {
        $this->repository->insertIntoOrderItems($orderId, $itemId, $type, $quantity);
    }
}
