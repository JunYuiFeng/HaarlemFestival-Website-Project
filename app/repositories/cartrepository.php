<?php
require_once __DIR__ . '/repository.php';
require_once '../vendor/autoload.php';
use Ramsey\Uuid\Uuid;


class CartRepository extends Repository
{
    function insertToCartItems($cartId, $itemId, $type, $quantity)
    {
        try {
            // Check if item already exists in cart
            $stmt = $this->connection->prepare("SELECT * FROM `CartItems` WHERE `cartId` = :cartId AND `itemId` = :itemId AND `type` = :type");
            $stmt->bindParam(':cartId', $cartId);
            $stmt->bindParam(':itemId', $itemId);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Update quantity of existing row
                $stmt = $this->connection->prepare("UPDATE `CartItems` SET `quantity` = `quantity` + :quantity WHERE `cartId` = :cartId AND `itemId` = :itemId AND `type` = :type");
            } else {
                // Insert new row
                $stmt = $this->connection->prepare("INSERT INTO `CartItems`(`cartId`, `itemId`, `type`, `quantity`) VALUES (:cartId, :itemId, :type, :quantity)");
            }
    
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

    function getQuantityByCartId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT SUM(quantity) AS quantity FROM `CartItems` WHERE cartId = :id");
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

    function createRegisterUserCart($userId)
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

    function changeVisitorCartToRegisterUserCart($visitorCartId, $userId)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Carts` SET `userId` = :userId WHERE `Id` = :visitorCartId");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':visitorCartId', $visitorCartId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getTicketQuantity($cartId, $ticketId, $type)
    {
        try {
            $stmt = $this->connection->prepare("SELECT quantity FROM `CartItems` WHERE cartId = :cartId AND itemId = :ticketId AND type = :type");
            $stmt->bindParam(':cartId', $cartId);
            $stmt->bindParam(':ticketId', $ticketId);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function decreaseTicketQuantity($ticketId)
    {
        try {
            $this->connection->beginTransaction();
    
            $stmt = $this->connection->prepare("UPDATE CartItems 
                SET quantity = quantity - 1 
                WHERE itemId = :ticketId AND type = 'ticket'");
    
            $stmt->bindParam(':ticketId', $ticketId);
            $stmt->execute();
    
            $stmt = $this->connection->prepare("DELETE FROM CartItems 
                WHERE itemId = :ticketId AND type = 'ticket' AND quantity <= 0");
    
            $stmt->bindParam(':ticketId', $ticketId);
            $stmt->execute();
    
            $this->connection->commit();
    
            return true;
        } catch (PDOException $e) {
            $this->connection->rollBack(); //If any of the two SQL statements fails, this method will undo any changes made in the transaction, and the function returns false.
            echo $e;
            return false;
        }
    }

    function increaseTicketQuantity($ticketId) {
        try {
            $stmt = $this->connection->prepare("UPDATE CartItems SET quantity = quantity + 1 WHERE itemId = :ticketId");
            $stmt->bindParam(':ticketId', $ticketId);
            $stmt->execute();
            
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function deleteCartItemsByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `CartItems` WHERE cartId = (SELECT id FROM `Carts` WHERE userId = :userId)");
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
}
