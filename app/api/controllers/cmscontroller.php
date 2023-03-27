<?php
require_once __DIR__ . '/../../services/userservice.php';
require_once __DIR__ . '/controller.php';

class CmsController extends Controller
{
    private $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
    }

    function searchFilter()
    {
        $users = $this->userService->getAll();
        $userResult = null;

        if (!empty($_GET['query'])) {
            $query = $_GET['query'];
            $userResult = array();
            foreach ($users as $user) {
                if (stristr($user->getId(), $query) || stristr($user->getUsername(), $query) || stristr($user->getEmail(), $query)) {
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
