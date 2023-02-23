<?php
include_once("../repositories/usersrepository.php");

class LoginService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function login(string $username, string $password): bool
    {
        $managers = $this->repository->getAll();
        $loginManager = NULL;

        // foreach ($managers as $manager) {
        //     if ($username == $manager->getManager_username()) {
        //         $loginManager = $manager;
        //     } else {
        //         return FALSE;
        //     }
        // }

        // if (password_verify($password, $loginManager->getManager_password())) {
        //     return TRUE;
        // }
        return FALSE;
    }

    public function logout()
    {
        unset($_SESSION["username"]);
    }
}
