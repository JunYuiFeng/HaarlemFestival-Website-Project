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

    function getAllInUserFriendlyFormat()
    {
        try {
            $stmt = $this->connection->prepare("SELECT
            o.id AS 'orderId',
            u.username AS 'customerUsername',
            u.email AS 'customerEmail',
            GROUP_CONCAT(
                CONCAT(
                    oi.quantity, ' ', oi.type,
                    CASE oi.type
                        WHEN 'ticket' THEN CONCAT(
                            ' (Ticket id: ', t.id, ', Time: ', t.time, ', Session: ', t.session, ', Duration: ', t.duration,
                            ', Venue name: ', v.name, ', Price: ', t.price, ', Date: ', t.date, ')'
                        )
                        WHEN 'reservation' THEN CONCAT(
                            ' (Reservation id: ', r.id, ', Restaurant name: ', res.name,
                            ',', s.name, ', Time: ', CONCAT_WS(' - ', s.startTime, s.endTime) ,
                            ', Amount above 12: ', r.amountAbove12, ', Amount under or 12: ',
                            r.amountUnderOr12, ', Date: ', r.date, ', Comments: ', r.comments, ', Status: ', r.status, ')'
                        )
                    END
                ) SEPARATOR ', '
            ) AS 'orderItems',
            o.date AS 'orderDate',
            o.invoiceNr AS 'invoiceNumber',
            o.status AS 'orderStatus',
            Payments.amount AS 'totalAmount'
        FROM Orders o
        JOIN Payments ON Payments.orderId = o.id
        JOIN Users u ON o.userId = u.id
        JOIN OrderItems oi ON oi.orderId = o.id
        LEFT JOIN Tickets t ON oi.itemId = t.id AND oi.type = 'ticket'
        LEFT JOIN Reservations r ON oi.itemId = r.id AND oi.type = 'reservation'
        LEFT JOIN Restaurants res ON r.restaurantId = res.id
        LEFT JOIN Sessions s ON r.sessionId = s.id
        LEFT JOIN Venues v ON t.venueId = v.id
        GROUP BY o.id;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOrderItemsByOrderId($id)
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

    function getOrderItemByOrderIdAndItemId($orderId, $itemId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `OrderItems` WHERE orderId = :id AND itemId = :itemId");
            $stmt->bindParam(':id', $orderId);
            $stmt->bindParam(':itemId', $itemId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $orderItem = $stmt->fetch();

            return $orderItem;
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

    function changeOrderStatus($id, $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Orders` SET `status` = :status WHERE `id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status', $status);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateInvoiceNr($orderId, $invoiceNr)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Orders` SET `invoiceNr` = :invoiceNr WHERE id = :id");
            $stmt->bindParam(':id', $orderId);
            $stmt->bindParam(':invoiceNr', $invoiceNr);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
