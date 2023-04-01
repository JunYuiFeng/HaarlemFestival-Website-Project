<?php
include_once("../services/loginservice.php");
include_once("../services/registerservice.php");
require_once __DIR__ . '/../services/cartservice.php';

require_once __DIR__ . "/../models/user.php";
include_once("../services/resetpasswordservice.php");
require_once __DIR__ . '/controller.php';



class MyAccountController extends Controller
{
    private $cartService;
    private $loginService;
    private $registerService;
    private $msg;

    function __construct()
    {
        parent::__construct();
        $this->cartService = new CartService();
        $this->loginService = new LoginService();
        $this->registerService = new RegisterService();
        $this->msg = "";
    }

    public function index()
    {
        $user = $this->userService->getById($_SESSION["logedin"]);
        if (!isset($_SESSION["logedin"])) {
            header("location: login");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->updateItem($user);
        }

        $this->userService = new UserService();
        require __DIR__ . '/../views/myaccount/index.php';
    }

    public function updateItem($user)
    {
        try {
            if (empty($_POST['username']) || empty($_POST['oldPassword']) || empty($_POST['email']) || empty($_POST['newPassword']) || empty($_POST['confirmationNewPassword'])) {
                $msg = "field empty, please fill in";
                return;
            }
            if ($_POST['newPassword'] == $_POST['confirmationNewPassword']) {
                $password = password_hash(htmlspecialchars($_POST['newPassword']), PASSWORD_DEFAULT);
                if ($user->getPassword() == $_POST['oldPassword']) {

                    $username = htmlspecialchars($_POST['username']);

                    $email = htmlspecialchars($_POST['email']);
                    $id = htmlspecialchars($_POST['id']);

                    $this->userService->editUser($username, $email, $password, $id);
                    $this->userService->sendLink($email);

                } else {
                    $msg = "old password is incorrect";
                }
            } else {
                $msg = "new password and confirmation new password are not the same";
            }

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
                        } else {
                            $user = $this->userService->getByUsername($username);
                        }
                        $_SESSION["logedin"] = $user->getId();
                        unset($_SESSION['cart']);
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

                            if (isset($_SESSION['cart'])) {
                                $this->cartService->changeVisitorCartToRegisterUserCart($_SESSION['cart'], $res);
                                unset($_SESSION['cart']);
                            }
                            else {
                                $this->cartService->createRegisterUserCart($res);
                            }

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