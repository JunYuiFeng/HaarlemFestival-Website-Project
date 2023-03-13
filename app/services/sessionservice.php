<?php
require_once __DIR__ . '/../repositories/sessionrepository.php';

class SessionService 
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SessionRepository();
    }

    function getSessionsByRestaurantId($id) 
    {
        return $this->repository->getSessionsByRestaurantId($id);
    }

    function getAll()
    {
        return $this->repository->getAll();
    }
}