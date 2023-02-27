<?php
include_once("../model/User.php");
include_once("../services/loginservice.php");


class LoginController
{
    private $loginService;
    function __construct()
    {
        $loginService = new LoginService();
    }

    public function index()
    {
        if (isset($_SESSION["username"])) {
            header("location: login_success");
        } 
        else {
            $msg = "";

            if (isset($_POST["login"])) {
                if (empty($_POST["username"]) || empty($_POST["password"])) {
                    $msg = "field empty, please fill in";
                } else {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    if ($this->loginService->login($username, $password)) {
                        $_SESSION["username"] = $_POST["username"];
                        header("location: login_success");
                    } else {
                        $msg = "incorrect username or password";
                    }
                }
            }
        }
        
        require __DIR__ . '/../views/festival/login.php';
    }

    public function validate($user)
    {
        return $user->validate();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User($username, $password);
    //$controller = new LoginPageController();

    // if ($controller->validate($user)) {
    //     echo "Login successful";
    // } else {
    //     echo "Login failed";
    // }
}
