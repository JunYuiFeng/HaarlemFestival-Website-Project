<?php
include_once("../services/userservice.php");

class Controller
{
    public $userService;
    protected $loggedInUser;

    public function __construct()
    {
        $this->userService = new UserService();
    
        if (isset($_SESSION["logedin"]))
        {
            $this->loggedInUser = $this->userService->getById($_SESSION["logedin"]);
        }
        else
        {
            $this->loggedInUser = null;
        }
    }

    function displayView($model){
        $directory = substr(get_class($this),0, -10);
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }
}