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

    function getById($id)
    {
        return $this->repository->getById($id);
    }

    function updateReservation($reservation) {
        $this->repository->updateReservation($reservation);
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

    function deleteReservation($id, $cartId)
    {
        $this->repository->deleteReservation($id, $cartId);
    }

    function getPrice($id)
    {
        return $this->repository->getPrice($id);
    }

    function updateStatus($id, $status)
    {
        $this->repository->updateStatus($id, $status);   
    }
}