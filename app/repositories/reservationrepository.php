<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/reservation.php';

class ReservationRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Reservations`");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $reservations = $stmt->fetchAll();

            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Reservations` WHERE `id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $reservation = $stmt->fetch();

            return $reservation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateReservation($reservation) {
        try {
            $reservationDate = new DateTime($reservation->getDate());
            $formattedDate = $reservationDate->format('Y-m-d H:i:s');

            $stmt = $this->connection->prepare("INSERT INTO `Reservations`(`restaurantId`, `sessionId`, `amountAbove12`, `amountUnderOr12`, `date`, `comments`, `status`) 
        VALUES (:restaurantId, :sessionId, :amountAbove12, :amountUnderOr12, :reservationDate, :comments, :status)");
            $stmt->bindValue(':restaurantId', ($reservation->getRestaurantId()));
            $stmt->bindValue(':sessionId', ($reservation->getSessionId()));
            $stmt->bindValue(':amountAbove12', ($reservation->getAmountAbove12()));
            $stmt->bindValue(':amountUnderOr12', ($reservation->getAmountUnderOr12()));
            $stmt->bindValue(':reservationDate', $formattedDate);
            $stmt->bindValue(':comments', ($reservation->getComments()));
            $stmt->bindValue(':status', ($reservation->getStatus()));

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertReservation($reservation)
    {
        try {
            $reservationDate = new DateTime($reservation->getDate());
            $formattedDate = $reservationDate->format('Y-m-d H:i:s');

            $stmt = $this->connection->prepare("INSERT INTO `Reservations`(`restaurantId`, `sessionId`, `amountAbove12`, `amountUnderOr12`, `date`, `comments`, `status`) 
        VALUES (:restaurantId, :sessionId, :amountAbove12, :amountUnderOr12, :reservationDate, :comments, :status)");
            $stmt->bindValue(':restaurantId', ($reservation->getRestaurantId()));
            $stmt->bindValue(':sessionId', ($reservation->getSessionId()));
            $stmt->bindValue(':amountAbove12', ($reservation->getAmountAbove12()));
            $stmt->bindValue(':amountUnderOr12', ($reservation->getAmountUnderOr12()));
            $stmt->bindValue(':reservationDate', $formattedDate);
            $stmt->bindValue(':comments', ($reservation->getComments()));
            $stmt->bindValue(':status', ($reservation->getStatus()));

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getLastReservationId()
    {
        try {
            $stmt = $this->connection->prepare("SELECT `id` FROM `Reservations` ORDER BY `id` DESC LIMIT 1");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getFromCartByUserId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT *
            FROM Reservations
            WHERE id IN (
                SELECT itemId
                FROM CartItems
                WHERE cartId = (
                    SELECT id
                    FROM Carts
                    WHERE userId = :id))");
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $reservations = $stmt->fetchAll();

            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getFromCartByCartId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT *
            FROM Reservations
            WHERE id IN (
                SELECT itemId
                FROM CartItems
                WHERE cartId = :id)");
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $reservations = $stmt->fetchAll();

            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteReservation($id)
    {
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare("DELETE FROM `Reservations` WHERE `id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            // Delete the CartItems with itemId equal to $id and type as 'reservation'
            $stmt = $this->connection->prepare("DELETE FROM `CartItems` WHERE `itemId` = :itemId AND `type` = 'reservation'");
            $stmt->bindParam(':itemId', $id);
            $stmt->execute();
            
            $this->connection->commit();
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo $e;
        }
    }
    

    function getPrice($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT
            SUM(Reservations.amountUnderOr12 * Restaurants.priceAge12AndUnder) +
            SUM(Reservations.amountAbove12 * Restaurants.priceAboveAge12) AS totalAmount
          FROM
            Reservations, Restaurants
          WHERE
            Reservations.restaurantId = Restaurants.id AND
            Reservations.id = :id;
          ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getReservationWithRestaurantAndSessionAsJSON($reservationId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT r.id as reservationId, r.amountAbove12 AS amountOfPeopleAbove12,r.amountLess12 AS amountOfPeopleLess12,  re.id AS restaurantId, re.name AS restaurantName, re.cuisine AS restaurantCuisine, re.isFestival, re.address AS restaurantAddress, s.name as sessionName, s.startTime as sessionStartTime FROM Reservations r, Restaurants re, Sessions s WHERE r.restaurantId = re.id AND r.sessionId = s.id AND r.id = :id");
            $stmt->bindParam(':id', $reservationId);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $reservation = $stmt->fetch();

            return $reservation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateStatus($id, $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `Reservations` SET `status`= :status WHERE id = :id");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
