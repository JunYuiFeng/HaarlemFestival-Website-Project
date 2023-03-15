<?php
require_once __DIR__ . '/../../services/userservice.php';

class CmsController
{
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");
        $users = $this->userService->getAll();
        $userResult = null;
    
        if (!empty($_GET['query'])) {
            $query = $_GET['query'];
            $userResult = array();
            foreach ($users as $user) {
                if ($user->getId() == $query || strtolower($user->getUsername()) == strtolower($query) || strtolower($user->getEmail()) == strtolower($query)) {
                    $userResult[] = $user;
                }
            }
        } else {
            $userResult = $users;
        }        
    
        header("Content-Type: application/json");
        echo json_encode($userResult);

    }
}
