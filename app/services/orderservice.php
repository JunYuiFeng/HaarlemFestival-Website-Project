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

    public function getAllInUserFriendlyFormat()
    {
        return $this->repository->getAllInUserFriendlyFormat();
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

    function getOrderItemByOrderIdAndItemId($orderId, $itemId)
    {
        return $this->repository->getOrderItemByOrderIdAndItemId($orderId, $itemId);
    }

    function insertIntoOrderItems($orderId, $itemId, $type, $quantity)
    {
        $this->repository->insertIntoOrderItems($orderId, $itemId, $type, $quantity);
    }

    function transferCartItemsToOrderItemsById($orderId, $userId)
    {
        $this->repository->transferCartItemsToOrderItemsById($orderId, $userId);
    }

    function changeOrderStatus($id, $status)
    {
        return $this->repository->changeOrderStatus($id, $status);
    }
}
