<?php
require_once __DIR__ . '/../repositories/reservationrepository.php';

class ReservationService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new ReservationRepository();
    }

    function insertReservation($reservation)
    {
        $this->repository->insertReservation($reservation);

    }

    function getLastReservationId()
    {
        return $this->repository->getLastReservationId();
    }

    function getFromCartByUserId($id)
    {
        return $this->repository->getFromCartByUserId($id);
    }
}