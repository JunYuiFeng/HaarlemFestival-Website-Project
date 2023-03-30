<?php

require_once __DIR__ . '/../repositories/dancerepository.php';
require_once __DIR__ . '/../repositories/venuesrepository.php';
class VenueService
{    
    private $repository;

    function __construct()
    {
        $this->repository = new VenueRepository();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
}
?>