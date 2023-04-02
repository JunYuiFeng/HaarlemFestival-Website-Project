<?php
include_once("../repositories/usersrepository.php");

class LoginService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function login(string $username, string $password): string
    {
        $users = $this->repository->getAll();
        $loginUser = NULL;

        foreach ($users as $user) {
            if ($username == $user->getUsername()) {
                $loginUser = $user;
                break;
            } else if ($username == $user->getEmail()) {
                $loginUser = $user;
                break;
            }
        }

        if ($loginUser && password_verify($password, $loginUser->getPassword())) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION["logedin"]);
        if (isset($_SESSION["employee"]))
            unset($_SESSION["employee"]);
    }
}
