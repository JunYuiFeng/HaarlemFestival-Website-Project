<?php
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/resetpasswordservice.php';
require_once __DIR__ . '/controller.php';



class MyAccountController extends Controller
{
    private $cartService;
    private $msg;

    function __construct()
    {
        parent::__construct();
        $this->cartService = new CartService();
        $this->msg = "";
    }

    public function index()
    {
        if (!isset($_SESSION["logedin"])) {
            header("location: login");
        }
        $this->userService = new UserService();
        $user = $this->userService->getById($_SESSION["logedin"]);

        if (isset($_POST['updateUsername'])) {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
            $validation = $this->userService->validateUsernameAndEmail($username, $email, $_SESSION["logedin"]);
            if (is_bool($validation)) {

                if ($this->userService->updateUsernameAndEmail($username, $email, $_SESSION["logedin"])) {
                    $this->userService->sendConfirmationEmail($user->getEmail(), $user->getUsername());
                    $msg = "Profile information was successfully updated";
                    $user = $this->userService->getById($_SESSION["logedin"]);
                } else {
                    $msg = "Something went wrong";
                }
            } else {
                $msg = $validation;
            }
        }
        if (isset($_POST['updatePassword'])) {
            if ($_POST['newPassword'] == $_POST['confirmNewPassword']) {
                $validation = $this->userService->validatePassword($_POST['newPassword']);
                if (is_bool($validation)) {
                    $oldPass = filter_var($_POST['oldPassword'], FILTER_SANITIZE_SPECIAL_CHARS);;
                    $newPass = filter_var($_POST['newPassword'], FILTER_SANITIZE_SPECIAL_CHARS);;
                    if (password_verify($oldPass, $user->getPassword())) {
                        $hasshedPassword = password_hash($newPass, PASSWORD_DEFAULT);
                        $this->userService->updatePassword($hasshedPassword, $user->getId());
                        $this->userService->sendConfirmationEmail($user->getEmail(), $user->getUsername());
                        $msg = "Password was changed successfully";
                        $user = $this->userService->getById($_SESSION["logedin"]);
                    } else {
                        $msg = "Old password is not valid";
                    }
                } else {
                    $msg = $validation;
                }
            } else {
                $msg = "New password do not match";
            }
        }
        if (isset($_FILES['profile_picture'])) {
            $file = $_FILES['profile_picture'];
            $upload_dir = __DIR__ . '/../public/img/profile-pictures/';
            $upload_file = $upload_dir . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                if ($this->userService->updateProfilePicture($file['name'], $user->getId())) {
                    $msg = "Image uploaded successfully";
                    $user = $this->userService->getById($_SESSION["logedin"]);
                } else {
                    $msg = "Something went wrong";
                }
            } else {
                $msg = "Error while uploading file";
            }
        }



        require __DIR__ . '/../views/myaccount/index.php';
    }

    public function login()
    {
        if (isset($_SESSION["logedin"])) {
            header("location: index");
        }
        if (isset($_POST["login"])) {
            if (empty($_POST["username"]) || empty($_POST["password"])) {
                $this->msg = "field empty, please fill in";
            } else {
                $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
                $password = filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS);

                $res = $this->userService->login($username, $password);
                if (ctype_digit($res)) {
                    if (strstr($username, "@")) {
                        $user = $this->userService->getByEmail($username);
                    } else {
                        $user = $this->userService->getByUsername($username);
                    }
                    $_SESSION["logedin"] = $user->getId();
                    if ($user->getUserType() == "employee") {
                        $_SESSION["employee"] = $user->getId();
                    }
                    unset($_SESSION['cart']);

                    header("location: index");
                } else {
                    $this->msg = "incorrect username or password";
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

                            $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
                            $username = filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
                            $password = filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS);

                            $res = $this->userService->register($email, $username, $password);



                            if (ctype_digit($res)) {
                                $_SESSION["logedin"] = $res;
                                if (isset($_SESSION['cart'])) {
                                    $this->cartService->changeVisitorCartToRegisterUserCart($_SESSION['cart'], $res);
                                    unset($_SESSION['cart']);
                                } else {
                                    $this->cartService->createRegisterUserCart($res);
                                }
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
                $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
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
            $token = filter_var($_GET["token"], FILTER_SANITIZE_SPECIAL_CHARS);
            $user = $resetPasswordService->checkToken($token);

            if ($user == NULL) {
                require __DIR__ . '/../views/notfound.php';
                exit;
            }
            if (isset($_POST["changePass"])) {
                if ($_POST["newPassword"] == $_POST["newPasswordRepeat"]) {
                    $password = filter_var($_POST["newPassword"], FILTER_SANITIZE_SPECIAL_CHARS);
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

    public function logout()
    {
        $this->userService->logout();
        header("location: login");
    }
    
}
