<?php
require_once __DIR__ . '/repository.php';

class PaymentRepository extends Repository
{
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