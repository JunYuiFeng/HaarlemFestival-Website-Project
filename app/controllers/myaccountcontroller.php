<?php
include_once("../services/loginservice.php");
include_once("../services/registerservice.php");
require_once __DIR__ . "/../services/userservice.php";
require_once __DIR__ . "/../models/user.php";



class MyAccountController
{
    private $loginService;
    private $registerService;
    private $msg;
    private $userService;

    function __construct()
    {
        $this->loginService = new LoginService();
        $this->userService = new UserService();
        $this->registerService = new RegisterService();
        $this->msg = "";
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->updateItem();
        }
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //    header("location: login");
        // }
        $this->userService = new UserService();
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/myaccount/index.php';
    }

    public function updateItem()
    {
        try {
            if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
                $msg = "field empty, please fill in";
                return;
            }
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

            $email = htmlspecialchars($_POST['email']);
            $id = htmlspecialchars($_POST['id']);

            $this->userService->editUser($username, $email, $password, $id);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function login()
    {
        if (isset($_SESSION["logedin"])) {
            header("location: index");
        } else {
            $msg = "";
            if (isset($_POST["login"])) {

                if (empty($_POST["username"]) || empty($_POST["password"])) {
                    $msg = "field empty, please fill in";
                } else {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $res = $this->loginService->login($username, $password);
                    if (ctype_digit($res)) {
                        $_SESSION["logedin"] = $res;
                        header("location: index");
                    } else {
                        $this->msg = $res;
                    }
                }
            }
        }

        require __DIR__ . '/../views/myaccount/login.php';
    }

    public function register()
    {
        if (isset($_SESSION["logedin"])) {
            header("location: index");
        } else {
            if (isset($_POST["register"])) {
                if (empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])) {
                    $this->msg = "Please fill all the fields";
                } else {
                    $email = $_POST["email"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $res = $this->registerService->register($email, $username, $password);
                    if (ctype_digit($res)) {
                        $_SESSION["logedin"] = $res;
                        header("location: index");
                    } else {
                        $this->msg = $res;
                    }
                }
            }
        }

        require __DIR__ . '/../views/myaccount/register.php';
    }

    public function dashboard()
    {
        require __DIR__ . '/../views/login/dashboard.php';
    }

    public function validate($user)
    {
        return $user->validate();
    }

    public function logout()
    {
        unset($_SESSION['logedin']);
        header("location: login");
    }
}