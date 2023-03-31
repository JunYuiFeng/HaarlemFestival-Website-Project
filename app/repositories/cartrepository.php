<?php
require_once __DIR__ . '/repository.php';
require_once '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;


class CartRepository extends Repository
{
    function insertToCartItems($cartId, $itemId, $type, $quantity)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `CartItems`(`cartId`, `itemId`, `type`, `quantity`)
             VALUES (:cartId, :itemId, :type, :quantity)");

            $stmt->bindParam(':cartId', $cartId);
            $stmt->bindParam(':itemId', $itemId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertToCartItemsAsVisitor($id, $cartId, $itemId, $type, $quantity)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `CartItems`(`id`,`cartId`, `itemId`, `type`, `quantity`)
             VALUES (:id, :cartId, :itemId, :type, :quantity)");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':cartId', $cartId);
            $stmt->bindParam(':itemId', $itemId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getCartIdByUserId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT `id` FROM `Carts` WHERE `userId` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getQuantityByUserId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT SUM(quantity) AS quantity
            FROM CartItems
            WHERE cartId = (
              SELECT id
              FROM Carts
              WHERE userId = :id)");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function getQuantityByItemId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT quantity FROM `CartItems` WHERE itemId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($userId)
    {
        try {
            $uuid = Uuid::uuid4()->toString();
            $stmt = $this->connection->prepare("INSERT INTO `Carts`(`Id`, `userId`) VALUES (:id, :userId)");
            $stmt->bindParam(':id', $uuid);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createVisitorCart()
    {
        try {
            $uuid = Uuid::uuid4()->toString();
            $stmt = $this->connection->prepare("INSERT INTO `Carts`(`Id`) VALUES (:id)");
            $stmt->bindParam(':id', $uuid);
            $stmt->execute();
            return $uuid;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
