<?php
include_once("../model/User.php");

class LoginPageController
{
    public function display()
    {
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
    $controller = new LoginPageController();

    if ($controller->validate($user)) {
       echo "Login successful";
    } else {
       echo "Login failed";
    }
}
