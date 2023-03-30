<?php
require_once __DIR__ . "/../repositories/orderrepository.php";
require_once __DIR__ . "/../repositories/usersrepository.php";
require_once __DIR__ . "/../repositories/apikeyrepository.php";
require_once __DIR__ . "/../repositories/reservationrepository.php";

class APIService
{
    private $orderRepository;
    private $userRepository;
    private $apiKeyRepository;
    private $reservationRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new UsersRepository();
        $this->apiKeyRepository = new APIKeyRepository();
        $this->reservationRepository = new ReservationRepository();
    }

    public function getAllOrdersWithUsers()
    {
        $orders = $this->orderRepository->getAllAsJSON();
        if (sizeof($orders) <= 0)
            return false;

        for ($i = 0; $i < sizeof($orders); $i++) {
            $user = $this->userRepository->getById($orders[$i]['userId']);
            unset($orders[$i]['userId']); // removing userId from order object
            
            $orders[$i] += ["user" => $user];

            $orderItems = $this->orderRepository->getOrderItemsByOrderId($orders[$i]['id']);
            $itemsArray = array(); // array of items in order object

            foreach ($orderItems as $item) {
                $type = "";
                if ($item['type'] == 1){
                    $type = "reservation";
                    $reservationInfo = $this->reservationRepository->getReservationWithRestaurantAndSessionAsJSON($item['itemId']);
                    array_push($itemsArray, $reservationInfo);
                }
                else if ($item['type'] == 0)
                    $type = "ticket";

                //array_push($itemsArray, array($item['id'], $item['itemId'], $type));
            }
            $orders[$i] += ["Items" => $itemsArray];
        }
        return $orders;
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
