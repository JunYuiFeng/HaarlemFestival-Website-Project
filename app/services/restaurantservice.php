<?php
require_once __DIR__ . '/../repositories/restaurantrepository.php';

class RestaurantService 
{
    private $repository;

    public function __construct()
    {
        $this->repository = new RestaurantRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }
}