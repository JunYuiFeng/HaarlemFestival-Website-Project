<?php
include_once("../repositories/usersrepository.php");

class RegisterService
{
    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }


    public function register(string $email, string $username, string $password): string
    {
        $users = $this->repository->getAll();
        $loginUser = NULL;

        foreach ($users as $user) {
            if ($email == $user->getEmail()) {
                return "Email already registered";
            }
            if ($username == $user->getUsername()) {
                return "Username already registered";
            }
        }
        if (strlen($username) > 1 && strlen($username) < 30  && ctype_alnum($username)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($password) >= 6 && strlen($password) < 50) {
                    $hasshedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $id = $this->repository->createUser($username, $email, $hasshedPassword, 1);
                    return $id;
                } else {
                    return "Password should be at least 6 characters and maximum 50";
                }
            } else {
                return "Email is invalid";
            }
        } else {
            return "Username can contain only letters and numbers";
        }

        return FALSE;
    }
}
