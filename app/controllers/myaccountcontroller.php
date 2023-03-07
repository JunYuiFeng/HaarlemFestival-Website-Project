<?php
include_once("../services/loginservice.php");
include_once("../services/registerservice.php");
require_once __DIR__ . "/../services/userservice.php";
require_once __DIR__ . "/../models/user.php";
include_once("../services/resetpasswordservice.php");
include_once("../services/userservice.php");



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
            require __DIR__ . '/../views/myaccount/index.php';
        }

        $this->userService = new UserService();
        $users = $this->userService->getAll();
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
            if (isset($_POST["login"])) {
                if (empty($_POST["username"]) || empty($_POST["password"])) {
                    $this->msg = "field empty, please fill in";
                } else {
                    $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
                    $password = filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS);

                    $res = $this->loginService->login($username, $password);
                    if (ctype_digit($res)) {
                        if (strstr($username, "@")) {
                            $user = $this->userService->getByEmail($username);
                        }
                        else {
                            $user = $this->userService->getByUsername($username);
                        }
                        $_SESSION["logedin"] = $user->getId();
                        header("location: index");
                    } else {
                        $this->msg = "incorrect username or password";
                    }
                }
            }
        }

         $msg = $this->msg;
        require __DIR__ . '/../views/myaccount/login.php';
    }

    public function register()
    {
        if (isset($_SESSION["logedin"])) {
            header("location: index");
        } else {
            if (isset($_POST["register"])) {
                if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
                    if (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0) {
                        $this->msg = "Entered captcha code does not match! Please try again";
                    } else {
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
            }
        }

        require __DIR__ . '/../views/myaccount/register.php';
    }

    public function resetPassword()
    {
        if (isset($_POST["sendLink"])) {
            if (empty($_POST["email"])) {
                $this->msg = "Please fill all the fields";
            } else {
                $resetPasswordService = new ResetPasswordService();
                $email = $_POST["email"];
                if ($resetPasswordService->validateEmail($email)) {
                    if ($resetPasswordService->sendLink($email)) {
                        $this->msg = "Email sent successfully";
                    }
                } else {
                    $this->msg = "Email is not valid or not registered";
                }
            }
        }
        require __DIR__ . '/../views/myaccount/resetpassword.php';
    }
    public function changePassword()
    {
        if (isset($_GET["token"])) {
            $resetPasswordService = new ResetPasswordService();
            $token = $_GET["token"];
            $user = $resetPasswordService->checkToken($token);

            if ($user == NULL) {
                require __DIR__ . '/../views/notfound.php';
            }
            if (isset($_POST["changePass"])) {
                if ($_POST["newPassword"] == $_POST["newPasswordRepeat"]) {
                    $password = $_POST["newPassword"];
                    $hasshedPassword = password_hash($password, PASSWORD_DEFAULT);
                    if ($resetPasswordService->setNewPassword($hasshedPassword, $user->getId())) {
                        $_SESSION["logedin"] = $user->getId();
                        header("location: index");
                    }
                    $this->msg = "Something went wrong, please try again";
                } else {
                    $this->msg = "Passwords do not match";
                }
            }
            require __DIR__ . '/../views/myaccount/changepassword.php';
        } else {
            require __DIR__ . '/../views/notfound.php';
        }
    }

    public function validate($user)
    {
        return $user->validate();
    }

    public function logout()
    {
        $this->loginService->logout();
        header("location: login");
    }
}