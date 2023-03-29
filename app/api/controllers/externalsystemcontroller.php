<?php
//require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/apiservice.php';
require_once __DIR__ . '/controller.php';

class ExternalSystemController extends Controller
{
    private $orderService;
    private $apiService;

    function __construct()
    {
        parent::__construct();
        //$this->orderService = new OrderService();
        $this->apiService = new APIService();
        header("Content-Type: application/json");

        // if (!isset($_SERVER['HTTP_X_API_KEY'])) {
        //     $this->respondWithError(401, "Credentials not provided");
        //     exit();
        // }
        // $apiKey = $_SERVER['HTTP_X_API_KEY'];
        // if (!$this->verifyApiKey($apiKey)) {
        //     // Invalid API key
        //     $this->respondWithError(401, "Credentials are not valid");
        //     exit;
        // }

        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $this->respondWithError(401, "Credentials not provided");
            exit();
        }

        // Get the API key from the Authorization header
        $api_key = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);

        if (!$this->verifyApiKey($api_key)) {
            // Invalid API key
            $this->respondWithError(401, "Credentials are not valid");
            exit;
        }
    }

    function orders()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->apiService->getAllOrdersWithUsers();
            if($data == false){
                $this->respondWithCode(204);
                exit;
            }
            
            $this->respond($data);
        } else {
            $this->respondWithError(400, "Invalid request method");
        }
    }


    private function verifyApiKey($apiKey)
    {
        $valid_api_keys = [
            'sasa',
            'test',
        ];
        if (!in_array($apiKey, $valid_api_keys)) {
            return false;
        }
        return true;
    }
}
