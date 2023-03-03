<?php
require_once __DIR__ . "/../services/userservice.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . '/controller.php';


class CmsController extends Controller
{
    
    private $userService = new UserService();

    public function usermanagement()
    {
        
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function create()
    {
        require __DIR__ . '/../views/cms/create.php';
    }
    public function delete()
    {
        $id = $_GET["id"];
        $this->userService->delete($id);
        header("location: index");
    }


}
?>