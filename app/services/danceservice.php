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


    public function getVanue()
    {
        return $this->repository->getVanue();
    }
    public function getArtistsBySession()
    {
        return $this->repository->getArtistsBySession();
    }
    public function getById($id)
    {
        return $this->repository->getById($id);
    }
}