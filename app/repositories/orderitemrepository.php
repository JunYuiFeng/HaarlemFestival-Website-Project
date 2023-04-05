<?php
require_once __DIR__ . '/repository.php';

class OrderItemRepository extends Repository
{
    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `OrderItems` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $order = $stmt->fetch();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    
}
