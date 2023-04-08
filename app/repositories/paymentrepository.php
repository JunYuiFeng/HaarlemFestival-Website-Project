<?php
require_once __DIR__ . '/repository.php';

class PaymentRepository extends Repository
{
    function getAllWithSubItemsAsJSON()
    {
        try {
            $stmt = $this->connection->prepare("SELECT 
            p.id AS 'paymentId',
            JSON_OBJECT(
                'id', o.id, 
                'orderDate', o.date,
                'items', JSON_ARRAYAGG(
                    JSON_OBJECT(
                        'quantity', oi.quantity,
                        'type', oi.type,
                        'itemData',
                            CASE oi.type
                                WHEN 'ticket'  THEN (SELECT JSON_OBJECT(
                   'id', t.id,
                   'time', t.time,
                   'session', t.session,
                   'duration', t.duration,
                   'venueId', t.venueId,
                   'venueName', v.name,
                   'price', t.price,
                   'date', t.date
                   ) 
         FROM Tickets t 
         JOIN Venues v ON t.venueId = v.id
         WHERE t.id = oi.itemId)
                                WHEN 'reservation'  THEN JSON_OBJECT(
                                                'id', r.id,
                                                'restaurantId', r.id,
                                                'restaurantName', res.name,
                                                'sessionId', s.id,
                                                'sessionName', s.name,
                                                'sessionStartTime', s.startTime,
                                                'sessionEndTime', s.endTime,
                                                'amountAbove12', r.amountAbove12,
                                                'amountUnderOr12', r.amountUnderOr12,
                                                'date', r.date,
                                                'comments', r.comments,
                                                'status', r.status
                                            )
                            END
                    )
                )
            ) AS 'order',
            JSON_OBJECT(
                'id', u.id,
                'username', u.username,
                'email', u.email,
                'registrationDate', u.registrationDate
            ) AS 'customer', 
            p.amount 
        FROM Payments p 
            JOIN Orders o ON p.orderId = o.id 
            JOIN Users u ON o.userId = u.id 
            JOIN OrderItems oi ON oi.orderId = o.id 
            LEFT JOIN Tickets t ON oi.itemId = t.id AND oi.type = 'ticket' 
            LEFT JOIN Reservations r ON oi.itemId = r.id AND oi.type = 'reservation' 
            LEFT JOIN Restaurants res ON r.restaurantId = res.id
            LEFT JOIN Sessions s ON r.sessionId = s.id
        GROUP BY o.id");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $payments = $stmt->fetchAll();

            return $payments;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($id, $orderId, $amount)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Payments`(`Id`, `orderId`, `amount`) 
            VALUES (:id, :orderId, :amount)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':amount', $amount);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
