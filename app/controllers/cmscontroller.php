<?php
require_once __DIR__ . '/../services/editPageService.php';
require_once __DIR__ . '/../services/userservice.php';

class CmsController
{
    private $content;
    private $contentEditorService;
    private $userService;
    function __construct()
    {
        $this->contentEditorService = new EditPageService();
        $this->userService = new UserService();
    }

    public function usermanagement()
    {
        $users = $this->userService->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($_POST['action']) {
                case 'update':
                    $this->updateItem();
                    break;
                case 'delete':
                    $this->delete();
                    break;
                case 'create':
                    $this->create();
                    break;
                case 'sortIdAsc':
                    sort($users);
                    break;
                case 'sortIdDESC':
                    rsort($users);
                    break;
                case 'sortUsernameASC':
                    $this->sortItem($users, "username", "ASC");
                    break;
                case 'sortUsernameDESC':
                    $users = $this->sortItem($users, "username", "DESC");
                    break;
                case 'sortEmailASC':
                    $this->sortItem($users, "email", "ASC");
                    break;
                case 'sortEmailDESC':
                    $users = $this->sortItem($users, "email", "DESC");
                    break;
                default:
                    break;
            }
        }

        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function sortItem($users, $item, $sortType)
    {
        $items = array();
        foreach ($users as $user) {
            $method = 'get' . ucfirst($item); // Get the name of the getter method for the property being sorted
            array_push($items, $user->$method()); // Call the getter method on the user object to get the value of the property, and add it to the $items array
        }

        if ($sortType == "DESC") {
            array_multisort($items, SORT_DESC, $users); // Sort both the $items and $users arrays in descending order based on the values in the $items array
        } else { // Otherwise, sort in ascending order
            array_multisort($items, SORT_ASC, $users);
        }
        foreach($users as $user){
            echo $user->getEmail();
        }
        return $users;
    }
    public function delete()
    {
        $id = $_POST["id"];
        $this->userService->deleteUser($id);
    }
    public function updateItem()
    {
        try {
            if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['userType']) || empty($_POST['id'])) {
                $msg = "field empty, please fill in";
                return;
            }
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

            $email = htmlspecialchars($_POST['email']);
            $id = htmlspecialchars($_POST['id']);
            $userType = htmlspecialchars($_POST['userType']);
            if ($userType == "admin") {
                $userType = 0;
            } else {
                $userType = 1;
            }
            $this->userService->editUserAsAdmin($username, $email, $password, $id, $userType);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function create()
    {
        try {
            if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['userType'])) {
                $msg = "field empty, please fill in";
                echo $_POST['username'];
                echo $_POST['password'];
                echo $_POST['email'];
                echo $_POST['userType'];


                return;
            }
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

            $email = htmlspecialchars($_POST['email']);
            $userType = htmlspecialchars($_POST['userType']);
            if ($userType == "admin") {
                $userType = 0;
            } else {
                $userType = 1;
            }
            echo "controler";
            $this->userService->addUserAsAdmin($username, $email, $password, $userType);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editpagecontent()
    {
        if (isset($_GET["webPage"])) {
            $webPage = $_GET["webPage"];

            $this->content = $this->contentEditorService->getPageContent($webPage);
            if (isset($_POST['editor'])) {
                $editor_data = $_POST['editor'];
                $this->contentEditorService->setNewPageContent($webPage, $editor_data);
            }
            require __DIR__ . '/../views/cms/editpagecontent.php';
        } else {
            require __DIR__ . '/../views/notfound.php';
        }
    }
}