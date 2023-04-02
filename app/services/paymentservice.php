<?php
require_once __DIR__ . "/../repositories/paymentrepository.php";


class PaymentService 
{
    private $repository;

    function __construct()
    {
        $this->repository = new PaymentRepository();
    }

    function insert($id, $orderId, $amount)
    {
        $this->repository->insert($id, $orderId, $amount);
    }
}