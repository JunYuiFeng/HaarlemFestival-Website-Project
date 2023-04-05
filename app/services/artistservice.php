<?php

require_once __DIR__ . '/../repositories/artistrepository.php';
class ArtistService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ArtistRepositories();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function getArtistById($id)
    {
        return $this->repository->getArtistById($id);
    }
}

?>