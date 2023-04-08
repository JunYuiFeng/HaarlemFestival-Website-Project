<?php
require_once __DIR__ . '/../services/orderservice.php';


class RedirectUrlController
{
    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    function index()
    {
        $orderId = htmlspecialchars($_GET['orderId']);
        $order = $this->orderService->getById($orderId);

        if ($order->getStatus() == 'paid')
        {
            require __DIR__ . '/../views/payment/successpayment.php';
        }
        else
        {
            require __DIR__ . '/../views/payment/failedpayment.php';
        }
    }
}
