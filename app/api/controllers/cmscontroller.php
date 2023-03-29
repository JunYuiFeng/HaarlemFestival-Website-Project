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
            $objects = json_decode($body);

            echo json_encode(var_dump($objects));
            if(!isset($_POST['userName'])){
                return;
            }

            $username = htmlspecialchars($_POST['userName']);
            $email = htmlspecialchars($_POST['email']);
            $id = htmlspecialchars($_POST['id']);
            $userType = htmlspecialchars($_POST['userType']);
            $actionType = htmlspecialchars($_POST['actionType']);
            switch ($actionType) {
                case 'update':

                    $this->updateUser($id, $username, $email, $userType);
                    break;
                case 'delete':
                    $this->deleteUser($id);
                    break;
                default:
                    break;
            }
        }
    }
    
    public function updateUser($id, $username,$email, $userType)
    {
        try {
            if (empty($id) || empty($username) || empty($email) || empty($userType)) {
                $msg = "field empty, please fill in";
                return;
            }
            if ($userType == "admin") {
                $userType = 0;
            } else {
                $userType = 1;
            }
            $this->userService->editUserAsAdmin($username, $email, $id, $userType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function deleteUser($id)
    {
        echo "delete";
        $this->userService->deleteUser($id);
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