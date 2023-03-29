<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/order.php';

class OrderRepository extends Repository
{
    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Orders` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            $order = $stmt->fetch();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Orders`");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllAsJSON()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Orders`");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOrderItemsByOrderId($id) // do i need a model class for orderitems? and seperate repo file for it?
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `OrderItems` WHERE orderId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $order = $stmt->fetchAll();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
