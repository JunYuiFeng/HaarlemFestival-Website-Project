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
    
    function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $users = $this->userService->getAll();

            header("Content-Type: application/json");
            echo json_encode($users);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = file_get_contents("php://input");
            $user = json_decode($body);

            if (empty($user->id) || empty($user->username) || empty($user->email) || empty($user->type)) {
                
                $this->respondWithError(400, "Not all data was provided");
                return;
            }
            echo $user->type;
            if ($this->userService->editUserAsAdmin($user->id, $user->username, $user->email, $user->type))
                $this->respond();
            else
                $this->respondWithError(500, "Something went wrong");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

            $body = file_get_contents("php://input");
            $user = json_decode($body);

            if (empty($user->id)) {
                $this->respondWithError(400, "Id was not provided");
                return;
            }
            if ($this->userService->deleteUser($user->id))
                $this->respond();
            else
                $this->respondWithError(500, "Something went wrong");
        }
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
