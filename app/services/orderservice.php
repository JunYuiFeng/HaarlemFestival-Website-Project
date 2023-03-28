<?php
require_once __DIR__ . "/../repositories/orderrepository.php";
class OrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
