<?php
require_once __DIR__ . "/../repositories/paymentrepository.php";


class PaymentService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new PaymentRepository();
    }

    function insert($id, $status, $amount)
    {
        $this->repository->insert($id, $status, $amount);
    }
}