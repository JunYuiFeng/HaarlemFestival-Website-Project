<?php
include_once("../repositories/restaurantrepository.php");

class RestaurantsManagementService
{
    private $repository;

    function __construct()
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

    public function insertRestaurant($restaurant)
    {
        return $this->repository->insertRestaurant($restaurant);
    }

    public function updateRestaurant($restaurant, $id)
    {
        return $this->repository->updateRestaurant($restaurant, $id);
    }

    public function deleteRestaurant($id)
    {
        return $this->repository->deleteRestaurant($id);
    }
}
