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

    function getLastOrderByUserId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Orders` WHERE userId = :id ORDER BY id DESC LIMIT 1");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            $order = $stmt->fetch();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateOrderStatus($id, $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Orders` SET `status` = :status WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function insertIntoOrder($userId, $date, $status)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Orders`(`userId`, `date`, `status`)
            VALUES (:userId, :date, :status)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

            // Retrieve the newly inserted order and return it
            $orderId = $this->connection->lastInsertId();
            $stmt = $this->connection->prepare("SELECT * FROM `Orders` WHERE `id` = :id");
            $stmt->bindParam(':id', $orderId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            $order = $stmt->fetch();
            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function insertIntoOrderItems($orderId, $itemId, $type, $quantity)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `OrderItems`(`orderId`, `itemId`, `type`, `quantity`)
            VALUES (:orderId, :itemId, :type, :quantity)");
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':itemId', $itemId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function transferCartItemsToOrderItemsById($orderId, $userId)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `OrderItems` (`orderId`, `itemId`, `type`, `quantity`)
            SELECT :orderId, `itemId`, `type`, `quantity`
            FROM `CartItems`
            WHERE `cartId` = (
                SELECT `id`
                FROM `Carts`
                WHERE `userId` = :userId)");
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
