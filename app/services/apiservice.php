<?php
require_once __DIR__ . "/../repositories/orderRepository.php";
require_once __DIR__ . "/../repositories/usersRepository.php";

class APIService
{
    private $orderRepository;
    private $userRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new UsersRepository();
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
                if ($item['type'] == 1)
                    $type = "reservation";
                else if ($item['type'] == 0)
                    $type = "ticket";

                array_push($itemsArray, array($item['id'], $item['itemId'], $type));
            }
            $orders[$i] += ["Items" => $itemsArray];
        }
        return $orders;
    }
}
