<?php
require_once __DIR__ . "/../repositories/paymentrepository.php";
require_once __DIR__ . "/../repositories/orderrepository.php";
require_once __DIR__ . "/../repositories/usersrepository.php";
require_once __DIR__ . "/../repositories/apikeyrepository.php";
require_once __DIR__ . "/../repositories/reservationrepository.php";

class APIService
{
    private $paymentRepository;
    private $orderRepository;
    private $userRepository;
    private $apiKeyRepository;
    private $reservationRepository;

    public function __construct()
    {
        $this->paymentRepository = new PaymentRepository();
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new UsersRepository();
        $this->apiKeyRepository = new APIKeyRepository();
        $this->reservationRepository = new ReservationRepository();
    }

    public function getAllPaymentsWithOrders()
    {
        $payments = $this->paymentRepository->getAllWithSubItemsAsJSON();
        return $payments;
    }

    public function verifyApiKey($token): bool
    {
        $apiKey = $this->apiKeyRepository->getByToken($token);
        if ($apiKey == false) {
            return FALSE;
        }
        return TRUE;
    }
}
