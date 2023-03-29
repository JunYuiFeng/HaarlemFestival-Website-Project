<?php
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/controller.php';

class ExternalSystemController extends Controller
{
    private $orderService;

    function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService();
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

        if (!$this->verifyApiKey1($api_key)) {
            // Invalid API key
            $this->respondWithError(401, "Credentials are not valid");
            exit;
        }
    }

    function orders()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->orderService->getAllAsJSON();
            $this->respond($data);
        } else {
            $this->respondWithError(400, "Invalid request method");
        }
    }

    // Verify API key function
    function verifyApiKey($apiKey)
    {
        // Load API keys from file or database
        $apiKeys = array(
            "client1" => "test",
            "client2" => "sahib"
        );

        // Hash API key
        $hashedApiKey = hash("sha256", $apiKey);

        // Check if API key exists in array
        if (isset($apiKeys[$apiKey])) {
            return true;
        } else {
            return false;
        }
    }

    function verifyApiKey1($apiKey)
    {
        $valid_api_keys = [
            'sasa',
            'test',
            // Add more keys as necessary
        ];
        if (!in_array($apiKey, $valid_api_keys)) {
            return false;
        }
        return true;
    }
}
