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

    function getById($id) 
    {
        return $this->repository->getById($id);
    }

    function getAll()
    {
        return $this->repository->getAll();
    }

    function insert($session)
    {
        return $this->repository->insert($session);
    }

    function update($session)
    {
        return $this->repository->update($session);
    }

    function delete($id)
    {
        return $this->repository->delete($id);
    }
}