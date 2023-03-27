<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/reservation.php';

class ReservationRepository extends Repository
{
    function insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comments, $status)
    {
        try {
            $formattedDate = $reservationDate->format('Y-m-d H:i:s');

            $stmt = $this->connection->prepare("INSERT INTO `Reservations`(`restaurantId`, `sessionId`, `amountAbove12`, `amountUnderOr12`, `date`, `comments`, `status`) 
        VALUES (:restaurantId, :sessionId, :amountAbove12, :amountUnderOr12, :reservationDate, :comments, :status)");
            $stmt->bindParam(':restaurantId', $restaurantId);
            $stmt->bindParam(':sessionId', $sessionId);
            $stmt->bindParam(':amountAbove12', $amountAbove12);
            $stmt->bindParam(':amountUnderOr12', $amountUnderOr12);
            $stmt->bindParam(':reservationDate', $formattedDate);
            $stmt->bindParam(':comments', $comments);
            $stmt->bindParam(':status', $status);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
