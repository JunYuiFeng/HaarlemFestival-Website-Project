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
    public function addDanceTocard($danceId,$userId,$ticketAmount)
    {
        return $this->repository->addDanceTocard($danceId,$userId,$ticketAmount);
    }
    public function updateDance($id,$date,$time,$venueId,$artistId,$ticketAmount,$price)
    {
        return $this->repository->updateDance($id,$date,$time,$artistId,$venueId,$ticketAmount,$price);
    }
    public function addDance($date,$time,$venueId,$artistId,$ticketAmount,$price)
    {
        return $this->repository->addDance($date,$time,$venueId,$artistId,$ticketAmount,$price);
    }
    public function removeTicket($id){
        return $this->repository->removeTicket($id);
    }
}