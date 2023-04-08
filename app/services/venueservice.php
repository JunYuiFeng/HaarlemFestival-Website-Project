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
    public function editVenue($id,$name,$address,$image)
    {
        return $this->repository->editVenue($id,$name,$address,$image);
    }
    public function addVenue($name,$address,$image)
    {
        return $this->repository->addVenue($name,$address,$image);
    }
    public function removeVenue($id)
    {
        return $this->repository->removeVenue($id);
    }
    public function getVenueIdByName($name){
        return $this->repository->getVenueIdByName($name);
    }
}
?>