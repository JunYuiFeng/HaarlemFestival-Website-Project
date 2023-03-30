<?php
require_once __DIR__ . '/repository.php';

class PaymentRepository extends Repository
{
    function insert($id, $status, $amount)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Payments`(`Id`, `status`, `amount`) 
            VALUES (:id, :status, :amount)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':amount', $amount);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}