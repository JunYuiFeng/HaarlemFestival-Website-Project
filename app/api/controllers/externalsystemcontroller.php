<?php
require_once __DIR__ . '/../../services/apiservice.php';
require_once __DIR__ . '/controller.php';

class ExternalSystemController extends Controller
{
    private $orderService;
    private $apiService;

    function __construct()
    {
        parent::__construct();
        $this->apiService = new APIService();
        header("Content-Type: application/json");


        if (!isset($_GET['API_KEY'])) {
            $this->respondWithError(401, "Credentials not provided");
            exit();
        }

        // Get the API key from the url parameter
        $apiKey = $_GET['API_KEY'];

        if (!$this->apiService->verifyApiKey($apiKey)) { // invalid API key
            $this->respondWithError(401, "Credentials are not valid");
            exit;
        }
    }

    function orders()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->apiService->getAllPaymentsWithOrders();
            if ($data == false) {
                $this->respondWithCode(204);
                exit;
            }
            foreach ($data as &$row) {
                $row['order'] = json_decode($row['order']);
                //$row['order']->items = json_decode($row['order']->items);
                foreach ($row['order']->items as &$item) {
                    $item->itemData = json_decode($item->itemData);
                }

                $row['customer'] = json_decode($row['customer']);
            }
            $this->respond($data);
        } else {
            $this->respondWithError(400, "Invalid request method");
        }
    }
}
