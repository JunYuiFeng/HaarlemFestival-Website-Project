<?php
require_once __DIR__ . '/repository.php';


class CartRepository extends Repository
{
    function insertToCartItems(int $cartId, int $itemId, string $type, int $quantity)
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
}