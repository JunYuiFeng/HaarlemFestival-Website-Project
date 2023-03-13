<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/reservation.php';

class ReservationRepository extends Repository
{
    function insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comments)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Reservations`(`restaurantId`, `sessionId`, `amountAbove12`, `amountUnderOr12`, `date`, `comments`) 
            VALUES (:restaurantId, :sessionId, :amountAbove12, :amountUnderOr12, :reservationDate, :comments)");  
            $stmt->bindParam(':restaurantId', $restaurantId);
            $stmt->bindParam(':sessionId', $sessionId);
            $stmt->bindParam(':amountAbove12', $amountAbove12);
            $stmt->bindParam(':amountUnderOr12', $amountUnderOr12);
            $stmt->bindParam(':reservationDate', $reservationDate);
            $stmt->bindParam(':comments', $comments);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
