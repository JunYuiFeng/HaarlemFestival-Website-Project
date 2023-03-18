<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/session.php';

class SessionRepository extends Repository
{
    function getSessionsByRestaurantId($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Session` WHERE restaurantId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
            $sessions = $stmt->fetchAll();

            return $sessions;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}
