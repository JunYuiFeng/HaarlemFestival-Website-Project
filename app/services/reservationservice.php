<?php
require_once __DIR__ . '/../repositories/reservationrepository.php';

class ReservationService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new ReservationRepository();
    }

    function insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comments, $status)
    {
        $this->repository->insertReservation($restaurantId, $sessionId, $amountAbove12, $amountUnderOr12, $reservationDate, $comments, $status);

    }
}