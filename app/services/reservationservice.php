<?php
require_once __DIR__ . '/../repositories/reservationrepository.php';

class ReservationService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new ReservationRepository();
    }

    function getAll()
    {
        return $this->repository->getAll();
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

    function getFromCartByCartId($id)
    {
        return $this->repository->getFromCartByCartId($id);
    }

    function deleteReservation($id)
    {
        $this->repository->deleteReservation($id);
    }

    function getPrice($id)
    {
        return $this->repository->getPrice($id);
    }
}