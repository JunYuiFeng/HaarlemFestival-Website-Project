<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/session.php';

class SessionRepository extends Repository
{
    function getSessionsByRestaurantId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Sessions` WHERE restaurantId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Session");

            $sessions = $stmt->fetchAll();

            return $sessions;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getSessionsArrayByRestaurantId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Sessions` WHERE restaurantId = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Sessions` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
            $session = $stmt->fetch();

            return $session;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Sessions` ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
            $sessions = $stmt->fetchAll();

            return $sessions;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function insert(Session $session): bool
    {
        try {
            $sql = 'INSERT INTO `Sessions`(`name`, `startTime`, `restaurantId`, `endTime`, seats) VALUES (:name, :startTime, :restaurantId, :endTime, :seats)';

            $statement = $this->connection->prepare($sql);

            $startTime = $session->getStartTime()->format('H:i');
            $endTime = $session->getEndTime()->format('H:i');
            return $statement->execute([
                ':name' => $session->getName(),
                ':startTime' => $startTime,
                ':endTime' => $endTime,
                ':seats' => $session->getSeats(),
                ':restaurantId' => $session->getRestaurantId()
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function update($session)
    {
        try {
            $stmt = $this->connection->prepare('UPDATE `Sessions` SET `name`=:name,`startTime`=:startTime,`restaurantId`=:restaurantId,`endTime`=:endTime, `seats`=:seats WHERE id = :id');

            $startTime = $session->getStartTime()->format('H:i');
            $endTime = $session->getEndTime()->format('H:i');

            return $stmt->execute([
                ':name' => $session->getName(),
                ':startTime' => $startTime,
                ':endTime' => $endTime,
                ':restaurantId' => $session->getRestaurantId(),
                ':seats' => $session->getSeats(),
                ':id' => $session->getId()
            ]);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($id): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `Sessions` WHERE id = :id");
            return $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    function decreaseSeats($id, $amount)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Sessions` SET `seats` = `seats` - :amount WHERE id = :id");
            return $stmt->execute([
                ':id' => $id,
                ':amount' => $amount
            ]);
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
