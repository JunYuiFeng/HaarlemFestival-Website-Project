<?php
require_once __DIR__ . '/../repositories/dancerepository.php';

class DanceService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DanceRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function getAllByDate($date)
    {
        return $this->repository->getAllByDate($date);
    }
    public function getAllDate()
    {
        return $this->repository->getAllDate();
    }
    public function getAllArtist()
    {
        return $this->repository->getAllArtist();
    }
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    function getFromCartByUserId($id)
    {
        return $this->repository->getFromCartByUserId($id);
    }

    function getTicketsFromCartByUserId($userId)
    {
        return $this->repository->getTicketsFromCartByUserId($userId);
    }

    function getTicketFromCartByCartId($cartId)
    {
        return $this->repository->getTicketFromCartByCartId($cartId);
    }

    function removeTicketFromCart($ticketId)
    {
        $this->repository->removeTicketFromCart($ticketId);
    }
}